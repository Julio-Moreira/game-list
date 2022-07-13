<?php 
    // Pega o nome, capa, nota, codigo de generos e produtoras, generos, produtoras e a descrição dos jogos
    $query = "select j.nome, j.capa, j.nota, g.cod as cod_gen, g.genero, p.cod as cod_prod, p.produtora, j.descricao from jogos j
    join produtoras p on j.produtora = p.cod 
    join generos g on j.genero = g.cod 
    where j.nome = '$antNome'";
    $busca = $banco->query($query);
    $reg = $busca->fetch_object();
    // deleta a img antiga
    `rm ../../fotos/$reg->capa` ? msgErro('A imagem antiga não pode ser deletada') : msgSuces('A imagem antiga foi deletada com sucesso');
?>

<form action="game.php" method="post" enctype="multipart/form-data">
    <!-- capa -->
    <label for="capa">Capa: </label> 
    <input required type="file" name="capa" id="capa"> <br>
    <em style="font-size: 0.5em;">*por segurança só aceitamos arquivos do tipo png</em> <br>

    <!-- nome -->
    <label for="nome">Nome: </label>
    <input required type="text" name="nome" id="nome" maxlength="40" size='40' value="<?php echo $reg->nome ?>"> <br>

    <!-- nota --> 
    <label for="nota">Nota: </label>
    <input required type="number" name="nota" id="nota" max='10' min='0' value="<?php echo $reg->nota ?>"> <br>

    <!-- genero -->
    <label for="gen">Genero: </label>
    <select name="genero" id="gen">
    <?php 
        echo "<option value='$reg->cod_gen'> $reg->genero </option>";

        // Query que pega o nome e o codigo de todos os generos
        $buscaGen = $banco->query("select genero, cod from generos"); 

        while ($reg_2 = $buscaGen->fetch_object()) {
            if ($reg_2->cod != $reg->cod_gen) {
                echo "<option value='$reg_2->cod'> $reg_2->genero </option>";
            }
        }
    ?>
    </select> ou <a href="../new/gen.php"> <span class="material-symbols-outlined"> add </span> </a> <br>

    <!-- produtora --> 
    <label for="prod">Produtora: </label>
    <select name="produtora" id="prod">
    <?php 
        echo "<option value='$reg->cod_prod'> $reg->produtora </option>";
    
        // Query que pega o nome e o codigo de todas as produtoras
        $buscaProd = $banco->query("select produtora, cod from produtoras");

        while ($reg_3 = $buscaProd->fetch_object()) {
            if ($reg_3->cod != $reg->cod_prod) {
                echo "<option value='$reg_3->cod'> $reg_3->produtora </option>";
            }
        }
    ?>
    </select> ou <a href="../new/prod.php"> <span class="material-symbols-outlined"> add </span> </a> <br>

    <!-- descrição -->
    <label for="desc">Descrição: </label> <br>
    <textarea required style='resize: none; font-size: 0.8em;' name="descricao" id="desc" cols="30" rows="5"><?php echo $reg->descricao ?></textarea> 
    
    <!-- manda o nome principal para o programa principal -->
    <input type="hidden" name="nomePrinc" value="<?php echo $reg->nome ?>"><br>

    <input type="submit" value="Salvar">
</form>