
<?php
    require_once "includes/banco.php";

    echo "<footer style='text-align: center; font-size: 0.6em;'>";

    echo "<p>Desenvolvido por <strong>Julio</strong> &copy; ".date('Y')."</p>";
    echo "<p>Baseado no curso PHP com Mysql do <a href='https://www.estudonauta.com' target='_blank'>estudonauta</a></p>";
    
    echo "</footer>";
    $banco->close();
    
?>
