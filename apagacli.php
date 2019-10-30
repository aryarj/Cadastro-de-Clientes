<?php 
    //Conecta ao banco de dados
    include("conecta.php");
    //Recebe os dados via GET
    $id = $_GET['id'];
    //Inicia a sessão para pegar o nome do usuário que deletou
    session_start();
    $user =  $_SESSION["user"];
    $logado = mysqli_query($conn,"SELECT usuario.*, funcionario.cpf, funcionario.nome FROM usuario, funcionario WHERE login = '$user' AND usuario.cpf = funcionario.cpf") or die("Erro ao selecionar!");
    $dado = mysqli_fetch_assoc($logado);
    $usuario = $dado['nome'];
    date_default_timezone_set('America/Sao_Paulo');
    $data = Date('Y-m-d h:i:s');
    $insere = mysqli_query($conn, "INSERT INTO clienteapagado (tipo,nome,endereco,cidade,telefone1,telefone2,email,contato,ramo,usuario,data) select tipo,nome,endereco,cidade,telefone1,telefone2,email,contato,ramo,'$usuario','$data' from cliente where id='$id'");
    $sql= "DELETE FROM cliente WHERE id='$id'";
    if(mysqli_query($conn, $sql)){
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Cliente apagado com sucesso!');
        window.location.href = 'agenda.php';
        </script>";
    } else {
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert'Não foi possível apagar o cliente!');
        window.location.href = 'agenda.php';
        </script>";
        //echo mysqli_error($conn);
    }
    mysqli_close($conn);
?>