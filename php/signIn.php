<?php
// add new user to database unless someone else has the same username or email.

// credentials 
$user = 'root';
$pass = '';
$dbname = 'blog';
// start session so if the user is logged in can be tracked across pages
if(session_status() != PHP_SESSION_ACTIVE ){
    session_start();
}
// if user already loggeed in exit
if(isset($_SESSION['login']) && $_SESSION['login'] == true){
    exit("You are already logged in!");
}
// create connection
$conn = new mysqli('localhost', $user, $pass, $dbname) or die("unable to connect");
// get info from post 
$email = $_POST["email"];
$password = $_POST["password"];

// check if email and password are valid 
$stmt = $conn->prepare("SELECT email, password FROM blogUser WHERE email = ? ");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
// if null that email is not in the database
if(is_null($row)){
    exit("Invalid email");
}else{
    // there can only be one row so no need to iterate
    // if password hash match then valid user
    if(password_verify($password, $row["password"])){
        // sets session variable to know user is logged in
        $_SESSION["login"] = true;
        $_SESSION["email"] = $email; // Used for pages to identify user when performing queries.
        exit("success");
    }else{
        exit("Invalid password!");
    }
}

?>