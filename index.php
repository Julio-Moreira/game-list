<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="fotos/favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="estilos/index.css">
    <!-- google icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    
    <title>Listagem de Jogos</title>
</head>
<body>
    <?php 
        // * Includes 
        require_once "includes/banco.php";
        require_once "includes/login.php";
        require_once "includes/func.php"; 
        // * ordenaçao
        $ordem = $_GET['ord'] ?? 'nome';
        $chave = $_GET['chave'] ?? '';
    ?>

    <section id="corpo">
        <?php include_once "modelo/topo.php" // topo da pag ?>
        <h1>Jogos</h1>
        
        <!-- Ordenacao -->
        <?php require_once "index-form.php" ?>

        <!--Jogos-->
        <table class="listagem">
            <?php
                // Query que pega o nome, a capa, o genero e a produtora dos jogos (sem as ordenações)
                $query = " select j.cod, j.nome, j.capa, g.genero, p.produtora from jogos j 
                join generos g on j.genero = g.cod 
                join produtoras p on j.produtora = p.cod 
                ";

                // * Busca (no input)  
                if (!empty($chave)) {
                    $query .= " where j.nome like '%$chave%' or
                    p.produtora like '%$chave%' or
                    g.genero like '%$chave%' ";
                }

                // * ordenacao 
                switch ($ordem) {
                    case 'produtora':
                        $query .= " order by p.produtora";
                        break;
                    case 'nota_alta':
                        $query .= " order by j.nota desc";
                        break;
                    case 'nota_baixa':
                        $query .= " order by j.nota";
                        break;
                    default:
                        $query .= " order by j.nome";
                }

                $busca = $banco->query($query);         
                if (!$busca): // se a busca nao der certo
                    msgErro('Nenhum jogo disponivel no momento <br> =(');
                else:
                    if ($busca->num_rows == 0): 
                        msgErro('Nenhum jogo encontrado =(');
                    else:
                        // * print
                        while ($reg = $busca -> fetch_object()) {
                            // Img
                            $pathImg = thumb($reg->capa, "fotos/indisponivel.png", "fotos/");
                            $img = "<img src='$pathImg' class='mini'/>";
                            // Nome
                            $palceholderNome = $reg->nome ?? "Desconhecido";
                            $pathDet = "paginas/detalhes.php?cod=$reg->cod";
                            $nome = "<a class='detalhes' href='$pathDet'> $palceholderNome </a>";                    
                            // Genero
                            $pathDetgen = "paginas/detalhes-genero.php?cod=$reg->genero";
                            $genero = "<a class='detalhesGP' href='$pathDetgen'> $reg->genero </a>";                             
                            // Produtora 
                            $pathDetprod = "paginas/detalhes-produtora.php?cod=$reg->produtora";
                            $produtora = "<a class='detalhesGP' href='$pathDetprod'> $reg->produtora </a>";
                            
                            // Printa tudo
                            echo "<br> <tr> <td>". $img ."<td>". $nome ."<br>" . $genero ." ". $produtora;

                            // * Nivel de acesso
                            if (isAdmin()) { // se for adm
                                echo " <td> <a href='@'><span class='material-symbols-outlined' id='ico'> edit </span></a> "; // todo
                                echo " <a href='@'> <span class='material-symbols-outlined'> remove </span> </a>"; // todo
                            } elseif (isEditor()) { // se for editor
                                echo "<td> <a href='@'><span class='material-symbols-outlined' id='ico'> edit </span></a>"; // todo
                            }
                        }
                    endif;
                endif;
            ?>
            </table>
    </section>
    
    <?php include_once "modelo/rodape.php" // rodape da pag ?>
</body>
</html>
