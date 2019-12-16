<?php

require_once("conexaoBanco.php");

$cpf = $_POST['cpf'];

$comando="DELETE FROM clientes WHERE cpf='".$cpf."'";
$resultado = mysqli_query($conexao,$comando);
if ($resultado==true){
  header("Location: registroForm.php?retorno=1");
}else{
  header("Location: registroForm.php?retorno=0");
}
?>
