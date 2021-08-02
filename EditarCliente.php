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
        <script type='text/javascript' src='cep.js'></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/jquery.maskedinput.js"></script>
        <script src="js/velocity.min.js"></script>
        <script src="js/velocity.ui.js"></script>
        <link href="js/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
        <link href="js/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/owl-carousel/owl.theme.css" rel="stylesheet">

        <script type="text/javascript">
// Validação
            function ValidaFormulario() {



                // email
                if (document.form.email.value == "") {
                    alert("Digite o seu email");
                    $('#email').focus();
                    return false;
                }

                // senha
                if (document.form.senha.value == "") {
                    alert("Digite o sua senha");
                    $('#senha').focus();
                    return false;
                }
                if (document.form.comfirmarsenha.value == "") {
                    alert("Comfirme a senha!");
                    $('#comfirmarsenha').focus();
                    return false;
                }

//                nome
                if (document.form.nome.value == "") {
                    alert("Digite o seu nome");
                    $('#nome').focus();
                    return false;
                }

//                cpf
                if (document.form.cpf.value == "") {
                    alert("Digite o seu cpf");
                    $('#cpf').focus();
                    return false;
                }

//                telefone
                if (document.form.telefone.value == "") {
                    alert("Digite o seu telefone");
                    $('#telefone').focus();
                    return false;
                }
                if (document.form.datanascimento.value == "") {
                    alert("Digite uma data valida");
                    $('#datanascimento').focus();
                    return false;
                }

//Endereço
//                cep
                if (document.form.cep.value == "") {
                    alert("Digite o seu cep");
                    $('#cep').focus();
                    return false;
                }

//                rua
                if (document.form.rua.value == "") {
                    alert("Digite a sua rua");
                    $('#rua').focus();
                    return false;
                }

//                numero
                if (document.form.numero.value == "") {
                    alert("Digite o numero");
                    $('#numero').focus();
                    return false;
                }

//                bairro
                if (document.form.bairro.value == "") {
                    alert("Digite o seu bairro");
                    $('#bairro').focus();
                    return false;
                }

//                cidade
                if (document.form.cidade.value == "") {
                    alert("Digite o seu cep");
                    $('#cidade').focus();
                    return false;
                }

//                UF
                if (document.form.estado.value == "") {
                    alert("Digite o seu Estado");
                    $('#estado').focus();
                    return false;
                }
                if (document.form.sexo.value == "") {
                    alert("Digite o sexo");
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
                $("#telefone").mask("(99) 9999-9999");

            });
        </script>
    </head>
    <body>
        <?php
        $id = $_GET['idCliente'];
        require_once 'Controle/DAO/Conexao2.php';

        $query = mysql_query("SELECT * FROM cliente WHERE idCliente = " . $id);
        while ($resultado = mysql_fetch_assoc($query)) {
            ?>
            <?php
            $reslutid = $resultado['idCliente'];
            $nome = $resultado['nome'];
            $cpf = $resultado['cpf'];
            $email = $resultado['email'];
            $senha = $resultado['senha'];
            $datanascimento = $resultado['datanascimento'];
            $sexo = $resultado['sexo'];
            $telefone = $resultado['telefone'];
            $cep = $resultado['cep'];
            $rua = $resultado['rua'];
            $numero = $resultado['numero'];
            $bairro = $resultado['bairro'];
            $cidade = $resultado['cidade'];
            $estado = $resultado['estado'];
            $imagem = $resultado['foto'];
            $estatus = $resultado['estatus'];
            ?>



            <div id="owl-demo" class="owl-carousel owl-theme" style="height: 750px;overflow: auto;width: 102%;margin: 0 auto;margin-top: 10px;">
                <div id="corpoform" style="height:930px;">
                    <form id="form" 
                          enctype="multipart/form-data"
                          name="form" 
                          action="Controle/controladorCliente.php?ACAO=alterar" 
                          method="post"
                          onSubmit="return ValidaFormulario();">

                        <div id="formedit" style="position: relative;height: 930px">
                            <p style="margin: 0;height: 50px;line-height: 50px;width: 90%;margin: 0 auto;font-size: 30px;text-transform: uppercase;color: #333;font-weight: bolder"><?php echo $nome ?></p>
                            <div id="Menugerenciarfuncionario">
                                <ul style="box-shadow:none">
                                    <a href="Restrito.php?PAGINA=listarCliente">
                                        <li style="opacity: .3">
                                            <img style="width: 15%;height: auto;margin-top: 3px" src="Img/Funcionarios2.png">
                                            <p>Clientes<p>
                                        </li>
                                    </a>
                                    <?php if ($estatus == "Ativo") { ?>
                                        <li>
                                            <img style="width: 15%;height: auto;margin-top: 3px" src="Img/UsuarioAtivo2.png">
                                            <p>Cliente ativo<p>
                                        </li>
                                        <a onclick="return confirm('Tem certeza de que deseja desativa-lo?');" href="Restrito.php?PAGINA=desativarCliente&&idCliente=<?php echo $id; ?>">
                                            <li style="opacity: 0.3"> 
                                                <img style="width: 15%;height: auto;margin-top: 3px;" src="Img/Usuarioremovido2.png">
                                                <p>Desativar cliente<p>
                                            </li>
                                        </a>
                                    <?php } ?>
                                    <?php if ($estatus != "Ativo") { ?>
                                        <a href="Restrito.php?PAGINA=AtivarCliente&&idCliente=<?php echo $id; ?>">
                                            <li style="opacity: 0.3">
                                                <img style="width: 15%;height: auto;margin-top: 3px" src="Img/UsuarioAtivo2.png">
                                                <p>Ativar cliente<p>
                                            </li>
                                        </a>
                                        <li> 
                                            <img style="width: 15%;height: auto;margin-top: 3px;" src="Img/Usuarioremovido2.png">
                                            <p>Cliente desativado<p>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <div style="float: left;height: 400px;margin-top: 30px;position: relative;background: #f5f5f5">
                                <div style="float: left;text-align: center;width: 250px; height: 250px;overflow: hidden;border-radius: 50%;margin-top: 50px;position: absolute;z-index: 4;background: transparent"><img id="blah" src="#" alt="" style="height: 105%;width: 105%;margin: 0 auto"/></div>
                                <div style="float: left;text-align: center;width: 250px; height: 250px;overflow: hidden;border-radius: 50%;margin-top: 50px;"><?php echo '<img src="Img/ImagensBanco/ImagensClientes/' . $imagem . '" style="width: auto;height: 100%;margin: 0px"/>' ?></div>

                                <label for="alterarimagem" class="labelinputfile" style="text-align: center;z-index: 4;position: absolute;bottom: 0;height: 30px;line-height: 30px;width: 248px;left: 0;padding: 0;background: white;border: 1px solid #d9d9d9;color: #555 !important">Trocar imagem</label>                  
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
                            <input id="idCliente" 
                                   name="idCliente"
                                   value="<?php echo $reslutid; ?>"
                                   type="hidden">
                            <div class="infousuarios" style="margin-top: 30px;">
                                <label>Email:</label>
                                <input type="text" 
                                       name="email" 
                                       value="<?php echo $email; ?>"
                                       id="email">
                            </div>  
                            <div class="infousuarios">
                                <label>Senha:</label>
                                <input type="text" 
                                       name="senha"
                                       value="<?php echo $senha; ?>"
                                       id="senha" 
                                       placeholder="">
                            </div>  
                            <div class="infousuarios">
                                <label for="comfirmarsenha">Comfirmar Senha:</label>            
                                <input class="comfirmarsenha" name="comfirmarsenha" id="comfirmarsenha"
                                       type="password"
                                       value="">
                            </div>  
                            <div class="infousuarios">
                                <label>Nome:</label>
                                <input type="text"
                                       name="nome"
                                       value="<?php echo $nome; ?>"
                                       id="nome" >
                            </div>  
                            <div class="infousuarios">
                                <label>Cpf:</label>
                                <input type="text"
                                       name="cpf"
                                       value="<?php echo $cpf; ?>"
                                       id="cpf">
                            </div>  
                            <div class="infousuarios">
                                <label>Telefone:</label>
                                <input type="text"
                                       name="telefone"
                                       value="<?php echo $telefone; ?>"
                                       id="telefone">
                            </div>  
                            <div class="infousuarios">
                                <label for="datanascimento">Data de Nascimento:</label>            
                                <input class="datanascimento" name="datanascimento" id="datanascimento"
                                       type="date"
                                       value="<?php echo $datanascimento; ?>">
                            </div>  

                            <input class="imagem" name="imagem" id="imagem"
                                   type="hidden"
                                   value="<?php echo $imagem ?>"> 

                            <div class="infousuarios">
                                <label>Cep </label>
                                <input type="text" 
                                       name="cep"
                                       value="<?php echo $cep; ?>"
                                       id="cep">
                            </div>  
                            <div class="infousuarios">
                                <label>Rua</label>
                                <input type="text" 
                                       name="rua"
                                       value="<?php echo $rua; ?>"
                                       id="rua">
                            </div>  
                            <div class="infousuarios">
                                <label>Número:</label>
                                <input type="text"
                                       name="numero"
                                       value="<?php echo $numero; ?>"
                                       id="numero" >
                            </div>  
                            <div class="infousuarios">
                                <label>Bairro:</label>
                                <input type="text"
                                       name="bairro"
                                       value="<?php echo $bairro; ?>"
                                       id="bairro">
                            </div>  
                            <div class="infousuarios">
                                <label>Cidade:</label>
                                <input type="text"
                                       name="cidade"
                                       value="<?php echo $cidade; ?>"
                                       id="cidade">
                            </div>  
                            <div class="infousuarios">
                                <label>Estado:</label>
                                <input type="text"
                                       name="estado"
                                       value="<?php echo $estado; ?>"
                                       id="estado">
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
                                <div style="float: left;width: 250px;height: 50px;line-height: 50px;font-size: 20px;margin-top: -250px;background: #3ece6a;color: white">Ativo</div>
                            <?php } ?>
                            <?php if ($estatus != "Ativo") { ?>
                                <div style="float: left;width: 250px;height: 50px;line-height: 50px;font-size: 20px;margin-top: -250px;background: #ce3f3f;color: white">Desativo</div>

                            <?php } ?>
                        </div>                  
                    </form>
                </div>

            <?php } ?>

            <div style="width: 100%;height: 930px;overflow: auto;border-radius: 3px;position: relative;padding-top: 120px;margin: 0 auto">

                <?php
                mysql_connect("localhost", "root", "123");
                mysql_select_db("bd_drogaria");
                mysql_query("SET NAMES 'utf8'");
                $query = mysql_query("SELECT * FROM codvenda WHERE idCliente = '$id' order by cod desc");
                $contador = 0;
                $contadortotal = 0;
                while ($resultado = mysql_fetch_assoc($query)) {
                    $contador++;
                    $contadortotal += $resultado['total'];
                    ?>
                    <div style="width: 700px;margin: 0 auto;margin-bottom: 20px;background: white;padding-top: 5px;box-shadow: 0 0 5px rgba(0,0,0, .2)">
                        <p style="font-size: 12px;text-align: right;width: 90%;margin: 0 auto;margin-bottom: 5px;color: #aaa"><?php echo $resultado['datacompra'] ?> às <?php echo $resultado['horacompra'] ?></p> 
                        <table>
                            <tr style="text-align: center;height: 40px;font-weight: bolder;color: #555">
                                <td style="width: 300px" >Produto</td>
                                <td style="width: 100px" >Quantidade</td>
                                <td style="width: 150px">Preço</td>
                                <td style="width: 150px">SubTotal</td>
                            </tr>

                            <?php
                            $COD = $resultado['codVenda'];
                            $query1 = mysql_query("SELECT * FROM venda WHERE codVenda = '$COD'");
                            while ($resultadoV = mysql_fetch_assoc($query1)) {
                                ?>
                                <tr style="text-align: center;height: 40px;color: #aaa;font-size: 15px">
                                    <td style="width: 300px;overflow: hidden" ><?php echo $resultadoV['nome']; ?></td>
                                    <td style="width: 100px" ><?php echo $resultadoV['quantidade']; ?></td>
                                    <td style="width: 150px" ><?php echo 'R$' . $resultadoV['valor'] = number_format($resultadoV['valor'], 2, ',', '.'); ?></td>
                                    <td style="width: 150px" ><?php echo 'R$' . $resultadoV['subtotal'] = number_format($resultadoV['subtotal'], 2, ',', '.'); ?></td>
                                </tr>
                            <?php } ?>
                            <tr style="text-align: center;font-weight: bolder;height: 40px;color: #ce3f3f">
                                <td colspan="3">Total da compra:</td>
                                <td colspan="1"><?php
                                    $total = number_format($resultado['total'], 2, ',', '.');
                                    echo "R$" . $total
                                    ?></td>

                            </tr>  

                        </table>
                    </div>
                <?php }
                ?>
                <div style="width: 700px;margin: 0 auto;height: 100px;position: absolute;top: 0;left: 50%;margin-left: -350px;background: white;box-shadow: 0 0 5px rgba(0,0,0, .2)">
                    <div style="width: 200px;display: inline-block;height: 100px;overflow: hidden">
                        <p style="font-size: 17px;color: #333;">Compras realizadas:</p> 
                        <div style="height: 30px;margin: 0 auto;line-height: 30px;font-size: 18px;font-weight: bolder;color: #333"><?php echo $contador; ?></div>
                    </div>
                    <div style="width: 200px;display: inline-block;height: 100px;overflow: hidden">
                        <p style="font-size: 17px;color: #333;">Total das compras:</p> 
                        <div style="height: 30px;margin: 0 auto;line-height: 30px;font-size: 15px;font-weight: bolder;color: #ce3f3f;"><?php
                            $contadortotalform = number_format($contadortotal, 2, ',', '.');
                            echo "R$" . $contadortotalform;
                            ?></div>
                    </div>
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
