<?php
require "classes/Cadastro.php";

if ($_POST) {
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome']
  $email = $_POST['email'];
  $sexo = $_POST['sexo'];
  $senha = $_POST['senha'];


  $cadastro = new Cadastro($nome, $sobrenome, $email, $sexo, $senha);
  $resultado = $cadastro->realizarCadastro();

  if ($resultado === true) {
    $sucesso = true;
  } else {
    $sucesso = false;
  }
}

// session_start();
// if($_POST){
// $_SESSION["email"] = $_POST["email"];
// $_SESSION["password"] = $_POST["password"];
// header("Location:../sign-in/index.php");
// exit;
// }


session_start();
if($_POST){
$_SESSION["email"] = $_POST["email"];
$_SESSION["password"] = $_POST["password"];
header("Location:../sign-in/index.php");
exit;
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

    <title>Registro</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
   <link rel="../sign-in/signin.css" href="/css/master.css">
   <link href="registro.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="post" action="index.php">
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Cadastro</h1>
      <label for="inputName" class="sr-only">Nome</label>
      <input name="nome" type="text" id="inputName" class="form-control" placeholder="Nome" required autofocus>
      <label for="inputLastName" class="sr-only">Sobrenome</label>
      <input name="sobrenome" type="text" id="inputLastName" class="form-control" placeholder="Sobrenome" required autofocus>
      <label for="inputEmail" class="sr-only">Email</label>
      <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
      <label for="inputPassword" class="sr-only">Confirmação da Senha</label>
      <input name="senhaconfirm" type="password" id="inputPassword" class="form-control" placeholder="Confimação de Senha" required>
      <div class="checkbox mb-3">

        <label for="inputGender">Gênero:</label><br>
        <input name="sexo" type="radio" name="gender" value="masculino"> Masculino<br>
        <input name="sexo" type="radio" name="gender" value="feminino"> Feminino<br>

      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastre-se</button>
      <label class="ajuda">
        <a href="">Precisa de ajuda?</a>
      </label>
    </form>
  </body>
</html>
