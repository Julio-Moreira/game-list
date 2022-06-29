<?php
    //       new mysqli(host, usuario, senha, banco);
    $banco = new mysqli('localhost', 'root', 'jcmmln8Mysql', 'games');
    
    if ($banco -> connect_errno):
        msgErro("ERR0 no banco de dados");
        die();
    endif;

?>
