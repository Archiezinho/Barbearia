<?php 

$server_file = $_SERVER['DOCUMENT_ROOT']."/barbearia_novo/";
session_save_path($server_file.'cache/temp');
session_start();
include_once('conexao.php');

$nome = $_POST['nome'];
$senha = $_POST['senha'];

$sql = "SELECT * from empresa where nome_adm = '$nome' and senha = '$senha'";
$result = mysqli_query($conn, $sql);
$row = mysqli_num_rows($result);
if($row > 0){
    while($row2 = mysqli_fetch_assoc($result)){
        $nome = $row2['nome'];
        $id = $row2['id_barbeiro'];
        $_SESSION['nome'] = $nome;
        $_SESSION['id'] = $id;
    }
    header('location: /barbearia_novo/dashboards.php');
}else{
    echo "<script>alert('Você não tem acesso!');window.location.href='http://localhost/barbearia_novo/logar.php'</script>";
}