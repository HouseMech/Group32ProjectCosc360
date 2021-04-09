<?php
  include_once "commonFunctions.php";
  startSession();
?>
<?php if (isLoggedIn()): ?>
  <a id="menuItem" href="php/viewProfile.php?user=pamalm">Profile</a>
  <a id="menuItem" href="php/signOut.php">Sign Out</a>
<?php else: ?>
  <a id="menuItem" href="pages/signIn.php">Sign In</a>
<?php endif ?>
