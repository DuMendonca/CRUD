<?php
require_once("conexaoBanco.php");

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

$senha=md5($senha);

$comando="SELECT * FROM  usuarios WHERE cpf='".$cpf."' AND senha='".$senha."'";

$resultado=mysqli_query($conexao,$comando);
$usuario=mysqli_fetch_assoc($resultado);
$linhas=mysqli_num_rows($resultado);

if($linhas==0){
  header("Location: ../index.php");
}else{
  session_start();
  $_SESSION['cpfLogado']=$usuario['cpf'];

  if(isset($_SESSION['cpfLogado'])==true){
    header("Location: paginaAdminis.php");
  }else{
    header("Location: ../index.php");
  }
}




 ?>
