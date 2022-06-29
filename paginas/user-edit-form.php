<?php
    // querys
    $query = "
    select usuario, nome, tipo from usuarios
    where usuario='". $_SESSION['user'] ."'";

    $busca = $banco->query($query);
    $reg = $busca->fetch_object();
?>

<h1>Alteracao de dados</h1>

<!-- form --> 
<form action="user-edit.php" method="post">   
    <!-- usuario -->
    <abbr title="você não pode modificar seu nome de usuario"> Usuario: <?php echo $reg->usuario ?> </abbr> <br>
    <!-- tipo -->
    <abbr style="margin-bottom: 15px;" title="você não pode modificar seu tipo de usuario"> Tipo: <?php echo $reg->tipo ?> </abbr> <br>
    <!-- nome -->
    <label for="nome">Nome: </label> 
    <input type="text" id="nome" name="nome"  size="30" maxlength="30" value="<?php echo $reg->nome ?>"> <br>
    <!-- senhas -->
    <label for="senha">Senha: </label> 
    <input type="password" id="senha" name="senha1" size="10" maxlength="10"> <br>

    <label for="confirmSenha">Confirme a senha: </label>  
    <input type="password" id="confirmSenha" name="senha2" size="10" maxlength="10"> <br>
    
    <input type="submit" id="submit" value="Salvar">
</form>
