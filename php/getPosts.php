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
            <a id="active-item" href="./profile.html">Profile</a>
            <a id="menuItem" href="../php/signOut.php">Sign Out</a>
          </div>
        </td>
      </tr>
    </table>
  </header>

  <!-- Display sidebar depending on user login status. (Show if logged in, hide if not)-->
  <div id="sidebar">
    <div id="sidebar-topdiv">
      <img id="userProfilePicture" src="https://painrehabproducts.com/wp-content/uploads/2014/10/facebook-default-no-profile-pic.jpg" alt="userProfilePicture">
      <p id="sidebar-username">Username</p>
    </div>
    <div id="sidebar-bottomdiv">
      <div id="sidebar-btn" onclick="location.href='../pages/newPost.html'">New Post</div>
      <div id="active-btn" onclick="location.href='../php/getPosts.php'">View Posts</div>
      <div id="sidebar-btn" onclick="location.href='../pages/viewComments.html'">View Comments</div>
      <div id="sidebar-btn" onclick="location.href='../pages/accountSettings.html'">Account Settings</div>
    </div>
  </div>

  <div id="center">
    <h2 id='subHead'>View Your Post:</h2>
    <?php
      startSession();
      
      $username = $_SESSION['username'];
      
      // create connection and insert post into database.
      $conn = createConnection();
      $stmt = $conn->prepare("SELECT * FROM post WHERE pUserName = ? ");
      $stmt->bind_param("s", $username);
      $stmt->execute();
      $result = $stmt->get_result();
      $num_posts = $result -> num_rows;
      if ($num_posts == 1){
        echo "<div id='numPosts'>";
        echo '<h2>You have <u>' . $num_posts . '</u> post!</h2>';
        echo "</div>";
      } else {
        echo "<div id='numPosts'>";
        echo '<h2>You have <u>' . $num_posts . '</u> posts!</h2>';
        echo "</div>";
      }
      if ($result){
        // Append this attributes, one div for each post.
        while ($row = $result->fetch_assoc()){
          // Fetch attributes for each post by each this user.
          $pid = $row['pid'];
          $pUserName = $row['pUserName'];
          $description = $row['description'];
          $time = $row['time'];
          $image = $row['image'];
          $imagePath = $row['imagePath'];
          $likes = $row['likes'];
          $postTitle = $row['postName'];
          $postTopic = $row['topic'];
          $allowComments = $row['allowComment'];
          echo "<div id='blogPost'>";
          echo "<i><p>" . $time . "</p></i>";
          echo "<h2>" . $postTitle . "</h2>";
          echo "<h5>" . $description . "</h5>";
          if (empty($postTopic)){
            echo "<h4><u>Topic: " . 'None' . "</u></h3>";
          } else {
            echo "<h4><u>Topic: " . $postTopic . "</u></h3>";
          }
          echo "<h3>" . $pUserName . "</h3>";
          echo "<h3>" . '(' . $likes . ') 👍' . "</h3>";
          echo "</div>";
        }
      } 
    ?>
  </div>

  <footer id="mastfoot">
    <a href="#">FAQ Page</a>
    | <a href="#">Home</a>
    | <a href="#">Contact Us</a>
  </footer>
  </body>
</html>
