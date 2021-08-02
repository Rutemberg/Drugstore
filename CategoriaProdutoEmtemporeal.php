<?php
if (isset($_SESSION) == null) {
    session_start();
}
?>            
<?php
if (isset($_GET["Categoria"])) {
    $_SESSION['Categoria'] = $_GET["Categoria"];
}
?>
<div id="paginacategoria">

    <?php if (!empty($_GET["valor"]) == null) { ?>
        <?php
        require_once 'Controle/DAO/Conexao2.php';
        $query = mysql_query("SELECT * FROM produto WHERE categoria = '$_SESSION[Categoria]' and estatusprod = 'Ativo' ORDER BY codProduto DESC ");
        $contadorproduto = 0;
        while ($resultado = mysql_fetch_assoc($query)) {
            $contadorproduto ++;
            if ($resultado['quantidade'] <= 0) {
                $estatusprod = "Removido";
                $query2 = mysql_query("UPDATE produto SET estatusprod = '$estatusprod' WHERE codProduto = " . $resultado['codProduto']);
            } else {
                ?>
                <a href="InformacaoProduto.php?codProduto=<?php echo $resultado['codProduto']; ?>"><div class="novoproduto">
                        <div class="imagemproduto"> <?php echo '<img src="Img/ImagensBanco/' . $resultado['imagem'] . '" style="width: auto;height: 100%;margin: 0px;"/>'; ?> </div> 
                        <div style="border-radius: 3px;width: 95%;margin: 0 auto;padding-bottom: 5px;background: #f6f6f6">
                            <p class="nomeproduto"><?php echo $resultado['nome']; ?></p>
                            <div class="descricaoproduto"><?php echo $resultado['descricao']; ?></div>
                            <p style="font-size: 19px;color: #4d4d4d;width: 70%;margin: 0 auto;text-align: left">Preço:</p>
                            <p style="font-size: 22px;color: #f94c3b;width: 70%;margin: 0 auto;text-align: right;font-weight: bold"><?php echo 'R$' . ' ' . $resultado['valor'] = number_format($resultado['valor'], 2, ',', '.'); ?></p>
                            <?php if (isset($_SESSION['ClienteLogado'])) { ?>
                                <a href="ProdutosCarrinho.php?acao=add&id=<?php echo $resultado['codProduto']; ?>">
                                    <div class="adicionarcesta"><p style="float: left;width: 80%;margin: 0;">Adicionar à cesta</p>

                                    </div>
                                </a>
                            <?php } else { ?>
                                <div class="adicionarcesta" style="background-image: none"><p style="float: left;width: 100%;margin: 0;font-size: 16px;color: white">Logue-se para comprar</p>
                                </div>
                            <?php } ?>
                        </div>
                    </div></a>
            <?php } ?>
        <?php } ?> 
    <?php } ?>  
</div>
<div style="width: 100%;position: absolute;top: 0;margin: 0;height: 50px;background: white">
    <ul style="list-style: none;width: auto;margin: 0;padding: 0;float: right">
        <li style="width: auto;display: inline-block;height: 50px;line-height: 50px;padding: 0;padding-left: 10px;padding-right: 10px;color: #aaa">Foram encontrados <?php echo $contadorproduto . " "; ?> Produtos</li>
        <li style="width: auto;display: inline-block;height: 50px;line-height: 50px;padding: 0;padding-left: 10px;padding-right: 10px;">
            <form>
                <select name="" onchange="categoriapesquisa(this.value);" style="height: 40px;margin: 0;padding: 0;margin-top: 5px;font-family: 'News Gothic Oblique';font-size: 15px;border-radius: 3px;text-align: center;font-weight: bolder;color: #aaa">
                    <option value="null" style="font-weight: bolder">Ordenar por:</option>
                    <option value="valor ASC" style="font-weight: bolder">Menor Preço</option>
                    <option value="valor DESC" style="font-weight: bolder">Maior Preço</option>
                    <option value="quantidadevendida" style="font-weight: bolder">Mais vendido</option>
                    <option value="nome" style="font-weight: bolder">Ordem Alfabética</option>
                </select>
            </form>
        </li>

    </ul>
</div>