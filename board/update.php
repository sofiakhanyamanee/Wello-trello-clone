<?php

 /********************************************************************
  * 
  * Filnamn: update.php
  * Författare: Sofia Khan Yamanee
  * 
  * Info: Filen hämtar respons från skickad XMLHttpRequest 
  *       och lägger in alla värden i databasen
  * 
  ********************************************************************/

require_once 'db.php';


$response = file_get_contents("php://input");
$object = json_decode($response, true);


if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $from = $object['from'] . PHP_EOL;
  $to = $object['to'] . PHP_EOL;
  $task = $object['task'] . PHP_EOL;

  $sql = "UPDATE tasks SET status_id = $to WHERE task_id= $task";
  $stmt = $db->prepare($sql);
  $stmt->execute();

  header('Location: index.php');

};

