<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../estilos/detalhes.css">
<link rel="shortcut icon" href="../fotos/favicon/favicon.png" type="image/x-icon">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<title>Detalhes do jogo</title>
</head>
<body>
<?php
    require_once "../includes/banco.php";
    require_once "../includes/func.php";
    $cod = $_GET['cod'] ?? 0;

    function fetchImdbRating(string $title): ?float
    {
        $apiKey = '-';
        $url = "https://www.omdbapi.com/?t=" . urlencode($title) . "&apikey=$apiKey";
        $response = @file_get_contents($url);
        if ($response === false) {
            return null;
        }
        $data = json_decode($response, true);
        if (!$data || $data['Response'] === 'False') {
            return null;
        }
        foreach ($data['Ratings'] as $rating) {
            if ($rating['Source'] === 'Internet Movie Database') {
                return floatval(substr($rating['Value'], 0, 3));
            }
        }
        return null;
    }
?>
<section id="corpo">
    <table id="detalhes">
        <?php
            $busca = $banco->query("select capa, nome, nota, descricao from jogos where cod = '$cod';");

            if (!$busca) {
                msgErro("O jogo selecionado nao esta disponivel<br>volte para a pagina principal");
            } else {
                if ($busca->num_rows == 1) {
                    $reg = $busca->fetch_object();

                    $path = thumb($reg->capa);
                    $img = "<img src='$path' class='full' />";
                    $nome = $reg->nome ?? "Desconhecido";
                    $nota = $reg->nota ?? 0;
                    $desc = $reg->descricao ?? "dados não encontrados";

                    $imdbRating = fetchImdbRating($nome);
                    $imdbDisplay = $imdbRating ? number_format($imdbRating, 1) : 'Não disponível';

                    echo "<tr><td rowspan='4'>$img";
                    echo "<td><h2>$nome</h2>";
                    mediaNotas([$nota], "<tr><td>");
                    echo "<tr><td><strong>IMDb:</strong> $imdbDisplay";
                    echo "<tr><td><p>$desc</p>";
                } else {
                    msgErro("O jogo selecionado nao esta disponivel");
                }
            }
        ?>
    </table>
    <?php voltar(); ?>
</section>
<?php include_once "../modelo/rodape.php" ?>
</body>
</html>
