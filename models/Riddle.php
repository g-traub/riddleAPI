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
  public function read($category, $limit) {
    //testing where clause
    $where = '';
    if ($category !== ''){
      $where = "WHERE category = '$category'";
    }

    //Create query
    $query = 'SELECT
        id,
        category,
        question,
        answer
      FROM
        ' . $this->table . '
        ' . $where . ' 
      ORDER BY 
        RAND()
      LIMIT 
        0, ' . $limit ;

    //Prepare statement
    $stmt = $this->conn->prepare($query);

    //Execute query
    $stmt->execute();

    return $stmt;
  }
}