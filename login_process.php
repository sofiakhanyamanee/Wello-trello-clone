<?php

 /********************************************************************
  * 
  * Filnamn: login_process.php
  * Författare: Sofia Khan Yamanee
  * 
  * Info: Filen kollar om användaren är inloggad / finns registrerad.
  * 
  ********************************************************************/

   session_start();

  //  Check if the user is logged in, if not then redirect to login page  //
  
  if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    
    header("location: http://localhost/WELLO/board/");
    exit;

  }

   require_once 'db.php' ;

   $error = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
      
      $sql = "SELECT * FROM users WHERE username = '$myusername' AND password = '$mypassword'";
      $stmt = $db->prepare($sql);
      $stmt->execute();
		
      if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        session_start();
                            
        // Sparar data i session variabler
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $row['ID'];
        $_SESSION["username"] = $myusername;                            
        
        // Tar användaren till användarsidan
        header("location: http://localhost/WELLO/board/");

      } else {

         $error = "Ditt användarnamn eller lösenord är ogiltigt. Försök igen!";
      
        }

      $stmt->closeCursor();
      $db = null;
      $stmt = null;
   }
?>


  <div class="login-box">
         
        <form action= "" method = "POST" class="login_form_box">
          <h1 class="login_heading">Logga in på ditt Wello-konto</h1>
          <div class="label-input-container">
            <label class="login_label"></label>
            <input type = "text" name = "username" placeholder="Användarnamn" class ="login_input"/>
            <label class="login_label"></label>
            <input type = "password" name = "password" placeholder="Lösenord" class ="login_input"/>
            <input type = "submit" value= "Logga in" class="login_submit_btn"/>
          </div>
          <p class="error-msg"><?php echo $error; ?></p>
        </form>
               
  </div>
 


  <script>

    
    // let login_error = document.querySelector(".login_submit_btn")
    // login_error.addEventListener("click", function () {  
    //   document.querySelector(".error-msg").style="display:initial";
    // });
  
  
  </script>