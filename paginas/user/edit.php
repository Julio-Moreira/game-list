<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estilos/index.css">
    <link rel="shortcut icon" href="../../fotos/favicon-editar.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Meus dados</title>
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
            if (!isLog()) { // se nao estiver logado
                msgErro('Efetue o login antes de editar seus dados');
                voltar('login.php');
            } else {

                if (!isset($_POST['nome'])) { // se os dados nao forem passados execute o formulario 
                    require_once "edit-form.php";
                    voltar("../../index.php");
                } else {
                    $nome = $_POST['nome'] ?? null;
                    $senha = $_POST['senha1'] ?? null;
                    $csenha = $_POST['senha2'] ?? null;
                    
                    $query = "update usuarios set nome='$nome'"; // query que muda o nome 

                    if (empty($senha) || is_null($senha)) {
                        msgAviso('senha antiga foi mantida');
                    } else {
                        if ($senha === $csenha) {
                            $hashSenha = gerarHash($senha);
                            
                            $query .= ", senha='$hashSenha'"; // inclui na query a senha modificada 
                        } else {
                            msgErro("senhas nao conferem senha anterior sera mantida");
                        }
                    }
                                        
                    $query .= "where usuario = '". $_SESSION['user'] ."' limit 1"; // termina a query com a condição do user

                    if ($banco->query($query)) {
                        msgSuces('usuario alterado com sucesso');
                        msgAviso("por segurança faça o login novamente");

                        logout();
                        voltar('login.php');                 
                    } else {
                        msgErro("Usuario não pode ser modificado");
                        voltar("../../index.php");                       
                    }

                }

            }
            
        ?>
    </section>
    <?php include_once "../../modelo/rodape.php" // rodape ?>
</body>
</html>