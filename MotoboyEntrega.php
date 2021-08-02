<?php
if (isset($_SESSION) == null) {
    session_start();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="Estilos/RestrictStyle.css">
        <script src="js/jquery-2.2.2.min.js"></script>
        <script src="js/velocity.min.js"></script>
        <script src="js/velocity.ui.js"></script>
        <script src="js/craftpip-jquery-confirm-4a6f866/js/jquery-confirm.js"></script>
        <link rel="stylesheet" href="js/craftpip-jquery-confirm-4a6f866/css/jquery-confirm.css">
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
        <script type="text/javascript">
            var tempo = window.setInterval(carrega, 5000);
            function carrega()
            {
                $('#Carregar').load('Vendasparaentregar.php');
            }

        </script>
    </head>
    <body>
        <div style="position: absolute;right: 0;top: 0;width: 100px;height: 50px;line-height: 50px;color: #333">
            <a href ="Controle/Logout.php" style="color: #333">Sair</a>
        </div>
        <div id="Carregar">
            <?php require_once 'Vendasparaentregar.php'; ?>
        </div>

        <?php
        if (isset($_SESSION['MENSAGEMEENTREGAFINALIZADA'])) {
            if (($_SESSION['MENSAGEMEENTREGAFINALIZADA']) == 1) {
                ?>
                <div id="backformentrarmensage">
                </div>
                <div id="msglogin" style="display: none;width: 500px;height: 100px;line-height: 100px;position: absolute;top: 50%;left: 50%;margin-top: -50px;margin-left: -250px;z-index: 15;background: white;border-radius: 3px;box-shadow: 0 0px 10px rgba(0, 0, 0, 0.2);">
                    <p style="margin:0;padding: 0;font-size: 18px;color: #333;">Finalizada!</p>
                </div>

                <?php $_SESSION['MENSAGEMEENTREGAFINALIZADA'] += 1; ?> 
                <?php
            }
        }
        if (isset($_SESSION['MENSAGEMEENTREGAFINALIZADA'])) {
            if ($_SESSION['MENSAGEMEENTREGAFINALIZADA'] == 2) {
                unset($_SESSION['MENSAGEMEENTREGAFINALIZADA']);
            }
        }
        ?>

        <?php
        if (isset($_GET['ENTREGAR'])) {
            $Entregaemprogress = $_GET['ENTREGAR'];
            require_once 'Controle/DAO/Conexao2.php';
            $sql = "UPDATE codvenda SET estatusvenda = 'Entregando' WHERE codVenda = '$Entregaemprogress'";
            $qr = mysql_query($sql) or die(mysql_error());
            if ($qr) {
                $_SESSION['MENSAGEMENTREGARCOMPLETO'] = 1;
                echo "<script>
         window.location.href='Entregandoumporvez.php';
        </script>";
            }
        }
        ?>
        <?php
        if (isset($_GET['ENTREGARFINALIZADA'])) {
            $Entregafinalizada = $_GET['ENTREGARFINALIZADA'];
            require_once 'Controle/DAO/Conexao2.php';
            $sql = "UPDATE codvenda SET estatusvenda = 'Finalizada' WHERE codVenda = '$Entregafinalizada'";
            $qr = mysql_query($sql) or die(mysql_error());
            if ($qr) {
                $_SESSION['MENSAGEMEENTREGAFINALIZADA'] = 1;
                echo "<script>
         window.location.href='MotoboyEntrega.php';
        </script>";
            }
        }
        ?>
    </body>
</html>
