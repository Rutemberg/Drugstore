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
        <script src="js/jquery-2.2.2.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/jquery.maskedinput.js"></script>
                <script src="js/velocity.min.js"></script>
        <script src="js/velocity.ui.js"></script>
        <link href="js/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
        <link href="js/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/owl-carousel/owl.theme.css" rel="stylesheet">
        <script type="text/javascript">
            // Validação
            function ValidaFormulario() {
                // nome
                if (document.form.nome.value == "") {
                    alert("Digite o nome");
                    $('#nome').focus();
                    return false;
                }

                // descricao
                if (document.form.email.value == "") {
                    alert("Digite o email");
                    $('#email').focus();
                    return false;
                }


                if (document.form.senha.value == "") {
                    alert("Digite a senha");
                    $('#senha').focus();
                    return false;
                }
                //                valor

                if (document.form.comfirmarsenha.value == "") {
                    alert("Comfirme a senha!");
                    $('#comfirmarsenha').focus();
                    return false;
                }
                if (document.form.dataNascimento.value == "") {
                    alert("Selecione uma data valida");
                    $('#dataNascimento').focus();
                    return false;
                }

                if (document.form.cpf.value == "") {
                    alert("Digite o cpf");
                    $('#cpf').focus();
                    return false;
                }
                if (document.form.dataAdmissao.value == "") {
                    alert("Digite a data");
                    $('#dataAdmissao').focus();
                    return false;
                }
                if (document.form.cargo.value == "") {
                    alert("Digite o cargo");
                    $('#cargo').focus();
                    return false;
                }
                if (document.form.perfil.value == "") {
                    alert("Digite o perfil");
                    $('#perfil').focus();

                    return false;
                }
                if (document.form.sexo.value == "") {
                    alert("Selecione o sexo");
                    $('#sexo').focus();

                    return false;
                }

                return true;
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#blah').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#alterarimagem").change(function () {
                    readURL(this);
                });

            });

        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                jQuery.validator.addMethod("verificaCPF", function (value, element) {
                    value = value.replace('.', '');
                    value = value.replace('.', '');
                    cpf = value.replace('-', '');
                    while (cpf.length < 11)
                        cpf = "0" + cpf;
                    var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
                    var a = [];
                    var b = new Number;
                    var c = 11;
                    for (i = 0; i < 11; i++) {
                        a[i] = cpf.charAt(i);
                        if (i < 9)
                            b += (a[i] * --c);
                    }
                    if ((x = b % 11) < 2) {
                        a[9] = 0
                    } else {
                        a[9] = 11 - x
                    }
                    b = 0;
                    c = 11;
                    for (y = 0; y < 10; y++)
                        b += (a[y] * c--);
                    if ((x = b % 11) < 2) {
                        a[10] = 0;
                    } else {
                        a[10] = 11 - x;
                    }
                    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg))
                        return false;
                    return true;
                }, "*Informe um CPF válido."); // Mensagem padrão 

            });

        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#form").validate({
                    rules: {
                        nome: {
                            required: true,
                            minlength: 2
                        },
                        cpf: {
                            required: true,
                            verificaCPF: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        senha: {
                            required: true,
                            minlength: 2
                        },
                        comfirmarsenha: {
                            required: true,
                            equalTo: "#senha"
                        }
                    }
                });
            });
        </script>
        <style type="text/css">
            .error{
                color:#ce3f3f !important;
                font-style:italic;
                font-size: 10px!important;
            }
        </style>
        <script>
            $(document).ready(function () {
                $("#cpf").mask("999.999.999-99");

            });
        </script>

    </head>
    <body>
        <?php
        $id = $_GET['idFuncionario'];
        require_once 'Controle/DAO/Conexao2.php';
        $query = mysql_query("SELECT * FROM funcionario WHERE idFuncionario = " . $id);
        while ($resultado = mysql_fetch_assoc($query)) {
            ?>
            <?php
            $reslutid = $resultado['idFuncionario'];
            $senha = $resultado['senha'];
            $nome = $resultado['nome'];
            $cpf = $resultado['cpf'];
            $datanascimento = $resultado['datanascimento'];
            $sexo = $resultado['sexo'];
            $email = $resultado['email'];
            $dataadmissao = $resultado['dataadmissao'];
            $cargo = $resultado['cargo'];
            $perfil = $resultado['perfil'];
            $imagem = $resultado['foto'];
            $estatus = $resultado['estatus'];
            ?>


            <div id="owl-demo" class="owl-carousel owl-theme" >

                <div id="corpoform" style="height: 750px;" class="item">
                    <p style="margin: 0;height: 50px;line-height: 50px;width: 90%;margin: 0 auto;font-size: 30px;text-transform: uppercase;color: #333;font-weight: bolder"><?php echo $nome ?></p>
                    <div id="Menugerenciarfuncionario" >
                        <ul style="box-shadow:none;">
                            <a href="Restrito.php?PAGINA=listarFuncionario">
                                <li style="opacity: .3">
                                    <img style="width: 15%;height: auto;margin-top: 3px" src="Img/Funcionarios2.png">
                                    <p>Funcionarios<p>
                                </li>
                            </a>
                            <?php if ($estatus == "Ativo") { ?>
                                <li>
                                    <img style="width: 15%;height: auto;margin-top: 3px" src="Img/UsuarioAtivo2.png">
                                    <p>Funcionario ativo<p>
                                </li>
                                <a class="desativar" onclick="return confirm('Tem certeza de que deseja desativa-lo?');" href="Restrito.php?PAGINA=DesativarFuncionario&&idFuncionario=<?php echo $id; ?>">
                                    <li style="opacity: 0.3"> 
                                        <img style="width: 15%;height: auto;margin-top: 3px;" src="Img/Usuarioremovido2.png">
                                        <p>Desativar Funcionario<p>
                                    </li>
                                </a>
                            <?php } ?>
                            <?php if ($estatus != "Ativo") { ?>
                                <a class="ativar" href="Restrito.php?PAGINA=AtivarFuncionario&&idFuncionario=<?php echo $id; ?>">
                                    <li style="opacity: 0.3">
                                        <img style="width: 15%;height: auto;margin-top: 3px" src="Img/UsuarioAtivo2.png">
                                        <p>Ativar Funcionario<p>
                                    </li>
                                </a>
                                <li> 
                                    <img style="width: 15%;height: auto;margin-top: 3px;" src="Img/Usuarioremovido2.png">
                                    <p>Funcionario Desativado<p>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <form id="form"
                          enctype="multipart/form-data"
                          name="form"
                          method="POST"
                          action="Controle/controladorFuncionario.php?ACAO=alterar"
                          onSubmit="return ValidaFormulario()">

                        <div id="formedit" style="position: relative;height: 620px">

                            <div style="float: left;height: 400px;margin-top: 30px;position: relative;background: #f5f5f5">
                                <div style="float: left;text-align: center;width: 250px; height: 250px;overflow: hidden;border-radius: 50%;margin-top: 50px;position: absolute;z-index: 4;background: transparent"><img id="blah" src="#" alt="" style="height: 105%;width: 105%;margin: 0 auto"/></div>
                                <div style="float: left;text-align: center;width: 250px; height: 250px;overflow: hidden;border-radius: 50%;margin-top: 50px;"><?php echo '<img src="Img/ImagensBanco/ImagensFuncionarios/' . $imagem . '" style="width: auto;height: 100%;margin: 0px"/>' ?></div>
                                <label for="alterarimagem" class="labelinputfile" style="text-align: center;z-index: 4;position: absolute;bottom: 0;height: 30px;line-height: 30px;width: 248px;left: 0;padding: 0;background: white;color: #555!important;border: 1px solid #d9d9d9">Trocar imagem</label>                  
                                <input type="file" id="alterarimagem" class="alterarimagem" name="alterarimagem" id="alterarimagem" style="
                                       position: absolute;                                  
                                       z-index: 3;
                                       margin: 0;
                                       bottom: 0;
                                       height: 30px;
                                       line-height: 30px;
                                       width: 240px;
                                       left: 0;
                                       "/>


                            </div>

                            <input class="idFuncionario" name="idFuncionario"
                                   type="hidden"
                                   value="<?php echo $reslutid; ?>">

                            <div class="infousuarios" style="margin-top: 30px;">
                                <label for="nome">Nome:</label>
                                <input class="nome" name="nome" id="nome"
                                       type="text"
                                       value="<?php echo $nome; ?>">
                            </div>
                            <div class="infousuarios">
                                <label for="email">Email:</label>
                                <input class="email" name="email" id="email"
                                       type="text"
                                       value="<?php echo $email; ?>">
                            </div>
                            <div class="infousuarios">
                                <label for="senha">Senha:</label>            
                                <input class="senha" name="senha" id="senha"
                                       type="text"
                                       value="<?php echo $senha; ?>">
                            </div>
                            <div class="infousuarios">
                                <label for="comfirmarsenha">Comfirmar Senha:</label>            
                                <input class="comfirmarsenha" name="comfirmarsenha" id="comfirmarsenha"
                                       type="text"
                                       value="">
                            </div>
                            <div class="infousuarios">
                                <label for="dataNascimento">Data de Nascimento:</label>            
                                <input class="dataNascimento" name="dataNascimento" id="dataNascimento"
                                       type="date"
                                       value="<?php echo $datanascimento; ?>">
                            </div>

                            <input class="imagem" name="imagem" id="imagem"
                                   type="hidden"
                                   value="<?php echo $imagem ?>">


                            <div class="infousuarios">
                                <label for="cpf">CPF:</label>
                                <input class="cpf" name="cpf" id="cpf"
                                       type="text"
                                       value="<?php echo $cpf; ?>">
                            </div>
                            <div class="infousuarios">
                                <label for="dataAdmissao">Data de Admissão:</label>            
                                <input class="dataAdmissao" name="dataAdmissao" id="dataAdmissao"
                                       type="date"
                                       value="<?php echo $dataadmissao; ?>">
                            </div>
                            <div class="infousuarios">
                                <label for="cargo">Cargo:</label>            
                                <input class="cargo" name="cargo" id="cargo"
                                       type="text"
                                       value="<?php echo $cargo; ?>">
                            </div>
                            <div class="infousuarios">
                                <label for="perfil">Perfil:</label>  
                                <input class="perfil" name="perfil" id="perfil"
                                       type="text"
                                       value="<?php echo $perfil; ?>">
                            </div>
                            <div class="infousuarios">
                                <label for="sexo">Sexo:</label>  <select id="sexo" name="sexo">
                                    <option value="<?php echo $sexo ?>" selected ><?php echo $sexo ?>
                                    <option name="Masculino"> Masculino
                                    <option name="Feminino"> Feminino
                                </select>
                            </div>


                            <input class="submit" name="submit"
                                   type="submit"
                                   value="Atualizar" style="position: absolute;bottom: 0px; height: 50px;line-height: 50px;margin-right: -360px;right: 50%;width: 720px;padding: 0;font-size: 20px;font-weight: bolder;background: #333;color: white">

                            <?php if ($estatus == "Ativo") { ?>
                                <div style="float: left;width: 250px;height: 50px;line-height: 50px;font-size: 20px;margin-top:-50px;background: #3ece6a;color: white">Ativo</div>
                            <?php } ?>
                            <?php if ($estatus != "Ativo") { ?>
                                <div style="float: left;width: 250px;height: 50px;line-height: 50px;font-size: 20px;margin-top: -50px;background: #ce3f3f;color: white">Desativo</div>

                            <?php } ?>

                        </div>

                    </form>
                </div>
            <?php } ?>

            <div class="item" id="historicofuncionarioespec">

                <div style='width: 720px;margin: 0 auto;position: relative'>
                    <div style="width: 720px;margin: 0 auto;">
                        <?php
                        $idfunc = $_GET['idFuncionario'];
                        mysql_connect("localhost", "root", "123");
                        mysql_select_db("bd_drogaria");
                        mysql_query("SET NAMES 'utf8'");
                        $queryh = mysql_query("SELECT h.*,f.nome,f.foto
FROM historicofuncionario h,funcionario f
WHERE h.idFuncionario = " . $idfunc . " and h.idFuncionario = f.idFuncionario order by codhistorico desc limit 10");
                        $contadordesativou = 0;
                        $contadorsativou = 0;
                        $contadorcadastrou = 0;
                        $contadoralterou = 0;
                        while ($resultadoh = mysql_fetch_assoc($queryh)) {
                            $idfuncionario = $resultadoh['idFuncionario'];
                            $nomefuncionario = $resultadoh['nome'];
                            $fotofuncionario = $resultadoh['foto'];
                            $acao = $resultadoh['acao'];
                            $dataacao = $resultadoh['dataacao'];
                            $horaacao = $resultadoh['horaacao'];

                            $idcliente = $resultadoh['idCliente'];

                            $queryC = mysql_query("SELECT nome,foto
FROM cliente where idCliente = $idcliente");
                            while ($resultadoC = mysql_fetch_assoc($queryC)) {
                                $nomecliente = $resultadoC['nome'];
                                $fotocliente = $resultadoC['foto'];
                            }
                            ?>

                            <div class="historico">
                                <div style="float: left;text-align: center;width: 50px;height: 50px;overflow: hidden;margin-left: 3px;margin-top: 7.5px;border-radius: 50%"><?php echo '<img src="Img/ImagensBanco/ImagensFuncionarios/' . $fotofuncionario . '" style="width: auto;height: 100%;margin: 0px;"/>'; ?></div>
                                <p style="margin-left: 5px;"><?php echo $nomefuncionario ?></p>
                                <?php
                                if ($acao == 'Ativou') {
                                    $contadorsativou++;
                                    ?>
                                    <p style="margin-left: 5px;color: #3ece6a"><?php echo $acao ?></p>
                                <?php } ?>
                                <?php
                                if ($acao == 'Desativou') {
                                    $contadordesativou++;
                                    ?>
                                    <p style="margin-left: 5px;color: #ce3f3f"><?php echo $acao ?></p>
                                <?php } ?>
                                <?php
                                if ($acao == 'Alterou') {
                                    $contadoralterou++;
                                    ?>
                                    <p style="margin-left: 5px;color: #cea73f"><?php echo $acao ?></p>
                                <?php } ?>
                                <?php
                                if ($acao == 'Cadastrou') {
                                    $contadorcadastrou++;
                                    ?>
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
                    </div>
<!--                    <div style="height:150px;width: 720px;position: absolute;top: 10px;">
                        <div style="display: inline-block;width: 160px;height: 150px;margin: 0;padding: 0;background: white;box-shadow: 0 0 5px rgba(0,0,0, .2)">
                            <p style="margin: 8px 0;font-size: 18px;">Cadastrou</p> 
                            <div style="width: 90px;height: 90px;line-height: 90px;font-size: 30px;margin: 0 auto;background: #3e71ce;color: white;border-radius: 50%;"><?php echo $contadorcadastrou; ?></div>
                        </div>
                        <div style="display: inline-block;width: 160px;height: 150px;margin: 0;padding: 0;;background: white;box-shadow: 0 0 5px rgba(0,0,0, .2)">
                            <p style="margin: 8px 0;font-size: 18px;">Alterou</p> 
                            <div style="width: 90px;height: 90px;line-height: 90px;font-size: 30px;margin: 0 auto;background: #cea73f;color: white;border-radius: 50%;"><?php echo $contadoralterou; ?></div>
                        </div>
                        <div style="display: inline-block;width: 160px;height: 150px;margin: 0;padding: 0;;background: white;box-shadow: 0 0 5px rgba(0,0,0, .2)">
                            <p style="margin: 8px 0;font-size: 18px;">Ativou</p> 
                            <div style="width: 90px;height: 90px;line-height: 90px;font-size: 30px;margin: 0 auto;background: #3ece6a;color: white;border-radius: 50%;"><?php echo $contadorsativou; ?></div>
                        </div>
                        <div style="display: inline-block;width: 160px;height: 150px;margin: 0;padding: 0;;background: white;box-shadow: 0 0 5px rgba(0,0,0, .2)">
                            <p style="margin: 8px 0;font-size: 18px;">Desativou</p> 
                            <div style="width: 90px;height: 90px;line-height: 90px;font-size: 30px;margin: 0 auto;background: #ce3f3f;color: white;border-radius: 50%;"><?php echo $contadordesativou; ?></div>
                        </div>


                    </div>-->
                </div>
            </div>
            <div class="item" id="historicofuncionarioespec">

                <div style='width: 720px;margin: 0 auto;overflow: auto;position: relative;'>
                    <div style="width: 720px;margin: 0 auto;">
                        <?php
                        mysql_connect("localhost", "root", "123");
                        mysql_select_db("bd_drogaria");
                        mysql_query("SET NAMES 'utf8'");
                        $query = mysql_query("SELECT h.*,f.nome,f.foto
FROM historicofuncionarioproduto h,funcionario f
WHERE h.idFuncionario = " . $idfunc . " and h.idFuncionario = f.idFuncionario order by codhistorico desc limit 10");
                        $contadordesativouprod = 0;
                        $contadorsativouprod = 0;
                        $contadorcadastrouprod = 0;
                        $contadoralterouprod = 0;
                        while ($resultado = mysql_fetch_assoc($query)) {
                            $idfuncionario = $resultado['idFuncionario'];
                            $nomefuncionario = $resultado['nome'];
                            $fotofuncionario = $resultado['foto'];
                            $acao = $resultado['acao'];
                            $dataacao = $resultado['dataacao'];
                            $horaacao = $resultado['horaacao'];

                            $codproduto = $resultado['codProduto'];

                            $queryP = mysql_query("SELECT nome,imagem
FROM produto where codProduto = $codproduto");
                            while ($resultadoP = mysql_fetch_assoc($queryP)) {
                                $nomeproduto = $resultadoP['nome'];
                                $imagemproduto = $resultadoP['imagem'];
                            }
                            ?>


                            <div class="historico">

                                <div style="float: left;text-align: center;width: 50px;height: 50px;overflow: hidden;margin-left: 3px;margin-top: 7.5px;border-radius: 50%;"><?php echo '<img src="Img/ImagensBanco/ImagensFuncionarios/' . $fotofuncionario . '" style="width: auto;height: 100%;margin: 0px"/>'; ?></div>
                <!--                <p style="float: left"><?php echo $idfuncionario ?></p>-->
                                <p style="margin-left: 5px"><?php echo $nomefuncionario ?></p>
                                <?php if ($acao == 'Moveu para o estoque') {  $contadorsativouprod++; ?>
                                    <p style="margin-left: 5px;color: #3ece6a"><?php echo $acao ?></p>
                                <?php } ?>
                                <?php if ($acao == 'Removeu do estoque') { $contadordesativouprod++; ?>
                                    <p style="margin-left: 5px;color: #ce3f3f"><?php echo $acao ?></p>
                                <?php } ?>
                                <?php if ($acao == 'Alterou') { $contadoralterouprod++ ?>
                                    <p style="margin-left: 5px;color: #cea73f"><?php echo $acao ?></p>
    <?php } ?>
    <?php if ($acao == 'Cadastrou') { $contadorcadastrouprod++;?>
                                    <p style="margin-left: 5px;color: #3e71ce"><?php echo $acao ?></p>
    <?php } ?>
                                <p style="color: #c5c5c5">o produto:</p>
                                <a href="Restrito.php?PAGINA=alterarProduto&&codProduto=<?php echo $codproduto; ?>">
                                    <div style="float: left;text-align: center;width: 50px;height: 50px;overflow: hidden;margin-left: 1px;margin-top: 7.5px;border-radius: 50%;"><?php echo '<img src="Img/ImagensBanco/' . $imagemproduto . '" style="width: auto;height: 100%;margin: 0px;"/>'; ?></div>
                    <!--                 <p style="float: left"><?php echo " " . $codproduto ?></p>-->
                                    <p> <?php echo $nomeproduto ?></p></a>
                                <p style="position: absolute;font-size: 10px;height: 30px;bottom: 0;right: 90px;margin: 0;line-height: 30px;width: 90px;color: #aaa"><?php echo $dataacao ?></p>
                                <p style="position: absolute;height: 30px;font-size: 10px;bottom: 0;right: 0;margin: 0;line-height: 30px;width: 90px;color: #aaa"><?php echo $horaacao ?></p>



                            </div>

<?php } ?>
                    </div>

<!--                    <div style="height:150px;width: 720px;position: absolute;top: 10px;">
                        <div style="display: inline-block;width: 160px;height: 150px;margin: 0;padding: 0;background: white;box-shadow: 0 0 5px rgba(0,0,0, .2)">
                            <p style="margin: 8px 0;font-size: 18px;">Cadastrou</p> 
                            <div style="width: 90px;height: 90px;line-height: 90px;font-size: 30px;margin: 0 auto;background: #3e71ce;color: white;border-radius: 50%;"><?php echo $contadorcadastrouprod; ?></div>
                        </div>
                        <div style="display: inline-block;width: 160px;height: 150px;margin: 0;padding: 0;;background: white;box-shadow: 0 0 5px rgba(0,0,0, .2)">
                            <p style="margin: 8px 0;font-size: 18px;">Alterou</p> 
                            <div style="width: 90px;height: 90px;line-height: 90px;font-size: 30px;margin: 0 auto;background: #cea73f;color: white;border-radius: 50%;"><?php echo $contadoralterouprod; ?></div>
                        </div>
                        <div style="display: inline-block;width: 160px;height: 150px;margin: 0;padding: 0;;background: white;box-shadow: 0 0 5px rgba(0,0,0, .2)">
                            <p style="margin: 8px 0;font-size: 18px;">Moveu</p> 
                            <div style="width: 90px;height: 90px;line-height: 90px;font-size: 30px;margin: 0 auto;background: #3ece6a;color: white;border-radius: 50%;"><?php echo $contadorsativouprod; ?></div>
                        </div>
                        <div style="display: inline-block;width: 160px;height: 150px;margin: 0;padding: 0;;background: white;box-shadow: 0 0 5px rgba(0,0,0, .2)">
                            <p style="margin: 8px 0;font-size: 18px;">Removeu</p> 
                            <div style="width: 90px;height: 90px;line-height: 90px;font-size: 30px;margin: 0 auto;background: #ce3f3f;color: white;border-radius: 50%;"><?php echo $contadordesativouprod; ?></div>
                        </div>


                    </div>-->
                </div>
            </div>
            </div>
            <script src="js/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/owl-carousel/owl.carousel.js"></script> 
            <script>
                          $(document).ready(function () {

                              $("#owl-demo").owlCarousel({
                                  navigation: false, // Show next and prev buttons
                                  pagination: false,
                                  slideSpeed: 300,
                                  paginationSpeed: 400,
                                  items: 1,
                                  itemsDesktop: false,
                                  itemsDesktopSmall: false,
                                  itemsTablet: false,
                                  itemsMobile: false

                              });

                          });
            </script>
    </body>
</html>
