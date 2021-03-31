<?php
  session_start();
?>
<?php if ((isset($_SESSION['login'])) && ($_SESSION['login'] == true)): ?>
  <a id="menuItem" href="pages/profile.php">Profile</a>
  <a id="menuItem" href="php/signOut.php">Sign Out</a>
<?php else: ?>
  <a id="menuItem" href="pages/signIn.php">Sign In</a>
<?php endif ?>
