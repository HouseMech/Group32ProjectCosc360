<!-- Display sidebar depending on user login status. (Show if logged in, hide if not)-->
<div id="sidebar">
  <div id="sidebar-topdiv">
    <img id="userProfilePicture" src="https://painrehabproducts.com/wp-content/uploads/2014/10/facebook-default-no-profile-pic.jpg" alt="userProfilePicture">
    <p id="sidebar-username">Username</p>
  </div>
  <div id="sidebar-bottomdiv">
    <div id="sidebar-btn" onclick="location.href='pages/newPost.php'">New Post</div>
    <div id="sidebar-btn" onclick="location.href='php/getPosts.php'">View Posts</div>
    <div id="sidebar-btn" onclick="location.href='pages/viewComments.php'">View Comments</div>
    <div id="sidebar-btn" onclick="location.href='pages/accountSettings.php'">Account Settings</div>
  </div>
</div>
