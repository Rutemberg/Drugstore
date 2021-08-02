<?php
if (isset($_SESSION) == null) {
    session_start();
}
?>
<?php
if(isset($_SESSION['idClienteLogado'])){
$id = $_SESSION['idClienteLogado'];
require_once 'Controle/DAO/Conexao2.php';
$queryC = mysql_query("SELECT * from codvenda WHERE idCliente = '$id' and estatusvenda != 'Finalizada'");
$count = 0;
while ($resultadoC = mysql_fetch_assoc($queryC)) {
    $count++;
} if ($count == 1) {
    ?>
    <div id="mensagemestoqueproda" style="color: #333;width: 200px;padding: 20px 30px;background: white;font-weight: bolder;font-size: 15px;box-shadow: 0 0 10px rgba(0,0,0, .2);border-radius: 3px">
        Veja aqui o andamento do seu pedido em tempo real!
    </div>
    <?php
} 
 if ($count > 1) {
    ?>
    <div id="mensagemestoqueproda" style="color: #333;width: 200px;padding: 20px 30px;background: white;font-weight: bolder;font-size: 15px;box-shadow: 0 0 10px rgba(0,0,0, .2);border-radius: 3px">
        Veja aqui o andamento do seus pedidos em tempo real!
    </div>
    <?php
} 

}