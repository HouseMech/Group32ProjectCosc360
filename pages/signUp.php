<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MyBlogPost</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
    <script type = "text/javascript" src="../js/signUp.js"></script>  
    <link rel="stylesheet" href="../css/style.css">
  </head>

  <body>
  <header id="masthead">
    <table>
      <tr>
        <td id="menuTitle">
          <h1>MyBlogPost</h1>
          <input type="text" placeholder="Search...">
      </tr>
      <tr>
        <td>
          <div id="menu">
            <a id="menuItem" href="../index.php">Home</a>
            <a id="menuItem" class="inactive" href="#">Profile</a>
            <a id="menuItem" class="onactive" href="signin.html"><em>Sign In</em></a>
          </div>
        </td>
      </tr>
    </table>
  </header>

  <div id="center">

    <div class="signup-container">
      <form class="signup-form" action="" >
        <fieldset>
          <p><label for="userName">UserName:</label></p>
          <p><input type="text" name="userName" id="userName" maxlength="15" /></p>

          <p><label for="fName">First Name:</label></p>
          <p><input type="text" name="fName" id="fName" maxlength="15" /></p>

          <p><label for="lName">Last Name:</label></p>
          <p><input type="text" name="lName" id="lName" maxlength="15" /></p>

          <p><label for="email">Email:</label></p>
          <p><input type="email" name="email" id="email" maxlength="30" /></p>
          
          <p><label for="password">Password:</label></p>
          <p><input type="password" name="password" id="password" maxlength="15"/></p>

          <p><label for="confirmPassword">Confirm Password:</label></p>
          <p><input type="confirmPassword" name="confirmPassword" id="confirmPassword" maxlength="15" /></p>
          
          <p><input type="submit" value="Sign Up" id="signUp-btn"/></p>
          <h3 id="message"></h3>
        </fieldset>
      </form>
    </div>

  </div>

  <footer id="mastfoot">
    <a href="#">FAQ Page</a>
    | <a href="#">Home</a>
    | <a href="#">Contact Us</a>
  </footer>
  </body>
</html>