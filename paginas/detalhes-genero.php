<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilos/index.css">
    <link rel="shortcut icon" href="../fotos/favicon/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Detalhes de generos</title>
</head>
<body>
    <?php 
        //* Includes
        require_once "../includes/banco.php";
        require_once "../includes/func.php";
        require_once "../includes/login.php";
        $nome = $_GET['cod'] ?? 0;
    ?>
    <section id="corpo">
        <?php
            // Query que puxa a descrição e o nome do genero escolhido
            $query = "select descr, genero from generos where genero = '$nome'";

            $busca = $banco->query($query);
            if (!$busca) {
                msgErro("Não temos dados desse gênero");
            } else {
                $reg = $busca->fetch_object(); // registra os resultados
                // Dados principais
                $nome = $reg->genero ?? "desconhecido";
                $desc = $reg->descr ?? "dados não encontrados";
                // * Nivel de acesso
                if (isAdmin()) { // se for adm
                    echo "<a href='edit/gen.php?nome=$nome'><span class='material-symbols-outlined' id='ico'> edit </span></a> "; 
                    echo " <a href='delete/gen.php?nome=$nome'> <span class='material-symbols-outlined'> remove </span> </a> <br>"; 
                } elseif (isEditor()) { // se for editor
                    echo "<a href='edit/gen.php?nome=$nome'><span class='material-symbols-outlined' id='ico'> edit </span> </a> <br>"; 
                }
                
                // Pagina principal
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
                        array_push($nota, $reg->nota); // guarda todas as notas para fazer a media
                        // Img
                        $pathImg = thumb($reg->capa);
                        $img = "<img src='$pathImg' class='mini'/>";
                        // Nome
                        $pathDet = "detalhes.php?cod=$reg->cod";
                        $nome = "<a href='$pathDet' class='detalhes'> $reg->nome </a>";
                        // Produtora
                        $pathProd = "detalhes-produtora.php?cod=$reg->produtora";
                        $produtora = "<a href='$pathProd' class='detalhesGP'> $reg->produtora </a>";

                        // Printa tudo
                        echo "<tr> <td> $img <td> $nome <br> $produtora";
                    }
                    echo "</table>";

                    // Notas
                    echo "<h2> Média de notas: </h2>";
                    mediaNotas($nota);
                }
                
            }       

            // Manda para o index
            voltar();
        ?>
    </section>
    <?php include_once "../modelo/rodape.php" ?>
</body>
</html>