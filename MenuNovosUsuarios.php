<?php 
    if(isset($_SESSION['FuncionarioLogado'])){
    } else{session_start();}?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="Newmembers">
            <p style="color: #BBB;">Novos clientes</p>
            <UL>
                <?php
                require_once 'Controle/DAO/Conexao2.php';
                $query = mysql_query("SELECT idCliente,nome,email,foto,estatus FROM cliente ORDER BY idCliente DESC LIMIT 4");
                while ($resultado = mysql_fetch_assoc($query)) {
                    ?>
                    <?php if ($resultado['estatus'] == 'Ativo') { ?>
                        <a href="Restrito.php?PAGINA=alterarCliente&&idCliente=<?php echo $resultado['idCliente']; ?>">
                            <li>
                                <div style="float: left;text-align: center;width: 18%;height: 100%;overflow: hidden;margin-left: 3px;border-radius: 50%"><?php echo '<img src="Img/ImagensBanco/ImagensClientes/' . $resultado['foto'] . '" style="width: auto;height: 100%;margin: 0px;"/>'; ?></div>

                                <p style="
                                   padding: 0;
                                   margin: 0;
                                   text-transform: none;
                                   width: 70%;
                                   height: 50%;
                                   border: none;
                                   float: left;
                                   margin-left: 10px;
                                   font-size: 13px;
                                   color: #555;
                                   background: none;
                                   overflow: hidden;
                                   ">
                                       <?php
                                       $nome = $resultado['nome'];
                                       echo $nome;
                                       ?>
                                </p>
                                <p style="
                                   padding: 0;
                                   margin: 0;
                                   text-transform: none;
                                   font-size: 10px;
                                   height: 50%;
                                   border: none;
                                   width: 70%;
                                   float: left;
                                   margin-left: 10px;
                                   color: #BBB;
                                   background: none;
                                   overflow: hidden;
                                   ">
                                       <?php
                                       $email = $resultado['email'];
                                       echo $email;
                                       ?>
                                </p>
                            </li>
                        </a>
                    <?php } if ($resultado['estatus'] == 'Desativo') { ?>
                        <a style="opacity: 0.3" href="Restrito.php?PAGINA=alterarCliente&&idCliente=<?php echo $resultado['idCliente']; ?>">
                            <li style="opacity: 0.3">
                                <div style="float: left;text-align: center;width: 18%;height: 100%;overflow: hidden;margin-left: 3px;border-radius: 50%"><?php echo '<img src="Img/ImagensBanco/ImagensClientes/' . $resultado['foto'] . '" style="width: auto;height: 100%;margin: 0px;"/>'; ?></div>

                                <p style="
                                   padding: 0;
                                   margin: 0;
                                   text-transform: none;
                                   width: 70%;
                                   height: 50%;
                                   border: none;
                                   float: left;
                                   margin-left: 10px;
                                   font-size: 13px;
                                   color: #555;
                                   background: none;
                                   overflow: hidden;
                                   ">
                                       <?php
                                       $nome = $resultado['nome'];
                                       echo $nome;
                                       ?>
                                </p>
                                <p style="
                                   padding: 0;
                                   margin: 0;
                                   text-transform: none;
                                   font-size: 10px;
                                   height: 50%;
                                   border: none;
                                   width: 70%;
                                   float: left;
                                   margin-left: 10px;
                                   color: #BBB;
                                   background: none;
                                   overflow: hidden;
                                   ">
                                       <?php
                                       $email = $resultado['email'];
                                       echo $email;
                                       ?>
                                </p>
                            </li>
                        </a>

                    <?php } ?>
                <?php } ?>
            </UL>
        </div>
        <?php if (isset($_SESSION['FuncionarioLogado']) && ($_SESSION['PerfilFuncionarioLogado'] < 2)) { ?>
            <!--                NOVOS FUNCIONARIOS-->
            <div class="Newmembers">
                <p style="color: #BBB">Novos Funcionarios</p>
                <UL>
                    <?php
                    $queryF = mysql_query("SELECT idFuncionario,nome,cargo,foto,estatus FROM funcionario ORDER BY idFuncionario DESC LIMIT 4");
                    while ($resultadoF = mysql_fetch_assoc($queryF)) {
                        ?>
                    <?php if ($resultadoF['estatus'] == 'Ativo') { ?>
                        <a href="Restrito.php?PAGINA=alterarFuncionario&&idFuncionario=<?php echo $resultadoF['idFuncionario']; ?>">
                            <li>
                                <div style="float: left;text-align: center;width: 18%;height: 100%;overflow: hidden;margin-left: 3px;border-radius: 50%"><?php echo '<img src="Img/ImagensBanco/ImagensFuncionarios/' . $resultadoF['foto'] . '" style="width: auto;height: 100%;margin: 0px;"/>'; ?></div>

                                <p style="
                                   padding: 0;
                                   margin: 0;
                                   text-transform: none;
                                   width: 70%;
                                   height: 50%;
                                   border: none;
                                   float: left;
                                   margin-left: 10px;
                                   font-size: 13px;
                                   color: #555;
                                   background: none;
                                   overflow: hidden;
                                   ">
                                       <?php
                                       $nome = $resultadoF['nome'];
                                       echo $nome;
                                       ?>
                                </p>
                                <p style="
                                   padding: 0;
                                   margin: 0;
                                   text-transform: none;
                                   font-size: 10px;
                                   height: 50%;
                                   border: none;
                                   width: 70%;
                                   float: left;
                                   margin-left: 10px;
                                   color: #BBB;
                                   background: none;
                                   overflow: hidden;
                                   ">
                                       <?php
                                       $cargo = $resultadoF['cargo'];
                                       echo $cargo;
                                       ?>
                                </p>
                            </li>
                        </a>
                    <?php } ?>
                    <?php if ($resultadoF['estatus'] == 'Desativo') { ?>
                        <a href="Restrito.php?PAGINA=alterarFuncionario&&idFuncionario=<?php echo $resultadoF['idFuncionario']; ?>">
                            <li style="opacity: 0.3">
                                <div style="float: left;text-align: center;width: 18%;height: 100%;overflow: hidden;margin-left: 3px;border-radius: 50%"><?php echo '<img src="Img/ImagensBanco/ImagensFuncionarios/' . $resultadoF['foto'] . '" style="width: auto;height: 100%;margin: 0px"/>'; ?></div>

                                <p style="
                                   padding: 0;
                                   margin: 0;
                                   text-transform: none;
                                   width: 70%;
                                   height: 50%;
                                   border: none;
                                   float: left;
                                   margin-left: 10px;
                                   font-size: 13px;
                                   color: #555;
                                   background: none;
                                   overflow: hidden;
                                   ">
                                       <?php
                                       $nome = $resultadoF['nome'];
                                       echo $nome;
                                       ?>
                                </p>
                                <p style="
                                   padding: 0;
                                   margin: 0;
                                   text-transform: none;
                                   font-size: 10px;
                                   height: 50%;
                                   border: none;
                                   width: 70%;
                                   float: left;
                                   margin-left: 10px;
                                   color: #bbb;
                                   background: none;
                                   overflow: hidden;
                                   ">
                                       <?php
                                       $cargo = $resultadoF['cargo'];
                                       echo $cargo;
                                       ?>
                                </p>
                            </li>
                        </a>
                    <?php } ?>
                    <?php } ?>
                </UL>
            </div>
        <?php } ?> 
        <!--                NOVOS PRODUTOS-->
        <div class="Newmembers">
            <p style="color: #BBB">Novos Produtos</p>
            <UL>
                <?php
                $queryP = mysql_query("SELECT codProduto,nome,categoria,imagem,estatusprod FROM produto ORDER BY codProduto DESC LIMIT 4");
                while ($resultadoP = mysql_fetch_assoc($queryP)) {
                    ?>
                    <?php if ($resultadoP['estatusprod'] == 'Removido') { ?>
                        <a href="Restrito.php?PAGINA=alterarProduto&&codProduto=<?php echo $resultadoP['codProduto']; ?>">
                            <li style="opacity: 0.3">
        <!--                                <img src="Img/LoginIcon.png" style="float: left;width: 40px;height: auto;margin-top: 5px;margin-left: 10px;">-->
                                <div style="float: left;text-align: center;width: 18%;height: 100%;overflow: hidden;margin-left: 3px"><?php echo '<img src="Img/ImagensBanco/' . $resultadoP['imagem'] . '" style="width: auto;height: 100%;margin: 0px;"/>'; ?></div>
                                <p style="
                                   padding: 0;
                                   margin: 0;
                                   text-transform: none;
                                   width: 60%;
                                   height: 50%;
                                   border: none;
                                   float: left;
                                   margin-left: 10px;
                                   font-size: 13px;
                                   color: #555;
                                   background: none;
                                   overflow: hidden
                                   ">
                                       <?php
                                       $nome = $resultadoP['nome'];
                                       echo $nome;
                                       ?>
                                </p>
                                <p style="
                                   padding: 0;
                                   margin: 0;
                                   text-transform: none;
                                   font-size: 10px;
                                   height: 50%;
                                   border: none;
                                   width: 60%;
                                   float: left;
                                   margin-left: 10px;
                                   color: #bbb;
                                   background: none;
                                   overflow: hidden
                                   ">
                                       <?php
                                       $categoria = $resultadoP['categoria'];
                                       echo $categoria;
                                       ?>
                                </p>
                            </li>
                        </a>
                    <?php } else { ?>
                        <a href="Restrito.php?PAGINA=alterarProduto&&codProduto=<?php echo $resultadoP['codProduto']; ?>">
                            <li>
        <!--                                <img src="Img/LoginIcon.png" style="float: left;width: 40px;height: auto;margin-top: 5px;margin-left: 10px;">-->
                                <div style="float: left;text-align: center;width: 18%;height: 100%;overflow: hidden;margin-left: 3px;"><?php echo '<img src="Img/ImagensBanco/' . $resultadoP['imagem'] . '" style="width: auto;height: 100%;margin: 0px;"/>'; ?></div>
                                <p style="
                                   padding: 0;
                                   margin: 0;
                                   text-transform: none;
                                   width: 60%;
                                   height: 50%;
                                   border: none;
                                   float: left;
                                   margin-left: 10px;
                                   font-size: 13px;
                                   color: #555;
                                   background: none;
                                   overflow: hidden
                                   ">
                                       <?php
                                       $nome = $resultadoP['nome'];
                                       echo $nome;
                                       ?>
                                </p>
                                <p style="
                                   padding: 0;
                                   margin: 0;
                                   text-transform: none;
                                   font-size: 10px;
                                   height: 50%;
                                   border: none;
                                   width: 60%;
                                   float: left;
                                   margin-left: 10px;
                                   color: #bbb;
                                   background: none;
                                   overflow: hidden
                                   ">
                                       <?php
                                       $categoria = $resultadoP['categoria'];
                                       echo $categoria;
                                       ?>
                                </p>
                            </li>
                        </a>
                    <?php } ?>
                <?php } ?>
            </UL>
        </div>
    </body>
</html>
