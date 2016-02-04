<?php
function main() { //system entry
  if (!file_exists('challonge.class.php')) {
    echo "challonge.class.php doesn't exist!";
    return;
  }
  require_once 'challonge.class.php';
  $api_instance = new ChallongeAPI('spXSd5LAddsP6O31en0ar41xMF826JHXOCIC3WiY');
  $api_instance->verify_ssl = false;
  // $xml = $api_instance->getTournaments();
  // echo 'status : '.$api_instance->status_code.'<br>';
  // var_dump($xml);

  //create tournament
  // $params = array(
  //    "tournament[name]" => 'DFXRC first match',
  //    "tournament[tournament_type]" => "single elimination",
  //    "tournament[url]" => "DFXRC_first_match",
  //    "tournament[description]" => "<strong>DFXRC</strong> is strong!"
  // );
  // $api_instance->createTournament( $params );
  // print_r($api_instance->result);  //contained those tournament id data etc.
  // print_r($api_instance->errors);

  //get tournament info
  var_dump($api_instance->getTournaments());
}

main();
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>test page</title>
   </head>
   <body>
     <input type="text" name="tr_name" value="" placeholder="please type your tournament name">
     <input id="submit" type="button" value="OK">
   </body>
 </html>
