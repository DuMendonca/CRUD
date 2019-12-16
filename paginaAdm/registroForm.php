<?php
session_start();
if(isset($_SESSION['cpfLogado'])==true){
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Registro de Clientes</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/registro.css"/>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/jquery.mask.min.js"></script>
    <script src="../js/registro.js"></script>
</head>
<body>

<?php include("menu.php"); ?>

<h1 id="h1Registro">Registro de Clientes</h1>


<div id="divRegistro">
<form  action="registro.php" method="POST" name="formulario" onsubmit="return validarCampos()">
  <fieldset id="registroCliente">
	<legend id="legRegistro">Dados pessoais</legend>
    <label class="registro">*Nome completo</label><br>
    <input  type="text" maxlength="50" name="nome" id="nome1" placeholder="Ex: João da Costa Silva">
	<br><br>

    <label class="registro">*CPF</label><br>
    <input type="text" maxlength="11" name="cpf" id="cpf1" placeholder="Ex: 999.999.999-99">
	<br><br>

    <label class="registro">Data de nascimento</label><br>
    <input type="date" name="data" id="data1">
	<br><br>

    <label class="registro">Telefone</label><br>
    <input type="text" maxlength="9" name="telefone" id="telefone1" placeholder="Insira seu telefone">
	<br><br>


  <button type="reset" name="Limpar" id="limpar">Limpar</button>

  <button type="submit"  name="Logar" id="login">Enviar</button>
  </fieldset>
</form>
</div>

<div id="divConsulta">
    <fieldset id="consultaCliente">
      <legend id="legConsulta">Consulta de cliente</legend>
      <form action="#" method="GET" id="formConsulta" onsubmit="return validarDados()">
        <label for="consultaNomeCliente" id="labelConsultaNome">Nome:</label>
        <input type="text" name="consultaNomeCliente" id="consultaNomeCliente">
        <button type="submit">Buscar</button>
      </form>
	 <table>
        <tr>
          <th>Nome completo</th>
		      <th>CPF</th>
          <th>Data de nascimento</th>
		      <th>Telefone</th>
          <th>Ações</th>
        </tr>
        <?php
	       require_once("conexaoBanco.php");

          if(isset($_GET['consultaNomeCliente'])==false){
            $comando="SELECT * FROM clientes";
          }
          else if(isset($_GET['consultaNomeCliente'])==true && $_GET['consultaNomeCliente']==""){
            $comando="SELECT * FROM clientes";
          }
          else if(isset($_GET['consultaNomeCliente'])==true && $_GET['consultaNomeCliente']!=""){

              $busca = $_GET['consultaNomeCliente'];
              $comando = "SELECT * FROM clientes WHERE nome LIKE '".$busca."%'";
          }
          $resultado = mysqli_query($conexao,$comando);

          $linhas=mysqli_num_rows($resultado);

          if($linhas==0){   ?>
            <tr>
              <td colspan="5">Nenhum cliente encontrado!</td>
            </tr>

          <?php
        }else{

          $retornaClientes = array();

          while($cadaLinha = mysqli_fetch_assoc($resultado)){
            array_push($retornaClientes,$cadaLinha);
          }

          foreach ($retornaClientes as $cadaCliente) {

            ?>
            <tr>
              <td> <?php echo $cadaCliente['nome'];?> </td>
              <td> <?php echo $cadaCliente['cpf'];?></td>
              <td> <?php echo $cadaCliente['dataNasc'];?></td>
              <td> <?php echo $cadaCliente['telefone'];?></td>
              <td>
                <form action="editaClienteForm.php" method="POST">
              <input type="hidden" name="cpf" value="<?=$cadaCliente['cpf'];?>">
              <button type="submit"><img src="../img/pencil.png" alt="Botão editar"></button>
            </form>
            <form action="excluiCliente.php" method="POST">
              <input type="hidden" name="cpf" value="<?=$cadaCliente['cpf'];?>">
              <button type="submit"><img src="../img/trash.png" alt="Botão lixeiro"></button>
            </form>
          </td>
        </tr>
        <?php
      }
    }
    ?>
      </table>
      <div>
      <?php
      if(isset($_GET['retorno'])==true){
      		if($_GET['retorno']==1){
            $msg="Sucesso ao realizar operação!";
      			include("../alertas/sucesso.php");
      		}else if ($_GET['retorno']==0){
            $msg="Erro ao realizar operação!";
      			include("../alertas/erro.php");
      		}
      }
       ?>
      </div>
	  </fieldset>
  </div>
</body>
</html>
<?php
}else{
  header("Location: ../index.php");
}

 ?>
