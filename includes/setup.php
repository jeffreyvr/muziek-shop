<?php
session_start(); // voor winkelwagen

define( 'PARTIAL_PATH', dirname(__FILE__) . '/../partials/' );

require_once 'database.php';
require_once 'functions.php';

define( 'DB_HOST', 'localhost' );
define( 'DB_NAME', 'han_shop' );
define( 'DB_USER', 'root' );
define( 'DB_PASS', 'root' );
define( 'DB_CHARSET', 'utf8mb4' );

define( 'SITE_NAME', 'Muziekshop' );
define( 'SITE_HOME_URL', 'http://127.0.0.1/han/');

$db = han_db();

han_formhandeler();
