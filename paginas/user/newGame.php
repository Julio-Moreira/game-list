<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estilos/index.css">
    <link rel="shortcut icon" href="../../fotos/favicon/new-game.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>novo jogo</title>
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

        voltar("../../index.php");
        ?>
    </section>
    <!-- Credits icon -->
    <em style='text-align: center; font-size: 0.6em;'><a target="_blank" href="https://icons8.com/icon/12023/novo">Novo</a> icon by <a target="_blank" href="https://icons8.com">Icons8</a></em>
    
    <?php include_once "../../modelo/rodape.php" // rodape ?>
</body>
</html>