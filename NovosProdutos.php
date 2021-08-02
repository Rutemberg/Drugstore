<?php
if (isset($_SESSION) == null) {
    session_start();
}
?>
<p id="titulonovosprodutos">Novos Produtos</p>
<div style="width:90%;margin: 0 auto;margin-top: 20px;">
    <?php
    require_once 'Controle/DAO/Conexao2.php';
    $query = mysql_query("SELECT * FROM produto WHERE estatusprod = 'Ativo' ORDER BY codProduto DESC LIMIT 4");
    while ($resultado = mysql_fetch_assoc($query)) {
        if ($resultado['quantidade'] <= 0) {
            $estatusprod = "Removido";
            $query2 = mysql_query("UPDATE produto SET estatusprod = '$estatusprod' WHERE codProduto = " . $resultado['codProduto']);
        } else {
            ?>
            <a href="InformacaoProduto.php?codProduto=<?php echo $resultado['codProduto']; ?>">
                <div class="novoproduto">
                    <div class="imagemproduto"> <?php echo '<img src="Img/ImagensBanco/' . $resultado['imagem'] . '" style="width: auto;height: 100%;margin: 0px;"/>'; ?> </div> 
                    <div style="border-radius: 3px;width: 95%;margin: 0 auto;padding-bottom: 5px;background: #f6f6f6">
                        <p class="nomeproduto"><?php echo $resultado['nome']; ?></p>
                        <div class="descricaoproduto"><?php echo $resultado['descricao']; ?></div>
                        <p style="font-size: 19px;color: #4d4d4d;width: 70%;margin: 0 auto;text-align: left">Preço:</p>
                        <p style="font-size: 22px;color: #f94c3b;width: 70%;margin: 0 auto;text-align: right;font-weight: bold"><?php echo 'R$' . ' ' . $resultado['valor']=number_format($resultado['valor'], 2, ',', '.'); ?></p>
                        <?php if (isset($_SESSION['ClienteLogado']) != null) { ?>
                            <a href="ProdutosCarrinho.php?acao=add&id=<?php echo $resultado['codProduto']; ?>">
                                <div class="adicionarcesta"><p style="float: left;width: 80%;margin: 0;">Adicionar à cesta</p>
                                    
                                </div>
                            </a>
                        <?php } else { ?>
                        <div class="adicionarcesta" style="background-image: none"><p style="float: left;width: 100%;margin: 0;font-size: 15px;color: white;">Logue-se para comprar</p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </a>
        <?php } ?>
    <?php } ?>
</div>