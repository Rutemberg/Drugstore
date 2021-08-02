<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div style="width: 100%;height: 700px;overflow: auto;border-radius: 3px;position: relative;padding-top: 140px;margin: 0 auto;">

            <?php
            require_once 'Controle/DAO/Conexao2.php';
            $query = mysql_query("SELECT * FROM codvenda WHERE estatusvenda = 'Finalizada' order by cod desc");
            $contador = 0;
            $contadortotal = 0;
            while ($resultado = mysql_fetch_assoc($query)) {
                $contador++;
                $contadortotal += $resultado['total'];
                $idCliente = $resultado['idCliente'];
                ?>
                <div style="width: 700px;margin: 0 auto;margin-bottom: 20px;background: white;padding-top: 5px;box-shadow: 0 0 5px rgba(0,0,0, .2);position: relative">                        
                    <div>
                        <p style="font-size: 12px;text-align: right;width: 90%;margin: 0 auto;margin-bottom: 5px;color: #aaa"><?php echo $resultado['datacompra'] ?> às <?php echo $resultado['horacompra'] ?></p> 
                        <table>
                            <tr style="text-align: center;height: 40px;font-weight: bolder;color: #555">
                                <td style="width: 150px" >Produto</td>
                                <td style="width: 100px" >Quantidade</td>
                                <td style="width: 100px">Preço</td>
                                <td style="width: 100px">SubTotal</td>
                            </tr>

                            <?php
                            $COD = $resultado['codVenda'];
                            $query1 = mysql_query("SELECT * FROM venda WHERE codVenda = '$COD'");
                            while ($resultadoV = mysql_fetch_assoc($query1)) {
                                ?>
                                <tr style="text-align: center;height: 40px;color: #aaa;font-size: 15px">
                                    <td style="width: 150px;overflow: hidden" ><?php echo $resultadoV['nome']; ?></td>
                                    <td style="width: 100px" ><?php echo $resultadoV['quantidade']; ?></td>
                                    <td style="width: 100px" ><?php echo 'R$' . $resultadoV['valor'] = number_format($resultadoV['valor'], 2, ',', '.'); ?></td>
                                    <td style="width: 100px" ><?php echo 'R$' . $resultadoV['subtotal'] = number_format($resultadoV['subtotal'], 2, ',', '.'); ?></td>
                                </tr>
                            <?php } ?>
                            <tr style="text-align: center;font-weight: bolder;height: 40px;color: #ce3f3f">
                                <td colspan="3">Total da compra:</td>
                                <td colspan="1"><?php
                                    $total = number_format($resultado['total'], 2, ',', '.');
                                    echo "R$" . $total;
                                    ?></td>

                            </tr>  

                        </table>
                    </div>
                    <a href="Restrito.php?PAGINA=alterarCliente&&idCliente=<?php echo $idCliente; ?>"><div style="width: 250px;position: absolute;right: 0;margin: 0;height: 85%;top: 15%;">
                            <?php
                            $query2 = mysql_query("SELECT foto,nome FROM cliente WHERE idCliente = '$idCliente'");
                            while ($resultadoC = mysql_fetch_assoc($query2)) {
                                ?>
                                <div style="width: 200px;height: 80px;margin: 0 auto">
                                    <div style="width: 80px;height: 80px;margin: 0 auto;overflow: hidden;border-radius: 50%"> <?php echo '<img src="Img/ImagensBanco/ImagensClientes/' . $resultadoC['foto'] . '" style="width: auto;height: 100%;margin: 0px;"/>' ?></div>
                                </div>
                                <p style="font-size: 16px;color: #333;font-weight: bold"><?php echo $resultadoC['nome']; ?></p>   


                            <?php }
                            ?>  
                        </div></a>
                </div>
            <?php }
            ?>
            <div style="width: 500px;margin: 0 auto;height: 100px;position: absolute;top: 0;left: 50%;margin-left: -250px;margin-top: 10px;">
                <div style="width: 200px;display: inline-block;background: white;height: 100px;box-shadow: 0 0 5px rgba(0,0,0, .2);overflow: hidden">
                    <p style="font-size: 17px;color: #333;">Compras finalizadas</p> 
                    <div style="margin: 0 auto;font-size: 18px;font-weight: bolder;color: #333;height: 30px;line-height: 30px"><?php echo $contador; ?></div>
                </div>
                <div style="width: 200px;display: inline-block;background: white;height: 100px;box-shadow: 0 0 5px rgba(0,0,0, .2);overflow: hidden">
                    <p style="font-size: 17px;color: #333;">Total</p> 
                    <div style="margin: 0 auto;font-size: 15px;font-weight: bolder;color: #ce3f3f;height: 30px;line-height: 30px"><?php
                        $contadortotalform = number_format($contadortotal, 2, ',', '.');
                        echo "R$" . " " . $contadortotalform;
                        ?></div>
                </div>
            </div>
        </div>
    </body>
</html>
