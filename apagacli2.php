<?php
    include ("conecta.php");
    session_start();
    $user=$_SESSION["user"];
    $usuario = mysqli_query($conn, "SELECT login, cpf from usuario where login='$user' and cpf='12345678901'");
    if(mysqli_num_rows($usuario) > 0){
        $id=$_GET['id'];
        $sql="DELETE from cliente where id='$id'";
        if(mysqli_query($conn,$sql)){
            echo "<script language='javascript' type='text/javascript'>
            alert('Cliente apagado com sucesso');
            window.location.href='visucli.php?id=$id';
            </script>";
        }else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Cliente NÃO FOI APAGADO');
            window.location.href='agenda.php';
            </script>";
        }
    }else{
        echo "<script language='javascript' type='text/javascript'>
            alert('Você não tem permissão para apagar esse cliente');
            window.location.href='agenda.php';
            </script>";
    }
mysqli_close($conn);
?>