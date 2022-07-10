<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estilos/index.css">
    <link rel="shortcut icon" href="../../fotos/favicon/add.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>novo genero</title>
</head>
<body>
    <?php 
        //* Includes
        require_once "../../includes/banco.php";
        require_once "../../includes/login.php";
        require_once "../../includes/func.php";
    ?>
    <section id="corpo">
        <?php
            if (isAdmin()) {
                if (!isset($_GET['nome'])) {
                    require_once "gen-form.html";
                } else {
                    // Dados
                    $nome = $_GET['nome'] ?? 'desconhecido';
                    $desc = $_GET['desc'] ?? 'sem dados';
                    
                    // Pega o ultimo id do db e add + 1
                    $dbCod = "select max(cod) as cod from generos";
                    $busca = $banco->query($dbCod);
                    $reg = $busca->fetch_object();
                    $cod = $reg->cod + 1;

                    // query que insere os dados no db 
                    $query = "insert into generos (cod, descr, genero) values
                    ($cod, '$desc', '$nome')";

                    $busca = $banco->query($query);
                    if (!$busca) {
                        msgErro('Não conseguimos inserir os dados');
                        sleep(10);
                        header('Location: ../../index.php');
                    } else {
                        msgSuces('Os dados foram inseridos com sucesso');
                        sleep(10);
                        header('Location: ../../index.php');
                    }
                }
                
            } else {
                msgErro('vocễ precisa ser adiministrador para criar um novo genero');
                sleep(5);
                header('Location: ../paginas/user/login.php');
            }            

            voltar();
        ?>
    </section>
    <?php include_once "../modelo/rodape.php" // rodape ?>
</body>
</html>