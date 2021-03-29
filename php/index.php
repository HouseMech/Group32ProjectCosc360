<?php
  session_start();
?>
<?php if ((isset($_SESSION['login'])) && ($_SESSION['login'] == true)): ?>
  <a id="menuItem" href="pages/profile.html">Profile</a>
  <a id="menuItem" href="php/signOut.php">Sign Out</a>
<?php else: ?>
  <a id="menuItem" href="pages/signIn.html">Sign In</a>
<?php endif ?>
