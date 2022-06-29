<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="fotos/favicon.png" type="image/x-icon">
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
        <form action="index.php" method="get" id="busca">
            <?php
            // * Urls
            $nomeUrl = "index.php?ord=nome&chave=$chave";
            $produtoraUrl = "index.php?ord=produtora&chave=$chave";
            $nota_altaUrl = "index.php?ord=nota_alta&chave=$chave";
            $nota_baixaUrl = "index.php?ord=nota_baixa&chave=$chave";
            ?>

            <!-- nome --> 
            <a class="ordenar" href="<?php echo $nomeUrl ?>"> nome</a> |
            <!-- produtora --> 
            <a class="ordenar" href="<?php echo $produtoraUrl ?>"> produtora </a> |
            <!-- nota (alta) --> 
            <a class="ordenar" href="<?php echo $nota_altaUrl ?>"> nota (alta) </a> |
            <!-- nota (baixa) --> 
            <a class="ordenar" href="<?php echo $nota_baixaUrl ?>"> nota (baixa)</a> |
            <!-- no filter --> 
            <a class="ordenar" href="index.php">mostrar todos</a>
            <br>

            <!-- pesquisa -->
            <abbr title="clique aqui para pesquisar">
                <input type="text" name="chave" placeholder="pesquise...">
            </abbr>
        </form>

        <!--Jogos-->
        <table class="listagem">
            <?php
                // * query com os joins (sem ord)
                $query = "
                select j.cod, j.nome, j.capa, g.genero, p.produtora from jogos j 
                join generos g on j.genero = g.cod 
                join produtora p on j.produtora = p.cod 
                ";

                // * Busca (no input)  
                if (!empty($chave)) {
                    $query .= " 
                    where j.nome like '%$chave%' or
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
                            $thumb = thumb($reg->capa, "fotos/indisponivel.png", "fotos/");
                            $img = "<img src='$thumb' class='mini'/>";
                            $nome = "<a class='detalhes' href='paginas/detalhes.php?cod=$reg->cod'>$reg->nome</a>";                    
                            $genero = $reg->genero; // todo                             
                            $produtora = $reg->produtora; // todo
                            
                            echo "<br><tr><td>". $img ."<td>". $nome ."<br>" . $genero ." ". $produtora;

                            // * Nivel de acesso
                            if (isAdmin()) {
                                echo " <td> <a href='@'><span class='material-symbols-outlined' id='ico'> edit </span></a> ";
                                echo " <a href='@'><span class='material-symbols-outlined'> remove </span></a>";
                            } elseif (isEditor()) {
                                echo "<td> <a href='@'><span class='material-symbols-outlined' id='ico'> edit </span></a>";
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
