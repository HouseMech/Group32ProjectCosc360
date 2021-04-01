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

          // Display post title.
          echo "<div id='blogPost'>";
          echo "<h2>" . $postTitle . "</h2>";
          
          // Display post time.
          echo "<p id='time-log'>" . $time . "</p>";
          
          // Display description.
          echo "<div id='desc-log'>";
          echo "<h5>" . $description . "</h5>";
          echo "</div>";

          // Link to open attached image in new tab.
          if (!empty($imagePath)) {
            echo "<div id='img-link'><a href=" . $imagePath . ">View Attached Image</a></div>";
          }

          // Display post topic, author, and # likes.
          echo "<div id='post-log'>";
          echo "<table id='post-table'>";
          echo "<tr>";
          echo "<td id='post-header'>Post Topic:</td>";
          echo "<td id='post-header'>Author:</td>";
          echo "<td id='post-header'># Likes:</td>";
          echo "</tr>";

          echo "<tr>";
          echo "<td>";
          if (empty($postTopic)){
            echo "<h3 id='post-item'>" . 'None' . "</u></h3>"; 
          } else {
            echo "<h3 id='post-item'>" . $postTopic . "</u></h3>";
          }
          echo "</td>";
          echo "<td>" . "<h3 id='post-item'>" . $pUserName . "</h3></td>";
          echo "<td>" . "<h3 id='post-item'>" . '(' . $likes . ') 👍' . "</h3></td>";
          echo "</tr>";
          echo "</table>";
          echo "</div>";

          echo "<div id='btn-holder'>";
          echo "<form action='post.php?pid=" . $pid . "' method='get'>";
          echo "<button type='submit' formmethod='post'>View Post</button>";
          echo "</form>";
          echo "</div>";

          echo "</div>";
          echo "<p id='spacer'>____________________________________</p>";
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
