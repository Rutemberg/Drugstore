<?php
if (isset($_SESSION) == null) {
    session_start();
}
?>

<?php

if (!empty($_GET["valor"])) {
    require_once 'Controle/DAO/Conexao2.php';
    $email = $_GET["valor"];
    $query = mysql_query("SELECT * FROM cliente WHERE email = '$email'");
    $contador = 0;

    while ($resultado = mysql_fetch_assoc($query)) {
        $contador ++;
    }
    $query2 = mysql_query("SELECT * FROM funcionario WHERE email = '$email'");
    $contador2 = 0;

    while ($resultado2 = mysql_fetch_assoc($query2)) {
        $contador2 ++;
    }
if ($contador == 0 && $contador2 == 0) { ?>

    <input id="submit"
           name="submit"
           type="submit" 
           value="Finalizar Cadastro">


<?php }  else {

    }
    } ?>