<?php

 /********************************************************************
  * 
  * Filnamn: board.php
  * Författare: Sofia Khan Yamanee
  * 
  * Info: Filen kollar om användaren finns
  * 
  ********************************************************************/

    //  ************************   Initialize the session   ************************   //

  session_start();
  
      //  Check if the user is logged in, if not then redirect to login page  //

  if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

      header("location: http://localhost/WELLO/");
      exit;

    }

?>

