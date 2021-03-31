<?php
  include "commonFunctions.php";
  startSession();
?>
<?php if (isLoggedIn()): ?>
  <a id="menuItem" href="pages/profile.html">Profile</a>
  <a id="menuItem" href="php/signOut.php">Sign Out</a>
<?php else: ?>
  <a id="menuItem" href="pages/signIn.html">Sign In</a>
<?php endif ?>
