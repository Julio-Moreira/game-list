<form action="index.php" method="get" id="busca">
    <?php
    // * Urls
    $produtoraUrl = "index.php?ord=produtora&chave=$chave";
    $nota_altaUrl = "index.php?ord=nota_alta&chave=$chave";
    $nota_baixaUrl = "index.php?ord=nota_baixa&chave=$chave";
    ?>

    <span class="material-symbols-outlined"> filter_alt </span>: 
    <a class="ordenar" href="<?php echo $produtoraUrl ?>"> produtora </a> |
    <a class="ordenar" href="<?php echo $nota_altaUrl ?>"> nota (alta) </a> |
    <a class="ordenar" href="<?php echo $nota_baixaUrl ?>"> nota (baixa)</a> |
    <a class="ordenar" href="index.php"> <span class="material-symbols-outlined"> filter_alt_off </span> </a>
    <br>

    <!-- barra de pesquisa - bootstrap-->
    <abbr id="lupa" title="clique aqui para pesquisar">
        <input type="text" name="chave" placeholder="pesquise...">
    </abbr>
</form>
