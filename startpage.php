<?php

 /********************************************************************
  * 
  * Filnamn: startpage.php
  * Författare: Sofia Khan Yamanee
  * 
  * Info: Filen kollar om användaren är inloggad / finns registrerad.
  * 
  ********************************************************************/

// Initialize the session
session_start();


// Check if the user is logged in, if not then redirect him to login page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
      header("location: http://localhost/WELLO/board/");
      exit;
}

require_once 'db.php';

$error= "";
$successful="";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$sql1 = "SELECT username FROM users WHERE username = :username";
$stmt1 = $db->prepare($sql1);
$stmt1->bindParam(':username', $_POST['uname']);
$stmt1->execute();

if ($stmt1->rowCount() == 0) {
     
      $hash = password_hash($_POST['psw'], PASSWORD_DEFAULT);
      $sql2 = "INSERT INTO `users` (`username`, `password`)
               VALUES (
                        '$_POST[uname]',
                        '$hash'
               )";

      $stmt2 = $db->prepare($sql2);
      $stmt2->execute();

      if ($sql2 == true){  
                        
                  $successful= "Du är nu registrerad hos oss på Wello! 
                  <a href='http://localhost/WELLO/log_in.php' class ='log-in-link' >Logga in nu</a>";
      }
 
} else {
            $error = "Användarnamnet är redan taget. Testa ett nytt!";
      }

}  
?>


<form action="" method="POST" class="register-form">
        <div class="label-input-container">
          <label for="uname"></label>
          <input
            type="text"
            placeholder="Användarnamn"
            name="uname"
            id="uname"
            required
            class="register-input"
          />

          <label for="psw"></label>
          <input
            type="password"
            placeholder="Lösenord"
            name="psw"
            id="psw"
            required
            class="register-input"
          />
          <button class="submit" type="submit">Registrera dig gratis!</button>
        </div>
        <p class="error-msg"><?php echo $error; ?></p>
        <p class="successful-msg"><?php echo $successful; ?></p>
      </form>
    </header>