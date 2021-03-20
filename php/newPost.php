<?php
  $title = $_POST['pTitle']; // required
  $desc = $_POST['pDesc']; // required
  $tags = $_POST['pTags']; // optional

  // If no image uploaded, than replace empty string ('') with 'null'. (optional)
  $image = $_POST['pImg'];
  if (empty($image)==true){ $image = "null"; }

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
  echo 'Post Image: <b>' . $image . '</b><br>';
  echo 'Post Commenting: <b>' . $allowComments . '</b><br>';
?>