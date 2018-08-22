<?php
require "Database.php";

class Login {
  private $nome;
  private $email;
  private $senha;

  public function __construct ($email, $senha) {
    $this->email = $email;
    $this->senha = $senha;
  }

  private function iniciarSessao () {
    session_start();
    $_SESSION['logado'] = true;
    $_SESSION['nome'] = $this->nome;
  }

  public function realizarLogin () {
    $database = new Database();

    $query = "SELECT * FROM pessoa WHERE email=:email";

    $params = [
      ":email" => $this->email,
    ];

    $resultado = $database->obterRegistros($query, $params);

    $senhaCriptografada = $resultado[0]["senha"];
    $senhaConfere = password_verify($this->senha, $senhaCriptografada);

    if (count($resultado) > 0 && $senhaConfere) {
      $this->nome = $resultado[0]["nome"];
      $this->iniciarSessao();

      return true;
    } else {
      return false;
    }
  }
}
