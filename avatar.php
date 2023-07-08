<?php
header("content-type: image/png");
$id = $_GET['id'];
  
  if(is_null($id)) {
    $file = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/img/Png (1).png");
    }
  else {
    if($id != '1') {
                $file = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/img/Png (2).png");
    } else {
      $htt = "htt";
      $eh = "://";
      $file = file_get_contents($htt . "ps" . $eh  . "tr.rbxcdn.com/e23e8738f556018dad38dbf1571f47a6/352/352/Avatar/Png");
      }
    }
                echo $file;
    
  
?>