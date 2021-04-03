<!DOCTYPE html>
<html lang="en">
  <?php include '../layouts/global_head_include.php';?>

  <body>
  <?php include_once '../layouts/header.php';?>
  <?php include "commonFunctions.php"; ?>
  <div class="main-content">
    <?php include '../layouts/sidebar.php';?>
    <div id="center">
      <h2 id='subHead'>View Your Posts:</h2>
      <?php
        startSession();
        $username = $_SESSION['username'];

        $conn = createConnection();
        // Display post with the newest post first.
        $stmt = $conn->prepare("SELECT * FROM post WHERE pUserName = ? ORDER BY time DESC");
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
            echo "<th id='post-header'>Post Topic:</th>";
            echo "<th id='post-header'>Author:</th>";
            echo "<th id='post-header'># Likes:</th>";
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

            // View post button.
            echo "<form id='btn-item' action='php/post.php?pid=" . $pid . "' method='get'>";
            echo "<button id='btn-view' type='submit' formmethod='post'>View Post</button>";
            echo "</form>";

            // Delete post button.
            echo "<form id='btn-item' action='php/deletePost.php?pid=" . $pid . "' method='get'>";
            echo "<button id='btn-delete' type='submit' formmethod='post'>Delete Post</button>";
            echo "</form>";

            echo "</div>";

            echo "</div>";
            echo "<p id='spacer'>____________________________________</p>";
          }
        }
      ?>
    </div>
  </div>

  <?php include '../layouts/footer.php';?>
  </body>
</html>
