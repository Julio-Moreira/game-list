<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilos/index.css">
    <link rel="shortcut icon" href="../fotos/favicon/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>detalhes de produtoras</title>
</head>
<body>
    <?php 
        //* Includes
        require_once "../includes/banco.php";
        require_once "../includes/func.php";
        $cod = $_GET['cod'] ?? 1;
    ?>
    <section id="corpo">
        <?php
        // Query que puxa a produtora o pais os criadores a data de criação e a descrição das produtoras
        $query = " select produtora, pais, criadores, dataCriacao, descr from produtoras 
        where produtora = '$cod' ";

        $busca = $banco->query($query);
        if (!$busca) {
            msgErro('Essa produtora não existe');
        } else {
            $reg = $busca->fetch_object();
            // Infos principais
            $nome = $reg->produtora ?? "Desconhecido";
            $criadores = $reg->criadores ?? "sem dados";
            $data = $reg->dataCriacao ?? "0000"; 
            $pais = $reg->pais ?? "planeta terra";
            $desc = $reg->descr ?? "dados não encontrado";

            // Pagina principal
            echo "<h1> $nome </h1>";
            echo "criada por <strong>$criadores</strong> <br> em $data no $pais ";
            echo "<h3> Detalhes: </h3> $desc";

            // Query que pega o nome, a capa, o codigo e a nota dos jogos da produtora
            $query = "select j.nome, j.capa, j.cod, j.nota from jogos j 
            join produtoras p on j.produtora = p.cod
            where p.produtora = '$nome' ";

            $busca = $banco->query($query);
            if (!$busca) {
                msgAviso('Essa produtora não tem nenhum jogo ainda');
            } else {
                $count = 0;
                $nota = array();

                // Jogos
                echo "<br> <h3>Jogos: </h3> <p id='container-prod'>";
                while ($reg = $busca->fetch_object()) {
                    if ($count == 2) { // se tiver mais de 2 resultados manda pra lista completa
                        echo "<a href='det-prod-lista.php?nome=$nome' class='margin'>...</a>";
                        break;
                    }
                    
                    // Info dos jogos
                    $path = thumb($reg->capa);
                    $primeiroNome = explode(" ", $reg->nome)[0]; // pega o primeiro nome
                    $urlDet = "detalhes.php?cod=$reg->cod";

                    // Printa tudo
                    echo "<span class='margin'> <img class='thumb' src='$path'/>";
                    echo "<br> <a href='$urlDet'> $primeiroNome... </a> </span>";
                    array_push($nota, $reg->nota); // coloca todas as notas (dos jogos) em um array pra fazer a média
                    $count++;
                }

                echo '</p>';

                // Média de notas
                echo "<h3> Média das notas (de seus jogos): </h3>";
                mediaNotas($nota);
            }
                
        }
        voltar();
        ?>
    </section>
    <?php include_once "../modelo/rodape.php" ?>
</body>
</html>
