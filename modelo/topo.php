
<?php
    // o que vai aparecer
    $user = $_SESSION['nome'] ?? 'Usuario';
    // deslogado
    $entrar = "<a class='login' href='paginas/user/login.php'> <span class='material-symbols-outlined'> login </span> </a>";
    $sair = "<a class='login' href='paginas/user/logout.php'> Sair </a>";
    // logado
    $alterarDados = "<a class='login' href='paginas/user/edit.php'> Alterar dados </a> ";
    $novo = "<a class='login' href='modelo/menuNew.php'> Novo </a>";

    echo "<header style='font-size: 0.6em; text-align: right;'>";
    
    if (!isLog()) {
        echo $entrar;
    } else {
        echo "<strong>$user</strong> | $alterarDados";
        
        if (isAdmin()) {
            echo " | $novo";
        } elseif (isEditor()) {
            echo " | $novo";
        }

        echo "| $sair";
    }

    echo "</header>";
