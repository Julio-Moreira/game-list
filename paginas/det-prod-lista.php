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
        $nome = $_GET['nome'] ?? 0;
    ?>
    <section id="corpo">
        <?php
        echo "<h1>Jogos da $nome:</h1>";

        // Puxa o nome, genero, capa e codigo dos jogos
        $query = " 
        select j.nome, j.capa, g.genero, j.cod from jogos j 
        join produtoras p on j.produtora = p.cod
        join generos g on j.genero = g.cod
        where p.produtora = '$nome'";

        $busca = $banco->query($query);
        if (!$busca) {
            msgAviso('Essa produtora ainda não tem jogos');
        } else {
            echo "<table class='listagem'>";
            while ($reg = $busca->fetch_object()) {
                $path = thumb($reg->capa);
                $img = "<img src='$path' class='mini'/>";
                $nome = "<a href='detalhes.php?cod=$reg->cod' class='detalhes'> $reg->nome </a>";
                $genero = "<a href='detalhes.php?cod=$reg->genero' class='detalhesGP'> $reg->genero </a> ";

                // printa tudo
                echo "<tr> <td> $img <td> $nome <br> $genero";
            }
            echo "</table>";
        }

        voltar("detalhes-produtora.php?cod=$cod");
        ?>
    </section>
    <?php include_once "../modelo/rodape.php" // rodape ?>
</body>
</html>