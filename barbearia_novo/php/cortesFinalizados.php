<?php 

$serve_file = $_SERVER['DOCUMENT_ROOT']."/barbearia_novo/";
session_save_path($serve_file.'cache/temp');
session_start();
include_once('conexao.php');

$nome = $_POST['nome'];
$data = $_POST['data'];
$telefone = $_POST['telefone'];
$hora = $_POST['hora'];
$valorCorte = $_POST['valorCorte'];
$idPegar = $_POST['idPegar'];
$idBarbeiro = $_POST['idBarbeiro'];

$sql = ("INSERT into cortes(nomeCliente,datacorte,barbeiro,telefone,valorCorte) values ('$nome','$data','$idBarbeiro','$telefone','$valorCorte')");
$result = mysqli_query($conn, $sql);

$sql2 = ("DELETE from agenda where id_agenda = '$idPegar'");
$result2 = mysqli_query($conn, $sql2);

$rows = mysqli_affected_rows($conn);
if($rows > 0){
    echo "<script>alert('Finalizado com sucesso!');
    window.location.href='http://localhost/barbearia_novo/dashboardsBarbeiro.php'</script>";

}else{
    echo "ERRO AO ATUALIZAR";
}
