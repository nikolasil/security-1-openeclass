<?php

function csrf_defend_action()
{
  // Destroy the session if the CSRF token is not valid
  session_destroy();
  // Redirect to the login page
  $redirect = '../../index.php';
  header("Location: $redirect");
  // Exit the script
  exit();
}
