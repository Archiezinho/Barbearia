<?php

include 'conexao.php';

$idPegar = $_POST['idPegar'];

$sql = ("DELETE from empresa where id_empresa= '$idPegar'");
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_affected_rows($conn);
    if($rows > 0){
        echo "<script>alert('deletado com sucesso!');
        window.location.href='http://localhost/barbearia_novo/equipe.php'</script>";

    }else{
        echo "ERRO AO ATUALIZAR";
    }