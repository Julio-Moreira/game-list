<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estilos/index.css">
    <link rel="shortcut icon" href="../../fotos/favicon/deletar.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>deletar jogo</title>
</head>
<body>
    <?php 
        //* Includes
        require_once "../../includes/banco.php";
        require_once "../../includes/login.php";
        require_once "../../includes/func.php";
    ?>
    <section id="corpo">
        <?php
        $nome = $_GET['nome'] ?? 'desconhecido';
        
        $query = "select capa, produtora, genero from jogos
        where nome = '$nome'";
        $busca = $banco->query($query);
        $reg = $busca->fetch_object();

        $deleteCapa = `rm ../../fotos/$reg->capa`;
        $deleteGame = "delete from jogos where nome = '$nome' limit 1";
        $busca2 = $banco->query($deleteGame);

        if (!$deleteCapa || !$busca || !$busca2) {
            msgErro('Infelismente esse jogo não pode ser deletado');
            header("Location: ../../index.php");
        } else {
            msgSuces('Os dados foram deletados');
            header("Location: ../../index.php");
        }
        voltar();
        ?>
    </section>
    <?php include_once "../modelo/rodape.php" // rodape ?>
</body>
</html>