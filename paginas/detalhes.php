<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilos/detalhes.css">
    <link rel="shortcut icon" href="../fotos/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Detalhes do jogo</title>
</head>
<body>
    <?php 
        // * Includes
        require_once "../includes/banco.php";
        require_once "../includes/login.php";
        require_once "../includes/func.php";
    ?>

    <section id="corpo">
        <h1>Detalhes: </h1>
        <table id="detalhes">
            <?php
                $cod = $_GET['cod'] ?? 0;
                $busca = $banco -> query(" select * from jogos where cod = '$cod'; "); // query principal

                if (!$busca) {
                    msgErro("<p>O jogo selecionado nao esta disponivel<br>volte para a pagina principal</p>");
                } else {
                    if ($busca->num_rows == 1):
                        // * print
                        $reg = $busca->fetch_object();

                        $path = thumb($reg->capa);
                        $img = "<img src='$path' class='full' />";
                        $nome = "<h2> $reg->nome </h2>";
                        $nota = $reg->nota;
                        $desc = "<p> $reg->descricao </p>";

                        echo "<tr><td rowspan='3'>". $img;
                        echo "<td>". $nome;
                        mediaNotas("<tr> <td> ", array($nota));
                        echo "<tr><td>". $desc;
                    else:
                        msgErro("<p>O jogo selecionado nao esta disponivel<br>volte para a pagina principal</p>");
                    endif;
                }
            ?>
        </table>
       <!-- voltar -->
        <?php voltar(); ?>
    </section>
    <?php include_once "../modelo/rodape.php" ?>
</body>
</html>