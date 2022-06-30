<?php

    // coloca foto indisponivel se nao tiver foto 
    function thumb($arq, $pathInds = "../fotos/indisponivel.png", $pathNorm = "../fotos/") {
        $pathNorm .= "$arq";

        if (is_null($arq) || !file_exists($pathNorm)) {
            return "$pathInds";
        } else {
            return $pathNorm;
        }
    }

    // volta pra uma pagina especificada 
    function voltar($path = "../index.php") {
        echo "<br> <a class='back' href='$path'><span class='material-icons md-light' width='100'> arrow_back_ios </span></a>
        ";
    }

    // mostra uma mensagem de sucesso
    function msgSuces($msg) {
        $res = "<div class='suc'> <span class='material-icons md-light' width='100'> done </span> $msg </div>";
        echo $res;
    }

    // mostra uma mensagem de aviso
    function msgAviso($msg) {
        $res = "<div class='av'> <span class='material-icons md-light' width='100'> priority_high </span> $msg </div>";
        echo $res;
    }

    // mostra uma mensagem de erro
    function msgErro($msg) {
        $res = "<div class='err'> <span class='material-icons md-light' width='100'> close </span> $msg </div>";
        echo $res;
    }

?>