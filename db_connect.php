<?php
require_once 'db.php';
function db_connect() {
    global $host;
    global $username;
    global $userpwd;
    $db = new PDO('mysql:host=' . $host . ';dbname=shield;charset=utf8', $username, $userpwd);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}