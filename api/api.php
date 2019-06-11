<?php
  //Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../config/Database.php';
  include_once '../models/Riddle.php';

  //Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate riddle object
  $riddle = new Riddle($db);

  //Default params
  $amount = 1000000;
  $category = '';

  //Test parameters
  $categories = ['Alphabet', 'Animaux', 'Bizarre', 'Charade', 'Compliquée', 'Difficile', 'Facile', 'Localité', 'Meilleure', 'Monsieur et madame', 'Nourriture', 'Pays', 'Sport'];
  
  if(isset($_GET['amount']) && $_GET['amount']>=0 && $_GET['amount']< 97)
  {
    $amount = intval($_GET['amount']);
    
  } 
  if(isset($_GET['category']) && in_array($_GET['category'], $categories))
  {
    $category = $_GET['category'];
  }

  //Riddle query
  $result = $riddle->read($category, $amount);
  //Get row count
  $num = $result->rowCount();

  //Check if riddles exists
  if($num) {
    $riddles_arr = [];
    $riddles_arr['data'] = [];

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $riddle_item = [
        'category' => stripslashes($category),
        'question' => stripslashes($question),
        'answer' => stripslashes($answer)
      ];

      //Push to data
      $riddles_arr['data'][] = $riddle_item;
    }
    //Turn the array to JSON
    echo json_encode($riddles_arr);

  } else {
    //No riddles
    echo json_encode(
      ['message' => 'no riddles found']
    );
  }