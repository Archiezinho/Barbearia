<?php 

$serve_file = $_SERVER['DOCUMENT_ROOT']."/barbearia_novo/";
session_save_path($serve_file.'cache/temp');
session_start();
include_once('conexao.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$aniversario = $_POST['aniversario'];
$datainicio = $_POST['data'];
$idPegar = $_POST['idPegar'];

$sql = ("UPDATE empresa set nome_adm='$nome', email='$email', telefone='$telefone', cpf='$cpf', aniversario='$aniversario', datainicio='$datainicio' where id_empresa= '$idPegar'");
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_affected_rows($conn);
    if($rows > 0){
        echo "<script>alert('Atualizado com sucesso!');
        window.location.href='http://localhost/barbearia_novo/editarAdm.php'</script>";

    }else{
        echo "ERRO AO ATUALIZAR";
    }