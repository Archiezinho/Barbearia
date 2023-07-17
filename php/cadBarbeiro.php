<?php 

$serve_file = $_SERVER['DOCUMENT_ROOT']."/barbearia_novo/";
session_save_path($serve_file.'cache/temp');
session_start();
include_once('conexao.php');

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$aniversario = $_POST['aniversario'];
$datainicio = $_POST['data'];

$senha = hash('sha256', $senha);

$sql = ("INSERT into barbeiro(nome,senha,email,cpf,telefone,aniversario,datainicio) values ('$nome', '$senha', '$email', '$cpf', '$telefone', '$aniversario', '$datainicio')");
    
$result = mysqli_query($conn, $sql);

    $rows = mysqli_affected_rows($conn);

    if($rows > 0){
        echo "<script>alert('Barbeiro cadastrado!');window.location.href='http://localhost/barbearia_novo/cadastrar.php'</script>";

    }else{
        echo "ERRO AO CADASTRAR BARBEIRO";
    }

