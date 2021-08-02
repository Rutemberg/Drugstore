<?php
session_start();
if ($_SESSION['ClienteLogado'] == null) {
    header('Location:index.php');
}

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

//adiciona produto

if (isset($_GET['acao'])) {

//ADICIONAR CARRINHO
    if ($_GET['acao'] == 'add') {
        $id = intval($_GET['id']);
        if (!isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] = 1;
        } else {
            $_SESSION['carrinho'][$id] += 1;
        }
    }

//REMOVER CARRINHO
    if ($_GET['acao'] == 'del') {
        $id = intval($_GET['id']);
        if (isset($_SESSION['carrinho'][$id])) {
            unset($_SESSION['carrinho'][$id]);
        }
    }

//ALTERAR QUANTIDADE
    if ($_GET['acao'] == 'up') {
        if (isset($_POST['prod'])) {
            if (is_array($_POST['prod'])) {
                foreach ($_POST['prod'] as $id => $qtd) {
                    $id = intval($id);
                    $qtd = intval($qtd);
                    if (!empty($qtd) || $qtd <> 0) {
                        $_SESSION['carrinho'][$id] = $qtd;
                    } else {
                        unset($_SESSION['carrinho'][$id]);
                    }
                }
            }
        }
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8"></meta>
        <title></title>
        <link rel="stylesheet" type="text/css" href="Estilos/Hom3Style.css">
        <script src="js/jquery-2.2.2.min.js"></script>
        <script src="js/jquery-ui-1.11.4/jquery-ui.js"></script>
        <script src="js/velocity.min.js"></script>
        <script src="js/velocity.ui.js"></script>


        <script type="text/javascript">
            $(document).ready(function () {
                $("#clickserach").click(function () {
                    $('#serachprod').velocity({width: "400"}, {duration: 500});
                    $('#serachprod').velocity({backgroundColor: "#4d4d4d"}, {duration: 500});
                    $('.Procurando_produtos').velocity({height: "450"}, {duration: 500});
                    $('#backsearchprodutos').velocity('transition.fadeIn', 300);
                });
                $("#backsearchprodutos").click(function () {
                    $('#serachprod').velocity({width: "45"}, {duration: 500});
                    $('#serachprod').velocity({backgroundColor: "#333"}, {duration: 500});
                    $('.Procurando_produtos').velocity({height: "0"}, {duration: 500});
                    $('#backsearchprodutos').velocity('transition.fadeOut', 300);
                });
            });
        </script>
        <script src="scriptparaprodutos.js"></script>
        <script>
            function pesquisaproduto(valor)
            {
                //FUNÇÃO QUE MONTA A URL E CHAMA A FUNÇÃO AJAX
                url = "Busca_ClienteProduto.php?valor=" + valor;
                ajax(url);
            }
        </script>
        <script type="text/javascript">
            function EnviarFormulario(Valor)
            {
                if (Valor != "" && Valor != null)
                {
                    FormularioVerficiar.submit();
                }
            }
        </script>
        <script type="text/javascript">
            function EnviarFormulariotroco(Valor)
            {
                if (Valor != "" && Valor != null)
                {
                    formtroco.submit();
                }
            }
        </script>

    </head>

    <body style="background: #f6f6f6">
        <!--        Menu top Usuario-->
        <div id="menutopfix_usuario">
            <div id="menu_usuario">
                <div id="logo">
                    <a href="HomeUser.php"><img src="Img/LOGO4.png"></a>          
                </div>

                <div  id="Clientelogado">
                    <ul>
                        <?php $nomeClienteLogado = $_SESSION['NomeClienteLogado']; ?>
                        <li><?php echo '<a href = "Controle/Logout.php">Sair</a>'; ?></li>
                        <li id="clickserach" style="margin-right: 20px;position: relative;z-index: 13;"><input id="serachprod" onKeyPress="pesquisaproduto(this.value);" type="text" style="padding: 0;padding-left: 45px;color: white;height: 45px;width: 45px;margin: 0;background-image: url('Img/iconsearchcliente.png');background-position: left center;background-size: auto 25px;background-repeat: no-repeat;border: none"/></li>
                        <a href="ProdutosCarrinho.php"><li style="margin-right: 25px;"><img src="Img/cesta.png" style="height: 20px;width: auto;margin-top: 12.5px"></li></a>
                        <a href="MinhasInformacoes.php"><li style="margin-right: 40px;padding: 0 10px;"><?php echo $nomeClienteLogado; ?></li></a>
                        <li style="margin-right: 10px;width: 30px;border-radius: 50%;overflow: hidden;text-align: center;height: 30px;margin-top: 7.5px;background: white">
                            <?php
                            $id = $_SESSION['idClienteLogado'];
                            require_once 'Controle/DAO/Conexao2.php';
                            $query = mysql_query("SELECT foto FROM cliente WHERE idCliente = " . $id);
                            while ($resultado = mysql_fetch_assoc($query)) {
                                $imagem = $resultado['foto'];
                            }
                            ?>
                            <?php echo '<img src="Img/ImagensBanco/ImagensClientes/' . $imagem . '" style="width: auto;height: 100%;"/>' ?>
                        </li>
                    </ul> 
                </div>
            </div>
        </div>

        <div class="Procurando_produtos" id="Procurando_produtos">
            <?php if (!empty($_GET["valor"]) == null) { ?>
                <div style="width: 550px;height: 130px;margin: 0 auto;margin-top: 50px;font-size: 25px;color: #ccc">Procure por produtos pelo nome ou categoria!</div>   
            <?php } ?>
        </div>
        <div id="backsearchprodutos" style="   
             position: absolute;
             width: 100%;
             height: 100%;
             z-index: 8;
             top: 45px;
             margin: 0;
             padding: 0;
             left: 0;
             background-color: rgba(0, 0, 0, 0.1);
             display: none;">
        </div>

        <!--        Menu-->

        <div id="menu">
            <ul>
                <li><a href="CategoriaProduto.php?Categoria=Medicamento">Medicamentos</a>
                    <ul></ul>
                </li>
                <li><a href="CategoriaProduto.php?Categoria=Higiene">Higiene</a>
                    <ul></ul>
                </li>
                <li><a href="CategoriaProduto.php?Categoria=Estética">Estética</a>
                    <ul></ul>
                </li>
                <li><a href="CategoriaProduto.php?Categoria=Perfumaria">Perfumaria</a>
                    <ul></ul>
                </li>
                <li><a href="CategoriaProduto.php?Categoria=Maquiagem">Maquiagem</a>
                    <ul></ul>
                </li>
                <li><a href="CategoriaProduto.php?Categoria=Generico">Genéricos</a>
                    <ul></ul>
                </li>
                <li><a href="CategoriaProduto.php?Categoria=Acessorio">Acessórios</a>
                    <ul></ul>
                </li>
                <li><a href="CategoriaProduto.php?Categoria=Nutrição">Nutrição</a>
                    <ul></ul>
                </li>
                <li><a href="CategoriaProduto.php?Categoria=Dermo">Dermo</a>
                    <ul></ul>
                </li>
            </ul>
        </div>

        <table id="cesta" style="box-shadow: 0 0 10px rgba(0,0,0, .2);margin-top: 100px;border-radius: 3px">
            <tr style="text-align: center;font-weight: bolder;height: 40px;color: #4d4d4d">
                <td style="width: 350px" >Produto</td>
                <td style="width: 150px" >Quantidade</td>
                <td style="width: 200px">Preço</td>
                <td style="width: 200px">SubTotal</td>
                <td style="width: 50px"></td>
            </tr>
            <form action="?acao=up" method="post" id="FormularioVerficiar">
                <tfoot>
                    <tr>
                        <td colspan="5"><input type="submit" value="Atualizar Carrinho" style="display: none;"/></td>
                    <tr>
                        <td colspan="5" style="height: 50px;font-size: 18px;background: #f6f6f6;"><a style="color: #4d4d4d;font-weight: bolder" href="HomeUser.php">Continuar Comprando</a></td>
                </tfoot>

                <?php
                if (count($_SESSION['carrinho']) == 0) {
                    echo '<tr style="text-align: center;height: 80px;font-size: 18px;line-height: 50px;font-weight: bolder;color: #ccc"><td colspan="5">Não há produto no carrinho</td></tr>';
                } else {
                    require_once 'Controle/DAO/Conexao2.php';
                    $total = 0;
                    foreach ($_SESSION['carrinho'] as $id => $qtd) {
                        $sql = "SELECT *  FROM produto WHERE codProduto= '$id'";
                        $qr = mysql_query($sql) or die(mysql_error());
                        $ln = mysql_fetch_assoc($qr);
                        $nome = $ln['nome'];
                        $preco = number_format($ln['valor'], 2, ',', '.');
                        if ($qtd >= $ln['quantidade']) {
                            $sub = number_format($ln['valor'] * $ln['quantidade'], 2, ',', '.');
                        } else {
                            $sub = number_format($ln['valor'] * $qtd, 2, ',', '.');
                        }
                        if ($qtd >= $ln['quantidade']) {
                            $total += $ln['valor'] * $ln['quantidade'];
                        } else {
                            $total += $ln['valor'] * $qtd;
                        }
                        ?>

                        <tr style="height: 50px;">       
                            <td><img src="Img/ImagensBanco/<?php echo $ln['imagem'] ?>" style="width: 50px;height: 50px;float: left;margin-left: 25px"><p style="width: 250px;float: left;font-weight: bolder;color: #4d4d4d"><?php echo $nome ?></p></td>
                            <td><input style="text-align: center;padding: 5px;background: #f6f6f6;border: none;" type="text" size="2" name="prod[<?php echo $id ?>]" value="<?php
                                if ($qtd >= $ln['quantidade']) {
                                    $qtd = $ln['quantidade'];
                                    echo $qtd;
                                } else {
                                    echo $qtd;
                                }
                                ?>" onchange="EnviarFormulario(this.value)" /></td>
                            <td>R$ <?php echo $preco ?></td>
                            <td>R$ <?php echo $sub ?> </td>
                            <td><a href="?acao=del&id=<?php echo $id ?>"><img src="Img/close.png" style="width: 25px;height: auto"></a></td>
                        </tr>
                        <?php
                    }
                    $total = number_format($total, 2, ',', '.');
                    ?>
                    <tr style="height: 50px;font-size: 18px;font-weight: bolder">
                        <td colspan="3">Total</td>
                        <td>R$ <?php echo $total ?></td>
                    </tr>

                <?php }
                ?>

            </form>
            <?php
            if (isset($total)) {
                $total = str_replace(',', '.', str_replace('.', '', $total));
                if (isset($_SESSION['troco']) && ($_SESSION['troco']) < $total) {
                    $_SESSION['troco'] = $total;
                }
                if (!isset($_SESSION['troco'])) {
                    $_SESSION['troco'] = $total;
                }
            }
            ?>
            <?php if (count($_SESSION['carrinho']) != 0) { ?>
                <form action="" method="post" id="formtroco">
                    <tr style="height: 50px;font-size: 18px;">
                        <td colspan="3" style="font-weight: bolder;color: #aaa">Troco para:</td>
                        <td><input style="text-align: center;width: 100%;height: 100%;border: 1px solid #d9d9d9;font-size: 18px;font-weight: bolder;background: #f6f6f6" type="text" size="2" name="troco" value="<?php
                            if ((isset($_POST['troco']))) {
                                if (($_POST['troco']) < $total) {
                                    echo $_SESSION['troco'] = $total;
                                }
                                if (($_POST['troco']) > $total) {
                                    $_POST['troco'] = number_format($_POST['troco'], 2, ',', '.');
                                    $_POST['troco'] = str_replace(',', '.', str_replace('.', '', $_POST['troco']));
                                    $_SESSION['troco'] = $_POST['troco'];
                                    echo $_SESSION['troco'];
                                }
                            } else {
                                echo $_SESSION['troco'];
                            }
                            ?>" onchange="EnviarFormulariotroco(this.value);" /></td>
                    </tr>
                </form>
            <?php } ?>
        </table>

        <?php if (count($_SESSION['carrinho']) != 0 && isset($_SESSION['troco'])) { ?><div style="width: 970px;margin: 0 auto;height: 50px;line-height: 50px;font-size: 17px;margin-top: 30px;margin-bottom: 30px"><a href="?FINALIZARVENDA=1"><div style="width: 250px;height: 100%;float: right;background: #ce3f3f;color: white;border-radius: 3px;box-shadow: 0 0 10px rgba(0,0,0, .2);">Finalizar compra</div></a></div><?php } ?>
        <?php
        if (isset($_GET['FINALIZARVENDA'])) {
            $idcliente = $_SESSION['idClienteLogado'];
            $codVenda = uniqid();
            foreach ($_SESSION['carrinho'] as $id => $qtd) {
                $sql = "SELECT *  FROM produto WHERE codProduto= '$id'";
                $qr = mysql_query($sql) or die(mysql_error());
                $ln = mysql_fetch_assoc($qr);
                if ($qtd >= $ln['quantidade']) {
                    $qtd = $ln['quantidade'];
                }
                $codProduto = $ln["codProduto"];
                $nome = $ln["nome"];
                $preco = number_format($ln['valor'], 2, ',', '.');
                $preco = str_replace(',', '.', str_replace('.', '', $preco));
                $sub = number_format($ln['valor'] * $qtd, 2, ',', '.');
                $sub = str_replace(',', '.', str_replace('.', '', $sub));
                $sql1 = "INSERT INTO venda(codVenda,codProduto, quantidade, valor, subtotal,nome)"
                        . "VALUES('$codVenda','$codProduto','$qtd','$preco','$sub','$nome')";
                $qr1 = mysql_query($sql1) or die(mysql_error());
                $sql3 = "UPDATE produto SET quantidade = quantidade - '$qtd', quantidadevendida = quantidadevendida + '$qtd' WHERE codProduto = '$codProduto'";
                $qr3 = mysql_query($sql3) or die(mysql_error());
            }
            date_default_timezone_set("America/Sao_Paulo");
            $horacompra = date("h:i:sa");
            $datacompra = date("y/m/d");
            $trocopara = $_SESSION['troco'];

            $sql2 = "INSERT INTO codvenda(codVenda,total,idCliente,datacompra,horacompra,troco)"
                    . "VALUES('$codVenda','$total','$idcliente','$datacompra','$horacompra','$trocopara')";
            $qr2 = mysql_query($sql2) or die(mysql_error());
            if ($qr2) {
                unset($_SESSION['carrinho']);
                unset($_SESSION['troco']);
                $_SESSION['COMPRACOMSUCESSO'] = 1;
                echo "<script>                       
                        window.location.href='HomeUser.php';                        
                </script>";
            }
        }
        ?>           
    </body>
</html>
