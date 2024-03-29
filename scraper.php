<?php
require "vendor/autoload.php";
use Goutte\Client;
$client = new Client;


$urls = [
  'https://www.meilleuresdevinettes.com/bizarre/',
  'https://www.meilleuresdevinettes.com/difficile/',
  'https://www.meilleuresdevinettes.com/compliquee/',
  'https://www.meilleuresdevinettes.com/meilleure/',
  'https://www.meilleuresdevinettes.com/alphabet/',
  'https://www.meilleuresdevinettes.com/animaux/',
  'https://www.meilleuresdevinettes.com/charade/',
  'https://www.meilleuresdevinettes.com/facile/',
  'https://www.meilleuresdevinettes.com/localite/',
  'https://www.meilleuresdevinettes.com/monsieuretmadame/',
  'https://www.meilleuresdevinettes.com/nourriture/',
  'https://www.meilleuresdevinettes.com/pays/',
  'https://www.meilleuresdevinettes.com/sport/'
];

$riddles = [];

foreach($urls as $url){
  $crawler = $client->request('GET', $url);
  $category = $crawler->filter('#mainnews > h2')->text();

  $crawler->filter('.news')->each(function ($node) {
    global $riddles, $category;
    $question = $node->filter('.news p:nth-of-type(1)')->text();
    $answer = $node->filter('.news .reponse')->text();
    
    $category = trim(preg_replace('/\s\s+/', ' ', $category));
    $question = trim(preg_replace('/\s\s+/', ' ', $question));
    $answer = trim(preg_replace('/\s\s+/', ' ', $answer));

    $riddles[] = '(\'' . addslashes($category) . '\', \'' . addslashes($question) . '\',  \'' . addslashes($answer) . '\')';
  }); 
}
// var_dump($riddles);

//Send collected data to DB
include_once 'config/Database.php';
  //Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  //Create query
  $query = 'INSERT INTO riddles (category, question, answer)
    VALUES ' . implode(',', $riddles);

  //Make query
  $stmt = $db->query($query);
  //Close
  $stmt = null;
  $db = null;
