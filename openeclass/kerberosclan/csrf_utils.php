<?php
  include_once 'actions_utils.php';

  function generate_csrf_token() {
    return  hash_hmac('sha512', 'kerberosclan random text '. session_id(), session_id());
  }

  function obtain_csrf_token() {
    if(isset($_SESSION['csrf_token'])) {
      return $_SESSION['csrf_token'];
    }

    return $_SESSION['csrf_token'] = generate_csrf_token();
  }

  function compare_csrf_tokens($token) {
    if($token != $_SESSION['csrf_token']) {
      csrf_defend();
      // return false;
    }
    return true;
  }

  ?>