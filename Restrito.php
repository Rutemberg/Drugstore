<?php session_start(); ?>
<?php
if ($_SESSION['FuncionarioLogado'] == null) {
    header('Location:index.php');
}
if (isset($_SESSION['FuncionarioLogado']) && ($_SESSION['PerfilFuncionarioLogado'] == 5)) {
    header('Location:MotoboyEntrega.php');
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!--        <link rel="stylesheet" type="text/css" href="Visao/Estilo/estilo.css">-->
        <link rel="stylesheet" type="text/css" href="Estilos/RestrictStyle.css">
        <script src="js/jquery-2.2.2.min.js"></script>
        <script src="js/velocity.min.js"></script>
        <script src="js/velocity.ui.js"></script>
        <script src="js/craftpip-jquery-confirm-4a6f866/js/jquery-confirm.js"></script>
        <link rel="stylesheet" href="js/craftpip-jquery-confirm-4a6f866/css/jquery-confirm.css">
        <link href="js/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
        <link href="js/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/owl-carousel/owl.theme.css" rel="stylesheet">

        <script type="text/javascript">
            $(document).ready(function () {

                $('#Vendas').delay(1000).velocity('transition.fadeIn', 300);

            });
        </script> 
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mensagemestoqueprod").click(function () {
                    $('#mensagemestoqueprod').velocity('transition.slideRightOut', 300);
                    $('#mensagemestoque').delay(300).velocity('transition.slideUpIn', 300);

                });
                $("#fecharestoque").click(function () {
                    $('#mensagemestoque').velocity('transition.slideDownOut', 300);
                    $('#mensagemestoqueprod').delay(300).velocity('transition.slideLeftIn', 300);
                });
            });
        </script> 


        <script type="text/javascript">
            $(document).ready(function () {
                $("#mensagemcompra").click(function () {
                    $('#mensagemcompra').velocity('transition.slideRightOut', 300);
                    $('#listacompra2').delay(300).velocity('transition.slideRightIn', 300);

                });
                $("#fecharcompra").click(function () {
                    $('#listacompra2').velocity('transition.slideRightOut', 300);
                    $('#mensagemcompra').delay(300).velocity('transition.slideRightIn', 300);
                });
            });
        </script> 
        <script type="text/javascript">
            $(document).ready(function () {
                $('#mensagemestoqueprod').delay(5000).velocity('transition.slideLeftIn', 300);
            });
        </script> 
        <script type="text/javascript">
            $(document).ready(function () {
                $('#mensagemcompra').delay(1000).velocity('transition.slideRightIn', 300);
            });
        </script> 


        <!--        <script type="text/javascript">
                    $(document).ready(function () {
                        $(".alterar").click(function () {
                          $("body").addClass('esmaecimento');
        
                        });
                    });
                </script> -->
        <script type="text/javascript">
            var tempo = window.setInterval(carrega, 5000);
            function carrega()
            {
                $('#carregarhistorico').load('HistoricoFuncionarioCliente.php');
                $('#carregarhistorico2').load('HistoricoFuncionarioProduto.php');
            }

        </script>
        <script type="text/javascript">
            var tempo = window.setInterval(carrega, 5000);
            function carrega()
            {
                $('#carregarhistoricodevendas').load('HistoricoClientesVendas.php');
                $('#carregarhistoricodevendasnaorealizadas').load('HistoricoClientesVendasNaorealizadas.php');
                $('#carregargerenciarvendas').load('Gerenciarvendas.php');
            }

        </script>

        <script type="text/javascript">
            var tempo = window.setInterval(carrega, 5000);
            function carrega()
            {
                $('#Newmembers').load('MenuNovosUsuarios.php');
            }

        </script>
        <script type="text/javascript">
            var tempo = window.setInterval(carrega, 5000);
            function carrega()
            {
                $('#mensagemestoquecarrega').load('MensagemEstoque.php');
            }

        </script>
        <script type="text/javascript">
            var tempo = window.setInterval(carrega, 5000);
            function carrega()
            {
                $('#mensagemestoquecarregamin').load('MensagemEstoqueMin.php');
                $('#mensagemcompramin').load('MensagemCompra.php');
                $('#listacompra').load('Listacomprasrealizadas.php');
            }

        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#botaoverhistoricocliente").click(function () {
                    $('#Historicodefuncionarios').velocity('transition.slideRightOut', 300);
                });
            });
        </script> 

    </head>
    <body style="overflow: hidden;">
        <!--        TOPO-->
        <div id="configtopo">
            <div id="menutopo">
                <div id="logo"><a href="Restrito.php"><img src="Img/LOGO4.png"></a></div>
                <ul id="menufuncionario">
                    <li>
                        <a href ="Controle/Logout.php" style="color: white">Sair</a>
                    </li>
                    <li style="margin: 0;margin-right: 40px;color: white">
                        <?php
                        $nomefuncionario = $_SESSION['NomeFuncionarioLogado'];
                        echo $nomefuncionario;
                        ?>
                    </li>
                    <li style="margin-right: 10px;width: 30px;border-radius: 50%;overflow: hidden;text-align: center;height: 30px;margin-top: 7.5px;background: white">
                        <?php
                        $id = $_SESSION['idFuncionarioLogado'];
                        require_once 'Controle/DAO/Conexao2.php';
                        $query = mysql_query("SELECT foto FROM funcionario WHERE idFuncionario = " . $id);
                        while ($resultado = mysql_fetch_assoc($query)) {
                            $imagem = $resultado['foto'];
                        }
                        ?>
                        <?php echo '<img src="Img/ImagensBanco/ImagensFuncionarios/' . $imagem . '" style="width: auto;height: 100%;"/>' ?>
                    </li>


                </ul>

                <!--                <div id="bemvindo">Seja bem Vindo</div>-->

            </div>
        </div>
        <!--            MENU-->
        <div id="menu">

            <ul>

                <li style="height: 150px;line-height: none;text-align: center;margin-bottom: 50px;">
                    <div style="text-align: center;width: 70%;height: 90%;border-radius: 50%;overflow: hidden;margin: 0 auto;background: white">
                        <?php
                        $id = $_SESSION['idFuncionarioLogado'];
                        require_once 'Controle/DAO/Conexao2.php';
                        $query = mysql_query("SELECT foto FROM funcionario WHERE idFuncionario = " . $id);
                        while ($resultado = mysql_fetch_assoc($query)) {
                            $imagem = $resultado['foto'];
                        }
                        ?>
                        <?php echo '<img src="Img/ImagensBanco/ImagensFuncionarios/' . $imagem . '" style="width: auto;height: 100%;margin: 0px;"/>';
                        ?></div>

                    <p style="margin: 0;padding: 0;width: 100%;font-size: 14px;color: #333333;margin-top: 10px"><?php
                        echo $nomefuncionario;
                        ?></p>

                    <p style="margin: 0;padding: 0;width: 100%;font-size: 12px;color: #cccccc;"><?php
                        echo $emailfuncionario = $_SESSION['EmailFuncionarioLogado'];
                        ?>
                    </p>
                </li>


                <?php
                if (isset($_SESSION['FuncionarioLogado']) && ($_SESSION['PerfilFuncionarioLogado'] <= 3)) {
                    $idFuncionario = $_SESSION['idFuncionarioLogado'];
                    ?>
                    <li>
                        <img style="width: 10%;height: auto;margin: 0;margin-left: 5%;margin-right: 3%;float: left;margin-top: 3px" src="Img/myinformation.png">
                        <a href="Restrito.php?PAGINA=AtualizarminhasInformacoes&&idFuncionario=<?php echo $idFuncionario; ?>">Minhas Informaçoes</a>
                    </li>
                <?php } ?>
                <?php if (isset($_SESSION['FuncionarioLogado']) && ($_SESSION['PerfilFuncionarioLogado'] < 3)) { ?>
                    <li>
                        <img style="width: 10%;height: auto;margin: 0;margin-left: 5%;margin-right: 3%;;float: left;margin-top: 3px" src="Img/AbrirMenu.png">

                        <a href="Restrito.php?PAGINA=historicodefuncionarios">Historico de funcionarios</a>
                    </li>
                <?php } ?> 
                <?php if (isset($_SESSION['FuncionarioLogado']) && ($_SESSION['PerfilFuncionarioLogado'] < 3)) { ?>
                    <li>
                        <img style="width: 10%;height: auto;margin: 0;margin-left: 5%;margin-right: 3%;;float: left;margin-top: 3px" src="Img/AbrirMenu.png">

                        <a href="Restrito.php?PAGINA=historicodevendas">Historico de Vendas</a>
                    </li>
                <?php } ?> 

                <?php if (isset($_SESSION['FuncionarioLogado']) && ($_SESSION['PerfilFuncionarioLogado'] <= 3)) { ?>
                    <li>
                        <img style="width: 10%;height: auto;margin: 0;margin-left: 5%;margin-right: 3%;;float: left;margin-top: 3px" src="Img/Compras.png">

                        <a href="Restrito.php?PAGINA=gerenciarvendas">Gerenciar Vendas</a>
                    </li>
                <?php } ?>  

                <?php if (isset($_SESSION['FuncionarioLogado']) && ($_SESSION['PerfilFuncionarioLogado'] < 3)) { ?>
                    <li>
                        <img style="width: 10%;height: auto;margin: 0;margin-left: 5%;margin-right: 3%;;float: left;margin-top: 3px" src="Img/employer_icon.png">

                        <a href="Restrito.php?PAGINA=listarFuncionario">Gerenciar Funcionario</a>
                    </li>
                <?php } ?>  

                <?php if (isset($_SESSION['FuncionarioLogado']) && ($_SESSION['PerfilFuncionarioLogado'] <= 3)) { ?>                        
                    <li>
                        <img style="width: 10%;height: auto;margin: 0;margin-left: 5%;margin-right: 3%;;float: left;margin-top: 3px" src="Img/user.png">

                        <a href="Restrito.php?PAGINA=listarCliente">Gerenciar Cliente</a>
                    </li>
                <?php } ?>  


                <?php if (isset($_SESSION['FuncionarioLogado']) && ($_SESSION['PerfilFuncionarioLogado'] <= 3)) { ?>                        
                    <li>
                        <img style="width: 10%;height: auto;margin: 0;margin-left: 5%;margin-right: 3%;;float: left;margin-top: 3px" src="Img/Produtoicon.png">

                        <a href="Restrito.php?PAGINA=listarProduto">Gerenciar Produtos</a>
                    </li>
                <?php } ?> 

            </ul>

        </div>        


        <!--        CORPO-->
        <div id="corpo">
            <!--            RESULTADOS-->
            <div id="resultados">               
                <?php
//                $_GET["PAGINA"] = "listarFuncionario";
                if (isset($_GET['MSG'])) {
                    $mensagem = $_GET['MSG'] . "<br />";
                    echo $mensagem;
                }
                if (isset($_GET["PAGINA"])) {
                    $pagina = $_GET["PAGINA"];
                    switch ($pagina) {
                        case "cadastrarFuncionario":
                            require_once 'formFuncionario.php';
                            break;
                        case "listarFuncionario":
                            $_GET['ACAO'] = 'listar';
                            require_once ("Controle/controladorFuncionario.php");
                            break;
                        case "listarFuncionarioDesativo":
                            $_GET['ACAO'] = 'listar';
                            require_once ("FuncionariosDesativos.php");
                            break;
                        case "DesativarFuncionario":
                            $_GET['ACAO'] = 'desativar';
                            require_once ("Controle/controladorFuncionario.php");
                            break;
                        case "ExcluirFuncionario":
                            $_GET['ACAO'] = 'excluir';
                            require_once ("Controle/controladorFuncionario.php");
                            break;
                        case "AtivarFuncionario":
                            $_GET['ACAO'] = 'ativar';
                            require_once ("Controle/controladorFuncionario.php");
                            break;
                        case "alterarFuncionario":
                            require_once ("Editarfuncionario.php");
                            break;

                        case "AtualizarminhasInformacoes":
                            require_once ("AtualizarInformacoesFuncionario.php");
                            break;

                        case "cadastrarCliente":
                            require_once ("formCliente.php");
                            break;
                        case "listarCliente":
                            $_GET['ACAO'] = 'listar';
                            require_once ("Controle/controladorCliente.php");
                            break;
                        case "listarClienteDesativos":
                            $_GET['ACAO'] = 'listar';
                            require_once ("ClientesDesativos.php");
                            break;
                        case "desativarCliente":
                            $_GET['ACAO'] = 'desativar';
                            require_once ("Controle/controladorCliente.php");
                            break;
                        case "ExcluirCliente":
                            $_GET['ACAO'] = 'excluir';
                            require_once ("Controle/controladorCliente.php");
                            break;
                        case "alterarCliente":
                            require_once ("EditarCliente.php");
                            break;
                        case "AtivarCliente":
                            $_GET['ACAO'] = 'ativar';
                            require_once ("Controle/controladorCliente.php");
                            break;

                        case "cadastrarProduto":
                            require_once ("FormProduto.php");
                            break;
                        case "listarProduto":
                            $_GET['ACAO'] = 'listar';
                            require_once ("Controle/controladorProduto.php");
                            break;
                        case "removerProduto":
                            $_GET['ACAO'] = 'remover';
                            require_once ("Controle/controladorProduto.php");
                            break;
                        case "AdicionarnovamenteProduto":
                            $_GET['ACAO'] = 'adicionar';
                            require_once ("Controle/controladorProduto.php");
                            break;
                        case "ExcluirProduto":
                            $_GET['ACAO'] = 'excluir';
                            require_once ("Controle/controladorProduto.php");
                            break;
                        case "alterarProduto":
                            require_once ("EditarProduto.php");
                            break;
                        case "lixeira":
                            $_GET['ACAO'] = 'listar';
                            require_once ("LixeiradeProdutos.php");
                            break;
                        case "historicodefuncionarios":
                            echo '<div id="owl-demo" class="owl-carousel owl-theme">';
                            echo '<div id="carregarhistorico" class="item">';
                            require_once ("HistoricoFuncionarioCliente.php");
                            echo '</div>';
                            echo '<div id="carregarhistorico2" class="item">';
                            require_once ("HistoricoFuncionarioProduto.php");
                            echo '</div>';
                            echo '</div>';
                            break;
                        case "historicodevendas":
                            echo '<div id="owl-demo" class="owl-carousel owl-theme">';
                            echo '<div id="carregarhistoricodevendas" class="item">';
                            require_once ("HistoricoClientesVendas.php");
                            echo '</div>';
                            echo '<div id="carregarhistoricodevendasnaorealizadas" class="item">';
                            require_once ("HistoricoClientesVendasNaorealizadas.php");
                            echo '</div>';
                            echo '</div>';
                            break;
                        case "Analisarcompraeenviar":
                            require_once ("Receberdadosvenda.php");
                            break;
                        case "gerenciarvendas":
                            echo '<div id="carregargerenciarvendas">';
                            require_once ("Gerenciarvendas.php");
                            echo '</div>';
                            break;
                        case "Controladorvendas":
                            require_once ("Controladorvendas.php");
                            break;
                        default:
                    }
                } else {

                    require_once ("backlogo.php");
                }
                ?>
            </div>
<!--            <img src="Img/Proximo.png" id="botaoverhistoricocliente">-->


        </div>

        <!--            PAINEL NOVOS MENBROS-->
        <div id="Newmembers">
            <!--                NOVOS CLIENTES-->
            <?php require_once 'MenuNovosUsuarios.php'; ?>
        </div>



        <div id="mensagemestoque" style="max-height: 100px;overflow: auto;display: none;z-index: 20;">
            <div id="mensagemestoquecarrega">
                <?php
                require_once 'MensagemEstoque.php';
                ?>
            </div>
            <input id="fecharestoque" type="button" value="X" style="position: absolute;right: 0;top: 0;margin: 10px 10px;z-index: 20;color: #333;padding: 5px 10px;background: white;border: none">

        </div>



        <div id="mensagemestoqueprod" style="display: none;position: absolute;bottom: 5px;left: 0;z-index: 15">
            <div id="mensagemestoquecarregamin"> 
                <?php
                require_once 'MensagemEstoqueMin.php';
                ?> 
            </div>
        </div>


        <div id="listacompra2" style="display: none;position: absolute;top: 45px;right: 0;z-index: 15;background: white;height: calc(100% - 45px);right: -15px;max-width: 232px;overflow: auto">
            <div id="listacompra"> 
                <?php
                require_once 'Listacomprasrealizadas.php';
                ?> 
            </div>
            <input id="fecharcompra" type="button" value="X" style="position: absolute;right: 15px;top: 0;margin: 10px 10px;z-index: 20;color: #333;padding: 5px 10px;background: white;border: none">
        </div>


        <div id="mensagemcompra" style="display: none;position: absolute;bottom: 5px;right: 0;z-index: 15;background: white;">
            <div id="mensagemcompramin"> 
                <?php
                require_once 'MensagemCompra.php';
                ?> 
            </div>
        </div>

        <script src="js/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/owl-carousel/owl.carousel.js"></script> 
        <script>
            $(document).ready(function () {

                $("#owl-demo").owlCarousel({
                    navigation: false, // Show next and prev buttons
                    pagination: false,
                    slideSpeed: 300,
                    paginationSpeed: 400,
                    items: 1,
                    itemsDesktop: false,
                    itemsDesktopSmall: false,
                    itemsTablet: false,
                    itemsMobile: false

                });

            });
        </script>
    </body>
</html>
