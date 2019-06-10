<?php
class Database {
  private $host = 'localhost:8889';
  private $db_name = 'opendevinettes';
  private $username = 'root';
  private $password = 'root';
  private $conn;

  //DB connect
  public function connect() {
    $this->conn = null;
    
    try {
      $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
      echo 'Erreur lors de la connection : ' . $e->getMessage();
    }

    return $this->conn;
  }
}