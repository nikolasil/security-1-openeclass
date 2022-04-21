<?php

function csrf_defend() {
  session_destroy();
  //Redirect to homepage
  $redirect = '../../index.php';
  header("Location: $redirect");
  exit();
}
?>