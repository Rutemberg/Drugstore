
<html>
    <head>
        <meta charset=UTF-8">
        <title></title>
        <script src="script.js"></script>
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
        <script>
            function pesquisa(valor)
            {
                //FUNÇÃO QUE MONTA A URL E CHAMA A FUNÇÃO AJAX
                url = "busca_nomeClienteDesativos.php?valor=" + valor;
                ajax(url);
            }
        </script>

    </head>

    <?php
    if (isset($_GET['ACAO'])) {
        $acao = $_GET['ACAO'];

        switch ($acao) {
            case 'listar':

                require_once 'Modelos/ClasseCliente.php';
                require_once 'Controle/DAO/ClasseClienteDAO.php';

                $clienteDAO = new ClasseClienteDAO;
                $clientes = array();
                $clientes = $clienteDAO->listarCliente();
                ?>

                <div id="Menugerenciarfuncionario">
                    <ul>
                        <a href="Restrito.php?PAGINA=cadastrarCliente">
                            <li style="opacity: 0.3">
                                <img style="width: 15%;height: auto;margin-top: 3px" src="Img/AddFuncionario3.png">
                                <p>Novo cliente<p>
                            </li>
                        </a>
                        <a href="Restrito.php?PAGINA=listarCliente">
                            <li style="opacity: 0.3">
                                <img style="width: 15%;height: auto;margin-top: 3px" src="Img/UsuarioAtivo2.png">
                                <p>Clientes ativos<p>
                            </li>
                        </a>
                        <a href="Restrito.php?PAGINA=listarClienteDesativos">
                            <li > 
                                <img style="width: 15%;height: auto;margin-top: 3px" src="Img/Usuarioremovido2.png">
                                <p>Clientes desativos<p>
                            </li>
                        </a>
                    </ul>
                </div>
                <input type="text" name="nome" onKeyPress="pesquisa(this.value)" class="pesquisar" >

                <div class="listar" id="pagina">
                    <ul class="listarestilo" >
                        <?php if (!empty($_GET["valor"]) == null) { ?>
                            <?php foreach ($clientes as $cliente) { ?>
                                <?php if ($cliente->estatus != "Ativo") { ?>
                                    <a href="Restrito.php?PAGINA=alterarCliente&&idCliente=<?php echo $cliente->idCliente; ?>">
                                        <li style="opacity: 0.4">
                                            <div style="margin: 0 auto;text-align: center;width: 60%;height: 40%;overflow: hidden;border-radius: 50%;margin-top: 10px"><?php echo '<img src="Img/ImagensBanco/ImagensClientes/' . $cliente->foto . '" style="width: auto;height: 100%;margin: 0px;"/>' ?></div>
                                            <p class="nomelistar" style="margin-top: 20px;color: #555;font-size: 17px;overflow: hidden;height: 20px;font-weight: bolder"><?php echo $cliente->nome; ?></p>
                                            <p style="margin-top: 5px;"> Email: <?php echo $cliente->email; ?></p>
                                            <p> Telefone: <?php echo $cliente->telefone; ?></p>
                                            <p> Cpf: <?php echo $cliente->cpf; ?></p>
                                            <p> Sexo: <?php echo $cliente->sexo; ?></p>
                                            <?php if (isset($_SESSION['FuncionarioLogado']) && ($_SESSION['PerfilFuncionarioLogado'] < 3)) { ?>
                                                <a class="excluirpermanente" onclick="return confirm('Tem certeza de que deseja exclui-lo permanentemente?');" href="Restrito.php?PAGINA=ExcluirCliente&&idCliente=<?php echo $cliente->idCliente; ?>"></a>
                                            <?php } ?>
                                            <a class="ativar" href="Restrito.php?PAGINA=AtivarCliente&&idCliente=<?php echo $cliente->idCliente; ?>">Ativar Cliente</a>
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
                            <p style="margin:0;padding: 0;font-size: 18px;color: #333;">Cliente desativado com sucesso!</p>
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
                            <p style="margin:0;padding: 0;font-size: 18px;color: #333;">Cliente excluído com sucesso!</p>
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
//                require_once '../Modelos/ClasseCliente.php';
//                require_once 'DAO/ClasseClienteDAO.php';
//
//
//                $nome = $_POST["nome"];
//                $email = $_POST["email"];
//                $cpf = $_POST["cpf"];
//                $senha = $_POST["senha"];
//                $dataCadastro = date("y/m/d");
//                $telefone = $_POST["telefone"];
//                $datanascimento = date($_POST['ano'] . "/" . $_POST['mes'] . "/" . $_POST['dia']);
//                $sexo = $_POST['sexo'];
//                $cep = $_POST["cep"];
//                $rua = $_POST["rua"];
//                $numero = $_POST["numero"];
//                $bairro = $_POST["bairro"];
//                $cidade = $_POST["cidade"];
//                $estado = $_POST["estado"];
//
//
//
//                $novoCliente = new ClasseCliente();
//                $novoCliente->setNome($nome);
//                $novoCliente->setEmail($email);
//                $novoCliente->setCpf($cpf);
//                $novoCliente->setSenha($senha);
//                $novoCliente->setDataCadastro($dataCadastro);
//                $novoCliente->setTelefone($telefone);
//                $novoCliente->setDataNascimento($datanascimento);
//                $novoCliente->setSexo($sexo);
//                $novoCliente->setCep($cep);
//                $novoCliente->setRua($rua);
//                $novoCliente->setNumero($numero);
//                $novoCliente->setBairro($bairro);
//                $novoCliente->setCidade($cidade);
//                $novoCliente->setEstado($estado);
//
//
//
//                $clienteDAO = new ClasseClienteDAO();
//                $cadastrarCliente = $clienteDAO->cadastrarCliente($novoCliente);
//
//                if ($cadastrarCliente == FALSE) {
//                    header('Location:../index.php?PAGINA=principal&MSG=Cadastro Não Realizado');
//                } else {
//                    echo "<script>alert('Cadastrado com Sucesso');
//                        window.location.href='../Hom3.php?CLIENTECADASTRADO=cadastradocomsucesso';
//                        </script>";
//                }
//                break;
//            case 'cadastrarcliente':
//                require_once '../Modelos/ClasseCliente.php';
//                require_once '../Modelos/CLasseHistoricoFuncionario.php';
//                require_once 'DAO/ClasseClienteDAO.php';
//
//                session_start();
//
//                $idCliente = $_POST["idCliente"];
//                $nome = $_POST["nome"];
//                $email = $_POST["email"];
//                $cpf = $_POST["cpf"];
//                $senha = $_POST["senha"];
//                $dataCadastro = date("y/m/d");
//                $telefone = $_POST["telefone"];
//                $datanascimento = date($_POST['ano'] . "/" . $_POST['mes'] . "/" . $_POST['dia']);
//                $sexo = $_POST['sexo'];
//                $cep = $_POST["cep"];
//                $rua = $_POST["rua"];
//                $numero = $_POST["numero"];
//                $bairro = $_POST["bairro"];
//                $cidade = $_POST["cidade"];
//                $estado = $_POST["estado"];
//                $estatus = "Ativo";
//
//                $idFuncionario = $_SESSION['idFuncionarioLogado'];
//                $dataacao = date("y/m/d");
//                date_default_timezone_set("America/Sao_Paulo");
//                $horaacao = date("h:i:sa");
//                $acao = "Cadastrou";
//
//
//
//                $imagem = $_FILES["foto"];
//                if (!empty($imagem["name"])) {
//                    preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
//                    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
//                    $caminho_imagem = "../Img/ImagensBanco/ImagensClientes/" . $nome_imagem;
//                    move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
//                }
//
//
//                $novoCliente = new ClasseCliente();
//                $novoCliente->setNome($nome);
//                $novoCliente->setIdCliente($idCliente);
//                $novoCliente->setEmail($email);
//                $novoCliente->setCpf($cpf);
//                $novoCliente->setSenha($senha);
//                $novoCliente->setDataCadastro($dataCadastro);
//                $novoCliente->setTelefone($telefone);
//                $novoCliente->setDataNascimento($datanascimento);
//                $novoCliente->setSexo($sexo);
//                $novoCliente->setCep($cep);
//                $novoCliente->setRua($rua);
//                $novoCliente->setNumero($numero);
//                $novoCliente->setBairro($bairro);
//                $novoCliente->setCidade($cidade);
//                $novoCliente->setEstado($estado);
//                $novoCliente->setEstatus($estatus);
//
//                if (isset($nome_imagem)) {
//                    $novoCliente->setImagem($nome_imagem);
//                } else {
//                    $nenhumafoto = 'Nenhuma foto selecionada';
//                    $novoCliente->setImagem($nenhumafoto);
//                }
//
//                $novoHistorico = new CLasseHistoricoFuncionario();
//                $novoHistorico->setIdFuncionario($idFuncionario);
//                $novoHistorico->setDataAcao($dataacao);
//                $novoHistorico->setHoraacao($horaacao);
//                $novoHistorico->setAcao($acao);
//
//                $clienteDAO = new ClasseClienteDAO();
//                $cadastrarCliente = $clienteDAO->cadastroCH($novoCliente, $novoHistorico);
//
//                if ($cadastrarCliente == FALSE) {
//                    header('Location:../Restrito.php?&MSG=Cadastro Não Realizado');
//                } else {
//                    echo "<script>alert('Cadastrado com Sucesso');
//                        window.location.href='../Restrito.php?PAGINA=listarCliente';
//                        </script>";
//                }
//                break;
//
//            case 'desativar':
//                require_once './Modelos/ClasseCliente.php';
//                require_once './Modelos/CLasseHistoricoFuncionario.php';
//                require_once 'DAO/ClasseClienteDAO.php';
//
//
//                if (isset($_GET['idCliente'])) {
//                    $idCliente = $_GET['idCliente'];
//                }
//                $idFuncionario = $_SESSION['idFuncionarioLogado'];
//                $dataacao = date("y/m/d");
//                date_default_timezone_set("America/Sao_Paulo");
//                $horaacao = date("h:i:sa");
//                $acao = "Desativou";
//
//                $novoHistorico = new CLasseHistoricoFuncionario();
//                $novoHistorico->setIdFuncionario($idFuncionario);
//                $novoHistorico->setDataAcao($dataacao);
//                $novoHistorico->setHoraacao($horaacao);
//                $novoHistorico->setAcao($acao);
//
//                $clienteDAO = new ClasseClienteDAO();
//                $deletar = $clienteDAO->DesativarCliente($idCliente, $novoHistorico);
//                if ($deletar) {
//                    echo "<script>
//                        window.location.href='Restrito.php?PAGINA=listarCliente';
//                        </script>";
//                }
//                break;
//
//            case 'ativar':
//                require_once './Modelos/ClasseCliente.php';
//                require_once './Modelos/CLasseHistoricoFuncionario.php';
//                require_once 'DAO/ClasseClienteDAO.php';
//
//
//                if (isset($_GET['idCliente'])) {
//                    $idCliente = $_GET['idCliente'];
//                }
//                $idFuncionario = $_SESSION['idFuncionarioLogado'];
//                $dataacao = date("y/m/d");
//                date_default_timezone_set("America/Sao_Paulo");
//                $horaacao = date("h:i:sa");
//                $acao = "Ativou";
//
//                $novoHistorico = new CLasseHistoricoFuncionario();
//                $novoHistorico->setIdFuncionario($idFuncionario);
//                $novoHistorico->setDataAcao($dataacao);
//                $novoHistorico->setHoraacao($horaacao);
//                $novoHistorico->setAcao($acao);
//
//                $clienteDAO = new ClasseClienteDAO();
//                $deletar = $clienteDAO->AtivarCliente($idCliente, $novoHistorico);
//                if ($deletar) {
//                    echo "<script>
//                        window.location.href='Restrito.php?PAGINA=listarCliente';
//                        </script>";
//                }
//                break;
//
//
//            case 'alterar':
//                require_once '../Modelos/ClasseCliente.php';
//                require_once '../Modelos/CLasseHistoricoFuncionario.php';
//                require_once 'DAO/ClasseClienteDAO.php';
//                session_start();
//
//                $alterarfoto = $_FILES["alterarimagem"];
//                if (!empty($alterarfoto["name"])) {
//                    $idCliente = $_POST["idCliente"];
//                    $nome = $_POST["nome"];
//                    $email = $_POST["email"];
//                    $cpf = $_POST["cpf"];
//                    $senha = $_POST["senha"];
//                    $telefone = $_POST["telefone"];
//                    $datanascimento = $_POST['datanascimento'];
//                    $sexo = $_POST['sexo'];
//                    $cep = $_POST["cep"];
//                    $rua = $_POST["rua"];
//                    $numero = $_POST["numero"];
//                    $bairro = $_POST["bairro"];
//                    $cidade = $_POST["cidade"];
//                    $estado = $_POST["estado"];
//
//                    $idFuncionario = $_SESSION['idFuncionarioLogado'];
//                    $dataacao = date("y/m/d");
//                    date_default_timezone_set("America/Sao_Paulo");
//                    $horaacao = date("h:i:sa");
//                    $acao = "Alterou";
//
//                    preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $alterarfoto["name"], $ext);
//                    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
//                    $caminho_imagem = "../Img/ImagensBanco/ImagensClientes/" . $nome_imagem;
//                    move_uploaded_file($alterarfoto["tmp_name"], $caminho_imagem);
//
//
//                    $novoCliente = new ClasseCliente();
//                    $novoCliente->setIdCliente($idCliente);
//                    $novoCliente->setNome($nome);
//                    $novoCliente->setEmail($email);
//                    $novoCliente->setCpf($cpf);
//                    $novoCliente->setSenha($senha);
//                    $novoCliente->setTelefone($telefone);
//                    $novoCliente->setDataNascimento($datanascimento);
//                    $novoCliente->setSexo($sexo);
//                    $novoCliente->setCep($cep);
//                    $novoCliente->setRua($rua);
//                    $novoCliente->setNumero($numero);
//                    $novoCliente->setBairro($bairro);
//                    $novoCliente->setCidade($cidade);
//                    $novoCliente->setEstado($estado);
//                    $novoCliente->setImagem($nome_imagem);
//
//                    $novoHistorico = new CLasseHistoricoFuncionario();
//                    $novoHistorico->setIdFuncionario($idFuncionario);
//                    $novoHistorico->setDataAcao($dataacao);
//                    $novoHistorico->setHoraacao($horaacao);
//                    $novoHistorico->setAcao($acao);
//                } else {
//
//                    $idCliente = $_POST["idCliente"];
//                    $nome = $_POST["nome"];
//                    $email = $_POST["email"];
//                    $cpf = $_POST["cpf"];
//                    $senha = $_POST["senha"];
//                    $telefone = $_POST["telefone"];
//                    $datanascimento = $_POST['datanascimento'];
//                    $sexo = $_POST['sexo'];
//                    $cep = $_POST["cep"];
//                    $rua = $_POST["rua"];
//                    $numero = $_POST["numero"];
//                    $bairro = $_POST["bairro"];
//                    $cidade = $_POST["cidade"];
//                    $estado = $_POST["estado"];
//                    $imagem = $_POST['imagem'];
//
//                    $idFuncionario = $_SESSION['idFuncionarioLogado'];
//                    $dataacao = date("y/m/d");
//                    date_default_timezone_set("America/Sao_Paulo");
//                    $horaacao = date("h:i:sa");
//                    $acao = "Alterou";
//
//                    $novoCliente = new ClasseCliente();
//                    $novoCliente->setIdCliente($idCliente);
//                    $novoCliente->setNome($nome);
//                    $novoCliente->setEmail($email);
//                    $novoCliente->setCpf($cpf);
//                    $novoCliente->setSenha($senha);
//                    $novoCliente->setTelefone($telefone);
//                    $novoCliente->setDataNascimento($datanascimento);
//                    $novoCliente->setSexo($sexo);
//                    $novoCliente->setCep($cep);
//                    $novoCliente->setRua($rua);
//                    $novoCliente->setNumero($numero);
//                    $novoCliente->setBairro($bairro);
//                    $novoCliente->setCidade($cidade);
//                    $novoCliente->setEstado($estado);
//                    $novoCliente->setImagem($imagem);
//
//                    $novoHistorico = new CLasseHistoricoFuncionario();
//                    $novoHistorico->setIdFuncionario($idFuncionario);
//                    $novoHistorico->setDataAcao($dataacao);
//                    $novoHistorico->setHoraacao($horaacao);
//                    $novoHistorico->setAcao($acao);
//                }
//
//                $clienteDAO = new ClasseClienteDAO();
//                $alterarCliente = $clienteDAO->alterarCliente($novoCliente, $novoHistorico);
//
//                if ($alterarCliente == FALSE) {
//                    header('Location:../Restrito.php?&MSG=Cadastro Não Realizado');
//                } else {
//                    echo "<script>alert('Alteração realizada com Sucesso');
//                        window.location.href='../Restrito.php?PAGINA=listarCliente';
//                        </script>";
//                }
//                break;

            default:
                break;
        }
    }
    ?>




</html>    