
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

    </head>
    <body>
        <p id="titulonovosprodutos" style="padding: 30px 0;">Mais Vendidos</p>
        <div id="osmaisvendidos"style="width: 95%;margin: 0 auto;padding-bottom: 30px">
            <?php
            require_once 'Controle/DAO/Conexao2.php';
            $query = mysql_query("SELECT * FROM produto WHERE estatusprod = 'Ativo' ORDER BY quantidadevendida DESC LIMIT 3");
            while ($resultado = mysql_fetch_assoc($query)) {
                ?>
                <a href="InformacaoProduto.php?codProduto=<?php echo $resultado['codProduto']; ?>">
                    <div id="childmaisvendido" style="width: 32.5%;height: 350px;display: inline-block;border-radius: 3px">
                        <div style="width: 100%;height: 300px;overflow: hidden;"><?php echo '<img src="Img/ImagensBanco/' . $resultado['imagem'] . '" style="width: auto;height: 100%;margin: 0px;"/>'; ?></div>
                        <p style="font-size: 22px;color: #4d4d4d;font-weight: bolder;margin: 0"><?php echo $resultado['nome']; ?></p>
                    </div>
                </a>

            <?php } ?>
        </div>
    </body>
</html>
