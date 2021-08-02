<html>
    <head>
        <meta charset=UTF-8">
        <title></title>
        <script src="script.js"></script>
        <script>
            function pesquisa(valor)
            {
                //FUNÇÃO QUE MONTA A URL E CHAMA A FUNÇÃO AJAX
                url = "busca_nomeFuncionarioDesativo.php?valor=" + valor;
                ajax(url);
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
    </head>
    <?php
    if (isset($_GET['ACAO'])) {
        $acao = $_GET['ACAO'];

        switch ($acao) {
            case 'listar':
                require_once 'Modelos/ClasseFuncionario.php';
                require_once 'Controle/DAO/ClasseFuncionarioDAO.php';

                $funcionarioDAO = new ClasseFuncionarioDAO;
                $funcionarios = array();
                $funcionarios = $funcionarioDAO->listarFuncionario();
                ?>
                <div id="Menugerenciarfuncionario">
                    <ul>
                        <a href="Restrito.php?PAGINA=cadastrarFuncionario">
                            <li style="opacity: 0.3">
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
                            <li > 
                                <img style="width: 15%;height: auto;margin-top: 3px" src="Img/Usuarioremovido2.png">
                                <p>Funcionarios desativos<p>
                            </li>
                        </a>
                    </ul>
                </div>
                <input class="pesquisar" type="text" name="nome" onKeyPress="pesquisa(this.value)" >

                <div class="listar" id="pagina">
                    <ul class="listarestilo">
                        <?php if (!empty($_GET["valor"]) == null) { ?>
                            <?php foreach ($funcionarios as $funcionario) { ?>
                                <?php if ($funcionario->estatus != "Ativo") { ?>
                                    <a href="Restrito.php?PAGINA=alterarFuncionario&&idFuncionario=<?php echo $funcionario->idFuncionario; ?>">
                                        <li style="opacity: .4">
                                            <div style="margin: 0 auto;text-align: center;width: 60%;height: 40%;overflow: hidden;border-radius: 50%;margin-top: 10px"><?php echo '<img src="Img/ImagensBanco/ImagensFuncionarios/' . $funcionario->foto . '" style="width: auto;height: 100%;margin: 0px;"/>' ?></div>
                                            <p class="nomelistar" style="margin-top: 20px;color: #555;font-size: 17px;overflow: hidden;height: 20px;font-weight: bolder"><?php echo $funcionario->nome; ?></p>
                                            <p style="margin-top: 5px;"> Email: <?php echo $funcionario->email; ?></p>
                                            <p> Cargo: <?php echo $funcionario->cargo; ?></p>
                                            <p> Cpf: <?php echo $funcionario->cpf; ?></p>
                                            <p> Sexo: <?php echo $funcionario->sexo; ?></p>
                                            <?php if (isset($_SESSION['FuncionarioLogado']) && ($_SESSION['PerfilFuncionarioLogado'] < 3)) { ?>
                                                <a class="excluirpermanente" onclick="return confirm('Tem certeza de que deseja exclui-lo permanentemene?');" href="Restrito.php?PAGINA=ExcluirFuncionario&&idFuncionario=<?php echo  $funcionario->idFuncionario; ?>"></a>
                                            <?php } ?>
                                            <a class="ativar"  href="Restrito.php?PAGINA=AtivarFuncionario&&idFuncionario=<?php echo $funcionario->idFuncionario; ?>">Ativar Funcionario</a>
                                        </li> 
                                    </a>
                                <?php } ?>
                            <?php } ?>

                        <?php } ?>
                    </ul>
                </div>

                <?php
                if (isset($_SESSION['MENSAGEMDESATIVO'])) {
                    if (($_SESSION['MENSAGEMDESATIVO']) == 1) {
                        ?>
                        <div id="backformentrarmensage">
                        </div>
                        <div id="msglogin" style="display: none;width: 500px;height: 100px;line-height: 100px;position: absolute;top: 50%;left: 50%;margin-top: -50px;margin-left: -250px;z-index: 15;background: white;border-radius: 3px;box-shadow: 0 0px 10px rgba(0, 0, 0, 0.2)">
                            <p style="margin:0;padding: 0;font-size: 18px;color: #333;">Funcionário desativado com sucesso!</p>
                        </div>

                        <?php $_SESSION['MENSAGEMDESATIVO'] += 1; ?> 
                        <?php
                    }
                }
                if (isset($_SESSION['MENSAGEMDESATIVO'])) {
                    if ($_SESSION['MENSAGEMDESATIVO'] == 2) {
                        unset($_SESSION['MENSAGEMDESATIVO']);
                    }
                }
                ?>
                                <?php
                if (isset($_SESSION['MENSAGEMEXCLUIDO'])) {
                    if (($_SESSION['MENSAGEMEXCLUIDO']) == 1) {
                        ?>
                        <div id="backformentrarmensage">
                        </div>
                        <div id="msglogin" style="display: none;width: 500px;height: 100px;line-height: 100px;position: absolute;top: 50%;left: 50%;margin-top: -50px;margin-left: -250px;z-index: 15;background: white;border-radius: 3px;box-shadow: 0 0px 10px rgba(0, 0, 0, 0.2)">
                            <p style="margin:0;padding: 0;font-size: 18px;color: #333;">Funcionário excluído com sucesso!</p>
                        </div>

                        <?php $_SESSION['MENSAGEMEXCLUIDO'] += 1; ?> 
                        <?php
                    }
                }
                if (isset($_SESSION['MENSAGEMEXCLUIDO'])) {
                    if ($_SESSION['MENSAGEMEXCLUIDO'] == 2) {
                        unset($_SESSION['MENSAGEMEXCLUIDO']);
                    }
                }
                ?> 
            <?php
//                break;
//            case 'cadastrar':
//                require_once '../Modelos/ClasseFuncionario.php';
//                require_once 'DAO/ClasseFuncionarioDAO.php';
//
//                $idFuncionario = $_POST["idFuncionario"];
//                $nome = $_POST["nome"];
//                $email = $_POST["email"];
//                $cpf = $_POST["cpf"];
//                $senha = $_POST["senha"];
//                $datanascimento = date($_POST['ano'] . "/" . $_POST['mes'] . "/" . $_POST['dia']);
//                $dataAdmissao = $_POST["dataAdmissao"];
//                $cargo = $_POST["cargo"];
//                $sexo = $_POST['sexo'];
//                $perfil = $_POST["perfil"];
//
//                $imagem = $_FILES["foto"];
//                if (!empty($imagem["name"])) {
//                    preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
//                    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
//                    $caminho_imagem = "../Img/ImagensBanco/ImagensFuncionarios/" . $nome_imagem;
//                    move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
//                }
//
//                $novoFuncionario = new ClasseFuncionario();
//                $novoFuncionario->setIdFuncionario($idFuncionario);
//                $novoFuncionario->setNome($nome);
//                $novoFuncionario->setEmail($email);
//                $novoFuncionario->setCpf($cpf);
//                $novoFuncionario->setSenha($senha);
//                $novoFuncionario->setDataNascimento($datanascimento);
//                $novoFuncionario->setDataAdmissao($dataAdmissao);
//                $novoFuncionario->setCargo($cargo);
//                $novoFuncionario->setSexo($sexo);
//                $novoFuncionario->setPerfil($perfil);
//
//                if (isset($nome_imagem)) {
//                    $novoFuncionario->setImagem($nome_imagem);
//                } else {
//                    $nenhumafoto = 'Nenhuma foto selecionada';
//                    $novoFuncionario->setImagem($nenhumafoto);
//                }
//
//                $funcionarioDAO = new ClasseFuncionarioDAO();
//                $cadastrarFuncionario = $funcionarioDAO->cadastrarFuncionario($novoFuncionario);
//
//                if ($cadastrarFuncionario == FALSE) {
//                    header('Location:../Restrito.php?&MSG=Cadastro Não Realizado');
//                } else {
//                    echo "<script>alert('Cadastrado com Sucesso');
//                        window.location.href='../Restrito.php?PAGINA=listarFuncionario';
//                        </script>";
//                }
//                break;
//            case 'desativar':
//                require_once './Modelos/ClasseFuncionario.php';
//                require_once 'DAO/ClasseFuncionarioDAO.php';
//
//                if (isset($_GET['idFuncionario'])) {
//                    $idFuncionario = $_GET['idFuncionario'];
//                }
//
//                $funcionarioDAO = new ClasseFuncionarioDAO();
//                $deletar = $funcionarioDAO->DesativarFuncionario($idFuncionario);
//                if ($deletar) {
////                            echo "<script>alert('Excluído com Sucesso');
////                        window.location.href='Restrito.php?PAGINA=listarFuncionario';
////                        </script>";
//                    echo "<script>
//                        window.location.href='Restrito.php?PAGINA=listarFuncionario';
//                        </script>";
//                }
//                break;
//            case 'ativar':
//                require_once './Modelos/ClasseFuncionario.php';
//                require_once 'DAO/ClasseFuncionarioDAO.php';
//
//                if (isset($_GET['idFuncionario'])) {
//                    $idFuncionario = $_GET['idFuncionario'];
//                }
//
//                $funcionarioDAO = new ClasseFuncionarioDAO();
//                $deletar = $funcionarioDAO->AtivarFuncionario($idFuncionario);
//                if ($deletar) {
////                            echo "<script>alert('Excluído com Sucesso');
////                        window.location.href='Restrito.php?PAGINA=listarFuncionario';
////                        </script>";
//                    echo "<script>
//                        window.location.href='Restrito.php?PAGINA=listarFuncionario';
//                        </script>";
//                }
//                break;
//
//            case 'alterar':
//                require_once '../Modelos/ClasseFuncionario.php';
//                require_once 'DAO/ClasseFuncionarioDAO.php';
//
//                $alterarfoto = $_FILES["alterarimagem"];
//
//                if (!empty($alterarfoto["name"])) {
//
//                    $idFuncionario = $_POST["idFuncionario"];
//                    $nome = $_POST["nome"];
//                    $email = $_POST["email"];
//                    $cpf = $_POST["cpf"];
//                    $senha = $_POST["senha"];
//                    $datanascimento = $_POST["dataNascimento"];
//                    $sexo = $_POST['sexo'];
//                    $dataAdmissao = $_POST["dataAdmissao"];
//                    $cargo = $_POST["cargo"];
//                    $perfil = $_POST["perfil"];
//
//                    preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $alterarfoto["name"], $ext);
//                    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
//                    $caminho_imagem = "../Img/ImagensBanco/ImagensFuncionarios/" . $nome_imagem;
//                    move_uploaded_file($alterarfoto["tmp_name"], $caminho_imagem);
//
//                    $novoFuncionario = new ClasseFuncionario();
//                    $novoFuncionario->setIdFuncionario($idFuncionario);
//                    $novoFuncionario->setNome($nome);
//                    $novoFuncionario->setEmail($email);
//                    $novoFuncionario->setCpf($cpf);
//                    $novoFuncionario->setSenha($senha);
//                    $novoFuncionario->setDataNascimento($datanascimento);
//                    $novoFuncionario->setDataAdmissao($dataAdmissao);
//                    $novoFuncionario->setCargo($cargo);
//                    $novoFuncionario->setSexo($sexo);
//                    $novoFuncionario->setPerfil($perfil);
//                    $novoFuncionario->setImagem($nome_imagem);
//                } else {
//                    $idFuncionario = $_POST["idFuncionario"];
//                    $nome = $_POST["nome"];
//                    $email = $_POST["email"];
//                    $cpf = $_POST["cpf"];
//                    $senha = $_POST["senha"];
//                    $datanascimento = $_POST["dataNascimento"];
//                    $sexo = $_POST['sexo'];
//                    $dataAdmissao = $_POST["dataAdmissao"];
//                    $cargo = $_POST["cargo"];
//                    $perfil = $_POST["perfil"];
//                    $imagem = $_POST['imagem'];
//
//                    $novoFuncionario = new ClasseFuncionario();
//                    $novoFuncionario->setIdFuncionario($idFuncionario);
//                    $novoFuncionario->setNome($nome);
//                    $novoFuncionario->setEmail($email);
//                    $novoFuncionario->setCpf($cpf);
//                    $novoFuncionario->setSenha($senha);
//                    $novoFuncionario->setDataNascimento($datanascimento);
//                    $novoFuncionario->setDataAdmissao($dataAdmissao);
//                    $novoFuncionario->setCargo($cargo);
//                    $novoFuncionario->setSexo($sexo);
//                    $novoFuncionario->setPerfil($perfil);
//                    $novoFuncionario->setImagem($imagem);
//                }
//
//                $funcionarioDAO = new ClasseFuncionarioDAO();
//                $alterarFuncionario = $funcionarioDAO->alterarFuncionario($novoFuncionario);
//
//                if ($alterarFuncionario == FALSE) {
//                    header('Location:../Restrito.php?&MSG=Cadastro Não Realizado');
//                } else {
//                    echo "<script>alert('Alteração realizada com Sucesso');
//                        window.location.href='../Restrito.php?PAGINA=listarFuncionario';
//                        </script>";
//                }
//                break;
//
//            case 'Atualizar':
//                require_once '../Modelos/ClasseFuncionario.php';
//                require_once 'DAO/ClasseFuncionarioDAO.php';
//
//                $alterarfoto = $_FILES["alterarimagem"];
//
//                if (!empty($alterarfoto["name"])) {
//
//                    $idFuncionario = $_POST["idFuncionario"];
//                    $nome = $_POST["nome"];
//                    $email = $_POST["email"];
//                    $cpf = $_POST["cpf"];
//                    $senha = $_POST["senha"];
//                    $datanascimento = $_POST["dataNascimento"];
//                    $sexo = $_POST['sexo'];
//                    $dataAdmissao = $_POST["dataAdmissao"];
//                    $cargo = $_POST["cargo"];
//                    $perfil = $_POST["perfil"];
//
//                    preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $alterarfoto["name"], $ext);
//                    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
//                    $caminho_imagem = "../Img/ImagensBanco/ImagensFuncionarios/" . $nome_imagem;
//                    move_uploaded_file($alterarfoto["tmp_name"], $caminho_imagem);
//
//                    $novoFuncionario = new ClasseFuncionario();
//                    $novoFuncionario->setIdFuncionario($idFuncionario);
//                    $novoFuncionario->setNome($nome);
//                    $novoFuncionario->setEmail($email);
//                    $novoFuncionario->setCpf($cpf);
//                    $novoFuncionario->setSenha($senha);
//                    $novoFuncionario->setDataNascimento($datanascimento);
//                    $novoFuncionario->setDataAdmissao($dataAdmissao);
//                    $novoFuncionario->setCargo($cargo);
//                    $novoFuncionario->setSexo($sexo);
//                    $novoFuncionario->setPerfil($perfil);
//                    $novoFuncionario->setImagem($nome_imagem);
//                } else {
//                    $idFuncionario = $_POST["idFuncionario"];
//                    $nome = $_POST["nome"];
//                    $email = $_POST["email"];
//                    $cpf = $_POST["cpf"];
//                    $senha = $_POST["senha"];
//                    $datanascimento = $_POST["dataNascimento"];
//                    $sexo = $_POST['sexo'];
//                    $dataAdmissao = $_POST["dataAdmissao"];
//                    $cargo = $_POST["cargo"];
//                    $perfil = $_POST["perfil"];
//                    $imagem = $_POST['imagem'];
//
//                    $novoFuncionario = new ClasseFuncionario();
//                    $novoFuncionario->setIdFuncionario($idFuncionario);
//                    $novoFuncionario->setNome($nome);
//                    $novoFuncionario->setEmail($email);
//                    $novoFuncionario->setCpf($cpf);
//                    $novoFuncionario->setSenha($senha);
//                    $novoFuncionario->setDataNascimento($datanascimento);
//                    $novoFuncionario->setDataAdmissao($dataAdmissao);
//                    $novoFuncionario->setCargo($cargo);
//                    $novoFuncionario->setSexo($sexo);
//                    $novoFuncionario->setPerfil($perfil);
//                    $novoFuncionario->setImagem($imagem);
//                }
//
//                $funcionarioDAO = new ClasseFuncionarioDAO();
//                $alterarFuncionario = $funcionarioDAO->alterarFuncionario($novoFuncionario);
//
//                if ($alterarFuncionario == FALSE) {
//                    header('Location:../Restrito.php?&MSG=Cadastro Não Realizado');
//                } else {
//                    echo "<script>alert('Alteração realizada com Sucesso');
//                        window.location.href='../Restrito.php?PAGINA=AtualizarminhasInformacoes&&idFuncionario=$idFuncionario';
//                        </script>";
//                }
//                break;
            default:
                break;
        }
    }
    ?>



</html> 

