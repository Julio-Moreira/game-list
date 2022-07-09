<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estilos/index.css">
    <link rel="shortcut icon" href="../../fotos/favicon-logout.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>logout</title>
</head>

<body>
    <?php
        // * includes
        require_once "../../includes/login.php";
        require_once "../../includes/func.php";
    ?>
    <section id="corpo">
        <?php
            if (logout()) { // se o logout der certo
                msgSuces('Usuario desconectado com sucesso');
            } else {
                msgErro("Infelizmente o logout não pode ser executado");
                 
            }
            voltar("../../index.php");
            sleep(1);
            header('Location: ../../index.php'); 
        ?>
    </section>
    <?php include_once "../../modelo/rodape.php" // rodape ?>
    <!-- Credits icon -->
    <em style='text-align: center; font-size: 0.6em;'><a target="_blank" href="https://icons8.com/icon/102852/logout-arredondado-para-baixo">Logout arredondado para baixo</a> icon by <a target="_blank" href="https://icons8.com">Icons8</a></em>
</body>
</html>