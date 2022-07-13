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
        function cartao($nome, $pathImg, $alt, $pathLink) {
            // Cria um cartão que tem uma img e nome de qualquer coisa

            echo '<section class="cartao">';
                echo "<img src='$pathImg' alt='$alt' class='cart'> <br>";
                echo "<a href='$pathLink'> $nome </a>";
            echo '</section>';
        }

        if (isLog()) { // se o usuario ta logado    
            if (isEditor() || isAdmin()) {
                // cartão para o novo jogo
                cartao('novo jogo', '../fotos/favicon/favicon.png', 'controle', '../paginas/new/game.php');

                // cartão para nova produtora
                cartao('nova produtora', '../fotos/favicon/add.png', 'mais', '../paginas/new/prod.php');

                // cartão para novo genero 
                cartao('novo genero', '../fotos/favicon/add.png', 'mais', '../paginas/new/gen.php');
            }           
            
            // cartão para novo usuario
            isAdmin() ? cartao('novo usuario', '../fotos/favicon/new.png', 'novo', '../paginas/new/user.php') : "";

        } else {
            msgErro('você precisa estar logado para criar coisas <br> você sera redirecionado');
            voltar('../index.php');
            sleep(5);
            header('Location: ../paginas/user/login.php');
        }
        ?>
    </div>
</body>
</html>