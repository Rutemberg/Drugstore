<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="Estilos/Hom3Style.css">
        <link href="js/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
        <link href="js/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/owl-carousel/owl.theme.css" rel="stylesheet">


        <!--        Bibliotecas-->
        <script src="js/jquery-2.2.2.min.js"></script>
        <script src="js/jquery-ui-1.11.4/jquery-ui.js"></script>
        <script src="js/velocity.min.js"></script>
        <script src="js/velocity.ui.js"></script>
        <script type='text/javascript' src='cep.js'></script>


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
        <script type="text/javascript">
            $(document).ready(function () {
                $('#backformentrarmensage').velocity('transition.fadeIn', 300);
                $('#msglogin').delay(200).velocity('transition.shrinkIn', 300);
                $('#backformentrarmensage').click(function () {
                    $('#backformentrarmensage').velocity('transition.fadeOut', 300);
                    $('#msglogin').velocity('transition.shrinkOut', 300);

                });
            });
        </script>

        <!--        LOgin-->
        <script type="text/javascript">
            $(document).ready(function () {
                $("#botaoproximologin").click(function () {
                    $('#loginum').velocity('transition.slideLeftOut', 100);
                    $('#loginum2').delay(100).velocity("transition.slideRightIn", 100);

                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#botaoentrar").click(function () {
                    $('#backformentrar').velocity('transition.fadeIn', 300);
                    $('#formentrar').velocity("transition.expandIn", 100);

                });
                $("#backformentrar").click(function () {
                    $('#backformentrar').velocity('transition.fadeOut', 300);
                    $('#formentrar').velocity("transition.expandOut", 100);

                });
            });
        </script>
        <script type="text/javascript">

            function Validalogin() {
                // email
                if (document.formLogin.emailLogin.value == "") {
                    $('#loginum2').velocity("transition.slideRightOut", 100);
                    $('#loginum').delay(100).velocity("transition.slideLeftIn", 100);
                    $('#emailLogin').velocity({borderColor: "#cc0000"}, 300);
                    $('#emailLogin').delay(600).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
                // senha
                if (document.formLogin.senhaLogin.value == "") {
                    $('#loginum').velocity("transition.slideLeftOut", 100);
                    $('#loginum2').delay(100).velocity("transition.slideRightIn", 100);
                    $('#senhaLogin').velocity({borderColor: "#cc0000"}, 300);
                    $('#senhaLogin').delay(600).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
                return true;
            }
        </script>
        <script src="script.js"></script>
        <script>
            function pesquisa(valor)
            {
                //FUNÇÃO QUE MONTA A URL E CHAMA A FUNÇÃO AJAX
                url = "Busca_imagem_email.php?valor=" + valor;
                ajax(url);
            }
            ;
        </script>
        <script>
            function pesquisaproduto(valor)
            {
                //FUNÇÃO QUE MONTA A URL E CHAMA A FUNÇÃO AJAX
                url = "Busca_ClienteProduto.php?valor=" + valor;
                ajax1(url);
            }
            ;
        </script>
        <script>
            function categoriapesquisa(valor)
            {
                //FUNÇÃO QUE MONTA A URL E CHAMA A FUNÇÃO AJAX
                url = "BuscaCategoriaProduto.php?valor=" + valor;
                ajax2(url);
            }
            ;
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#Entregamin").click(function () {
                    $('#Entregamin').velocity('transition.slideLeftOut', 300);
                    $('#Entrega').delay(300).velocity('transition.slideUpIn', 300);

                });
                $("#fechartregareal").click(function () {
                    $('#Entrega').velocity('transition.slideDownOut', 300);
                    $('#Entregamin').delay(300).velocity('transition.slideLeftIn', 300);
                });
            });
        </script> 
        <script type="text/javascript">
            $(document).ready(function () {
                $('#Entregamin').delay(1000).velocity('transition.slideLeftIn', 300);
            });
        </script> 
        <script type="text/javascript">
            var tempo = window.setInterval(carrega, 5000);
            function carrega()
            {
                $('#Desativo').load('Desativado.php');
                $('#mensagemeentregarealmin').load('Entregaemtemporealmin.php');
                $('#mensagemeentregareal').load('Entregaemtemporeal.php');

            }

        </script>
        <script type="text/javascript">
            var tempo = window.setInterval(carrega, 30000);
            function carrega()
            {
                $('#atualizarcategoriaprodutoemtemporeal').load('CategoriaProdutoEmtemporeal.php');
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
                <?php if (isset($_SESSION['ClienteLogado'])) { ?>
                    <div  id="Clientelogado">
                        <ul>
                            <?php $nomeClienteLogado = $_SESSION['NomeClienteLogado']; ?>
                            <li><?php echo '<a href = "Controle/Logout.php">Sair</a>'; ?></li>
                            <li id="clickserach" style="margin-right: 15px;position: relative;z-index: 13"><input id="serachprod" onKeyPress="pesquisaproduto(this.value)" type="text" style="padding: 0;padding-left: 45px;color: white;height: 45px;width: 45px;margin: 0;background-image: url('Img/iconsearchcliente.png');background-position: left center;background-size: auto 25px;background-repeat: no-repeat;border: none"></li>
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
                <?php } else { ?>
                    <ul>
                        <li id="clickserach" style="width: auto;margin-right: 15px;position: relative;z-index: 13"><input id="serachprod" onKeyPress="pesquisaproduto(this.value)" type="text" style="padding-left: 30px;outline: none;color: white;background: #333;height: 45px;width: 45px;margin: 0;background-image: url('Img/iconsearchcliente.png');background-position: left center;background-size: auto 25px;background-repeat: no-repeat;border: none"></li>

                        <li id="botaoentrar" style="float:right">Entrar
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>

        <div class="Procurando_produtos" id="paginaprod">
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

        <div id="backformentrar">
        </div>
        <div id="corpoentrar" style="width: 100%;position: absolute;top: 45px;">
            <div id="formentrar">
                <div style="width: 100%; height: 150px;margin-top: 10px;">
                    <div id="pagina" style="width: 150px;height: 150px;margin: 0 auto;border-radius: 50%;overflow: hidden">
                        <?php if (!empty($_GET["valor"]) == null) { ?>

                            <img src="Img/LoginIcon.png" style="width:auto; height:100%;margin: 0 auto;">

                        <?php } ?>
                    </div>
                </div>

                <form id="formLogin" name="formLogin" 
                      method="POST" action="Controle/controladorLogin.php" onSubmit="return Validalogin();">
                    <div style="overflow: hidden;height: 150px;">
                        <div id="loginum">
                            <p>Digite seu email ou cpf</p>
                            <label id="Emailicon"></label>
                            <input type="text" id="emailLogin" name="email" onchange="pesquisa(this.value)">
                            <input type="button" id="botaoproximologin" value="Proximo">
                        </div>
                        <div id="loginum2">
                            <p>Digite sua senha</p>
                            <label id="Senhaicon"></label>
                            <input type="password" id="senhaLogin" name="senha">
                            <input id="submit" name="submit"
                                   type="submit"
                                   value="Entrar">  
                        </div>
                    </div>
                </form>   

            </div>
        </div>

        <!--        Menu-->

        <div id="menu">
            <ul>
                <li><a href="?Categoria=Medicamento">Medicamentos</a>
                    <ul></ul>
                </li>
                <li><a href="?Categoria=Higiene">Higiene</a>
                    <ul></ul>
                </li>
                <li><a href="?Categoria=Estética">Estética</a>
                    <ul></ul>
                </li>
                <li><a href="?Categoria=Perfumaria">Perfumaria</a>
                    <ul></ul>
                </li>
                <li><a href="?Categoria=Maquiagem">Maquiagem</a>
                    <ul></ul>
                </li>
                <li><a href="?Categoria=Generico">Genéricos</a>
                    <ul></ul>
                </li>
                <li><a href="?Categoria=Acessorio">Acessórios</a>
                    <ul></ul>
                </li>
                <li><a href="?Categoria=Nutrição">Nutrição</a>
                    <ul></ul>
                </li>
                <li><a href="?Categoria=Dermo">Dermo</a>
                    <ul></ul>
                </li>
            </ul>
        </div>
        <div style="background: white;width: 90%;margin: 0 auto;margin-top: 30px;margin-bottom: 30px;padding-bottom: 15px;padding-top: 70px;position: relative;font-weight: bolder;box-shadow: 0 0 10px rgba(0,0,0, .2)">

            <div id="atualizarcategoriaprodutoemtemporeal">
                <?php include 'CategoriaProdutoEmtemporeal.php'; ?>
            </div> 


        </div> 


        <div id="Entregamin" style="display: none;position: fixed;bottom: 5px;left: 0;z-index: 15">
            <div id="mensagemeentregarealmin"> 
                <?php
                require_once 'Entregaemtemporealmin.php';
                ?> 
            </div>
        </div>
        <div id="Entrega" style="max-height: 105px;background: white;overflow: hidden;display: none;z-index: 20;position: fixed;bottom: 0;z-index: 15;width: 100%;box-shadow: 0 0 10px rgba(0,0,0, .2)">
            <div id="mensagemeentregareal">
                <?php
                require_once 'Entregaemtemporeal.php';
                ?>
            </div>
            <input id="fechartregareal" type="button" value="X" style="position: absolute;right: 0;top: 0;margin: 10px 10px;z-index: 20;color: #333;padding: 5px 10px;background: white;border: none">

        </div>
        <?php if (isset($_SESSION['ClienteLogado']) != null) { ?> 
            <div id="Desativo">
                <?php
                include 'Desativado.php';
                ;
                ?>
            </div>
        <?php } ?> 
    </body>
</html>
