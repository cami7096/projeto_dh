<?php
require "Database.php";

class Cadastro {

  private $nome;
  private $sobreNome;
  private $email;
  private $sexo;
  private $dataDeNascimento;

  public function __construct ($nome, $sobrenome, $email, $sexo) {
    $this->nome = $nome;
    $this->sobrenome = $sobrenome;
    $this->email = $email;
    $this->sexo = $sexo;
    $this->senha = $senha;

  }

  public function validarDados () {
    if (!$this->nome || !$this->sobrenome || !$this->email || !$this->sexo || !$this->senha) {
      return false;
    }

    return true;
  }

  public function criptografarSenha ($senha) {
    return password_hash($senha, PASSWORD_DEFAULT);
  }

  public function usuarioExiste () {
    $database = new Database();
    $query = "SELECT * FROM pessoa WHERE email=:email";

    $params = [
      ":email" => $this->email,
    ];

    $resultado = $database->obterRegistros($query, $params);

    return count($resultado);
  }

  public function realizarCadastro () {
    if ($this->pessoaExiste()) {
      return false;
    }

    $database = new Database();
    $query = "INSERT INTO pessoa (nome, email, sexo, senha) VALUES(:nome, :sobrenome, :email, :sexo, :senha)";

    $params = [
      ":nome" => $this->nome,
      ":email" => $this->email,
      ":senha" => $this->criptografarSenha($this->senha),
    ];

    $resultado = $database->executar($query, $params);

    return $resultado;
  }
}
