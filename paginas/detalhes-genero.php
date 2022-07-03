<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilos/index.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>detalhes de generos</title>
</head>
<body>
    <?php 
        //* Includes
        require_once "../includes/banco.php";
        require_once "../includes/func.php";
        $nome = $_GET['cod'];
    ?>
    <section id="corpo">
        <h1>Detalhes</h1>
        <?php
        // todo
        voltar();
        ?>
    </section>
    <?php include_once "../modelo/rodape.php" ?>
</body>
</html>