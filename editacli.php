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
            $logado = mysqli_query($conn, "SELECT usuario. *, funcionario.cpf, funcionario.nome FROM usuario, funcionario WHERE login = '$user' AND usuario.cpf = funcionario.cpf") or die("Erro ao selecionar!");
            $dado = mysqli_fetch_assoc($logado);
            echo $dado['nome'];
            echo " | ";
            echo "<a href='sair.php' style = 'text-decoration:none; font-weight:bold;'>  Sair </a>";
            $id=$_GET['id'];
            $cliente=mysqli_query($conn, "SELECT * from cliente where id='".$id."'");
            while ($pessoa=$cliente->fetch_array()){
        ?>
        <hr>
        <br>
        <section>
            <form method="POST" action="atualizacli.php?id=<?php echo $id; ?>" target="_self" autocomplete="on">
                <fieldset>
                    <legend>Cadastro de clientes</legend>
                    <label>Pessoa</label>
                    <select name="tipo">
                        <option value="fisica">Física</option>
                        <option value="juridica">Jurídica</option>
                    </select><br><br>
                    <label>Nome</label>
                    <input type="text" name="nome" value="<?php echo $pessoa['nome'];?>" required placeholder="Digite o nome do cliente"><br><br>
                    <label>Endereço</label>
                    <input type="text" name="endereco" value="<?php echo $pessoa['endereco'];?>" required placeholder="Digite o endereço"><br><br>
                    <label>Cidade</label>
                    <input type="text" name="cidade" value="<?php echo $pessoa['cidade'];?>" required placeholder="Digite a cidade"><br><br>
                    <label>Telefone1</label>
                    <input type="text" name="tel" value="<?php echo $pessoa['telefone1'];?>" required placeholder="Digite um telefone ou celular"><br><br>
                    <label>Telefone2</label>
                    <input type="text" name="tel2" value="<?php echo $pessoa['teleone2'];?>" placeholder="Digite um telefone ou celular"><br><br>
                    <label>email</label>
                    <input type="text" name="email" value="<?php echo $pessoa['email'];?>" required placeholder="Digite o email"><br><br>
                    <label>Contato</label>
                    <input type="text" name="contato" value="<?php echo $pessoa['contato'];?>" placeholder="Digite o nome do contato"><br><br>
                    <label>Ramo da empresa</label>
                    <input type="text" name="ramo" value="<?php echo $pessoa['ramo'];?>" placeholder="Digite o ramo do cliente"><br><br>
                    <?php
                            }
                            mysqli_close($conn);
                    ?>
                    <button type="submit">Atualizar</button>
                </fieldset>
            </form>
        </section>
        <footer>
            <hr>
            <h4 align="center">TDS02-SENAI-CTM</h4>
            <h5 align="center">Maringá-2019</h5>
        </footer>
    </body>
</html>