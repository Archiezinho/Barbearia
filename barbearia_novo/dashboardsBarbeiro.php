<?php
    $server_file = $_SERVER['DOCUMENT_ROOT']."/barbearia_novo/";
    session_save_path($server_file.'cache/temp');
    session_start();
    include_once($server_file.'/php/conexao.php');
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link href="_css/servico.css" rel="stylesheet" type="text/css" />v
</head>
<style>
    button {
    padding: 10px 25px;
    border: 1px solid #34ADFF;
    background-color: #6262e2;
    border-radius: 40px;
    color: #fff;
}

button:hover {
    background-color: #34ADFF;
    border-color: #34ADFF;
    color: #FFF;
    cursor: pointer;
}
</style>
<body>
    
    <input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="brand">
                <span>BarberShop</span>
            </h3> 
            
            
            <label for="sidebar-toggle" class="ti-menu-alt"></label>
        </div>
        
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="">
                        <span class="ti-clipboard"></span>
                        <span>Agenda</span>
                    </a>
                </li>
                <li>
                    <a href="index.php"><span style="display:flex; justify-content: center; background-color:black; padding: 10px; border-radius:15px; " class="ti-arrow-left"></span></span></a>
                </li>
            </ul>
        </div>
    </div>
    
    
    <div class="main-content">
        <main>   
        <section class="recent">
                <div>
                <form style="display:flex; justify-content: center;" action="">
                    <input style="border-radius: 15px; padding:10px;" type="text" name="parametro" placeholder="Barbeiro">
                    <button class="submit" type="submit">Buscar</button>
                </form>
                
                    <div class="activity-card">
                        <h3>Clientes Agendados</h3>

                        <div class="table-responsive">
                            <table>
                                <thead style="text-align: center;">
                                    <tr>
                                        <th>Nome</th>
                                        <th>data</th>
                                        <th>hora</th>
                                        <th>telefone</th>
                                        <th>barbeiro</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $parametro = filter_input(INPUT_GET, "parametro");
                                        $result = $conn->query("SELECT * from agenda as A INNER JOIN barbeiro as B on A.barbeiro= B.id_barbeiro where A.nome_cliente like '%$parametro%' or B.nome like '%$parametro%'");
                                        while ($row = $result->fetch_object()){
                                            echo '
                                            <form action="finalizarCorte.php" method="POST">
                                            <tr>
                                                <th>'. $row->nome_cliente .'</th>
                                                <th>'. $row->datacorte .'</th>
                                                <th>'. $row->hora .'</th>
                                                <th>'. $row->telefone .'</th>
                                                <th>'. $row->nome .'</th>
                                                <th><button class="submit" name="id" type="submit">finalizar Corte</button></th>
                                                <input type="hidden" name="idPegar" value="'. $row->id_agenda .'">
                                            </tr>
                                            </form>
                                            ';
                                        }
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </div>
    </section>
            
        </main>
        
    </div>
    
</body>
</html>