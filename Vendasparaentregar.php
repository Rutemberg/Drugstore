<?php
if (isset($_SESSION) == null) {
    session_start();
}
?>         

<?php
if (isset($_GET['codVenda'])) {
    $codVenda = $_GET['codVenda'];
}
?>
<?php
require_once 'Controle/DAO/Conexao2.php';
$count = 0;
$query = mysql_query("SELECT * FROM codvenda WHERE estatusvenda = 'Enviando' order by cod asc");
while ($resultado = mysql_fetch_assoc($query)) {
    $count++;
    $idCliente = $resultado['idCliente'];
    ?>
    <div id="recebendocompras" style="width: 700px;margin: 0 auto;margin-bottom: 20px;background: white;padding-top: 10px;padding-bottom: 10px;box-shadow: 0 0 5px rgba(0,0,0, .2);position: relative;margin-top: 7%"> 
        <div id="backblur">
            <div style="width: 700px;height: 200px;">
                <a href="Restrito.php?PAGINA=alterarCliente&&idCliente=<?php echo $idCliente; ?>">
                    <div style="width: 250px;height: 200px;float: left">
                        <?php
                        $query2 = mysql_query("SELECT * FROM cliente WHERE idCliente = '$idCliente'");
                        while ($resultadoC = mysql_fetch_assoc($query2)) {
                            ?>
                            <div style="width: 200px;height: 150px;margin: 0 auto;">
                                <div style="width: 150px;height: 150px;margin: 0 auto;overflow: hidden;border-radius: 50%"> <?php echo '<img src="Img/ImagensBanco/ImagensClientes/' . $resultadoC['foto'] . '" style="width: auto;height: 100%;margin: 0px;"/>' ?></div>
                            </div>
                            <p style="font-size: 20px;color: #333;font-weight: bolder;margin: 0;"><?php echo $resultadoC['nome']; ?></p>   
                            <p style="font-size: 13px;color: #aaa;font-weight: bolder;margin: 0"><?php echo $resultadoC['email']; ?></p>   



                        </div>
                    </a>
                    <div style="width: 445px;height: 200px;margin: 0;float: left">
                        <p style="height: 40px;margin: 0;line-height: 40px;text-transform: uppercase;color: #aaa;font-size: 14px;">Informações do endereço</p>
                        <table style="font-size: 14px;">
                            <tr>
                                <td style="width: 100px"></td>
                                <td style="width: 250px"></td>
                                <td style="width: 50px"></td>
                                <td style="width: 50px"></td>
                            </tr>
                            <tr style="text-align: center;height: 30px;font-weight: bolder;color: #555">
                                <td>Cep:</td>
                                <td colspan="3" style="background-color: #f6f6f6" ><?php echo $resultadoC['cep']; ?></td>
                            </tr>
                            <tr style="text-align: center;height: 30px;font-weight: bolder;color: #555">
                                <td style="co">Rua:</td>
                                <td style="background-color: #f6f6f6" ><?php echo $resultadoC['rua']; ?></td>
                                <td>Nº:</td>
                                <td style="background-color: #f6f6f6" ><?php echo $resultadoC['numero']; ?></td>
                            </tr>
                            <tr style="text-align: center;height: 30px;font-weight: bolder;color: #555">
                                <td>Bairro:</td>
                                <td colspan="3" style="background-color: #f6f6f6" ><?php echo $resultadoC['bairro']; ?></td>
                            </tr>
                            <tr style="text-align: center;height: 30px;font-weight: bolder;color: #555">
                                <td>Cidade:</td>
                                <td  colspan="3" style="background-color: #f6f6f6" ><?php echo $resultadoC['cidade']; ?></td>
                            </tr>
                        </table>
                    </div>
                <?php }
                ?> 
            </div>
            <div>
                <p style="font-size: 12px;text-align: right;width: 90%;margin: 0 auto;margin-bottom: 5px;color: #aaa;border-bottom: 1px solid #d9d9d9">
                    Compra realizada à <?php
                    date_default_timezone_set('America/Sao_Paulo');
                    $hora = $resultado['horacompra'];
                    $horaagora = date("h:i:s");
                    $data_compra = strtotime($hora);
                    $data_logout = strtotime($horaagora);
                    $tempo_con = mktime(date('H', $data_logout) - date('H', $data_compra), date('i', $data_logout) - date('i', $data_compra), date('s', $data_logout) - date('s', $data_compra));
                    echo date('i', $tempo_con);
                    ?> minutos
                </p>
                <p style="height: 40px;margin: 0;line-height: 40px;text-transform: uppercase;color: #aaa;font-size: 14px">Informações da compra</p>

                <table>
                    <tr style="text-align: center;height: 40px;font-weight: bolder;color: #555">
                        <td style="width: 100px"></td>
                        <td style="width: 200px">Produto</td>
                        <td style="width: 100px" >Quantidade</td>
                        <td style="width: 100px">Preço</td>
                        <td style="width: 100px">SubTotal</td>
                    </tr>

                    <?php
                    $COD = $resultado['codVenda'];
                    $query1 = mysql_query("SELECT * FROM venda WHERE codVenda = '$COD'");
                    while ($resultadoV = mysql_fetch_assoc($query1)) {
                        $codproduto = $resultadoV['codProduto'];
                        ?>
                        <tr style="text-align: center;height: 40px;color: #aaa;font-size: 15px">
                            <td style="width: 150px;overflow: hidden" ><?php
                                $query3 = mysql_query("SELECT imagem FROM produto WHERE codProduto = '$codproduto'");
                                while ($resultadoP = mysql_fetch_assoc($query3)) {
                                    echo '<img src="Img/ImagensBanco/' . $resultadoP['imagem'] . '" style="width: auto;height: 40px;margin: 0px;"/>';
                                    ?>
                                </td>
                                <td style="width: 150px;overflow: hidden" ><?php echo $resultadoV['nome']; ?></td>
                                <td style="width: 100px" ><?php echo $resultadoV['quantidade']; ?></td>
                                <td style="width: 100px" ><?php echo 'R$' . $resultadoV['valor'] = number_format($resultadoV['valor'], 2, ',', '.'); ?></td>
                                <td style="width: 100px" ><?php echo 'R$' . $resultadoV['subtotal'] = number_format($resultadoV['subtotal'], 2, ',', '.'); ?></td>
                            </tr>
                        <?php } ?>

                </div>


            <?php }
            ?>
            <tr style="text-align: center;font-weight: bolder;height: 40px;color: #ce3f3f">
                <td colspan="4">Total da compra:</td>
                <td colspan="1"><?php
                    $total = number_format($resultado['total'], 2, ',', '.');
                    echo "R$" . $total;
                    ?></td>

            </tr>  
            <tr style="text-align: center;font-weight: bolder;height: 40px;color: #4d4d4d">
                <td colspan="4">à pagar:</td>
                <td colspan="1"><?php
                    $apagar = number_format($resultado['troco'], 2, ',', '.');
                    echo "R$" . $apagar;
                    ?></td>

            </tr>  
            <tr style="text-align: center;font-weight: bolder;height: 40px;color: #ce3f3f">
                <td colspan="4">Troco:</td>
                <td colspan="1"><?php
                    $total = str_replace(',', '.', str_replace('.', '', $total));
                    $troco = $resultado['troco'];
                    $trocopara = $troco - $total;
                    $trocopara = number_format($trocopara, 2, ',', '.');
                    echo "R$" . $trocopara;
                    ?></td>

            </tr>  

            </table>
        </div>
    </div>
    <a href="?ENTREGAR=<?php echo $COD; ?>" id="mensagemenviarparaentrega" style="height: 80px;line-height: 80px;font-size: 22px;color: white;position: absolute;top: 50%;left: 50%;width: 700px;margin-top: -40px;border-radius: 3px;margin-left: -350px;">
        Fazer entrega
    </a>

    </div>
<?php }
?>
<div style="width: 500px;height: 45px;line-height: 45px;background: white;color: #333;position: absolute;top: 20px;left: 50%;margin-left: -250px;border-radius: 3px;box-shadow: 0 0 10px rgba(0,0,0, .2)">
    <?php echo $count; ?> Entregas pendentes
</div>