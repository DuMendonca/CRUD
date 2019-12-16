<?php

  require_once("conexaoBanco.php");

  $cpf = $_POST['cpf'];
  $nome = $_POST['nome'];
  $data = $_POST['dataNasc'];
  $tel = $_POST['telefone'];

$comando="UPDATE clientes SET nome='".$nome."' , dataNasc='".$data."' , telefone='".$tel."' WHERE cpf='".$cpf."'";

$resultado=mysqli_query($conexao,$comando);

if ($resultado==true) {
  header("Location: registroForm.php?retorno=1");
}else{
  header("Location: registrForm.php?retorno=0");
}

 ?>
