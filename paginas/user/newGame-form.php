<form action="newGame.php" method="post">

    <!-- Capa -->
    <label for="capa">Capa: </label> 
    <input type="file" name="capa" id="capa"> <br>

    <!-- Nome -->
    <label for="nome">Nome: </label>
    <input type="text" name="nome" id="nome" maxlength="40" size='40'> <br>

    <!-- Nota -->
    <label for="nota">Nota: </label>
    <input type="number" name="nota" id="nota" max='10' min='0'> <br>

    <!-- Generos --> 
    <label for="gen">Genero: </label>
    <select name="genero" id="gen">
    <?php
        // Query que pega o nome de todos os generos
        $buscaGen = $banco->query("select genero from generos"); 

        while ($reg = $buscaGen->fetch_object()) {
            echo "<option value='$reg->genero'> $reg->genero </option>";
        }
    ?>
    </select> ou <a href="newGen.php"> <span class="material-symbols-outlined"> add </span> </a> <br>

    <!-- Produtoras -->
    <label for="prod">Produtora: </label>
    <select name="produtora" id="prod">
    <?php
        // Query que pega o nome de todas as produtoras
        $buscaProd = $banco->query("select produtora from produtoras");

        while ($reg = $buscaProd->fetch_object()) {
            echo "<option value='$reg->produtora'> $reg->produtora </option>";
        }
    ?>
    </select> ou <a href="newProd.php"> <span class="material-symbols-outlined"> add </span> </a> <br>

    <!-- Descrição -->
    <label for="desc">Descrição: </label> <br>
    <textarea style='resize: none; font-size: 0.8em;' name="descricao" id="desc" cols="30" rows="5"></textarea> <br>

    <input type="submit" value="Salvar" id='submit'>
</form>