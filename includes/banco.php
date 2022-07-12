<?php
    // Conecta no banco
    $banco = new mysqli('localhost', 'root', 'jcmmln8Mysql', 'games');
    
    if ($banco -> connect_errno): // se tiver erro na conecção
        msgErro("Infelismente não encontramos nenhum registro");
        die();
    endif;

?>
