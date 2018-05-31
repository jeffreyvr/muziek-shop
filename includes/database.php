<?php

/**
 * Make DB connection
 *
 * Function is used in setup.php to set a global db-connection.
 */
function han_db() {
  $host = DB_HOST;
  $name = DB_NAME;
  $charset = DB_CHARSET;

  $dsn = "mysql:host=$host;dbname=$name;charset=$charset";

  $opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
  ];

  try {
    return new PDO( $dsn, DB_USER, DB_PASS, $opt );
  } catch(PDOException $ex){
    han_error_screen( $ex, 'Error bij maken databaseverbinding' );
  }
}
