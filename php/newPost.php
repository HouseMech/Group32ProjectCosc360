<?php
  session_start();
  $user = 'root';
  $pass = '';
  $dbname = 'blog';

  // Get form info. 
  $title = $_POST['pTitle']; // required
  $desc = $_POST['pDesc']; // required
  $tags = $_POST['pTags']; // optional

  global $tempname;
  global $image;

  // Prepare/save image for upload to db storage (BLOB, etc).
  $filename = $_FILES['pImg']['name'];
  if (empty($_FILES['pImg']['tmp_name']) != true){
    $image = base64_encode(file_get_contents(addslashes($_FILES['pImg']['tmp_name'])));

     // Update the image to be saved as the pid.jpg
    $conn = new mysqli('localhost', $user, $pass, $dbname) or die("unable to connect");
    $sql = "SELECT MAX(pid) FROM post";
    // Get pid for this post, increment by one because it hasn't been added into db yet.
    if ($row = $conn -> query($sql)) {$pid = $row -> fetch_row()[0] + 1;}
    $tempname = $pid . '.jpg';
  } else {
    $image = NULL;
    $tempname = NULL;
  }

  // Determine if commenting is turned on/off. 
  $allowComments = 1;
  if (isset($_POST['pComments'])){
    $allowComments = 1;
  } else {
    $allowComments = 0;
  }

  // create connection and insert post into database.
  $conn = new mysqli('localhost', $user, $pass, $dbname) or die("unable to connect");
  $stmt = $conn->prepare("INSERT INTO post (pUserName, description, imagePath, image, likes, postname, topic, allowComment) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
  $likes = 0;
  $stmt->bind_param("ssssssss", $_SESSION['username'], $desc , $tempname, $image, $likes, $title, $tags, $allowComments);
  if($stmt->execute()){
    $stmt->close();
    header("Location: ../pages/profile.html");
    exit("success");
  } else{
    exit("Could not submit post. Please try again!");
  }
  
?>