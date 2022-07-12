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
        if (isAdmin()) {
            // Query que pega a capa do jogo especificado
            $query = "select capa from jogos where nome = '$nome'";
            $busca = $banco->query($query);
            $reg = $busca->fetch_object();

            // deleta do diretorio local do server
            $deleteCapa = `rm ../../fotos/$reg->capa`;
            // Query que deleta todos os dados do jogo especificado 
            $deleteGame = "delete from jogos where nome = '$nome' limit 1";
            
            // concretização das querys
            (!$deleteCapa) ? msgSuces('A imagm foi removida com sucesso') : msgErro('A imagem não pode ser removida '); 
            query($deleteGame, 'Os dados foram deletados', 'Infelismente esse jogo não pode ser deletado', $banco);
        } else {
            msgErro('Você precisa ser administrador para deletar um jogo');
        }

        voltar();
        header("Location: ../../index.php");
        ?>
    </section>
    <?php include_once "../modelo/rodape.php" // rodape ?>
</body>
</html>