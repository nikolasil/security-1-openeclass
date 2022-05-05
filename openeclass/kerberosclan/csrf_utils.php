<?php
include_once 'actions_utils.php';

// Create new CSRF token
function generate_csrf_token()
{
  return hash_hmac('sha512', 'Computer ' . session_id() . ' Security ' . time() . ' KerberosClan', session_id());
}

// Get CSRF token from session
function get_sessions_csrf_token($key)
{
  // If the CSRF token is set, return it
  if (isset($_SESSION[$key])) {
    return $_SESSION[$key];
  }
}

// Store CSRF token to session
function set_sessions_csrf_token($key, $token)
{
  $_SESSION[$key] = $token;
  return $token;
}

// Generate CSRF token and store it to session
function start_csrf_session($key)
{
  return set_sessions_csrf_token($key, generate_csrf_token());
}

// Check for CSRF token validity
function check_csrf_attack($key, $token)
{
  //If token has been saved in session but has not been sent in request
  if ((!isset($token)) || (get_sessions_csrf_token($key) != $token))
    csrf_defend_action();
  return start_csrf_session($key);
}

// Check for CSRF token validity and no regenerate token
function check_csrf_attack_no_change($key, $token)
{
  //If token has been saved in session but has not been sent in request
  if ((!isset($token)) || (get_sessions_csrf_token($key) != $token))
    csrf_defend_action();
}