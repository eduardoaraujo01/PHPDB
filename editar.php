<?php
require 'config.php';
require 'dao/UsuarioDaoMySQL.php';

$usuarioDao = new UsuarioDaoMySQL($pdo);

$usuario = false;
$id = filter_input(INPUT_GET, 'id');

if($id){

    $usuario = $usuarioDao->findById($id);

}
if($usuario === false){
    header("Location: index.php");
    exit;
}


?>
<h1>Editar Usuario</h1>
<form method="post" action="editar_action.php">
    <input type="hidden" name="id" value="<?=$usuario->getId();?>"/>
    <label>
        Nome:<br/>
        <input type="text" name="name" value="<?=$usuario->getNome();?>"/>
    </label> <br/><br/>

    <label>
        E-mail:<br/>
        <input type="email" name="email" value="<?=$usuario->getEmail();?>"/>
    </label> <br/><br/>
    <label>
        Id:<br/>
        <input type="number" name="id" value="<?=$usuario->getId();?>"/>
    </label> <br/><br/>

    <input type="submit" value="Salvar"/>
    
</form>
<a href="index.php">INICIO</a>