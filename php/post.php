<!DOCTYPE html>
<html lang="en">
  <?php include '../layouts/global_head_include.php';?>
  <?php include '../layouts/header.php';?>


  <?php include '../layouts/sidebar.php';?>
  <div class="main-content">
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
          // Get post information.
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

        // Display post title.
        echo "<div id='blogPost'>";
        echo "<h2>" . $title . "</h2>";

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

        // Display post div.
        echo "<div id='post-log'>";
        echo "<table id='post-table'>";
        echo "<tr>";
        echo "<th id='post-header'>Post Topic:</th>";
        echo "<th id='post-header'>Author:</th>";
        echo "<th id='post-header'># Likes:</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>";
        if (empty($topic)){ echo "<h3 id='post-item'>" . 'None' . "</u></h3>"; }
        else { echo "<h3 id='post-item'>" . $topic . "</u></h3>"; }
        echo "</td>";
        echo "<td>" . "<h3 id='post-item'>" . $user . "</h3></td>";
        echo "<td>" . "<h3 id='post-item'>" . '(' . $likes . ') 👍' . "</h3></td>";
        echo "</tr>";
        echo "</table>";
        echo "</div>";
        echo "</div>";

        // Display comment div if comments is turned on.
        if ($allowComments == 1){
          echo "<div id='comment-log'>";
          // Finally, fetch all the comments associated with this post.
          $stmt->close();
          $conn = createConnection();
          $stmt = $conn->prepare("SELECT * FROM comment WHERE pid = ? ");
          $stmt->bind_param("s", $pid);
          $stmt->execute();
          $result = $stmt->get_result();
          $numComments = $result -> num_rows;
          $stmt->close();
          if ($numComments == 0){
            echo "<p>No Comments Yet</p>";
          } else {
            while ($row = $result->fetch_assoc()){
              // Get comment information.
              $cUserName = $row['cUserName'];
              $commentContent = $row['commentContent'];
              $cLikes = $row['likes'];
              $time = $row['time'];
              $cid = $row['cid'];

              echo "<div id='comment-div'>";
              echo "<table id='comment-table'>";
              echo "<tr><td id='time-log'>" . $time . "</td></tr>";
              echo "<tr>";
              echo "<td id='cUsername'>" . $cUserName . ":</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td id='commentContent'>" . $commentContent . "</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td id='cLikes'>" . '(' . $cLikes . ') 👍' . "</td>";
              echo "</tr>";
              if ($cUserName == $username){
                echo "<tr>";
                echo "<td>";
                echo "<form action='php/deleteComment.php?pid=" . $pid . "&cid=" . $cid . "' method='get'>";
                echo "<button id='comment-del-btn' type='submit' formmethod='post'>❌ comment</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
              }
              echo "</table>";
              echo "</div>";
            }
          }

          echo "</div>";
          echo "<form id='comment-form' action='php/addComment.php?pid=" . $pid . "&username=" . $username . "' method='get'>";
          echo "<form id='comment-form' action='php/deletePost.php?pid=" . $pid . "' method='get'>";
          $comment = '';
          echo '<p><input type="text" name="comment" id="comment"  maxlength="60" value=' . $comment . '/></p>';
          echo "<button id='btn-view' type='submit' formmethod='post'>Add Comment</button>";
          echo "</form>";
        } else {
          // Else display that comments have been turned off.
          echo "<div id='comments-off'>";
          echo "<h4>Comments have been turned off.</h4>";
          echo "</div>";
        }

      ?>
    </div>
  </div>

  <?php include '../layouts/footer.php';?>
  </body>
</html>
