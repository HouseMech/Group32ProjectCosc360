<!DOCTYPE html>
<html lang="en">
  <?php include '../layouts/global_head_include.php';?>
  <?php include '../layouts/header.php';?>
  <?php include '../layouts/sidebar.php';?>
  <?php  include "commonFunctions.php"; ?>

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

  <?php include '../layouts/footer.php';?>
  </body>
</html>