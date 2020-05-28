<?php

 /********************************************************************
  * 
  * Filnamn: loginout.php
  * Författare: Sofia Khan Yamanee
  * 
  * Info: Filen raderar alla sessions variabler och återgår
  *       till startsidan vid utloggning
  * 
  ********************************************************************/

// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: http://localhost/WELLO/");
exit;
?>