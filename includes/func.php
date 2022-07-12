<?php
    function thumb(string $arq, $pathIndisponivel = "../fotos/indisponivel.png", $pathNormal = "../fotos/") {
        // Cria o caminho para a foto mas se não tiver foto ele coloca indisponivel

        $pathNormal .= "$arq"; // coloca o arquivo no caminho

        if (is_null($arq) || !file_exists($pathNormal)) {
            return $pathIndisponivel;
        } else {
            return $pathNormal;
        }
    }

    function voltar(string $path = "javascript: history.go(-1)") {
        // cria um icone que volta pra uma pagina especificada ou para 1 pagina atras

        echo "<br> <a class='back' href='$path'><span class='material-icons md-light' width='100'> arrow_back_ios </span></a>
        ";
    }

    function msgSuces(string $msg) {
        // mostra uma mensagem de sucesso

        $res = "<div class='suc'> <span class='material-icons md-light' width='100'> done </span> $msg </div>";
        echo $res;
    }

    function msgAviso(string $msg) {
        // mostra uma mensagem de aviso

        $res = "<div class='av'> <span class='material-icons md-light' width='100'> priority_high </span> $msg </div>";
        echo $res;
    }

    function msgErro(string $msg) {
        // mostra uma mensagem de erro

        $res = "<div class='err'> <span class='material-icons md-light' width='100'> close </span> $msg </div>";
        echo $res;
    }

    function mediaNotas(array $notas, string $sep = "") {
        // faz a média algumas notas e printa as estrelas

        // media
        $media = intval(array_sum($notas) / count($notas));

        // Classificação das notas
        if ($media <= 3 ) {
            echo $sep . " <abbr title='$media/10'> ⭐☆☆☆☆ </abbr>";
        } elseif ($media <= 5) {
            echo $sep . " <abbr title='$media/10'> ⭐⭐☆☆☆ </abbr>";
        } elseif ($media <= 7) {
            echo $sep . " <abbr title='$media/10'> ⭐⭐⭐☆☆ </abbr>";
        } elseif ($media <= 9) {
            echo $sep . " <abbr title='$media/10'> ⭐⭐⭐⭐☆ </abbr>";
        } elseif ($media > 9) {
            echo $sep . " <abbr title='$media/10'> ⭐⭐⭐⭐⭐ </abbr>";
        } else {
            echo $sep . " <abbr title='$media/10'> ☆☆☆☆☆ </abbr>";
        }
    }

    function query(string $query, string $msgSuc, string $msgErr, object $banco) {
        // Faz a query e manda uma msg de erro ou sucesso
        $busca = $banco->query($query);

        // Se a busca der certo manda uma msg de sucesso, se não manda uma msg de erro e retorna a busca
        (!$busca) ? msgErro($msgErr) : msgSuces($msgSuc);
        return $busca;
    }
?>