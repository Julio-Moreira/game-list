<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/index.css">
    <link rel="shortcut icon" href="../fotos/favicon/new-game.png" type="image/x-icon">
    <title>novo</title>
</head>
<body>
    <?php require_once "../includes/login.php"; require_once "../includes/func.php"; ?>
    <div id="container-new">
        <?php
        if (isLog()) {       
            if (isEditor() || isAdmin()) {
                echo '<section class="cartao">';
                echo '<img src="../fotos/favicon/favicon.png" alt="controle" class="cart"> <br>';
                echo '<a href="../paginas/new/game.php"> novo jogo </a>';
                echo '</section>';

                echo '<section class="cartao">';
                echo '<img src="#" alt="produtora" class="cart"> <br>';
                echo '<a href="../paginas/new/prod.php"> nova produtora </a>  <!-- todo -->';
                echo '</section>';

                echo '<section class="cartao">';
                echo '<img src="#" alt="genero" class="cart"> <br>';
                echo '<a href="../paginas/new/gen.php"> novo genero </a> <!-- todo -->';
                echo '</section>';
            }           
            
            if (isAdmin()) {
                echo '<section class="cartao">';
                echo '<img src="../fotos/favicon/new.png" class="cart" alt="new"> <br>';
                echo '<a href="../paginas/new/user.php"> novo usuario </a>';
                echo '</section>';
            }
        } else {
            msgErro('você precisa estar logado para criar coisas');
        }
        ?>
    </div>
</body>
</html>