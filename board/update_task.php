<?php
/****************************************************
 * 
 * Filnamn: update_task.php
 * Författare: Sofia Khan Yamanee
 * 
 * Info: Filen uppdaterar databasen
 * med ny data från ett formulär
 * 
 *****************************************************/
require_once 'header.php';
require_once 'db.php';
require_once 'board.php';
require_once 'create_board1.php';
require_once 'create_board2.php';
require_once 'create_board3.php';



// $task_id = $_POST['task_id'];
// $updated_task = $_POST['updated_task'];

if($_SERVER['REQUEST_METHOD'] === 'POST') {

  print_r ($_POST);

  $updated_task  = htmlentities($_POST['updated_task']);
  $task_id  = htmlentities($_POST['task_id']);
        
  $sql5 = "UPDATE tasks
          SET task = :task
          WHERE task_id = :task_id";

  $stmt5 = $db->prepare($sql5);

  $stmt5->bindParam(':task', $updated_task);
  $stmt5->bindParam(':task_id', $task_id);
 
  $stmt5->execute();

  header('Location: http://localhost/WELLO/board/');

  exit;
  
  }


require_once 'footer.php';

?>
<!-- 
</div>
  <form class='form1' action='#' method='POST'>
    <input type='text' id='input_todo' name='updated_task' value='<?php echo $updated_task?>'>
    <button class='add-todo add1' type='submit'> Redigera</button>
    <input type="hidden" name="id" value="<?php echo $task_id; ?>" method="POST">
  </form>
</div>
 -->




<?php
require_once 'footer.php';