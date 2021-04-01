<?php
  include "commonFunctions.php";
  startSession();
  $pid = $_GET['pid'];
  // create connection and delete post (pid) from posts table.
  $conn = createConnection();
  // First delete all comments linked to that post. (Foreign key constraint)
  $stmt = $conn->prepare("DELETE FROM comment WHERE pid = ?");
  $stmt->bind_param("s", $pid);
  $stmt->execute();
  $stmt->close();
  
  $stmt = $conn->prepare("DELETE FROM post WHERE pid = ?");
  $stmt->bind_param("s", $pid);
  $stmt->execute();
  $stmt->close();
  $conn->close();
  // Redirect user back to getPosts page.
  header("Refresh:0; url=getPosts.php");
?>