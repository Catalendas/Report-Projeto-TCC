<?php

use \App\Session\Login;

// Dados do usuario logado
$usuarioLogado = Login::getUsuarioLogado();

// Detalhes do usuario
$usuario = $usuarioLogado ? 
$usuarioLogado['nome'].'<a href="logout.php">Sair</a>' :
'Visiatante <a href="login.php">Entrar</a>'

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link font Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Link CSS font awelsome -->
    <link rel="stylesheet" href="./assets/css/all.css">
    <link rel="stylesheet" href="./assets/css/all.min.css">

 

    <style>

        /* Gobal */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;;
        }

        a{
            text-decoration: none;
        }

        /* Header */

        #header {
            display: flex;
            align-items: center;
            justify-content: space-around;

            height: 56px;

            
        }

        #header a {
            font-weight: 700
        }

        #header img {
            border-radius: 50%;
            overflow: hidden;
            width: 28px;
            height: 28px;
        }

        #header #search input[type="text"] {
            width: 500px;
            height: 40px;
            border: none;
            outline: none;
            padding: 0 25px;
            border-radius: 25px 0 0 25px;
            background-color: rgb(235, 233, 233);
            
        }

        #header #search button{
            position: relative;
            left: -5px;
            height: 40px;
            width: 120px;
            border-radius: 0 25px 25px 0;
            border: none;
            outline: none;
            cursor: pointer;
            background-color: rgb(235, 233, 233);

        }

        #user{
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* COnteudo do site */

        /* Parte esquerda */

        #principal {
            width: 100%;
            height: 100%;
            display: flex;
            background-color: gainsboro;
        }

        .config{
        
        flex-grow: 1;

        display: flex;
        flex-direction: column;
        justify-content: center;
        

        max-width: 280px;

        position: relative;
        
        }

        #division {
            height: 580px;
            border-right: 1px solid gray;
            padding: 15px;
        }


        .links{
            display: flex;
            flex-direction: column;  
        }

        #social_links{
            padding: 20px;
            border-bottom: 1px solid grey;
        }

        .links a {
            margin-top: 40px;
            font-size: 20px;
            color: black;
            transition: 0.4s linear;
        }

        .links a:hover{
            color: gray;
        }

        #configuration{
            
            padding: 20px;
        }

        /* Parte direita */

        .social{
            flex-grow: 1; 

            max-width: 280px;

            position: relative;
        }

        #friends{
            display: flex;
            flex-direction: column;
            
            margin-top: 70px;
            padding: 20px;

            border-bottom: 1px solid grey;

        }

        #social-friends #friends div{
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;

            margin-top: 20px;
        }

        #social-friends #friends div img {
            border-radius: 50%;
            overflow: hidden;
            width: 50px;
            height: 50px;
            
        }

        #division2{
            height: 580px;
            border-left: 1px solid gray;
            padding: 15px;
            margin-top: 20px;
        }

        #friends-solicitations{
            padding: 20px;
        }

        #friends-solicitations div{
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;

            margin-top: 20px;
        }

        #friends-solicitations div img {
            border-radius: 50%;
            overflow: hidden;
            width: 50px;
            height: 50px;
            
        }


        /* Centro */

        .post{

            height: 100vh;
            flex-grow: 2;
            display: flex;
            align-items: center;
            flex-direction: column;

            position: relative;

            overflow: hidden;

            overflow-y: scroll;
        }

        #image-file{
            cursor: pointer;
        }

        input[type="file"]{
            display: none;
        }

        .iconWidth{
            max-width: 30px;
            width: 100%;
        }

        .iconContainer{
            background-color: #eee;
            border: 4px solid #ccc;
            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;
            transition: background .4s;

            margin-bottom: 10px;
        }

        .iconContainer:hover{
            background-color: gray;
        }

        .reportar{
            width: 773px;
            height: 50px;

            top: 610px;
            border: none;

            position: fixed;

            background-color: rgb(255, 61, 61);

            font-weight: bolder;

            cursor: pointer;
        }

        .user-post{

            height: 460px;
            width: 600px;
            margin-top: 40px;

            display: flex;
            flex-direction: column;
            align-items: flex-start;
            background-color: white;
            border-radius: 20px;

            

        }

        /* Identificador de postagem */

        .identifier {
            
            margin-top: 20px;
            margin-left: 20px;

            display: flex;
            align-items: center;
        }

        .identifier img{
            border-radius: 50%;
            overflow: hidden;
            width: 50px;
            height: 50px;
        }

        .datesForUser p{
            margin-left: 10px;
        }

        .datesForUser p:nth-child(1){
            font-weight: bold;
        }

        .datesForUser p:nth-child(2){
            font-weight: lighter;
        }

        .user-text{
            margin-top: 10px;
            margin-top: 20px;
            margin-left: 20px;
            
            width: 510px;

            font-weight: 500;

            
        }

        .user-photo{
            margin-top: 20px;
            margin-left: 20px;

            display: flex;
            align-items: center;

            margin-top: 10px;
            

            
        }
        .user-photo img{
            width: 500px;
            height: 250px;

            border-radius: 15px;

            
        }

        .shares{
            width: 500px;
            height: 50px;

            margin-top: 8px;
            margin-left: 20px;

            display: flex;
            align-items: flex-start;
            justify-content: flex-end;

            
        }

        .shares button{

            border: none;
            background: none;

            margin-left: 10px;

            cursor: pointer;
        }

        /* Modal */

        .modal-container {
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            position: fixed;
            top: 0px;
            left: 0px;
            z-index: 2000;

            display: none;
            justify-content: center;
            align-items: center;
        }

        .modal-container.mostrar{
            display: flex;
        }

        .modal{
            background: white;
            width: 60%;
            max-width: 300px;
            padding: 40px;
            border: 10px solid #aaa8a8;
            box-shadow: 0 0 0 10px white;
            position: relative;
        }

        @keyframes modal {
            from {
                opacity: 0;
                transform: translate3d(0, -60px 0);
            }
            to {
                opacity: 1;
                transform: translate3d(0, 0px 0);
            }
        }

        .mostrar .modal {
            animation: modal .3s;
        }

        .fechar-modal {
            position: absolute;
            top: -30px;
            right: -30px;
            width: 50px;
            height: 50px;

            border-radius: 50%;
            border: 4px solid white;

            background: #aaa8a8;
            color: white;
            
            cursor: pointer;

            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.3);
        }

        .text-postage {
            background: rgb(224, 224, 224);
            border: none;
            border-radius: 2px;
            margin-bottom: 10px;
        }

        .modal input[type="text"] {
            height: 20px;
        }

        .btn-reportar{
            background-color: rgb(255, 61, 61);
            height: 30px;
            width: 80px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

    </style>
    
    <title>REPORT</title>

</head>
    <body>
        <!-- Header -->
        <header id="header">
                <a>REPORT</a>
                <div id="search">
                    <form method="get">
                        <input type="text" name="busca" value="<?=$busca?>">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div id="user">
                    <?=$usuario?>
                    <img src="./assets/img/user.png" alt="">
                    
                </div>
            </header>
  