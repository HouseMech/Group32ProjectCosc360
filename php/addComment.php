<?php
  include "commonFunctions.php";
  startSession();
  // Get comment information to insert into database.
  $pid = $_GET['pid'];
  $username = $_GET['username'];
  $comment = $_POST['comment'];

  // Create connection and insert comment.
  $conn = createConnection();
  //create time of post
  $curTime = date("Y-m-d H:i:s");
  $stmt = $conn->prepare("INSERT INTO comment (cUserName, pid, commentContent) VALUES(?, ?, ?)");
  $stmt->bind_param("sss", $username, $pid, $comment);
  if($stmt->execute()){
    // Redirect user back to getPosts page.
    header("Refresh:0; url=post.php?pid=" . $pid);
    $stmt->close();
    exit("success");
  } else{
    exit("Could not add comment. Please try again!");
  }
?>