<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MyBlogPost</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type = "text/javascript" src="../js/accountSettings.js"></script>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <?php include '../layouts/global_head_include.php';?>

  <body>
  <?php include_once '../layouts/header.php';?>

  <div class="main-content">
    <?php include '../layouts/sidebar.php';?>

  <div id="center">
    <?php
      include "../php/commonFunctions.php";
      startSession();
      // Prevent user from accessing this page unless signed in.
      if (empty($_SESSION["username"])){$username = 'NULL';} else {$username = $_SESSION['username'];}
      if ($username == 'NULL'){
        echo "<div id='numPosts'>";
        echo '<h2>Please sign in to make account changes.</h2>';
        echo "</div>";
      } else {
        // Edit account form.
        echo '<form id="accountForm">';
        echo '<p><label for="userName">Username:</label></p>';
        echo '<p><input type="text" name="userName" id="userName" maxlength="15" readonly  style="background-color:grey;"/></p>';
        echo '<p><label for="fName">First Name:</label></p>';
        echo '<p><input type="text" name="fName" id="fName" maxlength="15" /></p>';
        echo '<p><label for="lName">Last Name:</label></p>';
        echo '<p><input type="text" name="lName" id="lName" maxlength="15" /></p>';
        echo '<p><label for="email">Email:</label></p>';
        echo '<p><input type="email" name="email" id="email" maxlength="30" /></p>';
        echo '<p><label for="password">Password:</label></p>';
        echo '<p><input type="password" name="password" id="password" maxlength="15"/></p>';
        echo '<p><label for="confirmPass">Confirm Password:</label></p>';
        echo '<p><input type="password" name="confirmPass" id="confirmPass" maxlength="15"/></p>';
        echo ' <p><input type="submit" value="Save" id="saveBtn"/></p>';
        echo '<h3 id="message"></h3>';
        echo '</form>';
        echo '<form enctype="multipart/form-data" id="imageForm" method="post" action="./php/setUserImage.php">';
        echo '<label for="pImg">Upload new profile picture <i>(.jpg)</i>:</label>';
        echo '<p><input type="file" id="pImg" name="profilePic" accept="image/jpeg"/></p>';
        echo '<p><input type="submit" value="Upload" id="uploadBtn"/></p>';
        echo '</form>';

        // Delete account form.
        $username = $_SESSION['username'];
        echo "<form id='deleteForm' action='./php/deleteAccount.php?userName=" . $username . "' method='get'>";
        echo "<label for='deleteBtn'>Delete BlogPost Account:</label>";
        echo "<p id='terms'>By clicking the 'Delete Account' button below, you agree to delete<br>your account and any posts or comments linked with it.</p>";
        echo "<button id='deleteBtn' type='submit' formmethod='post'>Delete Account</button>";
        echo "</form>";
      }
    ?>
  </div>

  <?php include '../layouts/footer.php';?>
  </body>
</html>
