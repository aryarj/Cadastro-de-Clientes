<!DOCTYPE html>
<html lan="pt-br">
    <head>
        <meta charset="utf-8"/>
        <meta name="author" content="Ary de Araújo Rodrigues Júnior"/>
    </head>
    <body>
        <section>
        <form method="post" autocomplete="on" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <fieldset>
                <legend><b>Busca</b></legend>
                <table>
                    <tr>
                        <td>
                            <label>Nome</label>
                            <input type="text" name="nome" placeholder="Digite um nome"/>
                        </td>
                        <td>
                            <label>Pessoa</label>
                            <select name="tipo">
                                <option value="">Faça sua opção</option>
                                <option value="fisica">Física</option>
                                <option value="juridica">Jurídica</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type "submit">Buscar</button>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <div align="center">
            <?php
                include("conecta.php");
                $letra=mysqli_query($conn,"SELECT distinct left(nome,1) as letra from cliente order by letra");
                while ($letras = mysqli_fetch_array($letra)){
                    $teste=strtoupper($letras['letra']);
                    echo '<button type = "submit" value="'.$teste.'" name="letra">'.$teste.'</button>|';
                  
                }
            ?>
        </div>
        </form>
       
        <br>
        <?php
            
            if(!isset($_POST['nome']) && !isset($_POST['tipo']) && !isset($_POST['letra'])){
                echo "Faça sua pesquisa!";
            }else{
                if(isset($_POST['letra'])){
                    $busca3=trim($_POST['letra']);
                }else{
                    $busca3="";
                }
                $busca=trim($_POST['nome']);
                $busca2=trim($_POST['tipo']);
                $cases=array($busca,$busca2,$busca3);
                switch($cases){
                    case ($cases[0]!="" && $cases[1]=="" && $cases[2]==""):
                    echo "Palavra da busca:   ";
                    echo $_POST['nome'];
                    $sql = mysqli_query($conn,"SELECT * from cliente where nome like '".$busca."%' order by nome") or die(mysqli_error($conn));
                    break;
                    case ($cases[0]=="" && $cases[1]!="" && $cases[2]==""):
                    echo "Palavra da busca:   ";
                    echo $_POST['tipo'];
                    $sql = mysqli_query($conn,"SELECT * from cliente where tipo like '".$busca2."' order by nome") or die(mysqli_error($conn));
                    break;
                    case ($cases[0]!="" && $cases[1]!="" && $cases[2]==""):
                    echo "Palavras da busca:   ";
                    echo $_POST['nome'];
                    echo "   ";
                    echo $_POST['tipo'];
                    $sql = mysqli_query($conn,"SELECT * from cliente where nome like '".$busca."%' and tipo='".$busca2."' order by nome") or die(mysqli_error($conn));
                    break;
                    case ($cases[0]=="" && $cases[1]=="" && $cases[2]!=""):
                    echo "Letra da busca:   ";
                    echo $_POST['letra'];
                    $sql = mysqli_query($conn,"SELECT * from cliente where nome like '".$busca3."%' order by nome") or die(mysqli_error($conn));
                    break;
                    case ($cases[0]=="" && $cases[1]=="" && $cases[2]==""):
                    echo "Selecione a tabela inteira . . .";
                    $sql = mysqli_query($conn,"SELECT * from cliente where nome like '".$busca."%' or tipo='".$busca2."' order by nome") or die(mysqli_error($conn));
                    break;
                }
                /*$sql = mysqli_query($conn,"SELECT * from cliente where nome like '".$busca."%' or tipo='".$busca2."' order by nome") or die(mysqli_error($conn));*/
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>Pessoa</th>";
                echo "<th>Nome</th>";
                echo "<th>Cidade</th>";
                echo "<th>Telefone</th>";
                echo "<th>Contato</th>";
                echo "<th>Visualizar</th>";
                echo "</tr>";
                while ($cliente=mysqli_fetch_array($sql)){
                    $id=$cliente['id'];
                    echo "<tr>";
                    echo "<td>".$cliente['tipo']."</td>";
                    echo "<td>".$cliente['nome']."</td>";
                    echo "<td>".$cliente['cidade']."</td>";
                    echo "<td>".$cliente['telefone1']."</td>";
                    echo "<td>".$cliente['contato']."</td>";
                    echo '<td><a href="visucli.php? id='.$id.'"><button type="submit">Visualizar</button></a></td>';
                    echo "</tr>";

                }
                echo "</table>";
            }
        ?>
        </section>
    </body>
</html>