<?php 

$serve_file = $_SERVER['DOCUMENT_ROOT']."/barbearia_novo/";
session_save_path($serve_file.'cache/temp');
session_start();
include_once('conexao.php');

$imagem = $_FILES['imagem'];

$codigo = rand(1,1000);

$dir = "../images/media/";

$imagem['name'] = $codigo.".png";

if(move_uploaded_file($imagem['tmp_name'], "$dir".$imagem['name'])){
    $sql = "INSERT into imgCorte (codigo) values ('$codigo')";
    $conn->query($sql);
    $conn->close();
    echo "<script>alert('Imagem cadastrada com sucesso!');window.location.href='http://localhost/barbearia_novo/cadastroImagem.php'</script>";
}else{
    echo "ERRO AO CADASTRAR IMAGEM!";
}
