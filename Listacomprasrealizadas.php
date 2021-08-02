<div style="margin-top: 45px;padding-left: 10px;padding-right: 22px">
    <?php
    require_once 'Controle/DAO/Conexao2.php';
    $query = mysql_query("SELECT * from codvenda WHERE estatusvenda = 'Recebendo' order by cod asc");

    while ($resultado = mysql_fetch_assoc($query)) {
        ?>
    <a href="Restrito.php?PAGINA=Analisarcompraeenviar&&codVenda=<?php echo $resultado['codVenda']; ?>">
        <div class="mensagemvenda" style="width: 200px;margin-bottom: 10px;display: inline-block;border-bottom: 1px solid #d9d9d9;border-radius: 3px">   
            <p style="margin: 0 auto;height: 12px;text-align: right;font-size: 10px;width: 190px;position: absolute;margin-left: 5px;margin-top: 40px;color: #aaa">
                à <?php
                date_default_timezone_set('America/Sao_Paulo');
                $hora = $resultado['horacompra'];
                $horaagora = date("h:i:s");
                $data_compra = strtotime($hora);
                $data_logout = strtotime($horaagora);
                $tempo_con = mktime(date('H', $data_logout) - date('H', $data_compra), date('i', $data_logout) - date('i', $data_compra), date('s', $data_logout) - date('s', $data_compra));
                echo date('i', $tempo_con);
                ?> minutos
            </p>
            <?php
            $idCliente = $resultado['idCliente'];
            $query2 = mysql_query("SELECT foto,nome FROM cliente WHERE idCliente = '$idCliente'");
            while ($resultadoC = mysql_fetch_assoc($query2)) {
                ?> 
                <div style="width: 200px;height: 50px;">
                    <div style="width: 50px;height: 50px;border-radius: 50%;overflow: hidden;float: left"><?php echo '<img src="Img/ImagensBanco/ImagensClientes/' . $resultadoC['foto'] . '" style="width: auto;height: 100%;margin: 0px;"/>' ?></div>
                    <div style="width: 140px;height: 50px;overflow: hidden;float: right">
                        <p style="margin: 0;width: 100%;overflow: hidden;color: #4d4d4d"><?php echo $resultadoC['nome'] ?></p>
                        <p style="margin: 0;font-size: 13px;color: #aaa">Realizou uma compra</p>
                        <p></p>
                    </div>
                </div>
            <?php } ?> 
            <div style="width: 200px;height: 20px;padding-top: 20px">

                <p style="margin: 0;height: 20px;font-size: 12px;color: #ce3f3f">
                    analisar e enviar para entrega
                </p>

            </div>
        </div></a>
    <?php } ?>

</div>