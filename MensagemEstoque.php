<?php
            require_once 'Controle/DAO/Conexao2.php';
            $query = mysql_query("SELECT * from produto WHERE quantidade < 40 order by quantidade asc");
            while ($resultado = mysql_fetch_assoc($query)) {
                ?>

                <a class="alterar" href="Restrito.php?PAGINA=alterarProduto&&codProduto=<?php echo $resultado['codProduto'];?>">
                    <div style="width: 300px;margin-top: 10px;margin-bottom: 10px;background: white;height: 80px;display: inline-block;border-radius: 5px;box-shadow: 0 0 10px rgba(0,0,0, .2)">
                        <div style="width: 100px;height: 70;float: left;margin-top: 5px">
    <?php echo '<img src="Img/ImagensBanco/' . $resultado['imagem'] . '" style="width: auto;height: 100%;margin: 0px;"/>'; ?>
                        </div>
                        <div style="width: 200px;height: 100%;float: right  ">
                            <p style="font-size: 15px;margin:0;margin-top: 5px;color: #333;height: 20px;overflow: hidden"><?php echo $resultado['nome']; ?></p>
                            <p style="font-size: 13px;margin: 0;color: #ce3f3f;margin-top: 2px">Quantidade:<?php echo $resultado['quantidade']; ?></p>
                            <p style="font-size: 10px;margin: 0;color: #333;margin-top: 2px">Produto com poucas unidades no estoque</p>
                        </div>
                    </div></a>




                <?php }
            ?>