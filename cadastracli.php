<?php
session_start();
include ("conecta.php");
$user=$_SESSION["user"];
$logado = mysqli_query($conn, "SELECT usuario.*, funcionario.cpf, funcionario.nome FROM usuario, funcionario WHERE login = '$user' AND usuario.cpf = funcionario.cpf") or die("Erro ao selecionar!");
$dado = mysqli_fetch_assoc($logado);
$usuario=$dado['nome'];
$tipo=$_POST['tipo'];
$nome=$_POST['nome'];
$endereco=$_POST['endereco'];
$cidade=$_POST['cidade'];
$telefone1=$_POST['tel'];
$telefone2=$_POST['tel2'];
$email=$_POST['email'];
$contato=$_POST['contato'];
$ramo=$_POST['ramo'];
date_default_timezone_set('America/Sao_Paulo');
$data=Date('Y-m-d H:i:s');
$cliente=mysqli_query($conn, "SELECT * from cliente where nome='".$nome."'");
if(mysqli_num_rows($cliente)>0){
    echo "<script language='javascript' type='text/javascript'>
    alert('cliente já existente em nossa base de dados');
    window.location.href='cadcli.php';
    </script>";
    mysqli_close($conn);
}
$sql = "INSERT INTO cliente(tipo,nome,endereco,cidade,telefone1,telefone2,email,contato,ramo,usuario,data) VALUE('$tipo','$nome','$endereco','$cidade','$telefone1','$telefone2','$email','$contato','$ramo','$usuario','$data')";
if(mysqli_query($conn,$sql)){
    echo "<script language='javascript' type='text/javascript'>
    alert('cliente cadastrado com sucesso!');
    window.location.href='cadcli.php';
    </script>";
}else{
    echo "<script language='javascript' type='text/javascript'>
    alert('Não foi!');
    window.location.href='cadcli.php';
    </script>";
}
mysqli_close($conn);
?>