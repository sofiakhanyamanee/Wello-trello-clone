  <?php
  
   /********************************************************************
  * 
  * Filnamn: create_board3.php
  * Författare: Sofia Khan Yamanee
  * 
  * Info: Filen skriver ut tasks från databasen med status "Klar"
  * 
  ********************************************************************/

  require_once 'db.php';
  require_once 'board.php';


  $user = $_SESSION["username"];
  $id = $_SESSION["id"];


    //  *************   Lägger in uppdaterade task i databasen   *************   //

 if($_SERVER['REQUEST_METHOD'] === 'POST') {

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
  
  }

  //  *************   Lägger in alla task i databasen   *************   //

  if($_SERVER['REQUEST_METHOD'] === 'POST') :


    $sql1 =  "INSERT INTO tasks (task, users_id, status_id)
              VALUES (:task, $id, 3)";

    $stmt1 = $db->prepare($sql1);

    $task = htmlspecialchars($_POST['task3']);
    $stmt1->bindParam(':task', $_POST['task3']);

    header("location: http://localhost/WELLO/board/");

    $stmt1->execute();

    endif;


  //  *************   Skriver ut tavla   *************   //

  
  $sql2 = "SELECT * FROM task_status WHERE id = 3";
  $stmt2 = $db->prepare($sql2);
  $stmt2->execute();

  $boardOutput = "";

  while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){

    $task_status = $row2['status'];
    $status_id = $row2['ID'];

    $boardOutput .= "<div class='board3'><div class='todo-box todo-box3' id='$status_id' ondrop='onDrop(event, this)' ondragover='allowDrop(event)'><h1>$task_status</h1>";

  }

  $sql3 = "SELECT * FROM tasks 
           WHERE status_id = 3 
           AND users_id IN (SELECT ID FROM users WHERE username = '$user')";


  $stmt3 = $db->prepare($sql3);
  $stmt3->execute();

  while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){

  $task_todo = $row3['task'];
  $task_id = $row3['task_id'];

  $boardOutput .= "
                  <div class='task-box' id='$task_id' draggable='true' ondragstart='onDrag(event)' ondrop='return false' ondragover='return false' value='$task_todo'>
                    <p>$task_todo</p>
                    <a href='delete.php?id=$task_id'>✖</a>
                    <button class='open-button' onclick='openForm(event)'>✐</button>

                    
                      <div class='form-popup' id='myForm$task_id'>
                        <form action='' method='POST' class='form-container'>
                          <h1>Redigera kort</h1>
                          <div class='fieldAndBtns'>
                            <input type='text' name='updated_task' value='$task_todo' required>
                            <input type='hidden' name='task_id' value='$task_id'>
                            <button type='submit' class='btn'>Uppdatera</button>
                            <button type='button' class='btn cancel' onclick='closeForm(event)'>Avbryt</button>
                          </div>
                        </form>
                      </div> 
                    </div>                 
                    ";
  }

  $boardOutput .= "</div>
                    <form class='form3' action='create_board3.php' method='POST' onsubmit='return validateFormDone()'>
                      <input type='text' id='input_done' name='task3' placeholder='Behövs göras..'>
                      <button class='add-todo add3' type='submit'> Lägg till kort </button>
                    </form>
                  </div>";

  echo $boardOutput;    

