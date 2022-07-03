<?php

function thumb($arq, $pathIndisponivel = "../fotos/indisponivel.png", $pathNormal = "../fotos/") {
        // coloca foto indisponivel se nao tiver foto

        $pathNormal .= "$arq"; // coloca o arquivo no caminho

        if (is_null($arq) || !file_exists($pathNormal)) {
            return $pathIndisponivel;
        } else {
            return $pathNormal;
        }
    }

    function voltar($path = "../index.php") {
        // volta pra uma pagina especificada 

        echo "<br> <a class='back' href='$path'><span class='material-icons md-light' width='100'> arrow_back_ios </span></a>
        ";
    }

    function msgSuces($msg) {
        // mostra uma mensagem de sucesso

        $res = "<div class='suc'> <span class='material-icons md-light' width='100'> done </span> $msg </div>";
        echo $res;
    }

    function msgAviso($msg) {
        // mostra uma mensagem de aviso

        $res = "<div class='av'> <span class='material-icons md-light' width='100'> priority_high </span> $msg </div>";
        echo $res;
    }

    function msgErro($msg) {
        // mostra uma mensagem de erro

        $res = "<div class='err'> <span class='material-icons md-light' width='100'> close </span> $msg </div>";
        echo $res;
    }

    function mediaNotas($sep , $notas) {
        // faz a média algumas notas e printa as estrelas

        // media
        $media = intval(array_sum($notas) / count($notas));

        // Classificação das notas
        if ($media <= 3 ) {
            echo $sep . "<abbr title='$media/10'> ⭐☆☆☆☆ </abbr>";
        } elseif ($media <= 5) {
            echo $sep . "<abbr title='$media/10'> ⭐⭐☆☆☆ </abbr>";
        } elseif ($media <= 7) {
            echo $sep . "<abbr title='$media/10'> ⭐⭐⭐☆☆ </abbr>";
        } elseif ($media <= 9) {
            echo "<tr> <td> <abbr title='$media/10'> ⭐⭐⭐⭐☆ </abbr>";
        } elseif ($media > 9) {
            echo $sep . "<abbr title='$media/10'> ⭐⭐⭐⭐⭐ </abbr>";
        } else {
            echo $sep . "<abbr title='$media/10'> ☆☆☆☆☆ </abbr>";
        }
    }

?>