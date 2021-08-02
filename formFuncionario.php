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
        <script src="js/velocity.min.js"></script>
        <script src="js/velocity.ui.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/jquery.maskedinput.js"></script>
        <script src="script.js"></script>
        <script type="text/javascript">

// Validação
            function ValidaFormulario() {
                // nome

                // descricao
                if (document.form.email.value == "") {
                    $('#infoconta').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#InfoLogin').velocity("transition.slideLeftIn", 100).delay(200);
                    $('#email').velocity({borderColor: "#cc0000"}, 300);
                    $('#email').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }


                if (document.form.senha.value == "") {
                    $('#infoconta').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#InfoLogin').velocity("transition.slideLeftIn", 100).delay(200);
                    $('#senha').velocity({borderColor: "#cc0000"}, 300);
                    $('#senha').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
//                valor

                if (document.form.comfirmarsenha.value == "") {
                    $('#infoconta').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#InfoLogin').velocity("transition.slideLeftIn", 100).delay(200);
                    $('#comfirmarsenha').velocity({borderColor: "#cc0000"}, 300);
                    $('#comfirmarsenha').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
                if (document.form.nome.value == "") {
                    $('#InfoLogin').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#infoconta').delay(100).velocity("transition.slideLeftIn", 100);
                    $('#nome').velocity({borderColor: "#cc0000"}, 300);
                    $('#nome').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
                if (document.form.dia.value == "") {
                    $('#InfoLogin').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#infoconta').delay(100).velocity("transition.slideLeftIn", 100);
                    $('#dia').velocity({borderColor: "#cc0000"}, 300);
                    $('#dia').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
                if (document.form.mes.value == "") {
                    $('#InfoLogin').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#infoconta').delay(100).velocity("transition.slideLeftIn", 100);
                    $('#mes').velocity({borderColor: "#cc0000"}, 300);
                    $('#mes').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
                if (document.form.ano.value == "") {
                    $('#InfoLogin').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#infoconta').delay(100).velocity("transition.slideLeftIn", 100);
                    $('#ano').velocity({borderColor: "#cc0000"}, 300);
                    $('#ano').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
                if (document.form.sexo.value == "") {
                    $('#InfoLogin').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#infoconta').delay(100).velocity("transition.slideLeftIn", 100);
                    $('#sexo').velocity({borderColor: "#cc0000"}, 300);
                    $('#sexo').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();

                    return false;
                }

                if (document.form.cpf.value == "") {
                    $('#InfoLogin').velocity("transition.slideLeftOut", 100);
                    $('#infoconta').velocity("transition.slideLeftOut", 100);
                    $('#infoconta2').delay(100).velocity("transition.slideRightIn", 100);
                    $('#cpf').velocity({borderColor: "#cc0000"}, 300);
                    $('#cpf').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
                if (document.form.dataAdmissao.value == "") {
                    $('#InfoLogin').velocity("transition.slideLeftOut", 100);
                    $('#infoconta').velocity("transition.slideLeftOut", 100);
                    $('#infoconta2').delay(100).velocity("transition.slideRightIn", 100);
                    $('#dataAdmissao').velocity({borderColor: "#cc0000"}, 300);
                    $('#dataAdmissao').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
                if (document.form.cargo.value == "") {
                    $('#InfoLogin').velocity("transition.slideLeftOut", 100);
                    $('#infoconta').velocity("transition.slideLeftOut", 100);
                    $('#infoconta2').delay(100).velocity("transition.slideRightIn", 100);
                    $('#cargo').velocity({borderColor: "#cc0000"}, 300);
                    $('#cargo').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
                if (document.form.perfil.value == "") {
                    $('#InfoLogin').velocity("transition.slideLeftOut", 100);
                    $('#infoconta').velocity("transition.slideLeftOut", 100);
                    $('#infoconta2').delay(100).velocity("transition.slideRightIn", 100);
                    $('#perfil').velocity({borderColor: "#cc0000"}, 300);
                    $('#perfil').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();

                    return false;
                }


                return true;
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".botaoproximo").click(function () {
                    $('#InfoLogin').velocity("transition.slideLeftOut", 100);
                    $('#infoconta').delay(200).velocity("transition.slideRightIn", 100);

                });
                $(".botaoanterior").click(function () {
                    $('#infoconta').velocity("transition.slideRightOut", 100);
                    $('#InfoLogin').delay(200).velocity("transition.slideLeftIn", 100);

                });
                $(".botaoproximo2").click(function () {
                    $('#infoconta').velocity("transition.slideLeftOut", 100);
                    $('#infoconta2').delay(200).velocity("transition.slideRightIn", 100);

                });
                $(".botaoanterior2").click(function () {
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#infoconta').delay(200).velocity("transition.slideLeftIn", 100);

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

                $("#foto").change(function () {
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
        <script>
            function validaemail(valor)
            {
                //FUNÇÃO QUE MONTA A URL E CHAMA A FUNÇÃO AJAX
                url = "Validaemail.php?valor=" + valor;
                ajax3(url);
            }
            ;
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
        <div id="Menugerenciarfuncionario">
            <ul >
                <a href="Restrito.php?PAGINA=cadastrarFuncionario">
                    <li >
                        <img style="width: 15%;height: auto;margin-top: 3px" src="Img/AddFuncionario3.png">
                        <p>Novo funcionario<p>
                    </li>
                </a>
                <a href="Restrito.php?PAGINA=listarFuncionario">
                    <li style="opacity: 0.3">
                        <img style="width: 15%;height: auto;margin-top: 3px" src="Img/UsuarioAtivo2.png">
                        <p>Funcionarios ativos<p>
                    </li>
                </a>
                <a href="Restrito.php?PAGINA=listarFuncionarioDesativo">
                    <li style="opacity: 0.3" > 
                        <img style="width: 15%;height: auto;margin-top: 3px" src="Img/Usuarioremovido2.png">
                        <p>Funcionarios desativos<p>
                    </li>
                </a>
            </ul>
        </div>

        <div id="corpoform" style="overflow: hidden;height: 500px;background: none;">
            <form id="form"
                  enctype="multipart/form-data"
                  name="form"
                  method="POST"
                  action="Controle/controladorFuncionario.php?ACAO=cadastrar"
                  onSubmit="return ValidaFormulario()">

                <div id="InfoLogin" style="margin-top: 40px;">
                    <p class="topformulario">LOGIN</p>
                    <input class="idFuncionario" name="idFuncionario"
                           type="hidden"
                           value="">

                    <label id="resposta">Email:</label>
                    <input class="email" name="email" id="email"
                           type="text"
                           value=""
                           onchange="validaemail(this.value);"
                           >

                    <label for="senha">Senha:</label>            
                    <input class="senha" name="senha" id="senha"
                           type="password"
                           value="">
                    <label for="comfirmarsenha">Comfirmar Senha:</label>            
                    <input class="comfirmarsenha" name="comfirmarsenha" id="comfirmarsenha"
                           type="password"
                           value="">
                    <input type="button" class="botaoproximo" value="Próximo">


                </div>
                <div id="infoconta" style="height: 400px">
                    <p class="topformulario" style="font-size: 25px;text-align: center;width: 100%">Informações do funcionário</p>

                    <div class="imagemconta">
                        <div class="imagemprodutoview" style="width: 300px;height: 170px;border: 1px solid #d9d9d9;margin: 0 auto;margin-top: 10px;overflow: hidden"><img id="blah" src="" alt="" style="height: 100%;width: auto"/></div>

                        <label>Selecione uma imagem:</label>
                        <label for="foto" class="labelinputfile" style=" width:130px;line-height: 32px;text-align: center;z-index: 4;position: relative;">Escolher imagem</label>                  
                        <input type="file" name="foto" id="foto" style="
                               width: 247px;
                               height: 32px;
                               position: relative;
                               z-index: 3;
                               margin-top: -35px
                               "
                               />
                    </div>
                    <div class="infoesquerdo">
                        <label for="nome">Nome:</label>
                        <input class="nome" name="nome" id="nome"
                               type="text"
                               value="" style="width: 80%">
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
                        </select>
                        <br>
                        <label style="width: 100% ">Sexo:</label>
                        <input id="sexo" type="radio" name="sexo" value="Masculino"/>Masculino
                        <input id="sexo" type="radio" name="sexo" value="Feminino"/>Feminino
                        <br>
                        <br>
                        <input type="button" class="botaoanterior" value="Anterior">
                        <input type="button" class="botaoproximo2" value="Proximo">
                    </div>
                </div>
                <div id="infoconta2">
                    <label for="cpf" style="margin-top: 30px;">CPF:</label>
                    <input class="cpf" name="cpf" id="cpf"
                           type="text"
                           value="">
                    <label for="dataAdmissao">Data de Admissão:</label>            
                    <input class="dataAdmissao" name="dataAdmissao" id="dataAdmissao"
                           type="date"
                           value="">
                    <label for="cargo">Cargo:</label>            
                    <input class="cargo" name="cargo" id="cargo"
                           type="text"
                           value="">

                    <label for="perfil">Perfil:</label>  
                    <input class="perfil" name="perfil" id="perfil"
                           type="text"
                           value="">
                    <input type="button" class="botaoanterior2" value="Anterior">
                    
                    <div id="respostaemail">

                    </div>
                </div>

            </form>
        </div>
    </body>
</html>
