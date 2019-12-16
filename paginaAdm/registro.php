<?php

require_once("conexaoBanco.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$data = $_POST['data'];
$tel = $_POST['telefone'];



$comando="INSERT INTO clientes (cpf, nome, dataNasc, telefone) VALUES ('".$cpf."', '".$nome."', '".$data."', '".$tel."')";

$resultado = mysqli_query($conexao, $comando);

if ($resultado == true) {
    header("Location:registroForm.php?retorno=1");
}else{
   header("Location:registroForm.php?retorno=0");
}

 ?>
