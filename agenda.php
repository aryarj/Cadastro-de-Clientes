<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Agenda</title>
        <meta name="keywords" content="HTML5, form, input, frontend,agenda,contatos"/>
        <meta name="description" content="como programar um form em HTML5"/>
        <meta name="author" content="Ary de Araújo Rodrigues Júnior"/>
        <meta name="robots" content="index,follow"/>
    </head>
    <body>
        <div align="center"><h1><b>Agenda2.0<b></h1></div>
        <hr><a href="agenda.php">Voltar para a Agenda</a>
        
        <a href="cadcli.php">Cadastrar novo cliente</a> |
        <?php
            session_start();
            include ("conecta.php");
            $user=$_SESSION["user"];
            $logado = mysqli_query($conn, "SELECT usuario.*, funcionario.cpf, funcionario.nome FROM usuario, funcionario WHERE login = '$user' AND usuario.cpf = funcionario.cpf") or die("Erro ao selecionar!");
            $dado = mysqli_fetch_assoc($logado);
            echo $dado['nome'];
            echo "&nbsp;|&nbsp;";
            echo "<a href='sair.php' style = 'text-decoration:none; font-weight:bold;'>  Sair </a>";
        ?>
        <hr>
        <br>
        <section>
            <?php
                include("busca.php");
            ?>
        </section>
        <footer>
            <hr>
            <h4 align="center">TDS02-SENAI-CTM</h4>
            <h5 align="center">Maringá-2019</h5>
        </footer>
    </body>
</html>