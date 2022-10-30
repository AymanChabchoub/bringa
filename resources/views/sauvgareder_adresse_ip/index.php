<?php
/* Premiere partie*/
  $monURL = "http://" .$_SERVER['HTTP_HOST'].
  $_SERVER['REQUEST_URI'];
  $add = $_SERVER['REMOTE_ADDR'];
  $date = date("d-m-Y");
  $heure = date("H:i");
  echo ("mon url:".$monURL);
  echo ("<br>");
  echo("serveur:".$_SERVER['REQUEST_URI']);
  echo ("<br>");
  echo("remote_adr:".$add);
  echo ("<br>");
  echo("la date:".$date );
  echo ("<br>");
  echo("l'heure:".$heure);
  function getIp(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
  }
  echo 'L adresse IP de l utilisateur est : '.getIp();
  

 
 ?>
