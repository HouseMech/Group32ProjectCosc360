
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>MyBlogPost</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type = "text/javascript" src="../js/signIn.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/header.css">
  </head>
  </head>
  <body>
  <?php include_once '../layouts/header.php';?>

  <div id="center">

    <div class="signup-container">
      <form class="signup-form" action="">
        <fieldset>
          <p><label for="email">Email:</label></p>
          <p><input type="email" name="email" id="email"  maxlength="30" /></p>

          <p><label for="password">Password:</label></p>
          <p><input type="password" name="password" id="password"  maxlength="15" /></p>
          <a href="forgetPassword.html" id="forgetP">Forgot Password?</a>
          <h3 id="message"></h3>
          <p><input type="submit" value="Sign In" id="signIn-btn"/></p>
          <p><input type="button" value="Sign Up" onclick="signUp_Visit()" id="signUp-btn"/></p>
        </fieldset>
      </form>
    </div>

  </div>

  <?php include '../layouts/footer.php';?>
  </body>
</html>
