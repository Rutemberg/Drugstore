<?php
if (isset($_SESSION) == null) {
    session_start();
}
?>


<?php
if(isset($_SESSION['idClienteLogado'])){
$id = $_SESSION['idClienteLogado'];
require_once 'Controle/DAO/Conexao2.php';
$query = mysql_query("SELECT * from codvenda WHERE idCliente = '$id' and estatusvenda != 'Finalizada' order by cod asc");
while ($resultado = mysql_fetch_assoc($query)) {
    ?>
    <div style="width: 850px;margin: 0 auto;padding-top: 3px">
        <?php if ($resultado['estatusvenda'] == 'Recebendo') { ?>
            <div style="width: 200px;height: 100px;border-right: 1px solid white;display: inline-block;border: 1px solid white">
                <div style="width: 200px;height: 50px;"><img src="Img/certo.png" style="width: auto;height: 50px;"></div>
                <p style="margin: 0;color: #4d4d4d;font-size: 15px;">Sua compra foi recebida!</p>
            </div>
            <div style="width: 200px;height: 100px;border-right: 1px solid white;display: inline-block;border: 1px solid white">
                <div style="width: 200px;height: 50px;"><img src="Img/loading (1).gif" style="width: auto;height: 50px;"></div>
                <p style="margin: 0;color: #4d4d4d;font-size: 15px;">Sua compra está sendo analisada</p>
            </div>
        <?php } ?>
        <?php if ($resultado['estatusvenda'] == 'Enviando') { ?>
            <div style="width: 200px;height: 100px;border-right: 1px solid white;display: inline-block;border: 1px solid white">
                <div style="width: 200px;height: 50px;"><img src="Img/certo.png" style="width: auto;height: 50px;"></div>
                <p style="margin: 0;color: #4d4d4d;font-size: 15px;">Sua compra foi recebida!</p>
            </div>
            <div style="width: 200px;height: 100px;border-right: 1px solid white;display: inline-block;border: 1px solid white">
                <div style="width: 200px;height: 50px;"><img src="Img/certo.png" style="width: auto;height: 50px;"></div>
                <p style="margin: 0;color: #4d4d4d;font-size: 15px;">Compra analisada!</p>
            </div>
            <div style="width: 200px;height: 100px;border-right: 1px solid white;display: inline-block;border: 1px solid white">
                <div style="width: 200px;height: 50px;"><img src="Img/loading (1).gif" style="width: auto;height: 50px;"></div>
                <p style="margin: 0;color: #4d4d4d;font-size: 15px;">Estamos preparando sua compra para entrega.</p>
            </div>
        <?php } ?>
        <?php if ($resultado['estatusvenda'] == 'Entregando') { ?>
            <div style="width: 200px;height: 100px;border-right: 1px solid white;display: inline-block;border: 1px solid white">
                <div style="width: 200px;height: 50px;"><img src="Img/certo.png" style="width: auto;height: 50px;"></div>
                <p style="margin: 0;color: #4d4d4d;font-size: 15px;">Sua compra foi recebida!</p>
            </div>
            <div style="width: 200px;height: 100px;border-right: 1px solid white;display: inline-block;border: 1px solid white">
                <div style="width: 200px;height: 50px;"><img src="Img/certo.png" style="width: auto;height: 50px;"></div>
                <p style="margin: 0;color: #4d4d4d;font-size: 15px;">Compra analisada!</p>
            </div>
            <div style="width: 200px;height: 100px;border-right: 1px solid white;display: inline-block;border: 1px solid white">
                <div style="width: 200px;height: 50px;"><img src="Img/certo.png" style="width: auto;height: 50px;"></div>
                <p style="margin: 0;color: #4d4d4d;font-size: 15px;">Preparada para entrega!</p>
            </div>
            <div style="width: 200px;height: 100px;border-right: 1px solid white;display: inline-block;border: 1px solid white">
                <div style="width: 200px;height: 50px;"><img src="Img/loading (1).gif" style="width: auto;height: 50px;"></div>
                <p style="margin: 0;color: #4d4d4d;font-size: 15px;">Sua compra está saindo, aguarde alguns minutos.</p>
            </div>
        <?php } ?>
        <?php if ($resultado['estatusvenda'] == 'Finalizada') { ?>
            <div style="width: 200px;height: 100px;border-right: 1px solid white;display: inline-block;border: 1px solid white">
                <div style="width: 200px;height: 50px;"><img src="Img/certo.png" style="width: auto;height: 50px;"></div>
                <p style="margin: 0;color: #4d4d4d;font-size: 15px;">Sua compra foi recebida!</p>
            </div>
            <div style="width: 200px;height: 100px;border-right: 1px solid white;display: inline-block;border: 1px solid white">
                <div style="width: 200px;height: 50px;"><img src="Img/certo.png" style="width: auto;height: 50px;"></div>
                <p style="margin: 0;color: #4d4d4d;font-size: 15px;">Compra analisada!</p>
            </div>
            <div style="width: 200px;height: 100px;border-right: 1px solid white;display: inline-block;border: 1px solid white">
                <div style="width: 200px;height: 50px;"><img src="Img/certo.png" style="width: auto;height: 50px;"></div>
                <p style="margin: 0;color: #4d4d4d;font-size: 15px;">Preparada para entrega!</p>
            </div>
            <div style="width: 200px;height: 100px;border-right: 1px solid white;display: inline-block;border: 1px solid white">
                <div style="width: 200px;height: 50px;"><img src="Img/certo.png" style="width: auto;height: 50px;"></div>
                <p style="margin: 0;color: #4d4d4d;font-size: 15px;">Sua compra saiu!</p>
            </div>
            <div style="width: 200px;height: 100px;border-right: 1px solid white;display: inline-block;border: 1px solid white">
                <div style="width: 200px;height: 50px;"><img src="Img/certo.png" style="width: auto;height: 50px;"></div>
                <p style="margin: 0;color: #4d4d4d;font-size: 15px;">Compra finalizada e entregue</p>
            </div>
        <?php } ?>

    </div>
<?php }
}
?>

