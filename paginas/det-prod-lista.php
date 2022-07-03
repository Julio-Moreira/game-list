<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilos/index.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Lista</title>
</head>
<body>
    <?php 
        //* Includes
        require_once "../includes/banco.php";
        require_once "../includes/func.php";
        $cod = $_GET['cod'];
    ?>
    <section id="corpo">
        <h1>Jogos da :</h1>
        <?php

        voltar("detalhes-produtora.php?cod=$cod");
        ?>
    </section>
    <?php include_once "../modelo/rodape.php" // rodape ?>
</body>
</html>