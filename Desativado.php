<?php
if (isset($_SESSION['ClienteLogado']) == null) {
    session_start();
    
}

    $iddesativo = $_SESSION['idClienteLogado'];
    require_once 'Controle/DAO/Conexao2.php';
    $query = mysql_query("SELECT * FROM cliente WHERE idCliente = " . $iddesativo);
    while ($resultado = mysql_fetch_assoc($query)) {
        if ($resultado['estatus'] == "Desativo") {
            session_unset();
            session_destroy();
                echo "<script>
                        window.location.href='index.php?FOIDESATIVADO=1';
                        </script>";
        }
    }
?>