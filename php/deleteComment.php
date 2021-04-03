<?php
  include "commonFunctions.php";
  startSession();
  // Get comment information to delete from database.
  $pid = $_GET['pid'];
  $cid = $_GET['cid'];

  // Create connection and delete comment.
  $conn = createConnection();
  $stmt = $conn->prepare("DELETE FROM comment WHERE cid = ?");
  $stmt->bind_param("s", $cid);
  if($stmt->execute()){
    header("Refresh:0; url=" . $_SERVER['HTTP_REFERER']);
    $stmt->close();
    exit("success");
  } else{
    exit("Could not delete comment. Please try again!");
  }
?>