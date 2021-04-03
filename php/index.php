<?php
  include "commonFunctions.php";
  startSession();
?>
<?php if (isLoggedIn()): ?>
  <a id="menuItem" href="pages/profile.php">Profile</a>
  <a id="menuItem" href="php/signOut.php">Sign Out</a>
<?php else: ?>
  <a id="menuItem" href="pages/signIn.php">Sign In</a>
<?php endif ?>
