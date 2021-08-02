
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="js/jquery-2.2.2.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/jquery.maskedinput.js"></script>
        <script src="js/velocity.min.js"></script>
        <script src="js/velocity.ui.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#backformentrarmensage').velocity('transition.fadeIn', 300);
                $('#msglogin').delay(200).velocity('transition.shrinkIn', 300);
                $('#backformentrarmensage').click(function () {
                    $('#backformentrarmensage').velocity('transition.fadeOut', 300);
                    $('#msglogin').velocity('transition.shrinkOut', 300);

                });
            });
        </script>
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
                color:#950000 !important;
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
            ?>

            <div id="corpoform" style="height: 660px;">
                <form id="form"
                      enctype="multipart/form-data"
                      name="form"
                      method="POST"
                      action="Controle/controladorFuncionario.php?ACAO=Atualizar"
                      onSubmit="return ValidaFormulario()">

                    <div id="formedit" style="position: relative;height: 660px">
                        <p style="margin: 0;height: 50px;line-height: 50px;width: 90%;margin: 0 auto;font-size: 30px;text-transform: uppercase;color: #333;font-weight: bolder"><?php echo $nome ?></p>

                        <div style="float: left;height: 400px;margin-top: 30px;position: relative;">
                            <div style="float: left;text-align: center;width: 250px; height: 250px;overflow: hidden;border-radius: 50%;margin-top: 50px;position: absolute;z-index: 4;background: transparent"><img id="blah" src="#" alt="" style="height: 105%;width: 105%;margin: 0 auto"/></div>
                            <div style="float: left;text-align: center;width: 250px; height: 250px;overflow: hidden;border-radius: 50%;margin-top: 50px;"><?php echo '<img src="Img/ImagensBanco/ImagensFuncionarios/' . $imagem . '" style="width: auto;height: 100%;margin: 0px"/>' ?></div>

                            <label for="alterarimagem" class="labelinputfile" style="text-align: center;z-index: 4;position: absolute;bottom: 0;height: 30px;line-height: 30px;width: 248px;left: 0;padding: 0;background: white;color: #555 !important;border: 1px solid #d9d9d9">Trocar imagem</label>                  
                            <input type="file" id="alterarimagem" class="alterarimagem" name="alterarimagem" id="alterarimagem" style="
                                   position: absolute;                                  
                                   z-index: 3;
                                   margin: 0;
                                   bottom: 0;
                                   height: 30px;
                                   line-height: 30px;
                                   width: 248px;
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

                        <?php if ($perfil < 3) { ?>
                            <div class="infousuarios">
                                <label for="dataAdmissao">Data de Admissão:</label>            
                                <input class="dataAdmissao" name="dataAdmissao" id="dataAdmissao"
                                       type="date"
                                       value="<?php echo $dataadmissao; ?>">
                            </div>
                        <?php } else { ?>
                            <div class="infousuarios">
                                <label for="dataAdmissao">Data de Admissão:</label>            
                                <input class="dataAdmissao" name="dataAdmissao" id="dataAdmissao"
                                       type="date"
                                       value="<?php echo $dataadmissao; ?>" readonly="true">
                            </div>
                        <?php } ?>

                        <?php if ($perfil < 3) { ?>
                            <div class="infousuarios">
                                <label for="cargo">Cargo:</label>            
                                <input class="cargo" name="cargo" id="cargo"
                                       type="text"
                                       value="<?php echo $cargo; ?>">
                            </div>
                        <?php } else { ?>
                            <div class="infousuarios">
                                <label for="cargo">Cargo:</label>            
                                <input class="cargo" name="cargo" id="cargo"
                                       type="text"
                                       value="<?php echo $cargo; ?>" readonly="true">
                            </div>
                        <?php } ?>

                        <?php if ($perfil < 3) { ?>
                            <div class="infousuarios">
                                <label for="perfil">Perfil:</label>  
                                <input class="perfil" name="perfil" id="perfil"
                                       type="text"
                                       value="<?php echo $perfil; ?>" >
                            </div>
                        <?php } else { ?>
                            <div class="infousuarios">
                                <label for="perfil">Perfil:</label>  
                                <input class="perfil" name="perfil" id="perfil"
                                       type="text"
                                       value="<?php echo $perfil; ?>" readonly="true">
                            </div>
                        <?php } ?>
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
                    </div>

                </form>
            </div>



        <?php } ?>

        <?php
        if (isset($_SESSION['MENSAGEMALTERARMINHASINFORMAÇOES'])) {
            if (($_SESSION['MENSAGEMALTERARMINHASINFORMAÇOES']) == 1) {
                ?>
                <div id="backformentrarmensage">
                </div>
                <div id="msglogin" style="display: none;width: 500px;height: 100px;line-height: 100px;position: absolute;top: 50%;left: 50%;margin-top: -50px;margin-left: -250px;z-index: 15;background: white;border-radius: 3px">
                    <p style="margin:0;padding: 0;font-size: 18px;color: #333;">Alterações realizadas com sucesso!</p>
                </div>

                <?php $_SESSION['MENSAGEMALTERARMINHASINFORMAÇOES'] += 1; ?> 
                <?php
            }
        }
        if (isset($_SESSION['MENSAGEMALTERARMINHASINFORMAÇOES'])) {
            if ($_SESSION['MENSAGEMALTERARMINHASINFORMAÇOES'] == 2) {
                unset($_SESSION['MENSAGEMALTERARMINHASINFORMAÇOES']);
            }
        }
        ?>
    </body>
</html>
