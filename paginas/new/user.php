<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estilos/index.css">
    <link rel="shortcut icon" href="../../fotos/favicon-new.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Novo usuario</title>
</head>
<body>
    <?php 
        // * includes
        require_once "../../includes/banco.php";
        require_once "../../includes/login.php";
        require_once "../../includes/func.php";
    ?>
    <section id="corpo">
        <?php
            if (!isAdmin()) { // se o user não for admin não deixa entrar
                msgErro('Voce precisa ser adiministrador para criar um novo usuario');
                voltar("login.php");
                sleep(1);
                header('Location: login.php'); 
            } else {
                echo "<h1> Novo usuario </h1>";

                if (!isset($_POST['usuario'])) {
                    require_once "user-form.html";
                    voltar("../../index.php");
                } else {
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $senha_1 = $_POST['senha1'] ?? null;
                    $senha_2 = $_POST['senha2'] ?? null;
                    $tipo = $_POST['tipo'] ?? null;

                    if ($senha_1 === $senha_2) {
                        $dataEmpty = empty($usuario) || empty($nome) || empty($senha_1) || empty($senha_2) || empty($tipo);

                        if ($dataEmpty) {
                            msgErro('Preencha todos os dados');
                            voltar('user.php');
                            sleep(1);
                            header('Location: user.php'); 
                        } else {
                            $senha = gerarHash($senha_1);
                            
                            // query insere os dados no db
                            $query = "
                            INSERT INTO usuarios (usuario, nome, senha, tipo) VALUES
                            ('$usuario', '$nome', '$senha', '$tipo')
                            ";
                            
                            if ($banco->query($query)) {
                                msgSuces("Usuario $nome cadastrado com suceso!");
                                voltar("../../index.php");
                                sleep(1);
                                header('Location: ../../index.php'); 
                            } else {
                                msgErro("O usuario $nome nao pode ser cadastrado");
                                voltar('user.php');
                                sleep(1);
                                header('Location: ../../index.php'); 
                            }
                        }
                    } else {
                        msgErro('Senhas nao conferem');
                        voltar('user.php');
                        sleep(1);
                        header('Location: user.php'); 
                    }
                }
            }

        ?>
    </section>
    <?php include_once "../../modelo/rodape.php" // rodape ?>
</body>
</html>