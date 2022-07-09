<form action="newGame.php" method="post" enctype="multipart/form-data">

    <!-- Capa -->
    <label for="capa">Capa: </label> 
    <input type="file" name="capa" id="capa"> <br>
    <em style="font-size: 0.5em;">*por segurança só aceitamos arquivos do tipo png</em> <br>

    <!-- Nome -->
    <label for="nome">Nome: </label>
    <input required type="text" name="nome" id="nome" maxlength="40" size='40'> <br>

    <!-- Nota -->
    <label for="nota">Nota: </label>
    <input required type="number" name="nota" id="nota" max='10' min='0'> <br>

    <!-- Generos --> 
    <label for="gen">Genero: </label>
    <select name="genero" id="gen">
    <?php
        // Query que pega o nome e o codigo de todos os generos
        $buscaGen = $banco->query("select genero, cod from generos"); 

        while ($reg = $buscaGen->fetch_object()) {
            echo "<option value='$reg->cod'> $reg->genero </option>";
        }
    ?>
    </select> ou <a href="newGen.php"> <span class="material-symbols-outlined"> add </span> </a> <br>

    <!-- Produtoras -->
    <label for="prod">Produtora: </label>
    <select name="produtora" id="prod">
    <?php
        // Query que pega o nome e o codigo de todas as produtoras
        $buscaProd = $banco->query("select produtora, cod from produtoras");

        while ($reg = $buscaProd->fetch_object()) {
            echo "<option value='$reg->cod'> $reg->produtora </option>";
        }
    ?>
    </select> ou <a href="newProd.php"> <span class="material-symbols-outlined"> add </span> </a> <br>

    <!-- Descrição -->
    <label for="desc">Descrição: </label> <br>
    <textarea required style='resize: none; font-size: 0.8em;' name="descricao" id="desc" cols="30" rows="5"></textarea> <br>

    <input type="submit" value="Salvar" id='submit'>
</form>