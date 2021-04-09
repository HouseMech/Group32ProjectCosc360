<?php
## set a new user profile pic 
include_once "commonFunctions.php";

startSession();
if(!isLoggedIn()){
  exit("you musn't touch the crystals... get out of here!");
}
$username = $_SESSION["username"];
// check if there is a file array, the file was uploaded through post and the name contains .jpg
if (count($_FILES) > 0 && is_uploaded_file($_FILES['profilePic']['tmp_name']) 
        && (strpos($_FILES['profilePic']['name'], ".jpg") ||strpos($_FILES['profilePic']['name'], ".JPG"))) {
  $conn = createConnection();
  ## only commit after file has been successfully downloaded
  mysqli_autocommit($conn, false);  

  $destination = "./img/profilePics/".$username.".jpg";
  echo $destination;
  $conn->query("UPDATE bloguser SET profilePic='$destination' WHERE bloguser.userName='$username'") or die("Unable to insert image ".  mysqli_error($conn));
  
  $destination = "../img/profilePics/".$username.".jpg";
  $fileToMove = $_FILES['profilePic']['tmp_name'];
  if (move_uploaded_file($fileToMove,$destination)) {
    mysqli_commit($conn);
    $conn->close();
    #local host
    header("Location:http://localhost/Group32ProjectCosc360/pages/accountSettings.php");
    
  }
  else {
    $conn->close();
    echo "There was a problem moving the file.";
  }       
}else{
  exit("No, file present");
}
?>