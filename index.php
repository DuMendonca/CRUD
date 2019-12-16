<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Pagina Inicial</title>
  <meta charset="utf-8">
  <link rel="stylesheet"  href="css/index.css">
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
    <script src="js/index.js"></script>
</head>
<body>
  <form action="paginaAdm/efetuaLogin.php" method="post" name="formulario" onsubmit="return validaCampos()">
    <legend id="legendImg"><img src="img/img.png"></legend>
    <fieldset id="login">
    <label>CPF</label><br><br>
    <input type="text"  minlength="11" maxlength="11" name="cpf" id="cpf1" placeholder="Ex: 999.999.999-99"><br><br>

    <label>Senha</label><br><br>
    <input type="password" maxlength="15" name="senha" id="senha1" placeholder="Insira sua senha">
  </fieldset>
    <button type="reset" name="Limpar" id="botaoLimpar">Limpar</button>

    <button type="submit"  name="Logar" id="botaoLogin">Logar</button>

  </form>
</body>
</html>
