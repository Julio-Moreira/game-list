<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilos/index.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>detalhes de generos</title>
</head>
<body>
    <?php 
        //* Includes
        require_once "../includes/banco.php";
        require_once "../includes/func.php";
        $nome = $_GET['cod'];
    ?>
    <section id="corpo">
        <?php
            // Query que puxa a descrição e o nome do genero escolhido
            $query = "select descr, genero from generos where genero = '$nome'";
            
            $busca = $banco->query($query);
            if (!$busca) {
                msgErro("Não temos dados desse gênero");
            } else {
                $reg = $busca->fetch_object();
                $nome = $reg->genero ?? "desconhecido";
                $desc = $reg->descr ?? "dados não encontrados";
                
                echo "<h1>$nome</h1>";
                echo "<p>$desc</p>";

                // Query que pega o nome a produtora a capa e o codigo dos jogos que são do genero escolhido
                $query = "select j.nota, j.nome, p.produtora, j.capa, j.cod from jogos j 
                join generos g on j.genero = g.cod
                join produtoras p on j.produtora = p.cod
                where g.genero = '$nome' ";

                $busca = $banco->query($query);
                if (!$busca) {
                    msgAviso("Esse genero não tem nenhum jogo ainda");
                } else {
                    echo "<h2> Jogos: </h2>";
                    $nota = array();

                    echo "<table class='listagem'>";
                    while ($reg = $busca->fetch_object()) {
                        array_push($nota, $reg->nota);
                        $path = thumb($reg->capa);
                        $img = "<img src='$path' class='mini'/>";
                        $nome = "<a href='detalhes.php?cod=$reg->cod' class='detalhes'> $reg->nome </a>";
                        $produtora = "<a href='detalhes-produtora.php?cod=$reg->produtora' class='detalhesGP'> $reg->produtora </a>";

                        echo "<tr> <td> $img <td> $nome <br> $produtora";
                    }
                    echo "</table>";

                    echo "<h2> Média de notas: </h2>";
                    mediaNotas("", $nota);
                }
                
            }
            

            voltar();
        ?>
    </section>
    <?php include_once "../modelo/rodape.php" ?>
</body>
</html>