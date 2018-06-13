<?php
session_start(); // voor winkelwagen

$config = [
  'db' => [
    'host' => 'localhost',
    'name' => 'han_shop',
    'user' => 'root',
    'password' => 'root',
    'charset' => 'utf8mb4'
  ],
  'site' => [
    'name' => 'Muziekshop',
    'home_url' => 'http://127.0.0.1/han/'
  ],
  'paths' => [
    'partial' => dirname(__FILE__) . '/../partials/'
  ]
];

require_once 'database.php';
require_once 'functions.php';

$db = han_db();
$error = array();

han_formhandeler();
