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
        <?php foreach ($produtos as $produto) { ?>
            <?php if ($produto->estatusprod == "Ativo") { ?>
               <a href="InformacaoProduto.php?codProduto=<?php echo $produto->codProduto;; ?>"><div class="hoverprod" style="background: white;width: 550px;height: 130px;margin: 0 auto;margin-top: 5px;text-align: left;box-shadow: 0px 0px 10px rgba(0,0,0, .2)"> 
                    <div style="float: left;text-align: center;width: 150px;height: 130px;overflow: hidden;"><?php echo '<img src="Img/ImagensBanco/' . $produto->imagem . '" style="width: auto;height: 100%;margin: 0px"/>' ?></div>
                    <div style="float: right;width: 400px;height: 130px;position: relative">
                        <p style="margin: 0;color: #555;font-size: 20px;height: 30px;text-align: center;font-weight: bolder;margin-top: 2px"><?php echo $produto->nome; ?></p>
                        <p style="margin: 0;font-size: 15px;height: 70px;overflow: hidden;color: #8e8e8e;text-align: center"> <?php echo $produto->descricao; ?></p>
                        <p style="margin: 0;font-size: 20px;color: #f94c3b;text-align: right;font-weight: bolder;width: 80%;padding-right: 20px;float: right;margin-top: -5px">Preço: R$<?php echo $produto->valor=number_format($produto->valor, 2, ',', '.'); ?></p>
                        <p style="margin: 0;position: absolute;bottom: 7px;left: 0;width: 27%;background:#555;color: white;height: 30px;line-height: 30px;text-align: center"><?php echo $produto->categoria; ?></p>
                    </div>
                </div></a>
            <?php } ?>
        <?php } ?>

        <?php
    }
    if ($produtos == null) {
        echo "<div style='width: 550px;height: 130px;margin: 0 auto;margin-top: 50px;font-size: 25px;color: #ccc'>Não há este produto em nosso estoque</div>";
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

    <div style="width: 550px;height: 130px;margin: 0 auto;margin-top: 50px;font-size: 25px;color: #ccc">Procure por produtos pelo nome ou categoria!</div>   

    <?php
}    