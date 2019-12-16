<!DOCTYPE html>
  <html lang="pt-br">
  <head>
      <title>Edição de clientes</title>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="../css/edicaoClientes.css">
      <script src="../js/jquery-3.4.1.min.js"></script>
      <script src="../js/jquery.mask.min.js"></script>
        <script src="../js/edita.js"></script>
  </head>

  <body>
  <?php include("menu.php"); ?>

  <br><br><br>
  <h1>Edição de clientes</h1>
<div>
  <?php
    if(isset($_GET['retorno']) && $_GET['retorno']==1){
      include("../alertas/sucesso.html");
    }else if(isset($_GET['retorno']) && $_GET['retorno']==2){
      include("../alertas/erro.html");
    }
  ?>
</div>
    <fieldset>
    <legend>Dados do cliente</legend>
  <?php
    require_once("conexaoBanco.php");
    $cpf = $_POST['cpf'];

    $comando="SELECT * FROM clientes WHERE cpf='".$cpf."'";

    $resultado=mysqli_query($conexao,$comando);

    $clientes=mysqli_fetch_assoc($resultado);

  ?>

    <form action="editaCliente.php" method="POST">
			<input class="inputsForm" type="hidden" name="cpf" value="<?=$clientes['cpf'];?>">

			<label>Nome do cliente</label>
			<input class="inputsForm" type="text" name="nome" placeholder="ex.:Eduardo" value="<?=$clientes['nome'];?>"><br>

			<label>Data de Nascimento</label>
			<input class="inputsForm" type="date" name="dataNasc" placeholder="ex.:08/09/10" value="<?=$clientes['dataNasc'];?>"><br>

      <label>Telefone</label>
			<input class="inputsForm" type="text" name="telefone" id="telefone1" placeholder="ex.:(47)99999-9999" value="<?=$clientes['telefone'];?>"><br>

			<button class="botoesAcao" type="submit">Enviar</button>
		</form>
  </fieldset>

  </body>
  </html>
