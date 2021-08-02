
<?php
require_once 'Controle/DAO/Conexao2.php';
$querycompras = mysql_query("SELECT * from codvenda WHERE estatusvenda = 'Recebendo' order by cod asc ");
$countadorcompras = 0;
while ($resultadocompras = mysql_fetch_assoc($querycompras)) {
    $countadorcompras++;
} if ($countadorcompras == 1) {
    ?>
    <div id="mensagemestoqueproda" style="color: #333;width: 200px;padding: 20px 50px;background: white;font-weight: bolder;font-size: 15px;box-shadow: 0 0 10px rgba(0,0,0, .2);border-radius: 3px">
        Existe <?php echo $countadorcompras ?> compra para ser analisada e entregue
    </div>
    <?php
}if ($countadorcompras > 1) {
    ?>
    <div id="mensagemestoqueproda" style="color: #333;width: 200px;padding: 20px 50px;background: white;font-weight: bolder;font-size: 15px;box-shadow: 0 0 10px rgba(0,0,0, .2);border-radius: 3px">
        Existem <?php echo $countadorcompras ?> compras para serem analisadas e entregues
    </div>
<?php }