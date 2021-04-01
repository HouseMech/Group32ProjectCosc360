<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MyBlogPost</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php  include "commonFunctions.php"; ?>
  </head>

  <body>
  <header id="masthead">
    <table>
      <tr>
        <td id="menuTitle">
          <h1>MyBlogPost</h1>
          <input type="text" placeholder="Search...">
      </tr>
      <tr>
        <td>
          <div id="menu">
            <a id="menuItem" href="../index.html"><em>Home</em></a>
            <a id="active-item" href="../pages/profile.html">Profile</a>
            <a id="menuItem" href="/signOut.php">Sign Out</a>
          </div>
        </td>
      </tr>
    </table>
  </header>

  <div id="sidebar">
    <div id="sidebar-topdiv">
      <img id="userProfilePicture" src="https://painrehabproducts.com/wp-content/uploads/2014/10/facebook-default-no-profile-pic.jpg" alt="userProfilePicture">
      <p id="sidebar-username">Username</p>
    </div>
    <div id="sidebar-bottomdiv">
      <div id="sidebar-btn" onclick="location.href='newPost.html'">New Post</div>
      <div id="sidebar-btn" onclick="location.href='../php/getPosts.php'">View Posts</div>
      <div id="sidebar-btn" onclick="location.href='viewComments.html'">View Comments</div>
      <div id="sidebar-btn" onclick="location.href='accountSettings.html'">Account Settings</div>
    </div>
  </div>

  <div id="center">
    <?php
      startSession();
      $username = $_SESSION['username'];
      $pid = $_GET['pid'];

      // Get information about post. 
      $conn = createConnection();
      $stmt = $conn->prepare("SELECT * FROM post WHERE pid = ? ");
      $stmt->bind_param("s", $pid);
      $stmt->execute();
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();
      // If no post. 
      if(is_null($row)){
          exit("No posts for that pid.");
      } else {
        $title = $row['postName'];
        $user = $row['pUserName'];
        $description = $row['description'];
        $time = $row['time'];
        $imagePath = $row['imagePath'];
        $image = $row['image'];
        $likes = $row['likes'];
        $topic = $row['topic'];
        $allowComments = $row['allowComment'];

      }
      
      echo "<b>pid: </b>" . $pid . "</br>";
      echo "<b>Post Title:</b> " . $title . "</br>";
      echo "<b>Topic: </b>" . $topic . "</br>";
      echo "<b>Username: </b>" . $user . "</br>";
      echo "<b>Description: </b>" . $description . "</br>";
      echo "<b>Time: </b>" . $time . "</br>";
      echo "<b>Image path: </b>" . $imagePath . "</br>";
      echo "<b>Image: </b>" . $image . "</br>";
      echo "<b>Likes: </b>" . $likes . "</br>";
      echo "<b>Comments: </b>" . $allowComments . "</br>";


    ?>
  </div>

  <footer id="mastfoot">
      <a href="#">FAQ Page</a>
      | <a href="#">Home</a>
      | <a href="#">Contact Us</a>
  </footer>

  </body>
</html>