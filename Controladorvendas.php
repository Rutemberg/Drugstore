<?php

if (isset($_SESSION) == null) {
    session_start();
}

if (isset($_GET['codVendas'])) {
    $codVenda = $_GET['codVendas'];
}
?>
<?php

require_once 'Controle/DAO/Conexao2.php';
$sql = "UPDATE codvenda SET estatusvenda = 'Enviando' WHERE codVenda = '$codVenda'";
$qr = mysql_query($sql) or die(mysql_error());

if ($qr) {
    $_SESSION['MENSAGEMENVIARCOMPLETO'] = 1;
    echo "<script>
         window.location.href='Restrito.php?PAGINA=gerenciarvendas';
        </script>";
}
