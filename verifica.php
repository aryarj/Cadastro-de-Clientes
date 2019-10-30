<?php
    include("conecta.php");
    $cpf=$_POST["cpf"];
    $login=$_POST["login"];
    $senha=base64_encode($_POST["senha"]);
    $novo=mysqli_query($conn,"SELECT * from funcionario where cpf='$cpf'") or die(mysqli_error($conn));
    if(mysqli_num_rows($novo)>0){
        $usuario = mysqli_query($conn, "SELECT * FROM usuario WHERE cpf = '$cpf'") or die (mysqli_error($conn));
        if (mysqli_num_rows($usuario) > 0){
            echo ("<script>alert('CPF já cadastrado em nossa base de dados!');</script>");
            echo ("<script>location.href = 'novousuario.html';</script>");
            mysqli_close($conn);
        }
        $logusuario = mysqli_query($conn,"SELECT * from usuario where login='$login'") or die (msqli_error($conn));
        if(mysqli_num_rows($logusuario)>0){
            echo ("<script>alert('Login já cadastrado, tente novamente');</script>");
            echo ("<script>location.href='novousuario.html';</script>");
            mysqli_close($conn);
        }
        $sql=" INSERT into usuario(cpf,login,senha) values ('$cpf','$login','$senha')";
        $novousuario = mysqli_query($conn,$sql);
        echo ("<script>alert('Cadastro de usuário realizado com sucesso');</script>");
        echo ("<script>location.href='index.html';</script>");
        mysqli_close($conn);
    } else{
        echo ("<script>alert('Usuario inexistente em nossa base de dados, por favor entre em contato com o responsável');</script>");
        echo ("<script>location.href='novousuario.html';</script>");
        mysqli_close($conn);
    }
?>
