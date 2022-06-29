<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilos/index.css">
    <link rel="shortcut icon" href="../fotos/favicon-logout.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>logout</title>
</head>

<body>
    <?php
        // * includes
        require_once "../includes/login.php";
        require_once "../includes/func.php";
    ?>
    <section id="corpo">
        <?php
            if (logout()) { // se o logout der certo
                msgSuces('Usuario desconectado com sucesso');
            } else {
                msgErro("Infelizmente o logout não pode ser executado");
            }
            voltar();
        ?>
    </section>
    <?php include_once "../modelo/rodape.php" // rodape ?>
</body>
</html>