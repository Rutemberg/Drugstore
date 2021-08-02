<?php
if (!empty($_GET["valor"])) {
    require_once './Modelos/ClasseProduto.php';
    require_once 'Controle/DAO/ClasseBuscaProduto.php';

    $produtoDAO = new ClasseBuscaProduto;
    $produtos = array();
    $produtos = $produtoDAO->listarProduto();

    if ($produtos != NULL) {
        ?>
        <!--//EXECUTA UM LOOP PARA MOSTRAR OS NOMES DAS PESSOAS
        // VALE LEMBRAR QUE TODOS ESSES RESULTADOS SERAO MOSTRADOS DENTRO DO DIV 'PAGINA'-->
        <ul class="listarestiloprod" >
            <?php foreach ($produtos as $produto) { ?>
                <?php if ($produto->estatusprod == "Ativo") { ?>
                    <a href="Restrito.php?PAGINA=alterarProduto&&codProduto=<?php echo $produto->codProduto; ?>">
                        <li>
                            <div style="float: left;text-align: center;width: 30%;height: 70%;overflow: hidden;margin-left: 10px;margin-top: 35px;"><?php echo '<img src="Img/ImagensBanco/' . $produto->imagem . '" style="width: 100%;height: auto;margin: 0px;margin-top:10%"/>' ?></div>
                            <p class="nomelistar" style="margin-top: 30px;color: #555;font-size: 17px;overflow: hidden;height: 20px;text-align: right;font-weight: bolder"><?php echo $produto->nome; ?></p>
                            <p style="margin-top: 10px;font-size: 15px;width: 60%;height: 100px;overflow: hidden"> <?php echo $produto->descricao; ?></p>
                            <p style="margin-top: 5px;font-size: 13px;width: 60%;height: 30px;overflow: hidden">Quantidade em estoque: <?php echo $produto->quantidade; ?></p>
                            <p style="font-size: 25px;color: #f94c3b;margin-top: 10px;text-align: right ">Preço: R$<?php echo $produto->valor=number_format($produto->valor, 2, ',', '.'); ?></p>
                            <p style="position: absolute;top: 5px;left: 0;width: 27%;background:#555;color: white;height: 25px;line-height: 25px;text-align: center"><?php echo $produto->categoria; ?></p>
                            <a class="excluir" onclick="return confirm('Tem certeza de que deseja remove-lo do estoque?');" href="Restrito.php?PAGINA=removerProduto&&codProduto=<?php echo $produto->codProduto; ?>"></a>
                            <a class="alterar" href="Restrito.php?PAGINA=alterarProduto&&codProduto=<?php echo $produto->codProduto; ?>">Alterar Produto</a>
                        </li>
                    </a>
                <?php } ?>
            <?php } ?>

        </ul>
        <?php
    }
    if ($produtos == null) {
        echo "<div style='margin: 0 auto;margin-top: 50px;font-size: 20px;color: #555;width: 70%;height: 100px;line-height: 100px;background: white'>Nenhunm resultado encontrado!<div>";
    }
}
?>
<?php if (!empty($_GET["valor"]) == null) { ?>
    <?php
    require_once './Modelos/ClasseProduto.php';
    require_once 'Controle/DAO/ClasseBuscaProduto.php';

    $produtoDAO = new ClasseBuscaProduto;
    $produtos = array();
    $produtos = $produtoDAO->listarProduto();
    ?>

    <ul class="listarestiloprod" >
        <?php foreach ($produtos as $produto) { ?>
            <?php if ($produto->estatusprod == "Ativo") { ?>
                <a href="Restrito.php?PAGINA=alterarProduto&&codProduto=<?php echo $produto->codProduto; ?>">
                    <li>
                        <div style="float: left;text-align: center;width: 30%;height: 70%;overflow: hidden;margin-left: 10px;margin-top: 35px;"><?php echo '<img src="Img/ImagensBanco/' . $produto->imagem . '" style="width: 100%;height: auto;margin: 0px;margin-top:10%"/>' ?></div>
                        <p class="nomelistar" style="margin-top: 30px;color: #555;font-size: 17px;overflow: hidden;height: 20px;text-align: right;font-weight: bolder"><?php echo $produto->nome; ?></p>
                        <p style="margin-top: 10px;font-size: 15px;width: 60%;height: 100px;overflow: hidden"> <?php echo $produto->descricao; ?></p>
                        <p style="margin-top: 5px;font-size: 13px;width: 60%;height: 30px;overflow: hidden">Quantidade em estoque: <?php echo $produto->quantidade; ?></p>
                        <p style="font-size: 25px;color: #f94c3b;margin-top: 10px;text-align: right ">Preço: R$<?php echo $produto->valor=number_format($produto->valor, 2, ',', '.'); ?></p>
                        <p style="position: absolute;top: 5px;left: 0;width: 27%;background:#555;color: white;height: 25px;line-height: 25px;text-align: center"><?php echo $produto->categoria; ?></p>
                        <a class="excluir" onclick="return confirm('Tem certeza de que deseja remove-lo do estoque?');" href="Restrito.php?PAGINA=removerProduto&&codProduto=<?php echo $produto->codProduto; ?>"></a>
                        <a class="alterar" href="Restrito.php?PAGINA=alterarProduto&&codProduto=<?php echo $produto->codProduto; ?>">Alterar Produto</a>
                    </li>
                </a>
            <?php } ?>       
        <?php } ?>

    </ul>
    <?php
}    