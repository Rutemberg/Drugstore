
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="js/jquery-2.2.2.min.js"></script>
        <script src="js/velocity.min.js"></script>
        <script src="js/velocity.ui.js"></script>
 
    </head>
    <body>

                <?php
                require_once 'Controle/DAO/Conexao2.php';
                $query = mysql_query("SELECT h.*,f.nome,f.foto
FROM historicofuncionario h,funcionario f
WHERE h.idFuncionario = f.idFuncionario order by codhistorico desc limit 10");
                while ($resultado = mysql_fetch_assoc($query)) {
                    $idfuncionario = $resultado['idFuncionario'];
                    $nomefuncionario = $resultado['nome'];
                    $fotofuncionario = $resultado['foto'];
                    $acao = $resultado['acao'];
                    $dataacao = $resultado['dataacao'];
                    $horaacao = $resultado['horaacao'];

                    $idcliente = $resultado['idCliente'];

                    $queryC = mysql_query("SELECT nome,foto
FROM cliente where idCliente = $idcliente");
                    while ($resultadoC = mysql_fetch_assoc($queryC)) {
                        $nomecliente = $resultadoC['nome'];
                        $fotocliente = $resultadoC['foto'];
                    }
                    ?>

                    <div class="historico">
                        <div style="float: left;text-align: center;width: 50px;height: 50px;overflow: hidden;margin-left: 3px;margin-top: 7.5px;border-radius: 50%;"><?php echo '<img src="Img/ImagensBanco/ImagensFuncionarios/' . $fotofuncionario . '" style="width: auto;height: 100%;margin: 0px;"/>'; ?></div>
        <!--                <p style="float: left"><?php echo $idfuncionario ?></p>-->
                        <p style="margin-left: 5px"><?php echo $nomefuncionario ?></p>
                        <?php if ($acao == 'Ativou') { ?>
                            <p style="margin-left: 5px;color: #3ece6a"><?php echo $acao ?></p>
                        <?php } ?>
                        <?php if ($acao == 'Desativou') { ?>
                            <p style="margin-left: 5px;color: #ce3f3f"><?php echo $acao ?></p>
                        <?php } ?>
                        <?php if ($acao == 'Alterou') { ?>
                            <p style="margin-left: 5px;color: #cea73f"><?php echo $acao ?></p>
                        <?php } ?>
                        <?php if ($acao == 'Cadastrou') { ?>
                            <p style="margin-left: 5px;color: #3e71ce"><?php echo $acao ?></p>
                        <?php } ?>
                        <p style="color: #c5c5c5">o cliente:</p>
                        <a href="Restrito.php?PAGINA=alterarCliente&&idCliente=<?php echo $idcliente; ?>">
                            <div style="float: left;text-align: center;width: 50px;height: 50px;overflow: hidden;margin-left: 5px;margin-top: 7.5px;border-radius: 50%;"><?php echo '<img src="Img/ImagensBanco/ImagensClientes/' . $fotocliente . '" style="width: auto;height: 100%;margin: 0px;"/>'; ?></div>
        <!--                 <p style="float: left"><?php echo " " . $idcliente ?></p>-->
                            <p> <?php echo $nomecliente ?></p></a>
                        <p style="position: absolute;font-size: 10px;height: 30px;bottom: 0;right: 90px;margin: 0;line-height: 30px;width: 90px;color: #aaa"><?php echo $dataacao ?></p>
                        <p style="position: absolute;height: 30px;font-size: 10px;bottom: 0;right: 0;margin: 0;line-height: 30px;width: 90px;color: #aaa"><?php echo $horaacao ?></p>


                    </div>

                <?php } ?>
        
    </body>
</html>
