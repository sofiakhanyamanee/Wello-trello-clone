<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Startpage</title>
    <link rel="stylesheet" href="./styles/styles.css"/>
  </head>
  <body>
    <header class="startpage-header">
      <nav>
        <div class="logo-box">
        <img src="logoo.png" alt="" class="logo">
      </div>
      <div class="link-box">
        <a href="log_in.php">Logga in</a>
        <a href="" class="register-link">Registrera dig</a>
      </div>
      </nav>

      <form action="#" method="POST" class="register-form">
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
      </form>
    </header>


