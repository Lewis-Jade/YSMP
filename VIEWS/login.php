<?php
session_start();



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YSMP Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>

     <div class="container">



     <section>
      <h1>Youth Skills Marketplace Platform </h1>
      <h3>keti  nasi....sema nasi!</h3>
     </section>

       <section   class="form-section">
        
  <div class="login-container">
    <h4>Welcome back.</h4>
    <h2>Login</h2>
    <form id="loginForm" action="../INCLUDES/login.inc.php" method="POST">
   
      <input type="email" id="email" name="email" placeholder="email" required>

 
      <input type="password" id="password" name="password" placeholder="password" required>

      <button type="submit">Login</button>
      <?php
       if (isset($_SESSION['error'])) {
            echo '<p  id="error" >'.$_SESSION['error'].'<p>';

             unset($_SESSION['error']);
        }

      
      ?>

    
    </form>

    <div class="form-footer">
      <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
  </div>
       </section>
     </div>

  

</body>

</html>




