
    <?php
    if (!empty($_GET["valor"])) {
        require_once './Modelos/ClasseFuncionario.php';
        require_once 'Controle/DAO/ClasseBuscaFuncionario.php';

        $funcionarioDAO = new ClasseBuscaFuncionario;
        $funcionarios = array();
        $funcionarios = $funcionarioDAO->listarFuncionario();

        if ($funcionarios != NULL) {
            ?>

            <!--//EXECUTA UM LOOP PARA MOSTRAR OS NOMES DAS PESSOAS
            // VALE LEMBRAR QUE TODOS ESSES RESULTADOS SERAO MOSTRADOS DENTRO DA PAGINA INDEX.PHP
            // DENTRO DO DIV 'PAGINA'-->
            <ul class="listarestilo">
                <?php foreach ($funcionarios as $funcionario) { ?>
                    <?php if ($funcionario->estatus == "Ativo") { ?>
                        <a href="Restrito.php?PAGINA=alterarFuncionario&&idFuncionario=<?php echo $funcionario->idFuncionario; ?>">
                            <li>
                                <div style="margin: 0 auto;text-align: center;width: 60%;height: 40%;overflow: hidden;border-radius: 50%;margin-top: 10px"><?php echo '<img src="Img/ImagensBanco/ImagensFuncionarios/' . $funcionario->foto . '" style="width: auto;height: 100%;margin: 0px;"/>' ?></div>
                                <p class="nomelistar" style="margin-top: 20px;color: #555;font-size: 17px;overflow: hidden;height: 20px;font-weight: bolder"><?php echo $funcionario->nome; ?></p>
                                <p style="margin-top: 5px;"> Email: <?php echo $funcionario->email; ?></p>
                                <p> Cargo: <?php echo $funcionario->cargo; ?></p>
                                <p> Cpf: <?php echo $funcionario->cpf; ?></p>
                                <p> Sexo: <?php echo $funcionario->sexo; ?></p>
                                <a class="excluir" onclick="return confirm('Tem certeza de que deseja desativa-lo?');" href="Restrito.php?PAGINA=DesativarFuncionario&&idFuncionario=<?php echo $funcionario->idFuncionario ?>"></a>
                                <a class="alterar" href="Restrito.php?PAGINA=alterarFuncionario&&idFuncionario=<?php echo $funcionario->idFuncionario ?>">Alterar Funcionario</a>
                            </li> 
                        </a>
                    <?php } ?>
                <?php } ?>

            </ul>

            <?php
        }
        if ($funcionarios == null) {
            echo "<div style='margin: 0 auto;margin-top: 50px;font-size: 20px;color: #555;width: 70%;height: 100px;line-height: 100px;background: white'>Nenhunm resultado encontrado!<div>";
        }
    }
    ?>
    <?php if (!empty($_GET["valor"]) == null) { ?>
        <?php
        require_once 'Modelos/ClasseFuncionario.php';
        require_once 'Controle/DAO/ClasseBuscaFuncionario.php';

        $funcionarioDAO = new ClasseBuscaFuncionario;
        $funcionarios = array();
        $funcionarios = $funcionarioDAO->listarFuncionario();
        ?>

        <ul class="listarestilo" >
            <?php foreach ($funcionarios as $funcionario) { ?>
                <?php if ($funcionario->estatus == "Ativo") { ?>
                    <a href="Restrito.php?PAGINA=alterarFuncionario&&idFuncionario=<?php echo $funcionario->idFuncionario; ?>">
                        <li>
                            <div style="margin: 0 auto;text-align: center;width: 60%;height: 40%;overflow: hidden;border-radius: 50%;margin-top: 10px"><?php echo '<img src="Img/ImagensBanco/ImagensFuncionarios/' . $funcionario->foto . '" style="width: auto;height: 100%;margin: 0px;"/>' ?></div>
                            <p class="nomelistar" style="margin-top: 20px;color: #555;font-size: 17px;overflow: hidden;height: 20px;font-weight: bolder"><?php echo $funcionario->nome; ?></p>
                            <p style="margin-top: 5px;"> Email: <?php echo $funcionario->email; ?></p>
                            <p> Cargo: <?php echo $funcionario->cargo; ?></p>
                            <p> Cpf: <?php echo $funcionario->cpf; ?></p>
                            <p> Sexo: <?php echo $funcionario->sexo; ?></p>
                            <a class="excluir" onclick="return confirm('Tem certeza de que deseja desativa-lo?');" href="Restrito.php?PAGINA=DesativarFuncionario&&idFuncionario=<?php echo $funcionario->idFuncionario ?>"></a>
                            <a class="alterar" href="Restrito.php?PAGINA=alterarFuncionario&&idFuncionario=<?php echo $funcionario->idFuncionario ?>">Alterar Funcionario</a>
                        </li> 
                    </a>
                <?php } ?>
            <?php } ?>

        </ul>
    <?php }
    ?>
