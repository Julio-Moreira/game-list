<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estilos/index.css">
    <link rel="shortcut icon" href="../../fotos/favicon/new-game.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>novo jogo</title>
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

            if (!isset($_POST['nome'])) {
                require_once "newGame-form.php";
            } else {
                // Dados
                // capa
                $capa = $_FILES['capa']; 
                $capaNome = $capa['name'];
                $capaTipo = pathinfo($capaNome, PATHINFO_EXTENSION); 
                $capaArq = $capa['tmp_name'];
                $novoNome = uniqid(). '.'. $capaTipo;
                // nome 
                $nome = $_POST['nome'] ?? 'desconhecido';
                // descrição
                $desc = $_POST['descricao'] ?? 'sem dados';
                // nota
                $nota = $_POST['nota'] ?? '0';
                // genero 
                $gen = $_POST['genero'] ?? '0';
                // produtora
                $prod = $_POST['produtora'] ?? '0';     
                
                if ($capaTipo != 'png') {
                    msgErro('Você só pode carregar arquivos do tipo png e não '. $capaTipo);
                    sleep(0.5); // espera 0.5 segundos
                    voltar('../../index.php'); // redireciona o usu para o index
                    die();
                } else {
                    $img = move_uploaded_file($capaArq, "../../fotos/".$novoNome); // Coloca o arquivo na pasta fotos
                    if (!$img) {
                        msgErro('infelismente não pudemos carregar sua imagem');
                        voltar('../../index.php'); // redireciona o usu para o index
                        die();
                    }
                }

                // Query que insere os dados no db
                $query = "insert into jogos values
                (default, '$nome', '$gen', '$prod', '$desc', '$nota', '$novoNome')";

                $busca = $banco->query($query);
                if (!$busca) {
                    msgErro(' infelismente não conseguimos cadastrar esses dados');
                } else {
                    msgSuces('Os dados foram cadastrados com sucesso');
                    sleep(0.5);
                    header('Location: ../../index.php');
                }            
            }
            voltar("../../index.php");
        ?>
    </section>
    <!-- Credits icon -->
    <em style='text-align: center; font-size: 0.6em;'><a target="_blank" href="https://icons8.com/icon/12023/novo">Novo</a> icon by <a target="_blank" href="https://icons8.com">Icons8</a></em>
    
    <?php include_once "../../modelo/rodape.php" // rodape ?>
</body>
</html>