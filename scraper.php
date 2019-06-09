<?php
require "vendor/autoload.php";
use Goutte\Client;
$client = new Client;


$urls = [
  'https://www.meilleuresdevinettes.com/bizarre/',
  'https://www.meilleuresdevinettes.com/difficile/',
  'https://www.meilleuresdevinettes.com/compliquee/',
  'https://www.meilleuresdevinettes.com/meilleure/'
];

$riddles = [];

foreach($urls as $url){
  $crawler = $client->request('GET', $url);
  
  $crawler->filter('.news')->each(function ($node) {
    global $riddles;
    $question = $node->filter('.news p:nth-of-type(1)')->text();
    $answer = $node->filter('.news .reponse')->text();
  
    $riddles[] = [
      'question' => $question,
      'answer' => $answer
    ];
  }); 
}

var_dump($riddles);

