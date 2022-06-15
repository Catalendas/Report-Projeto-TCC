<?php

use \App\Session\Login;
use \App\Entity\Upload;

// Dados do usuario logado
$usuarioLogado = Login::getUsuarioLogado();
$usuario = $usuarioLogado['nome'];


    $resultados = '' ;
    foreach($post as $post){
        $resultados .= ' 
        <!-- Usuario de posts -->
        <div class="user-post">

            <div class="identifier">
                <img src="./assets/img/user.png" alt="Usuario">

                <div class="datesForUser">
                    <p>'.$post->nome_user.'</p>
                    <p>'.$post->localizacao.' - '.date('d/m/Y à\s H:i', strtotime($post->tempo)).'</p>
                </div>
               
            </div>

            <div class="user-text">
                <h2>'.$post->titulo.'</h2>
                <p>'.$post->descricao.'</p>
            </div>

            <div class="user-photo">
                <img src="'.$post->caminho.'" alt="Denuncia">
            </div>

            <div class="shares">
                <button type="button"><i class="fa-solid fa-bookmark"></i></button>
                <button type="button"><i class="fa-solid fa-thumbs-up"></i></button>
                <button type="button"><i class="fa-solid fa-comment-lines"></i></button>
                <button type="button"><i class="fa-solid fa-share-from-square"></i></button>
            </div>
        </div>
        ';
    }

?>
 

    <!-- Principal -->
    <main id="principal">
        <section class="config">

            <div id="division">
                <div class="links" id="social_links">
                    <a href="#"><i class="fa-solid fa-fire"></i> Em Alta</a>
                    <a href="#"><i class="fa-solid fa-bell"></i> Notificações</a>
                    <a href="#"><i class="fa-solid fa-comment-dots"></i> Mensagens</a>
                    <a href="#"><i class="fa-solid fa-bookmark"></i> Salvos</a>
                    <a href="#"><i class="fa-solid fa-folder-open"></i> Minhas Denúncias</a>
                </div>
    
    
                
                    <div class="links" id="configuration">
        
                        <a href="#"><i class="fa-solid fa-gear"></i></a>
                        <a href="#"><i class="fa-solid fa-circle-question"></i></a>
                        <a href="#"><i class="fa-solid fa-circle-exclamation"></i></a>
        
                    </div>
                    
                </div>
            </div>
            
        </section>

        <!-- Post -->
        <div class="post">

            <button type="button" class="reportar">REPORTAR</button>

            <!-- Usuario de posts -->
           
            <?=$resultados?>
        </div>

        <section class="social">

            <div>
                <div id="social-friends">

                    <div id="division2">
                        <div id="friends">
    
                            <div>
                                <img src="./assets/img/henrique.png" alt=""><p>Henrique</p>
                            </div>
            
                            <div>
                                <img src="./assets/img/moises.png" alt=""><p>Moises</p>
                            </div>
            
                            <div>
                                <img src="./assets/img/gabriel.png" alt=""><p>Gabriel</p>
                            </div>
    
                        </div>
    
                        <div id="solicitation">
                            
                            <div id="friends-solicitations">

                                <div>
                                    <img src="./assets/img/Erick.png" alt=""><p>Erick</p>
                                    <button type="button">Aceitar</button> <button type="button">Recusar</button>
                                </div>
    
                                <div>
                                    <img src="./assets/img/Oscar.png" alt=""><p>Oscar</p>
                                    <button type="button">Aceitar</button> <button type="button">Recusar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>
            </div>

        </section>       
    </main>

    <!-- Modal para postagem de conteudo -->
    <div id="modal-postage" class="modal-container">
        <div class="modal">

            <button class="fechar-modal">X</button>

            <h3>REPORT</h3>

            <form method="post" enctype="multipart/form-data">

                <input type="text" class='text-postage' placeholder="Nome" name="nome_usuario" value="<?=$usuario?>">

                <input type="text" class='text-postage' placeholder="titulo" name="titulo">

                <textarea name="descricao" class="text-postage" cols="25" rows="4" placeholder="  Faça uma denuncia..."></textarea>  
                        
                <input type="text" class="text-postage" placeholder="Local" name="localidade">

                <label for="file" id="image-file">

                    <div class="iconWidth">

                        <div class="iconContainer">
                            <i class="fa-solid fa-camera"></i>
                        </div>
                    </div>
                    
                </label>

                <input type="file" name="image-file" id="file" accept="*/image"> 

                <input name="btn-postar" type="submit" value="Report" class="btn-reportar">

            </form>
        </div>
    </div>