<?php 

include_once('conexao.php');

$nome = $_POST['nome'];
$data = $_POST['data'];
$telefone = $_POST['telefone'];
$hora = $_POST['hora'];
$barbeiro = $_POST['barbeiro'];

$sql = ("SELECT * from agenda where hora = '$hora' and barbeiro = '$barbeiro'");
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_affected_rows($conn);
    if($rows == 0){
        $query = ("INSERT into agenda(nome_cliente,datacorte,telefone,hora,barbeiro) values ('$nome','$data','$telefone','$hora','$barbeiro')");
        $result1 = mysqli_query($conn, $query);
        $rows2 = mysqli_affected_rows($conn);
        echo "<script>
        alert('Seu corte está agendado para o dia $data as $hora, entraremos em contato através do seu número $telefone para confirmação...'); 
        window.location.href='http://localhost/barbearia_novo/index.php'</script>";

    }else{
        echo "<script>
        alert('Já tem um cliente agendado $hora com o barbeiro $barbeiro, tente agendar com outro barbeiro ou em outro horario!');

        window.location.href='http://localhost/barbearia_novo/index.php'</script>";
    }