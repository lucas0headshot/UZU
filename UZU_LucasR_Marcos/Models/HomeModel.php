<?php
    namespace UZU_LucasR_Marcos\Models;

    class HomeModel{

        public static function postFeed($post){
            $pdo = \UZU_LucasR_Marcos\SQL::connect();
            $post = strip_tags($post);
            
            if (preg_match('/\[imagem/', $post)){
                $post = preg_replace('/(.*?)\[imagem=(.*?)\]/', '<p>$1</p><img scr="$2" />', $post);
            }else{
                $post = '<p>'.$post.'</p>';
            }

            $postFeed = $pdo->prepare("Insert Into Posts Values (null, ?, ?, ?)"); //Inserir no Posts (ID, Usuario_ID, Post, Data e hora)
            $postFeed->execute(array($_SESSION['id'], $post, date('Y-m-d H:i:s', time())));

            $atualizaUsuario = $pdo->prepare("Update Usuarios Set Ultimo_Post = ? Where ID = ?"); //Autualizar último post do Usuário
            $atualizaUsuario->execute(array(date('Y-m-d H:i:s', time()), $_SESSION['id']));

        }

        public static function retrieveFriendsPosts(){
            $pdo = \UZU_LucasR_Marcos\SQL::connect();

			$amizades = $pdo->prepare("Select * From amizades Where (Enviou = ? And Status = 1) Or (Recebeu = ? And Status = 1)");
			$amizades->execute(array($_SESSION['id'],$_SESSION['id']));

			$amizades = $amizades->fetchAll();

			$amigosConfirmados = array();

			foreach ($amizades as $key => $value) {
				if ($value['Enviou'] == $_SESSION['id']){
					$amigosConfirmados[] = $value['Recebeu'];
				}else{
					$amigosConfirmados[] = $value['Enviou'];
				}
			}

			$listaAmigos = array();

			foreach ($amigosConfirmados as $key => $value) {

				$listaAmigos[$key]['ID'] = \UZU_LucasR_Marcos\Models\UsuariosModel::getUsuarioById($value)['ID'];
				$listaAmigos[$key]['Nome'] = \UZU_LucasR_Marcos\Models\UsuariosModel::getUsuarioById($value)['Nome'];
				$listaAmigos[$key]['Email'] = \UZU_LucasR_Marcos\Models\UsuariosModel::getUsuarioById($value)['Email'];
				$listaAmigos[$key]['Ultimo_Post'] = \UZU_LucasR_Marcos\Models\UsuariosModel::getUsuarioById($value)['Ultimo_Post'];
			}

			usort ($listaAmigos, function($a, $b){
				if (strtotime($a['Ultimo_Post']) >  strtotime($b['Ultimo_Post'])){
					return -1;
				}else{
					return +1;
				}
			});

			$posts = [];

			foreach ($listaAmigos as $key => $value) {
				$ultimoPost = $pdo->prepare("Select * From Posts Where Usuario_ID = ? Order By Data DESC");
				$ultimoPost->execute(array($value['ID']));

				if ($ultimoPost->rowCount() >= 1){
					$ultimoPost = $ultimoPost->fetch();
					$posts[$key]['Nome'] = $value['Nome'];
					$posts[$key]['Data'] = $ultimoPost['Data'];
					$posts[$key]['Conteudo'] = $ultimoPost['Post'];
				}
			}
			$me = $pdo->prepare("Select * From Usuarios Where ID = $_SESSION[id]");
			$me->execute();
			$me = $me->fetch();

			if (isset($posts[0])){

				if (strtotime($me['Ultimo_Post']) > strtotime($posts[0]['Data'])  ){
					$ultimoPost = $pdo->prepare("Select * From posts Where Usuario_ID = $_SESSION[id] Order By Data DESC");
					$ultimoPost->execute();
					$ultimoPost = $ultimoPost->fetchAll()[0];
					array_unshift($posts, array('Data'=> $ultimoPost['Data'], 'Conteudo'=> $ultimoPost['Post'], 'me'=> true));

				}
			}
			return $posts;
        }
    }
?>