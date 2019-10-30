<?php
    $servername="localhost";
    $database="agenda_ary";
    $username="root";
    $password="";
    $conn=new mysqli($servername, $username, $password, $database);
    if (!$conn){
        die ("Conexão falhou:".mysqli_connect_error());
    }
    
?>