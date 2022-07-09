
<?php
    //* o que vai aparecer
    // deslogado
    $entrar = "<a class='login' href='paginas/user/login.php'> <span class='material-symbols-outlined'> login </span> </a>";
    $sair = "<a class='login' href='paginas/user/logout.php'>sair</a>";
    // logado
    $alterarDados = "<a class='login' href='paginas/user/edit.php'>Alterar dados</a> ";
    $novo = "<a class='login' href='modelo/menuNew.php'> Novo </a>";

    echo "<header style='font-size: 0.6em; text-align: right;'>";
    
    if (!isLog()) {
        echo $entrar;
    } else {
        $user = $_SESSION['nome'];
        echo "<strong class='login'>$user</strong> | $alterarDados";
        
        if (isAdmin()) {
            echo " | $novo";
        } elseif (isEditor()) {
            echo " | $novo";
        }

        echo "| $sair";
    }

    echo "</header>";
