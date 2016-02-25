<?php
if (!file_exists('challonge.class.php')) {
  echo "challonge.class.php doesn't exist!";
  return;
}
require_once 'challonge.class.php';
require_once 'keylist.php';

function getTournamentsIdList($apiKeyList) {
  foreach ($apiKeyList as $key => $value) {
    $api_instance[$key] = new ChallongeAPI($value);
    $api_instance[$key]->verify_ssl = false;
    $tournamentsList = $api_instance[$key]->getTournaments()->tournament;
    print_r($tournamentsList);
    foreach ($tournamentsList as $value) {
      // $word="start-at";
      // echo $value->$word->getTimestamp().PHP_EOL;
      // $phpTimestamp = strtotime(substr($value->{'created-at'}, 0, 10).' '.substr($value->{'created-at'}, 11, 8));
      // echo date('m d, y', $phpTimestamp)."<br>";
      //echo $value->{'created-at'}->format('u');
      //var_dump($value->{'created-at'});
      $idStr .= '<p>id : '.$value->id.'&nbsp;&nbsp;&nbsp;&nbsp;name : '.$value->name.'&nbsp;&nbsp;&nbsp;&nbsp;hosted by '.$key.'</p>';
    }
  }
  return $idStr;
}

function getParticipent($apiKeyList) {
  $tournament_id = 2213854;
  $api_instance = new ChallongeAPI($apiKeyList['me']);
  $api_instance->verify_ssl = false;
  print_r($api_instance->getParticipants($tournament_id));
  //return NULL;
}
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>test page</title>
   </head>
   <body>
     <?php getParticipent($apiKeyList); ?>
     <input type="text" name="tr_name" value="" placeholder="please type your tournament name">
     <input id="submit" type="button" value="OK">
   </body>
 </html>
