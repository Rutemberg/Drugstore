<?php
if (!empty($_GET["valor"])) {
    require_once './Modelos/ClasseCliente.php';
    require_once 'Controle/DAO/ClasseBuscaFoto_email.php';

    $clienteDAO = new ClasseBuscaFoto_email;
    $clientes = array();
    $clientes = $clienteDAO->mostrarfoto();

    if ($clientes != NULL) {
        ?>
        <!--//EXECUTA UM LOOP PARA MOSTRAR OS NOMES DAS PESSOAS
        // VALE LEMBRAR QUE TODOS ESSES RESULTADOS SERAO MOSTRADOS DENTRO DA PAGINA INDEX.PHP
        // DENTRO DO DIV 'PAGINA'-->

        <?php foreach ($clientes as $cliente) { ?>
            <?php echo '<img src="Img/ImagensBanco/ImagensClientes/' . $cliente->foto . '" style="width: auto;height: 100%;margin: 0px;"/>' ?>
        <?php } ?>


        <?php
    }
    if ($clientes == null) {
        require_once './Modelos/ClasseFuncionario.php';
        require_once 'Controle/DAO/ClasseBuscaFoto_emailFuncionario.php';

        $funcionarioDAO = new ClasseBuscaFoto_emailFuncionario;
        $funcionarios = array();
        $funcionarios = $funcionarioDAO->mostrarfotofuncionario();

        if ($funcionarios != NULL) {
            ?>
            <!--//EXECUTA UM LOOP PARA MOSTRAR OS NOMES DAS PESSOAS
            // VALE LEMBRAR QUE TODOS ESSES RESULTADOS SERAO MOSTRADOS DENTRO DA PAGINA INDEX.PHP
            // DENTRO DO DIV 'PAGINA'-->

            <?php foreach ($funcionarios as $funcionario) { ?>
                <?php echo '<img src="Img/ImagensBanco/ImagensFuncionarios/' . $funcionario->foto . '" style="width: auto;height: 100%;margin: 0px;"/>' ?>
            <?php } ?>


            <?php
        }else{
        echo "<img src='Img/LoginIcon.png' style='width:auto; height:100%;margin: 0 auto;'>";}
    }
}
?>
<?php
if (!empty($_GET["valor"]) == null) {
    echo "<img src='Img/LoginIcon.png' style='width:auto; height:100%;margin: 0 auto;'>";
}

    