<?php

    $conn = mysqli_connect('localhost:3310','root','','barbearia');

    if(!$conn){
        echo "ERRO NO BANCO!";
    }