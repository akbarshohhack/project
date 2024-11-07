<?php


require_once 'classes/Database.php';

$db = new Database();
$data = $db->fetchAll('loyiha'); 

include 'templates/table.php';
?>
