<?php
session_start();
if (isset($_SESSION['FuncionarioLogado']) && ($_SESSION['FuncionarioLogado'] == 1)) {
    header('Location:Restrito.php');
}
if (isset($_SESSION['ClienteLogado']) && ($_SESSION['ClienteLogado'] == 1)) {
    header('Location:HomeUser.php');
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="Estilos/Hom3Style.css">
        <link href="js/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
        <link href="js/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/owl-carousel/owl.theme.css" rel="stylesheet">

        <link rel="shortcut icon" href="Img/LOGO.ico" type="image/x-icon">
        <link rel="icon" href="Img/LOGO.ico" type="image/x-icon">
        
        <title>Drugstore</title>
        <!--        Bibliotecas-->
        <script src="js/jquery-2.2.2.min.js"></script>
        <script src="js/jquery-ui-1.11.4/jquery-ui.js"></script>
        <script src="js/velocity.min.js"></script>
        <script src="js/velocity.ui.js"></script>
        <script type='text/javascript' src='cep.js'></script>
        <script src="js/jquery.maskedinput.js"></script>
        <script src="js/jquery.validate.js"></script>

        <!--    chamada cliente-->
        <script type="text/javascript">
            setTimeout(function () {
                $('#olavisitante').velocity("transition.slideLeftIn", 1000);
                $('#naoestacadastrado').delay(1000).velocity("transition.slideLeftIn", 1000);
                $('#naoestacadastrado').delay(1000).velocity("transition.slideLeftOut", 500);
                $('#entaofaca').delay(4000).velocity("transition.slideLeftIn", 1000);
                $('#chamadacadastro').delay(6000).velocity({left: "0"}, {duration: 1000});
                $('#botaocadastro').delay(7500).velocity('transition.shrinkIn', 500);
            }, 1000);
        </script> 

        <script type="text/javascript">
            $(document).ready(function () {
                $("#botaocadastro").click(function () {
                    $('#botaocadastro').velocity('transition.shrinkOut', 300);
                    $('#chamadacadastro p').velocity("transition.slideRightOut", {stagger: 100});
                    $('#chamadacadastro').delay(1000).velocity("fadeOut");
                    $('#controlemenuaccess').delay(1000).velocity({height: "800px"}, {duration: 500});
                    $('#painelesquerdo p').delay(1500).velocity("transition.slideRightIn", {stagger: 100});
                    $('#InfoLogin').delay(2000).velocity("transition.slideRightIn", 100);

                });
                $("#botaoproximo").click(function () {
                    $('#InfoLogin').velocity("transition.slideLeftOut", 100);
                    $('#infoconta').delay(200).velocity("transition.slideRightIn", 100);

                });
                $("#botaoanterior").click(function () {
                    $('#infoconta').velocity("transition.slideRightOut", 100);
                    $('#InfoLogin').delay(200).velocity("transition.slideLeftIn", 100);

                });
                $("#botaoproximo2").click(function () {
                    $('#infoconta').velocity("transition.slideLeftOut", 100);
                    $('#infoconta2').delay(200).velocity("transition.slideRightIn", 100);

                });
                $("#botaoanterior2").click(function () {
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#infoconta').delay(200).velocity("transition.slideLeftIn", 100);

                });
            });
        </script> 

        <script type="text/javascript">
// Validação
            function ValidaFormulario() {



                // email
                if (document.formCliente.email.value == "") {
                    alert("Digite o seu email");
                    $('#infoconta').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#InfoLogin').velocity("transition.slideLeftIn", 100).delay(200);
                    $('#email').velocity({borderColor: "#cc0000"}, 300);
                    $('#email').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }



                // senha
                if (document.formCliente.senha.value == "") {
                    alert("Digite o sua senha");
                    $('#infoconta').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#InfoLogin').velocity("transition.slideLeftIn", 100);
                    $('#senha').velocity({borderColor: "#cc0000"}, 300);
                    $('#senha').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
//                confirmar senha
                if (document.formCliente.comfirmarsenha.value == "") {
                    alert("Comfirme sua senha!");
                    $('#infoconta').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#InfoLogin').velocity("transition.slideLeftIn", 100);
                    $('#comfirmarsenha').velocity({borderColor: "#cc0000"}, 300);
                    $('#comfirmarsenha').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }

//                nome
                if (document.formCliente.nome.value == "") {
                    alert("Digite o seu nome");
                    $('#InfoLogin').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#infoconta').delay(100).velocity("transition.slideLeftIn", 100);
                    $('#nome').velocity({borderColor: "#cc0000"}, 300);
                    $('#nome').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }

//                cpf
                if (document.formCliente.cpf.value == "") {
                    alert("Digite o seu cpf");
                    $('#InfoLogin').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#infoconta').delay(100).velocity("transition.slideLeftIn", 100);
                    $('#cpf').velocity({borderColor: "#cc0000"}, 300);
                    $('#cpf').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }

//                telefone
                if (document.formCliente.telefone.value == "") {
                    alert("Digite o seu telefone");
                    $('#InfoLogin').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#infoconta').delay(100).velocity("transition.slideLeftIn", 100);
                    $('#telefone').velocity({borderColor: "#cc0000"}, 300);
                    $('#telefone').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
//                dia
                if (document.formCliente.dia.value == "") {
                    alert("Digite o dia");
                    $('#InfoLogin').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#infoconta').delay(100).velocity("transition.slideLeftIn", 100);
                    $('#dia').velocity({borderColor: "#cc0000"}, 300);
                    $('#dia').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
//                mes
                if (document.formCliente.mes.value == "") {
                    alert("Digite o mes");
                    $('#InfoLogin').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#infoconta').delay(100).velocity("transition.slideLeftIn", 100);
                    $('#mes').velocity({borderColor: "#cc0000"}, 300);
                    $('#mes').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
//                ano
                if (document.formCliente.ano.value == "") {
                    alert("Digite o ano");
                    $('#InfoLogin').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#infoconta').delay(100).velocity("transition.slideLeftIn", 100);
                    $('#ano').velocity({borderColor: "#cc0000"}, 300);
                    $('#ano').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
//                sexo
                if (document.formCliente.sexo.value == "") {
                    alert("Digite o seu sexo");
                    $('#InfoLogin').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#infoconta').delay(100).velocity("transition.slideLeftIn", 100);
                    $('#sexo').velocity({borderColor: "#cc0000"}, 300);
                    $('#sexo').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }

//Endereço
//                cep
                if (document.formCliente.cep.value == "") {
                    alert("Digite o seu cep");
                    $('#InfoLogin').velocity("transition.slideLeftOut", 100);
                    $('#infoconta').velocity("transition.slideLeftOut", 100);
                    $('#infoconta2').delay(100).velocity("transition.slideRightIn", 100);
                    $('#cep').velocity({borderColor: "#cc0000"}, 300);
                    $('#cep').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }

//                rua
                if (document.formCliente.rua.value == "") {
                    alert("Digite a sua rua");
                    $('#InfoLogin').velocity("transition.slideLeftOut", 100);
                    $('#infoconta').velocity("transition.slideLeftOut", 100);
                    $('#infoconta2').delay(100).velocity("transition.slideRightIn", 100);
                    $('#rua').velocity({borderColor: "#cc0000"}, 300);
                    $('#rua').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }

//                numero
                if (document.formCliente.numero.value == "") {
                    alert("Digite o numero");
                    $('#InfoLogin').velocity("transition.slideLeftOut", 100);
                    $('#infoconta').velocity("transition.slideLeftOut", 100);
                    $('#infoconta2').delay(100).velocity("transition.slideRightIn", 100);
                    $('#numero').velocity({borderColor: "#cc0000"}, 300);
                    $('#numero').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }

//                bairro
                if (document.formCliente.bairro.value == "") {
                    alert("Digite o seu bairro");
                    $('#InfoLogin').velocity("transition.slideLeftOut", 100);
                    $('#infoconta').velocity("transition.slideLeftOut", 100);
                    $('#infoconta2').delay(100).velocity("transition.slideRightIn", 100);
                    $('#bairro').velocity({borderColor: "#cc0000"}, 300);
                    $('#bairro').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }

//                cidade
                if (document.formCliente.cidade.value == "") {
                    alert("Digite o seu cep");
                    $('#InfoLogin').velocity("transition.slideLeftOut", 100);
                    $('#infoconta').velocity("transition.slideLeftOut", 100);
                    $('#infoconta2').delay(100).velocity("transition.slideRightIn", 100);
                    $('#cidade').velocity({borderColor: "#cc0000"}, 300);
                    $('#cidade').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }

//                UF
                if (document.formCliente.estado.value == "") {
                    alert("Digite o seu Estado");
                    $('#InfoLogin').velocity("transition.slideLeftOut", 100);
                    $('#infoconta').velocity("transition.slideLeftOut", 100);
                    $('#infoconta2').delay(100).velocity("transition.slideRightIn", 100);
                    $('#estado').velocity({borderColor: "#cc0000"}, 300);
                    $('#estado').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
                return true;
            }
        </script>
        <!--        LOgin-->
        <script type="text/javascript">
            $(document).ready(function () {
                $("#botaoproximologin").click(function () {
                    $('#loginum').velocity('transition.slideLeftOut', 100);
                    $('#loginum2').delay(100).velocity("transition.slideRightIn", 100);

                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#botaoentrar").click(function () {
                    $('#backformentrar').velocity('transition.fadeIn', 300);
                    $('#formentrar').velocity("transition.expandIn", 100);

                });
                $("#backformentrar").click(function () {
                    $('#backformentrar').velocity('transition.fadeOut', 300);
                    $('#formentrar').velocity("transition.expandOut", 100);

                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#clickserach").click(function () {
                    $('#serachprod').velocity({width: "400"}, {duration: 500});
                    $('#serachprod').velocity({backgroundColor: "#4d4d4d"}, {duration: 500});

                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#mensagem1').velocity({width: "250"}, {duration: 500});
                $('#mensagem2').velocity({width: "600"}, {duration: 500});

            });
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

            function Validalogin() {
                // email
                if (document.formLogin.emailLogin.value == "") {
                    $('#loginum2').velocity("transition.slideRightOut", 100);
                    $('#loginum').delay(100).velocity("transition.slideLeftIn", 100);
                    $('#emailLogin').velocity({borderColor: "#cc0000"}, 300);
                    $('#emailLogin').delay(600).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
                // senha
                if (document.formLogin.senhaLogin.value == "") {
                    $('#loginum').velocity("transition.slideLeftOut", 100);
                    $('#loginum2').delay(100).velocity("transition.slideRightIn", 100);
                    $('#senhaLogin').velocity({borderColor: "#cc0000"}, 300);
                    $('#senhaLogin').delay(600).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
                return true;
            }
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

                $("#foto").change(function () {
                    readURL(this);
                });

            });

        </script>
        <script src="script.js"></script>
        <script>
            function pesquisa(valor)
            {
                //FUNÇÃO QUE MONTA A URL E CHAMA A FUNÇÃO AJAX
                url = "Busca_imagem_email.php?valor=" + valor;
                ajax(url);
            }
            ;
        </script>
        <script>
            function pesquisaproduto(valor)
            {
                //FUNÇÃO QUE MONTA A URL E CHAMA A FUNÇÃO AJAX
                url = "Busca_ClienteProduto.php?valor=" + valor;
                ajax1(url);
            }
            ;
        </script>
        <script>
            function validaemail(valor)
            {
                //FUNÇÃO QUE MONTA A URL E CHAMA A FUNÇÃO AJAX
                url = "Validaemail.php?valor=" + valor;
                ajax3(url);
            }
            ;
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#clickserach").click(function () {
                    $('#serachprod').velocity({width: "400"}, {duration: 500});
                    $('#serachprod').velocity({backgroundColor: "#4d4d4d"}, {duration: 500});
                    $('.Procurando_produtos').velocity({height: "450"}, {duration: 500});
                    $('#backsearchprodutos').velocity('transition.fadeIn', 300);
                });
                $("#backsearchprodutos").click(function () {
                    $('#serachprod').velocity({width: "45"}, {duration: 500});
                    $('#serachprod').velocity({backgroundColor: "#333"}, {duration: 500});
                    $('.Procurando_produtos').velocity({height: "0"}, {duration: 500});
                    $('#backsearchprodutos').velocity('transition.fadeOut', 300);
                });
            });
        </script>
        <script type="text/javascript">
            var tempo = window.setInterval(carrega, 5000);
            function carrega()
            {
                $('#novosprodutos').load('NovosProdutos.php');
                $('#maisvendidos').load('MaisVendidos.php');
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
                $("#formcliente").validate({
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
        <script>
            $(document).ready(function () {

                var email = $("#email");
                email.blur(function () {
                    $.ajax({
                        url: 'ValidaEmailMin.php',
                        type: 'POST',
                        data: {"email": email.val()},
                        success: function (data) {
                            console.log(data);
                            data = $.parseJSON(data);
                            $("#resposta").text(data.email);
                        }
                    });
                });
            });
        </script>


    </head>


    <body>
        <!--        Menu top Usuario-->
        <div id="menutopfix_usuario">
            <div id="menu_usuario">
                <div id="logo">
                    <a href=""><img src="Img/LOGO4.png"></a>         
                </div>
                <?php if (isset($_GET["LOGINSUCESSO"]) == NULL) { ?>               
                    <ul>
                        <li id="clickserach" style="width: auto;margin-right: 15px;position: relative;z-index: 13"><input id="serachprod" onKeyPress="pesquisaproduto(this.value)" type="text" style="padding-left: 30px;outline: none;color: white;background: #333;height: 45px;width: 45px;margin: 0;background-image: url('Img/iconsearchcliente.png');background-position: left center;background-size: auto 25px;background-repeat: no-repeat;border: none"></li>

                        <li id="botaoentrar" style="float:right">Entrar
                        </li>
                    </ul>
                <?php } ?>

                <?php if (isset($_GET['MSG'])) { ?>
                    <?php
                    if (isset($_SESSION['mesagem'])) {
                        if ($_SESSION['mesagem'] <= 3) {
                            $mensagem = $_GET['MSG'];
                            echo '<div id="mensagem1" style="overflow: hidden;width: 0px;margin: 0;height: 45px;line-height: 45px;float: right;background: #4d4d4d;color: #ccc;padding-left: 10px;padding-right: 10px;margin-right: 20px">';
                            echo $mensagem;
                            echo '</div>';
                        } else {
                            echo '<div id="mensagem2" style="overflow: hidden;width: 0px;margin: 0;height: 45px;line-height: 45px;float: right;background: #4d4d4d;color: #ccc;padding-left: 10px;padding-right: 10px;margin-right: 20px">';
                            echo 'Ligue para um de nossos estabelecimentos e verifique se sua conta está ativa';
                            echo '</div>';
                        }
                    }
                    ?>

                <?php } ?>
            </div>
        </div>
    <!--        <input type="button" onclick="$('html,body').animate({scrollTop: $('#Informacoes').offset().top}, 2000);" value="Ir até informaçoes" ><br>-->
        <div class="Procurando_produtos" style="right: 120px" id="paginaprod">
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

        <?php if (isset($_SESSION['CADASTRADOCOMSUCESSO']) == NULL && isset($_GET["LOGINSUCESSO"]) == NULL) { ?>
            <!--       MenuAcess-->
            <div id="MenuaccessUser">
                <div>
                    <div id="controlemenuaccess">
                        <div id="chamadacadastro" style="width: 500px;height: 100px;margin-top: 10px;float: left;text-align: left;position: absolute;left: 30%;">
                            <p id="olavisitante" style="
                               display: none;
                               font-size: 45px;
                               margin: 0;
                               margin-top: 5px;
                               color: #555;
                               font-weight: bolder;
                               font-family: 'News Gothic Std Bold';
                               ">Olá visitante</p>
                            <p id="naoestacadastrado" style="
                               display: none;
                               font-size: 35px;
                               margin: 0;
                               margin-top: -10px;
                               color: #BBB;
                               font-weight: bolder;
                               ">Ainda não está cadastrado?</p>
                            <p id="entaofaca" style="
                               display: none;
                               font-size: 35px;
                               margin: 0;
                               margin-top: -10px;
                               color: #e22561;
                               font-weight: bolder;
                               ">Faça o seu cadastro</p>
                        </div>
                        <input type="button" id="botaocadastro" value="Clique aqui para se cadastrar">

                        <div id="painelesquerdo">
                            <br>
                            <p style="
                               display: none;
                               margin-top: 10px;
                               font-size: 40px;
                               margin: 0;
                               color: #555;
                               font-family: 'News Gothic Std Bold';
                               ">Faltam só alguns passos!</p>
                            <p style="
                               display: none;
                               font-size: 27px;
                               margin: 0;
                               margin-top: -10px;
                               color: #BBB;
                               ">Também detestamos formulários.</p>

                        </div>

                        <div id="paineldireito">
                            <div id="form">
    <!--                                <p style="text-align:left;font-size: 25px;color: #555;margin: 0;padding-top: 20px;margin-left: 30px;font-family: 'News Gothic Std Bold'">Cadastro</p> -->
    <!--                                <p style="text-align:left;font-size: 12px;color: #BBB;margin: 0;padding-bottom: 15px;margin-left: 30px;font-weight: bolder">Precisamos apenas de algumas informações</p> -->
                                <form id="formcliente" 
                                      name="formCliente" 
                                      action="Controle/controladorCliente.php?ACAO=cadastrar" 
                                      enctype="multipart/form-data"
                                      method="post"
                                      onSubmit="return ValidaFormulario();">
                                    <div id="InfoLogin">
                                        <p style="font-family: 'News Gothic Std Bold'">Este será o seu Login!</p>
                                        <input id="idCliente" 
                                               name="idCliente"
                                               type="hidden">
                                        <div ></div>
                                        <label id="resposta">Email:</label>
                                        <input type="text" 
                                               name="email" 
                                               id="email"
                                               onchange="validaemail(this.value);"
                                               >
                                        <label>Senha:</label>
                                        <input type="password" 
                                               name="senha" 
                                               id="senha">
                                        <label for="comfirmarsenha">Comfirmar Senha:</label>            
                                        <input class="comfirmarsenha" name="comfirmarsenha"
                                               type="password"
                                               id="comfirmarsenha"
                                               value="">
                                        <input type="button" id="botaoproximo" value="Próximo">

                                    </div>

                                    <div id="infoconta">
                                        <div style="width: 378px;float: left">
                                            <p style="font-family: 'News Gothic Std Bold';margin: 0;height: 45px;">Informações da conta</p>
                                            <div class="imagemconta">
                                                <div class="imagemprodutoview" style="width: 90%;height: 200px;border: 1px solid #d9d9d9;margin: 0 auto;margin-top: 10px;overflow: hidden"><img id="blah" src="" alt="" style="height: 100%;width: auto"/></div>
                                                <label for="foto" class="labelinputfile" style=" width: 70%;margin-left: 15%;line-height: 34px;text-align: center;z-index: 4;position: relative;">Escolher imagem</label>                  
                                                <input type="file" name="foto" id="foto" style="
                                                       width: 70%;
                                                       height: 32px;
                                                       position: relative;
                                                       z-index: 3;
                                                       margin-top: -35px
                                                       "
                                                       />
                                            </div>

                                        </div>
                                        <div style="width: 380px;float: right;margin-top: 45px">

                                            <label>Nome:</label>
                                            <input type="text"
                                                   name="nome"
                                                   id="nome" >
                                            <label>Cpf:</label>
                                            <input type="text"
                                                   name="cpf"
                                                   id="cpf">
                                            <label>Telefone:</label>
                                            <input type="text"
                                                   name="telefone"
                                                   id="telefone">

                                            <label style="width: 70%">Data de nascimento:</label>
                                            <select name="dia" id="dia" class="select" >
                                                <option value="">Dia</option>
                                                <?php
                                                for ($i = 1; $i <= 31; $i++) {
                                                    echo "
                            <option value='$i'>$i</option>";
                                                }
                                                ?>
                                            </select>

                                            <select name="mes" id="mes" class="select" >
                                                <option value="">Mês</option>
                                                <?php
                                                for ($i2 = 1; $i2 <= 12; $i2++) {
                                                    echo "
                            <option value='$i2'>$i2</option>";
                                                }
                                                ?>
                                            </select>

                                            <select name="ano" id="ano" class="select" >
                                                <option value="">Ano</option>
                                                <?php
                                                $year = date("Y");

                                                while ($year > 1899) {
                                                    echo '<option value="' . $year . '">' . $year . '</option>';
                                                    $year = $year - '1';
                                                }
                                                ?>
                                            </select >
                                            <br>
                                            <label style="margin-top:10px;width: 100%;">Sexo:</label>
                                            <input id="sexo" type="radio" name="sexo" value="Masculino"/>Masculino
                                            <input id="sexo" type="radio" name="sexo" value="Feminino"/>Feminino
                                            <br>
                                            <input type="button" id="botaoanterior" value="Anterior">
                                            <input type="button" id="botaoproximo2" value="Proximo">

                                        </div>
                                    </div>

                                    <div id="infoconta2">
                                        <label style="margin-top: 10px">Cep (Somente números):</label>
                                        <input type="text" 
                                               name="cep"
                                               id="cep">
                                        <label>Rua</label>
                                        <input type="text" 
                                               name="rua"
                                               id="rua">
                                        <label>Número:</label>
                                        <input type="text"
                                               name="numero"
                                               id="numero" >
                                        <label>Bairro:</label>
                                        <input type="text"
                                               name="bairro"
                                               id="bairro">
                                        <label>Cidade:</label>
                                        <input type="text"
                                               name="cidade"
                                               id="cidade">
                                        <label>Estado:</label>
                                        <input type="text"
                                               name="estado"
                                               id="estado">
                                        <input type="button" id="botaoanterior2" value="Anterior">
                                        <div id="respostaemail">

                                        </div>
                                    </div>
                                </form>
                            </div>                  
                        </div>


                    <?php } ?>


                </div>
            </div>
        </div>

        <div id="backformentrar">
        </div>
        <div id="corpoentrar" style="width: 100%;position: absolute;top: 45px;">
            <div id="formentrar">
                <div style="width: 100%; height: 150px;margin-top: 10px;">
                    <div id="pagina" style="width: 150px;height: 150px;margin: 0 auto;border-radius: 50%;overflow: hidden">
                        <?php if (!empty($_GET["valor"]) == null) { ?>

                            <img src="Img/LoginIcon.png" style="width:auto; height:100%;margin: 0 auto;">

                        <?php } ?>
                    </div>
                </div>

                <form id="formLogin" name="formLogin" 
                      method="POST" action="Controle/controladorLogin.php" onSubmit="return Validalogin();">
                    <div style="overflow: hidden;height: 150px;">
                        <div id="loginum">
                            <p>Digite seu email ou cpf</p>
                            <label id="Emailicon"></label>
                            <input type="text" id="emailLogin" name="email" onchange="pesquisa(this.value)">
                            <input type="button" id="botaoproximologin" value="Proximo">
                        </div>
                        <div id="loginum2">
                            <p>Digite sua senha</p>
                            <label id="Senhaicon"></label>
                            <input type="password" id="senhaLogin" name="senha">
                            <input id="submit" name="submit"
                                   type="submit"
                                   value="Entrar">  
                        </div>
                    </div>
                </form>   

            </div>
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
        if (isset($_SESSION['MENSAGEMCADASTRO'])) {
            if (($_SESSION['MENSAGEMCADASTRO']) == 1) {
                ?>
                <div id="backformentrarmensage">
                </div>
                <div id="msglogin" style="width: 500px;padding: 30px 0px;position: absolute;top: 50%;left: 50%;margin-top: -50px;margin-left: -250px;z-index: 15;background: white;border-radius: 3px;box-shadow: 0 0px 10px rgba(0, 0, 0, 0.2)">
                    <p style="margin:0;padding: 0;font-size: 25px;color: #333">Cadastro realizado com sucesso!</p>
                    <p style="margin:0;padding: 0;font-size: 15px;color: #4d4d4d;">Aproveite e faça o seu login!</p>
                </div>

                <?php $_SESSION['MENSAGEMCADASTRO'] += 1; ?> 
                <?php
            }
        }
        if (isset($_SESSION['MENSAGEMCADASTRO'])) {
            if ($_SESSION['MENSAGEMCADASTRO'] == 2) {
                unset($_SESSION['MENSAGEMCADASTRO']);
            }
        }
        ?> 
        <?php
        if (isset($_GET['FOIDESATIVADO'])) {
            if (($_GET['FOIDESATIVADO']) == 1) {
                ?>
                <div id="backformentrarmensage">
                </div>
                <div id="msglogin" style="width: 500px;padding: 30px 0px;position: absolute;top: 50%;left: 50%;margin-top: -50px;margin-left: -250px;z-index: 15;background: white;border-radius: 3px;box-shadow: 0 0px 10px rgba(0, 0, 0, 0.2)">
                    <p style="margin:0;padding: 0;font-size: 25px;color: #333">Você foi desativado!</p>
                    <p style="margin:0;padding: 0;font-size: 15px;color: #4d4d4d;">Entre em contato conosco!</p>
                </div>

                <?php $_GET['FOIDESATIVADO'] += 1; ?> 
                <?php
            }
        }
        if (isset($_GET['FOIDESATIVADO'])) {
            if ($_GET['FOIDESATIVADO'] == 2) {
                unset($_GET['FOIDESATIVADO']);
            }
        }
        ?> 

        <div id="owl-demo" class="owl-carousel owl-theme">
            <div class="item"  style="margin: 0 auto; padding: 0;width: 100%;height: 450px;background-image: url('Img/Produtos/BannerProdutos.png');background-position: center;background-size: 90% auto;background-repeat: no-repeat"></div>
            <div class="item"  style="margin: 0 auto; padding: 0;width: 100%;height: 450px;background-image: url('Img/Produtos/BannerColgate.png');background-position: center;background-size: 90% auto;background-repeat: no-repeat"></div>
            <div class="item" style="margin: 0 auto; padding: 0;width: 100%;height: 450px;background-image: url('Img/Produtos/Clear mEN Shampoo.png');background-position: center;background-size: 90% auto;background-repeat: no-repeat"></div>
        </div>

        <div id="novosprodutos">

            <?php
            include 'NovosProdutos.php';
            ?>
        </div>

        <div id="maisvendidos">
            <?php
            include 'MaisVendidos.php';
            ?>
        </div>

        <script src="js/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/owl-carousel/owl.carousel.js"></script> 
        <script>
                                $(document).ready(function () {

                                    $("#owl-demo").owlCarousel({
                                        navigation: false, // Show next and prev buttons
                                        pagination: true,
                                        slideSpeed: 1000,
                                        paginationSpeed: 1500,
                                        autoPlay: true,
                                        stopOnHover: true,
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
