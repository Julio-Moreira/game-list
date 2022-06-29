
<?php
    require_once "includes/banco.php";

    echo "<footer style='text-align: center; font-size: 0.6em;'>";

    echo "<p>Acessado por ".$_SERVER['REMOTE_ADDR']." em ".date("d/m/y")."</p>";
    echo "<p>Desenvolvido por <strong>Julio</strong> &copy; ".date('Y')."</p>";
    
    echo "</footer>";
    $banco -> close();