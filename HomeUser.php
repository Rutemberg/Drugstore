<?php
session_start();
?>
<?php
if ($_SESSION['ClienteLogado'] == null) {
    header('Location:index.php');
}
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
        <!--        Imagem preview-->
        <script type="text/javascript">
            $(document).ready(function () {
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#blah').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#foto").change(function () {
                    readURL(this);
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
            var tempo = window.setInterval(carrega, 5000);
            function carrega()
            {
                $('#novosprodutos').load('NovosProdutos.php');
                $('#Desativo').load('Desativado.php');
                $('#mensagemeentregarealmin').load('Entregaemtemporealmin.php');
                $('#mensagemeentregareal').load('Entregaemtemporeal.php');
                $('#maisvendidos').load('MaisVendidos.php');
            }

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
    </head>


    <body>
        <!--        Menu top Usuario-->
        <div id="menutopfix_usuario">
            <div id="menu_usuario">
                <div id="logo">
                    <a href=""><img src="Img/LOGO4.png"></a>         
                </div>

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
                <li><a href="CategoriaProduto.php?Categoria=Generico">Genáricos</a>
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

        <div id="owl-demo" class="owl-carousel owl-theme">
            <div class="item"  style="margin: 0 auto; padding: 0;width: 100%;height: 450px;background-image: url('Img/Produtos/BannerProdutos.png');background-position: center;background-size: 90% auto;background-repeat: no-repeat"></div>
            <div class="item"  style="margin: 0 auto; padding: 0;width: 100%;height: 450px;background-image: url('Img/Produtos/BannerColgate.png');background-position: center;background-size: 90% auto;background-repeat: no-repeat"></div>
            <div class="item" style="margin: 0 auto; padding: 0;width: 100%;height: 450px;background-image: url('Img/Produtos/Clear mEN Shampoo.png');background-position: center;background-size: 90% auto;background-repeat: no-repeat"></div>
        </div>

        <div id="novosprodutos">

            <?php
            include 'NovosProdutos.php';
            ?>
        </div>
        <div id="maisvendidos">
            <?php
            include 'MaisVendidos.php';
            ?>
        </div>

        <?php
        if (isset($_SESSION['COMPRACOMSUCESSO'])) {
            if (($_SESSION['COMPRACOMSUCESSO']) == 1) {
                ?>
                <div id="backformentrarmensage">
                </div>
                <div id="msglogin" style="display: none;width: 500px;padding: 30px 0px;position: absolute;top: 50%;left: 50%;margin-top: -50px;margin-left: -250px;z-index: 15;background: white;border-radius: 3px;box-shadow: 0 0px 10px rgba(0, 0, 0, 0.2)">
                    <p style="margin:0;padding: 0;font-size: 25px;color: #333;">Compra efetuada com sucesso!</p>
                    <p style="margin:0;padding: 0;font-size: 15px;color: #333;">A sua entrega já esta sendo efetuada!</p>
                </div>

                <?php $_SESSION['COMPRACOMSUCESSO'] += 1; ?> 
                <?php
            }
        }
        if (isset($_SESSION['COMPRACOMSUCESSO'])) {
            if ($_SESSION['COMPRACOMSUCESSO'] == 2) {
                unset($_SESSION['COMPRACOMSUCESSO']);
            }
        }
        ?> 
        <?php if ($_SESSION['ClienteLogado'] != null) { ?> 
            <div id="Desativo">
                <?php
                include 'Desativado.php';
                ;
                ?>
            </div>
        <?php } ?> 

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


        <script src="js/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/owl-carousel/owl.carousel.js"></script> 
        <script>
                            $(document).ready(function () {

                                $("#owl-demo").owlCarousel({
                                    navigation: false, // Show next and prev buttons
                                    pagination: true,
                                    slideSpeed: 1000,
                                    paginationSpeed: 1500,
                                    autoPlay: true,
                                    stopOnHover: true,
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
