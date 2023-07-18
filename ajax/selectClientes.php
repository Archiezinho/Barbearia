<?php

header('Content-Type: application/json');

$server_file = $_SERVER['DOCUMENT_ROOT']."/barbearia_novo/";
session_save_path($server_file.'cache/temp');
session_start();

$parametro = $_GET['parametro'];

$pdo = new PDO('mysql:host=localhost:3310; dbname=barbearia', 'root', '');

$stmt = $pdo->prepare("SELECT * from agenda as A INNER JOIN barbeiro as B on A.barbeiro= B.id_barbeiro where A.nome_cliente like '%$parametro%' or B.nome like '%$parametro%'");
$stmt->execute();

if($stmt->rowCount() >= 0){
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}