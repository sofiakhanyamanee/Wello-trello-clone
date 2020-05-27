
 <?php

 /********************************************************************
  * 
  * Filnamn: delete.php
  * Författare: Sofia Khan Yamanee
  * 
  * Info: Filen tar bort en rad från databasen med hjälp av ett ID
  * 
  ********************************************************************/

  require_once 'db.php';

  if(isset($_GET['id'])){

    $task_id = htmlentities($_GET['id']);
    $sql = "DELETE FROM tasks WHERE task_id = :task_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':task_id', $task_id);
    $stmt->execute();
    
  }

  header('Location:index.php');

 ?>