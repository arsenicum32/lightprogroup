<?php
  if(empty($_GET["email"])) exit;
  if(empty($_GET["phone"])) exit;
  if(empty($_GET["name"])) exit;



  $url = 'https://api.vk.com/method/messages.send';
  $fields = array(
          'access_token'=>"bbc4fbae42be770ed355e96b2564f6d397a4c0539d38c313251aaf4639b4c9d3bf82ec5090f12f62137ea",
          'user_id'=>"83250233",
          'message'=>"имя: " . $_GET["name"] . " тел: " . $_GET["phone"] . " email: " . $_GET["email"] #. " начало: " . $_GET["start"] . " конец: " . $_GET["end"] . " у/п: " . $_GET["street"] . " допинфо: " . $_GET["desc"]
          #'PARAM2'=>$_POST['PARAM2']
  );

  $postvars='';
  $sep='';
  foreach($fields as $key=>$value)
  {
          $postvars.= $sep.urlencode($key).'='.urlencode($value);
          $sep='&';
  }

  $ch = curl_init();

  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_GET, count($fields) );
  curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

  $result = curl_exec($ch);

  curl_close($ch);

  echo $result;
?>
