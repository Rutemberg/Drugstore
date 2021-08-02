
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once 'Controle/DAO/Conexao2.php';
        $query = mysql_query("SELECT idCliente,total,codVenda FROM codvenda");
        while ($resultado = mysql_fetch_assoc($query)) {
            echo $resultado['idCliente'].'<br>';
            $COD = $resultado['codVenda'];
            $query1 = mysql_query("SELECT * FROM venda WHERE codVenda = '$COD'");
            while ($resultadoV = mysql_fetch_assoc($query1)) {
                echo $resultadoV['codVenda'].'<br>';
                
            }
            echo $resultado['total'];
            echo '<br>';
            echo '<br>';
        }
        ?>
    </body>
</html>
