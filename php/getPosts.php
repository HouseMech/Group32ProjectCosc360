<!DOCTYPE html>
<html lang="en">
  <?php include '../layouts/global_head_include.php';?>

  <body>
  <?php include '../layouts/header.php';?>

  <?php include '../layouts/sidebar.php';?>

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

  <?php include '../layouts/footer.php';?>
  </body>
</html>
