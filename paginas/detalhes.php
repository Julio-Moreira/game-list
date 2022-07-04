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
        $cod = $_GET['cod'] ?? 0;
    ?>

    <section id="corpo">
        <table id="detalhes">
            <?php
                // Puxa a capa, nome, nota e desc do jogo escolhido 
                $busca = $banco -> query(" select capa, nome, nota, descricao from jogos where cod = '$cod'; "); 

                if (!$busca) {
                    msgErro("O jogo selecionado nao esta disponivel<br>volte para a pagina principal");
                } else {
                    if ($busca->num_rows == 1):
                        // * print
                        $reg = $busca->fetch_object();

                        // Img
                        $path = thumb($reg->capa);
                        $img = "<img src='$path' class='full' />";
                        // Nome
                        $nome = $reg->nome ?? "Desconhecido";
                        // Nota
                        $nota = $reg->nota ?? 0;
                        // Descrição
                        $desc = $reg->descricao ?? "dados não encontrados";

                        // Printa tudo
                        echo "<tr> <td rowspan='3'>". $img;
                        echo "<td> <h2> $nome </h2>";
                        mediaNotas(array($nota), "<tr> <td>");
                        echo "<tr> <td> <p> $desc </p>";
                    else:
                        msgErro("O jogo selecionado nao esta disponivel");
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