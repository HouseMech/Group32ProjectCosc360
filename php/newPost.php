<?php
  session_start();
  $user = 'root';
  $pass = '';
  $dbname = 'blog';

  // Get form info. 
  $title = $_POST['pTitle']; // required
  $desc = $_POST['pDesc']; // required
  $tags = $_POST['pTags']; // optional

  // Prepare/save image for upload to db storage.
  $filename = $_FILES["pImg"]["name"]; 
  $tempname = $_FILES["pImg"]["tmp_name"];


  // Determine if commenting is turned on/off. 
  $allowComments = 1;
  if (isset($_POST['pComments'])){
    $allowComments = 1;
  } else {
    $allowComments = 0;
  }

  echo 'Post Title: <b>' . $title . '</b><br>';
  echo 'Post Description: <b>' . $desc . '</b><br>';
  echo 'Post Tags: <b>' . $tags . '</b><br>';
  echo 'Post Image: <b>' . $filename . '</b><br>';
  echo 'Post Commenting: <b>' . $allowComments . '</b><br>';
  echo $_SESSION['username'] . '<br/>';

  // create connection and insert post into database.
  /*
  $conn = new mysqli('localhost', $user, $pass, $dbname) or die("unable to connect");
  $stmt = $conn->prepare("INSERT INTO post (pUserName, description, image, likes, postname, topic) VALUES(?, ?, ?, ?, ?, ?)");
  $likes = 0;
  $stmt->bind_param("ssssss", $_SESSION['username'], $desc , $image, $likes, $title, $tags);
  $stmt->execute();
  $stmt->close();
  */
  
?>