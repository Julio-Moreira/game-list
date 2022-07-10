<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estilos/index.css">
    <link rel="shortcut icon" href="../../fotos/favicon/add.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>nova produtora</title>
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
                require_once "prod-form.html";
            } else {
                // dados
                $nome = $_GET['nome'] ?? 'desconhecido';
                $pais = $_GET['pais'] ?? 'planeta terra';
                $desc = $_GET['desc'] ?? 'sem dados';
                $dataCriacao = $_GET['data'] ?? '0000';
                $criadores = $_GET['criadores'] ?? 'alguem'; 

                // Puxa o ultimo id do db e add + 1
                $dbCod = "select max(cod) as cod from produtoras";
                $busca = $banco->query($dbCod);
                $reg = $busca->fetch_object();
                $cod = $reg->cod + 1;

                // Query que insere o nome, pais, descrição e os criadores no db
                $query = "insert into produtoras (cod, criadores, dataCriacao, descr, pais, produtora) values
                ($cod, '$criadores', '$dataCriacao', '$desc', '$pais', '$nome') ";
                $busca = $banco->query($query);
                if (!$busca) {
                    msgErro('Infelismente não os dados não foram inseridos');
                    header('Location: prod.php');
                } else {
                    msgSuces('Os dados foram inseridos com sucesso');
                    header('Location: ../../index.php');
                }
                
            }
        } else {
            msgErro('Vocẽ precisa ser administrador para criar uma produtora');
            header('Location: ../user/login.php');
        }        

        voltar();
        ?>
    </section>
    <?php include_once "../modelo/rodape.php" // rodape ?>
</body>
</html>