<form action="index.php" method="get" id="busca">
    <?php
    // * Urls
    $produtoraUrl = "index.php?ord=produtora&chave=$chave";
    $nota_altaUrl = "index.php?ord=nota_alta&chave=$chave";
    $nota_baixaUrl = "index.php?ord=nota_baixa&chave=$chave";
    ?>

    <span class="material-symbols-outlined"> filter_alt </span>: <!-- icone de filtro -->
    <!-- produtora --> 
    <a class="ordenar" href="<?php echo $produtoraUrl ?>"> produtora </a> |
    <!-- nota (alta) --> 
    <a class="ordenar" href="<?php echo $nota_altaUrl ?>"> nota (alta) </a> |
    <!-- nota (baixa) --> 
    <a class="ordenar" href="<?php echo $nota_baixaUrl ?>"> nota (baixa)</a> |
    <!-- no filter --> 
    <a class="ordenar" href="index.php"> <span class="material-symbols-outlined"> filter_alt_off </span> </a>
    <br>

    <!-- barra de pesquisa -->
    <abbr id="lupa" title="clique aqui para pesquisar">
        <input type="text" name="chave" placeholder="pesquise...">
    </abbr>
</form>