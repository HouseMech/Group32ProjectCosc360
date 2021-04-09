<!-- Display sidebar depending on user login status. (Show if logged in, hide if not)-->
<?php
  session_start();
?>
<?php if ((isset($_SESSION['login'])) && ($_SESSION['login'] == true)) : ?>
  <div id="sidebar">
    <div id="sidebar-topdiv">
    <?php
    #change relative referencing for index.php 
    if($_SERVER['REQUEST_URI'] === "/Group32ProjectCosc360/index.php"){
      include "./php/getUserImage.php";
    }else{
      include "../php/getUserImage.php";
    }
    ?>
      <p id="sidebar-username">
        <?php
          echo $_SESSION['username'];
      ?>
      </p>

    </div>
    <div id="sidebar-bottomdiv">
      <div id="sidebar-btn" onclick="location.href='pages/newPost.php'">New Post</div>
      <div id="sidebar-btn" onclick="location.href='php/getPosts.php'">View Posts</div>
      <div id="sidebar-btn" onclick="location.href='pages/viewComments.php'">View Comments</div>
      <div id="sidebar-btn" onclick="location.href='pages/accountSettings.php'">Account Settings</div>
    </div>
  </div>
<?php endif;  ?>
