<?php
class Riddle {
  private $conn;
  private $table = 'riddles';

  //DB fields
  public $id;
  public $category;
  public $question;
  public $answer;
  public $created_at;

  // Constructor
  public function __construct($db){
    $this->conn = $db;
  }

  // Get riddles
  public function read($limit = '10000000') {
    //Create query
    $query = 'SELECT
        id,
        category,
        question,
        answer
      FROM
        '. $this->table . '
      ORDER BY 
        RAND()
      LIMIT 
        ' . $limit ;
    
    //Prepare statement
    $stmt = $this->conn->prepare($query);

    //Execute query
    $stmt->execute();

    return $stmt;
  }
}