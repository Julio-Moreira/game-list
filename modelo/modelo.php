<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="modelo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>titulo da pagina</title>
</head>
<body>
    <?php 
        require_once "../includes/banco.php";
        require_once "../includes/login.php";
        require_once "../includes/func.php";
    ?>
    <section id="corpo">
        <?php include_once "../modelo/topo.php" ?>
        
        <h1>ola mundo</h1>
        <?php

        voltar();
        ?>
    </section>
    <?php include_once "../modelo/rodape.php" ?>
</body>
</html>