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

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$sql1 = "SELECT * FROM users WHERE username = :username";
$stmt1 = $db->prepare($sql1);
$stmt1->bindParam(':username', $uname);
$stmt1->execute();

if ($stmt1->rowCount() == 0) {
      $sql2 = "INSERT INTO `users` (`username`, `password`)
            VALUES (
                        '$_POST[uname]',
                        '$_POST[psw]'
            )";
      $stmt2 = $db->prepare($sql2);
      $stmt2->execute();
 }
}
?>

