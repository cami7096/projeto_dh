<?php

class Database {
  private $db;

  public function __construct () {
    $this->db = new PDO("mysql:host=localhost;dbname=projeto_dh;charset=utf8mb4", "root", "root");
  }

  public function obterRegistros ($query, $params) {
    $stmt = $this->db->prepare($query);
    $stmt->execute($params);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function executar ($query, $params) {
    $stmt = $this->db->prepare($query);

    return $stmt->execute($params);
  }

}
