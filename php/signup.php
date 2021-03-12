<?php
// add new user to database unless someone else has the same username or email. 
// if account registration correct set session varable 'login' to true
session_start();
// credentials 
$user = 'root';
$pass = '';
$dbname = 'blog';

// start session so if the user is logged in can be tracked across pages
session_start();
// if user already loggeed in exit
if(!is_null($Session['login'] && $_SESSION['login'] == true)){
    exit("You are already logged in!");
}

// get info from post
$userName = $_POST["userName"];
$fName = $_POST["fName"];
$lName = $_POST["lName"];
$email = $_POST["email"];
$password = $_POST["password"];
// encrypt password
$hash = password_hash($password,  
          PASSWORD_DEFAULT); 


// create connection
$conn = new mysqli('localhost', $user, $pass, $dbname) or die("unable to connect");
// check if anyone has same email reject request
$stmt = $conn->prepare("SELECT email FROM user WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
// if null that means no other users have the same email
if(!is_null($result->fetch_assoc())){
    exit("Email is already taken");
}
$stmt->close();
$stmt = $conn->prepare("SELECT userName FROM user WHERE userName = ?");
$stmt->bind_param("s", $userName);
$stmt->execute();
$result = $stmt->get_result();
// if not null someone already has username
if(!is_null($result->fetch_assoc())){
    exit("userName is taken");
}
$stmt->close();
$stmt = $conn->prepare("INSERT INTO user (userName, password, firstName, lastName, email ) VALUES(?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $userName, $hash , $fName, $lName, $email,);
if($stmt->execute()){
    $_SESSION["login"] = true;
    exit("Success! welcome to BLOG!");
}else{
    exit("Something went wrong at our end try again");
}
?>