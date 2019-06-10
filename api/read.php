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

  //Riddle query
  $result = $riddle->read();
  //Get row count
  $num = $result->rowCount();

  //Check if riddles exists
  if($num) {
    $riddles_arr = [];
    $riddles_arr['data'] = [];

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $riddle_item = [
        'category' => $category,
        'question' => $question,
        'answer' => $answer
      ];

      //Push to data
      $riddles_arr['data'] = $riddleitem;

      //Turn the array to JSON
      echo json_encode($riddles_arr);
    }
  } else {
    //No riddles
    echo json_encode(
      ['message' => 'no riddles found']
    );
  }