<?php
  session_start();
?>
<?php if ((isset($_SESSION['login'])) && ($_SESSION['login'] == true)): ?>
    <div id="sidebar-topdiv">
      <img id="userProfilePicture" src="https://painrehabproducts.com/wp-content/uploads/2014/10/facebook-default-no-profile-pic.jpg" alt="userProfilePicture">
      <p id="sidebar-username">Username</p>
    </div>
    <div id="sidebar-bottomdiv">
      <div id="sidebar-btn" onclick="location.href='pages/newPost.html'">New Post</div>
      <div id="sidebar-btn" onclick="location.href='php/getPosts.php'">View Posts</div>
      <div id="sidebar-btn" onclick="location.href='pages/viewComments.html'">View Comments</div>
      <div id="sidebar-btn" onclick="location.href='pages/accountSettings.html'">Account Settings</div>
    </div>  
<?php endif ?>
