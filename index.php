<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Post;
use \App\Entity\Upload;
use \App\Session\Login;

// Obriga o usuario a estar logado
Login::requireLogin();

// Busca
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

// Condições sql
$condicoes = [
  strlen($busca) ? 'titulo LIKE "%'.str_replace(' ', '%',$busca).'%"' : null
];

// Clausula Where
$where = implode(' AND ', $condicoes);

// VAlidaçõa do Post
if(isset($_POST['descricao'], $_POST['localidade'], $_FILES['image-file'], $_POST['titulo'], $_POST['nome_usuario'])){
   

  $obPost = new Post;
  
  $obPost-> nome_usuario = $_POST['nome_usuario'];
  $obPost-> titulo = $_POST['titulo'];
  $obPost-> descricao = $_POST['descricao'];
  $obPost-> localidade = $_POST['localidade'];

  //Upload de arquivo    
  $arquivo = ($_FILES['image-file']);

  // VAlidação de erro
  if($arquivo['error'])  die("falha no envio do arquivo");

  // Validação de tamanho
  if($arquivo['size'] > 8097152) die("Arquivo muito grande, max 8mb");

  $pasta = "arquivos/";
  $nomeDoArquivo = $arquivo["name"];
  $novoNomeArquvio = uniqid();
  $extencao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));


  $path = $pasta . $novoNomeArquvio . "." . $extencao;
  if($extencao != "jpg" && $extencao != "png" && $extencao != "jfif") die("tipo de arquivo invalido");

  $move = move_uploaded_file($arquivo['tmp_name'], $pasta . $novoNomeArquvio . ".".$extencao);

  if($move) {
    $obImg = new Upload();
    $obImg-> pathh = $path;
    $obPost-> caminho = $path;
    $obImg-> name_file = $nomeDoArquivo;

    $obImg->PostarImg();
    $obPost->Postar();
      
      echo "Deu certo";
  } else {
      echo "Deu errado";
  }

  // echo "<pre>"; print_r($obImg); echo "</pre>"; exit;
  
  // echo "<pre>"; print_r($arquivo); echo "</pre>"; exit;
  
  
  header('location: index.php?status=success');
  exit;
}

// Obtem as vagas
$post = Post::getPost($where);


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/main.php';
include __DIR__.'/includes/footer.php';