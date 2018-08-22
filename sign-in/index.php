<?php
require "classes/Login.php";

if ($_POST) {
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $login = new Login($email, $senha);
  $resultado = $login->realizarLogin();

  if ($resultado === true) {
    $sucesso = true;
  }
}

  if ($_POST) {
    if (isset($sucesso)) {
      header('location: perfil/index.html');
    } else {
      echo "<br/>Usuário ou senha inválidos!<br/><br/>";
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
   <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <div class="imagem">
      <img src="images/pessoas.jpg"  alt="">
    </div>
    <form class="form-signin" method="post" action="index.php">
      <h1 class="h3 mb-3 font-weight-normal">Login</h1>
      <label for="inputEmail" class="sr-only">Email</label>
      <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input name="password"  type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
      <div class="checkbox mb-3">
        <label>
          <a href="../registro/index.php">Registrar-se</a>
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      <label class="ajuda">
        <a href="../FAQ/faq-template-master/index.php">Precisa de ajuda?</a>
      </label>
    </form>
  </body>
</html>
