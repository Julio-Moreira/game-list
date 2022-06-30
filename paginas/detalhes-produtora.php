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
            $path = thumb($reg->logo);
            $logo = "<img src='$path' class='full' />";
            
            echo "<h1> $nome </h1>";
            echo "criada por $criadores em $data no $pais ";
            echo "<br>$desc <br> $logo";
            // todo: media de notas e jogos dessa produtora 
        }

        voltar();
        ?>
    </section>
    <?php include_once "../modelo/rodape.php" ?>
</body>
</html>