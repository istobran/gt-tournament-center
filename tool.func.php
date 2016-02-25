<?php
function getTournamentsIdList($apiKeyList) {
  foreach ($apiKeyList as $key => $value) {
    $api_instance[$key] = new ChallongeAPI($value);
    $api_instance[$key]->verify_ssl = false;
    $tournamentsList = $api_instance[$key]->getTournaments()->tournament;
    foreach ($tournamentsList as $value) {
      $idStr .= '<p>id : '.$value->id.'&nbsp;&nbsp;&nbsp;&nbsp;name : '.$value->name.'&nbsp;&nbsp;&nbsp;&nbsp;hosted by '.$key.'</p>';
    }
  }
  return $idStr;
}
 ?>
