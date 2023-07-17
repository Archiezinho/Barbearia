<?php

$server_file = $_SERVER['DOCUMENT_ROOT'] . "/barbearia_novo/";
session_save_path($server_file . 'cache/temp');
session_start();
include_once($server_file . '/php/conexao.php');

$nomeC = $_POST['nomeC'];
$nome = $_POST['produto'];
$valor = $_POST['valorCompra'];



$sql = ("INSERT into cortes(produto,valorProduto,comprador) values ('$nome','$valor','$nomeC')");
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_affected_rows($conn);
    if($rows > 0){
        echo "<script>alert('Gasto cadastrado!');
        window.location.href='http://localhost/barbearia_novo/controleGastos.php'
        </script>";
    }else{
        echo "ERRO AO CADASTRAR GASTO";
    }