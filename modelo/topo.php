
<?php
    //* o que vai aparecer
    // deslogado
    $entrar = "<a class='login' href='paginas/user/login.php'> <span class='material-symbols-outlined'> login </span> </a>";
    $sair = "<a class='login' href='paginas/user/logout.php'>sair</a>";
    // logado
    $alterarDados = "<a class='login' href='paginas/user/edit.php'>Alterar dados</a> ";
    // admin
    $novoUsuario = "<a class='login' href='paginas/user/new.php'>Novo usuario</a> ";
    // editor
    $novoJogo = "<a class='login' href='paginas/user/newGame.php'>Novo jogo</a> "; // todo

    echo "<header style='font-size: 0.6em; text-align: right;'>";
    
    if (!isLog()) {
        echo $entrar;
    } else {
        $user = $_SESSION['nome'];
        echo "<strong class='login'>$user</strong> | $alterarDados";
        
        if (isAdmin()) {
            echo " | $novoJogo";
            echo "| $novoUsuario";
        } elseif (isEditor()) {
            echo " | $novoJogo";
        }

        echo "| $sair";
    }

    echo "</header>";
