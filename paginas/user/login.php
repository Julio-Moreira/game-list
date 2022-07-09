<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estilos/index.css">
    <link rel="shortcut icon" href="../../fotos/favicon-login.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>login</title>
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
            $user = $_POST['usuario'] ?? null;
            $senha = $_POST['senha'] ?? null;

            if (is_null($senha) || is_null($user)) { // se os dados não forem passados aciona o form
                require_once "login-form.html";
                echo voltar();
            } else {
                // Query que pega o usuario o nome a senha e o tipo dos usuarios
                $query = "
                select usuario, nome, senha, tipo from usuarios
                where usuario = '$user' limit 1
                ";

                $busca = $banco->query($query);
                if (!$busca) {
                    msgErro('Falha ao fazer o login ');
                    voltar();
                    sleep(1);
                    header('Location: ../../index.php');
                } else {
                    $reg = $busca->fetch_object();
                    if (testarHash($senha, $reg->senha)) { // testa a senha
                        msgSuces('Logado com sucesso!');

                        // declara o usuario, o nome e o tipo na seção 
                        $_SESSION['user'] = $reg->usuario;
                        $_SESSION['nome'] = $reg->nome;
                        $_SESSION['tipo'] = $reg->tipo;
                        
                        voltar();
                        sleep(1);
                        header('Location: ../../index.php');
                    } else {
                        msgErro('Senha ou usuario invalido');
                        voltar("login.php");
                        sleep(1);
                        header('Location: login.php');
                    }
                }
            }
        ?>
    </section>
    <?php include_once "../../modelo/rodape.php" // rodape ?>
</body>
</html>
