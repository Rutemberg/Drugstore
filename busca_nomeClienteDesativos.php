<?php
if (isset($_SESSION) == null) {
    session_start();
}
?>
<?php
if (!empty($_GET["valor"])) {
    require_once './Modelos/ClasseCliente.php';
    require_once 'Controle/DAO/ClasseBuscaCliente.php';

    $clienteDAO = new ClasseBuscaCliente;
    $clientes = array();
    $clientes = $clienteDAO->listarCliente();

    if ($clientes != NULL) {
        ?>
        <!--//EXECUTA UM LOOP PARA MOSTRAR OS NOMES DAS PESSOAS
        // VALE LEMBRAR QUE TODOS ESSES RESULTADOS SERAO MOSTRADOS DENTRO DA PAGINA INDEX.PHP
        // DENTRO DO DIV 'PAGINA'-->
        <ul class="listarestilo" >
            <?php foreach ($clientes as $cliente) { ?>
                <?php if ($cliente->estatus != "Ativo") { ?>
                    <a href="Restrito.php?PAGINA=alterarCliente&&idCliente=<?php echo $cliente->idCliente; ?>">

                        <li style="opacity: 0.4">
                            <div style="margin: 0 auto;text-align: center;width: 60%;height: 40%;overflow: hidden;border-radius: 50%;margin-top: 10px"><?php echo '<img src="Img/ImagensBanco/ImagensClientes/' . $cliente->foto . '" style="width: auto;height: 100%;margin: 0px;"/>' ?></div>
                            <p class="nomelistar" style="margin-top: 20px;color: #555;font-size: 17px;overflow: hidden;height: 20px;font-weight: bolder"><?php echo $cliente->nome; ?></p>
                            <p style="margin-top: 5px;"> Email: <?php echo $cliente->email; ?></p>
                            <p> Telefone: <?php echo $cliente->telefone; ?></p>
                            <p> Cpf: <?php echo $cliente->cpf; ?></p>
                            <p> Sexo: <?php echo $cliente->sexo; ?></p>
                            <?php if (isset($_SESSION['FuncionarioLogado']) && ($_SESSION['PerfilFuncionarioLogado'] < 3)) { ?>
                                <a class="excluirpermanente" onclick="return confirm('Tem certeza de que deseja exclui-lo permanentemente?');" href="Restrito.php?PAGINA=ExcluirCliente&&idCliente=<?php echo $cliente->idCliente; ?>"></a>
                            <?php } ?>
                            <a class="ativar" href="Restrito.php?PAGINA=AtivarCliente&&idCliente=<?php echo $cliente->idCliente; ?>">Ativar Cliente</a>
                        </li>
                    </a>
                <?php } ?>
            <?php } ?>

        </ul>
        <?php
    }
    if ($clientes == null) {
        echo "<div style='margin: 0 auto;margin-top: 50px;font-size: 20px;color: #555;width: 70%;height: 100px;line-height: 100px;background: white'>Nenhunm resultado encontrado!<div>";
    }
}
?>
<?php if (!empty($_GET["valor"]) == null) { ?>
    <?php
    require_once 'Modelos/ClasseCliente.php';
    require_once 'Controle/DAO/ClasseBuscaCliente.php';

    $clienteDAO = new ClasseBuscaCliente;
    $clientes = array();
    $clientes = $clienteDAO->listarCliente();
    ?>

    <ul class="listarestilo" >
        <?php foreach ($clientes as $cliente) { ?>
            <?php if ($cliente->estatus != "Ativo") { ?>
                <a href="Restrito.php?PAGINA=alterarCliente&&idCliente=<?php echo $cliente->idCliente; ?>">

                    <li style="opacity: 0.4">
                        <div style="margin: 0 auto;text-align: center;width: 60%;height: 40%;overflow: hidden;border-radius: 50%;margin-top: 10px"><?php echo '<img src="Img/ImagensBanco/ImagensClientes/' . $cliente->foto . '" style="width: auto;height: 100%;margin: 0px;"/>' ?></div>
                        <p class="nomelistar" style="margin-top: 20px;color: #555;font-size: 17px;overflow: hidden;height: 20px;font-weight: bolder"><?php echo $cliente->nome; ?></p>
                        <p style="margin-top: 5px;"> Email: <?php echo $cliente->email; ?></p>
                        <p> Telefone: <?php echo $cliente->telefone; ?></p>
                        <p> Cpf: <?php echo $cliente->cpf; ?></p>
                        <p> Sexo: <?php echo $cliente->sexo; ?></p>
                        <?php if (isset($_SESSION['FuncionarioLogado']) && ($_SESSION['PerfilFuncionarioLogado'] < 3)) { ?>
                            <a class="excluirpermanente" onclick="return confirm('Tem certeza de que deseja exclui-lo permanentemente?');" href="Restrito.php?PAGINA=ExcluirCliente&&idCliente=<?php echo $cliente->idCliente; ?>"></a>
                        <?php } ?>
                        <a class="ativar" href="Restrito.php?PAGINA=AtivarCliente&&idCliente=<?php echo $cliente->idCliente; ?>">Ativar Cliente</a>
                    </li>
                </a>
            <?php } ?>
        <?php } ?>
    </ul>
    <?php
} 
 