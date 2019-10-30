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
        <a href="cadcli.php">Cadastrar novo cliente</a>
        <?php
            session_start();
            include ("conecta.php");
            $user=$_SESSION["user"];
            $logado = mysqli_query($conn, "SELECT usuario.*, funcionario.cpf, funcionario.nome FROM usuario, funcionario WHERE login = '$user' AND usuario.cpf = funcionario.cpf") or die("Erro ao selecionar!");
            $dado = mysqli_fetch_assoc($logado);
            echo $dado['nome'];
            echo "&nbsp;|&nbsp;";
            echo "<a href='sair.php' style = 'text-decoration:none; font-weight:bold;'>  Sair </a>";
            $id=$_GET['id'];
            $cliente=mysqli_query($conn, "SELECT * from cliente where id='".$id."'");
            while($pessoa=$cliente->fetch_array()){
        
        ?>
        <hr>
        <br>
        <section>
            
                <fieldset>
                    <legend>Dados do cliente</legend>
                    <label>Pessoa: </label><?php echo $pessoa['tipo'];?>
                    <br><br>
                    <label>Nome: </label><?php echo $pessoa['nome'];?>
                    <br><br>
                    <label>Endereço: </label><?php echo $pessoa['endereco'];?>
                    <br><br>
                    <label>Cidade: </label><?php echo $pessoa['cidade'];?>
                    <br><br>
                    <label>Telefone1: </label><?php echo $pessoa['telefone1'];?>
                    <br><br>
                    <label>Telefone2: </label><?php echo $pessoa['telefone2'];?>
                    <br><br>
                    <label>email: </label><?php echo $pessoa['email'];?>
                    <br><br>
                    <label>Contato: </label><?php echo $pessoa['contato'];?>
                    <br><br>
                    <label>Ramo da empresa: </label><?php echo $pessoa['ramo'];
                    }
                    mysqli_close($conn);
                    ?><br><br>
                    <a href="editacli.php?id=<?php echo $id;?>"><button type="submit">Editar</button></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editacli.php"><a href="apagacli.php?id=<?php echo $id;?>"><button type="submit">Apagar</button></a>
                </fieldset>
           
        </section>
        <footer>
            <hr>
            <h4 align="center">TDS02-SENAI-CTM</h4>
            <h5 align="center">Maringá-2019</h5>
        </footer>
    </body>
</html>