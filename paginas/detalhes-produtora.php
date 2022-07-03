<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilos/index.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>detalhes de produtoras</title>
</head>
<body>
    <?php 
        //* Includes
        require_once "../includes/banco.php";
        require_once "../includes/func.php";
        $cod = $_GET['cod'];
    ?>
    <section id="corpo">
        <?php
        $query = "
        select produtora, pais, criadores, dataCriacao, descr from produtoras 
        where produtora = '$cod' ";
        
        $busca = $banco->query($query);
        if (!$busca) {
            msgErro('Essa produtora não existe');
        } else {
            $reg = $busca->fetch_object();
            $nome = $reg->produtora;
            $criadores = $reg->criadores ?? "dados não encontrados";
            $data = $reg->dataCriacao ?? "0000"; 
            $pais = $reg->pais ?? "planeta terra";
            $desc = $reg->descr;
            
            echo "<h1> $nome </h1>";
            echo "criada por $criadores <br> em $data no $pais ";
            echo "<h3> Detalhes: </h3>$desc";
            // todo: media de notas e jogos dessa produtora 
            $query = "select j.nome, j.capa from jogos j join produtoras p on j.produtora = p.cod
            where p.produtora = '$nome' ";

            $busca = $banco->query($query);

            if (!$busca) {
                msgAviso('Essa produtora não tem nenhum jogo ainda');
            } else {
                echo "<br> <h3>Jogos: </h3> <p id='container-prod'>";
                $count = 0;
                while ($reg = $busca->fetch_object()) {
                    if ($count == 2) {
                        echo "<a href='det-prod-lista.php?cod=$cod' class='margin'>...</span>";
                        break;
                    }
                    
                    $path = thumb($reg->capa);
                    echo "<span class='margin'><img class='thumb' src='$path'/>";
                    echo "<br>$reg->nome</span>";
                    $count++;
                }
                echo '</p>';
            }
                
        }
        voltar();
        ?>
    </section>
    <?php include_once "../modelo/rodape.php" ?>
</body>
</html>
