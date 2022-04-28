<?php

function create_statement($db, $query)
{
  $connection = mysqli_connect('db', 'root', '1234');
  mysqli_set_charset($connection, "utf8");
  mysqli_select_db($connection, $db);
  $statement = mysqli_stmt_init($connection);
  mysqli_stmt_prepare($statement, $query);
  return $statement;
}
