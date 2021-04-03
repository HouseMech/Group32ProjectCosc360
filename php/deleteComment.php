<?php
  include "commonFunctions.php";
  startSession();
  // Get comment information to insert into database.
  $pid = $_GET['pid'];
  $cid = $_GET['cid'];

  // Create connection and insert comment.
  $conn = createConnection();
  $stmt = $conn->prepare("DELETE FROM comment WHERE cid = ?");
  $stmt->bind_param("s", $cid);
  if($stmt->execute()){
    // Redirect user back to getPosts page.
    header("Refresh:0; url=post.php?pid=" . $pid);
    $stmt->close();
    exit("success");
  } else{
    exit("Could not delete comment. Please try again!");
  }
?>