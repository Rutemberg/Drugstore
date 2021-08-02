<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="Estilos/Hom3Style.css">
        <link rel="stylesheet" type="text/css" href="Estilos/InfoCliente.css">
        <link href="js/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
        <link href="js/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/owl-carousel/owl.theme.css" rel="stylesheet">

        <!--        Bibliotecas-->
        <script src="js/jquery-2.2.2.min.js"></script>
        <script src="js/jquery-ui-1.11.4/jquery-ui.js"></script>
        <script src="js/velocity.min.js"></script>
        <script src="js/velocity.ui.js"></script>
        <script type='text/javascript' src='cep.js'></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/jquery.maskedinput.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#clickserach").click(function () {
                    $('#serachprod').velocity({width: "400"}, {duration: 500});
                    $('#serachprod').velocity({backgroundColor: "#4d4d4d"}, {duration: 500});
                    $('#Procurando_produtos').velocity({height: "450"}, {duration: 500});
                    $('#backsearchprodutos').velocity('transition.fadeIn', 300);
                });
                $("#backsearchprodutos").click(function () {
                    $('#serachprod').velocity({width: "45"}, {duration: 500});
                    $('#serachprod').velocity({backgroundColor: "#333"}, {duration: 500});
                    $('#Procurando_produtos').velocity({height: "0"}, {duration: 500});
                    $('#backsearchprodutos').velocity('transition.fadeOut', 300);
                });
            });
        </script>

        <!--        Imagem preview-->
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
        <script src="scriptparaprodutos.js"></script>
        <script>
            function pesquisaproduto(valor)
            {
                //FUNÇÃO QUE MONTA A URL E CHAMA A FUNÇÃO AJAX
                url = "Busca_ClienteProduto.php?valor=" + valor;
                ajax(url);
            }
        </script>
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
                $('#backformentrarmensage').velocity('transition.fadeIn', 300);
                $('#msglogin').delay(200).velocity('transition.shrinkIn', 300);
                $('#backformentrarmensage').click(function () {
                    $('#backformentrarmensage').velocity('transition.fadeOut', 300);
                    $('#msglogin').velocity('transition.shrinkOut', 300);

                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#Entregamin").click(function () {
                    $('#Entregamin').velocity('transition.slideLeftOut', 300);
                    $('#Entrega').delay(300).velocity('transition.slideUpIn', 300);

                });
                $("#fechartregareal").click(function () {
                    $('#Entrega').velocity('transition.slideDownOut', 300);
                    $('#Entregamin').delay(300).velocity('transition.slideLeftIn', 300);
                });
            });
        </script> 
        <script type="text/javascript">
            $(document).ready(function () {
                $('#Entregamin').delay(1000).velocity('transition.slideLeftIn', 300);
            });
        </script> 
        <script type="text/javascript">
            var tempo = window.setInterval(carrega, 5000);
            function carrega()
            {
                $('#Desativo').load('Desativado.php');
                $('#mensagemeentregarealmin').load('Entregaemtemporealmin.php');
                $('#mensagemeentregareal').load('Entregaemtemporeal.php');
            }

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


    <body style="background: #f6f6f6">
        <!--        Menu top Usuario-->
        <div id="menutopfix_usuario">
            <div id="menu_usuario">
                <div id="logo">
                    <a href="HomeUser.php"><img src="Img/LOGO4.png"></a>         
                </div>

                <div  id="Clientelogado">
                    <ul>
                        <?php $nomeClienteLogado = $_SESSION['NomeClienteLogado']; ?>
                        <li><?php echo '<a href = "Controle/Logout.php">Sair</a>'; ?></li>
                        <li id="clickserach" style="margin-right: 15px;position: relative;z-index: 13"><input id="serachprod" onKeyPress="pesquisaproduto(this.value)" type="text" style="padding: 0;padding-left: 45px;color: white;height: 45px;width: 45px;margin: 0;background-image: url('Img/iconsearchcliente.png');background-position: left center;background-size: auto 25px;background-repeat: no-repeat;border: none"></li>
                        <a href="ProdutosCarrinho.php"><li style="margin-right: 25px;"><img src="Img/cesta.png" style="height: 20px;width: auto;margin-top: 12.5px"></li></a>
                        <li style="margin-right: 40px;padding: 0 10px;"><?php echo $nomeClienteLogado; ?></li>
                        <li style="margin-right: 10px;width: 30px;border-radius: 50%;overflow: hidden;text-align: center;height: 30px;margin-top: 7.5px;background: white">
                            <?php
                            $id = $_SESSION['idClienteLogado'];
                            require_once 'Controle/DAO/Conexao2.php';
                            $query = mysql_query("SELECT foto FROM cliente WHERE idCliente = " . $id);
                            while ($resultado = mysql_fetch_assoc($query)) {
                                $imagem = $resultado['foto'];
                            }
                            ?>
                            <?php echo '<img src="Img/ImagensBanco/ImagensClientes/' . $imagem . '" style="width: auto;height: 100%;"/>' ?>
                        </li>
                    </ul> 
                </div>
            </div>
        </div>

        <div id="Procurando_produtos" class="Procurando_produtos">
            <?php if (!empty($_GET["valor"]) == null) { ?>
                <div style="width: 550px;height: 130px;margin: 0 auto;margin-top: 50px;font-size: 25px;color: #ccc">Procure por produtos pelo nome ou categoria!</div>   
            <?php } ?>
        </div>

        <div id="backsearchprodutos" style="   
             position: absolute;
             width: 100%;
             height: 100%;
             z-index: 8;
             top: 45px;
             margin: 0;
             padding: 0;
             left: 0;
             background-color: rgba(0, 0, 0, 0.1);
             display: none;">
        </div>
        <!--        Menu-->

        <div id="menu">
            <ul>
                <li><a href="CategoriaProduto.php?Categoria=Medicamento">Medicamentos</a>
                    <ul></ul>
                </li>
                <li><a href="CategoriaProduto.php?Categoria=Higiene">Higiene</a>
                    <ul></ul>
                </li>
                <li><a href="CategoriaProduto.php?Categoria=Estética">Estética</a>
                    <ul></ul>
                </li>
                <li><a href="CategoriaProduto.php?Categoria=Perfumaria">Perfumaria</a>
                    <ul></ul>
                </li>
                <li><a href="CategoriaProduto.php?Categoria=Maquiagem">Maquiagem</a>
                    <ul></ul>
                </li>
                <li><a href="CategoriaProduto.php?Categoria=Generico">Genéricos</a>
                    <ul></ul>
                </li>
                <li><a href="CategoriaProduto.php?Categoria=Acessorio">Acessórios</a>
                    <ul></ul>
                </li>
                <li><a href="CategoriaProduto.php?Categoria=Nutrição">Nutrição</a>
                    <ul></ul>
                </li>
                <li><a href="CategoriaProduto.php?Categoria=Dermo">Dermo</a>
                    <ul></ul>
                </li>
            </ul>
        </div>


        <?php
        $id = $_SESSION['idClienteLogado'];
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



            <p style="margin: 0 auto;height: 80px;line-height:80px;width: 1000px;margin-top: 10px;font-size: 30px;text-transform: uppercase;color: #333;font-weight: bolder"><?php echo $nome ?></p>
            <div id="owl-demo" class="owl-carousel owl-theme">
                <div id="corpoform" style="height:850px;width: 1000px;margin: 0 auto;" class="item">
                    <form id="form" 
                          enctype="multipart/form-data"
                          name="form" 
                          action="Controle/controladorCliente.php?ACAO=clientealterar" 
                          method="post"
                          onSubmit="return ValidaFormulario();"
                          style="width: 800px;margin: 0 auto;padding-top: 5px;padding-bottom: 5px">

                        <div id="formedit" style="position: relative;height:850px;background: white;box-shadow: 0 0 10px rgba(0,0,0, .2);">

                            <div style="float: left;height: 400px;margin-top: 30px;position: relative;">
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
                            <div style="float: left;width: 500px;">
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
                                    <label for="sexo">Sexo:</label>  <select id="sexo" name="sexo">
                                        <option value="<?php echo $sexo ?>" selected ><?php echo $sexo ?>
                                        <option name="Masculino"> Masculino
                                        <option name="Feminino"> Feminino
                                    </select>
                                </div>


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

                            </div>

                            <input class="submit" name="submit"
                                   type="submit"
                                   value="Atualizar" style="position: absolute;bottom: 0px; height: 50px;line-height: 50px;margin-right: -360px;right: 50%;width: 720px;padding: 0;font-size: 20px;font-weight: bolder;background: #333;color: white">

                        </div>                  
                    </form>
                </div>
                <div style="width: 102%;margin: 0 auto;height: 850px;overflow: auto;padding-top: 5px;padding-bottom: 5px">
                    <div style="width: 700px;border-radius: 3px;position: relative;padding-top: 120px;margin: 0 auto;" class="item">

                        <?php
                        $idcliente = $_SESSION['idClienteLogado'];
                        require_once 'Controle/DAO/Conexao2.php';
                        $query = mysql_query("SELECT * FROM codvenda WHERE idCliente = '$idcliente' order by cod desc");
                        $contador = 0;
                        $contadortotal = 0;
                        while ($resultado = mysql_fetch_assoc($query)) {
                            $contador++;
                            $contadortotal += $resultado['total'];
                            ?>
                            <div style="width: 600px;margin: 0 auto;margin-bottom: 20px;background: white;padding-top: 5px;box-shadow: 0 0 10px rgba(0,0,0, .2)">
                                <p style="font-size: 12px;text-align: right;width: 90%;margin: 0 auto;margin-bottom: 5px;color: #aaa"><?php echo $resultado['datacompra'] ?> às <?php echo $resultado['horacompra'] ?></p> 
                                <table>
                                    <tr style="text-align: center;height: 40px;font-weight: bolder;color: #555">
                                        <td style="width: 240px" >Produto</td>
                                        <td style="width: 120px" >Quantidade</td>
                                        <td style="width: 120px">Preço</td>
                                        <td style="width: 120px">SubTotal</td>
                                    </tr>

                                    <?php
                                    $COD = $resultado['codVenda'];
                                    $query1 = mysql_query("SELECT * FROM venda WHERE codVenda = '$COD'");
                                    while ($resultadoV = mysql_fetch_assoc($query1)) {
                                        ?>
                                        <tr style="text-align: center;height: 40px;color: #aaa;font-size: 15px">
                                            <td style="width: 150px;overflow: hidden" ><?php echo $resultadoV['nome']; ?></td>
                                            <td style="width: 100px" ><?php echo $resultadoV['quantidade']; ?></td>
                                            <td style="width: 100px" ><?php
                                                echo 'R$' . $resultadoV['valor'] = number_format($resultadoV['valor'], 2, ',', '.');
                                                ;
                                                ?></td>
                                            <td style="width: 100px" ><?php echo 'R$' . $resultadoV['subtotal'] = number_format($resultadoV['subtotal'], 2, ',', '.'); ?></td>
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
                        <div style="width: 600px;margin: 0 auto;height: 100px;position: absolute;top: 0;left: 50%;margin-left: -300px;background: white;box-shadow: 0 0 5px rgba(0,0,0, .2)">
                            <div style="width: 200px;display: inline-block;height: 100px;overflow: hidden">
                                <p style="font-size: 17px;color: #333;">Compras realizadas:</p> 
                                <div style="width: 80px;height: 50px;margin: 0 auto;line-height: 50px;font-size: 18px;font-weight: bolder;color: #333"><?php echo $contador; ?></div>
                            </div>
                            <div style="width: 200px;display: inline-block;height: 100px;overflow: hidden">
                                <p style="font-size: 17px;color: #333;">Total das compras:</p> 
                                <div style="width: 80px;height:50px;margin: 0 auto;line-height: 50px;font-size: 15px;font-weight: bolder;color: #ce3f3f"><?php
                                    $contadortotalform = number_format($contadortotal, 2, ',', '.');
                                    echo "R$" . $contadortotalform;
                                    ?></div>
                            </div>
                        </div>
                    </div>



                <?php } ?>

            </div>
        </div>
        <?php
        if (isset($_SESSION['MENSAGEMALTERAR'])) {
            if (($_SESSION['MENSAGEMALTERAR']) == 1) {
                ?>
                <div id="backformentrarmensage">
                </div>
                <div id="msglogin" style="display: none;width: 500px;height: 100px;line-height: 100px;position: absolute;top: 50%;left: 50%;margin-top: -50px;margin-left: -250px;z-index: 15;background: white;border-radius: 3px">
                    <p style="margin:0;padding: 0;font-size: 18px;color: #333;">Alterações realizadas com sucesso!</p>
                </div>

                <?php $_SESSION['MENSAGEMALTERAR'] += 1; ?> 
                <?php
            }
        }
        if (isset($_SESSION['MENSAGEMALTERAR'])) {
            if ($_SESSION['MENSAGEMALTERAR'] == 2) {
                unset($_SESSION['MENSAGEMALTERAR']);
            }
        }
        ?> 
        <div id="Entregamin" style="display: none;position: fixed;bottom: 5px;left: 0;z-index: 15">
            <div id="mensagemeentregarealmin"> 
                <?php
                require_once 'Entregaemtemporealmin.php';
                ?> 
            </div>
        </div>
        <div id="Entrega" style="max-height: 105px;background: white;overflow: hidden;display: none;z-index: 20;position: fixed;bottom: 0;z-index: 15;width: 100%;box-shadow: 0 0 10px rgba(0,0,0, .2)">
            <div id="mensagemeentregareal">
                <?php
                require_once 'Entregaemtemporeal.php';
                ?>
            </div>
            <input id="fechartregareal" type="button" value="X" style="position: absolute;right: 0;top: 0;margin: 10px 10px;z-index: 20;color: #333;padding: 5px 10px;background: white;border: none">

        </div>
        <?php if ($_SESSION['ClienteLogado'] != null) { ?> 
            <div id="Desativo">
                <?php
                include 'Desativado.php';
                ;
                ?>
            </div>
        <?php } ?> 
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
