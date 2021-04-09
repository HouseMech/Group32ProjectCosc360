<?php
//makes sure there is not already a connection opened
if(!function_exists('getConnection')){
    // create connection funcion
    function createConnection(){
        // credentials 
        $user = 'root';
        $pass = '';
        $dbname = 'blog';
        $conn = new mysqli('localhost', $user, $pass, $dbname) or die("unable to connect");
        return $conn;
    }
}

// if no session running starts one
function startSession(){
    if(session_status() != PHP_SESSION_ACTIVE ){
        session_start();
    }
}
// checks if user is logged In
function isLoggedIn(){
    if(isset($_SESSION['login']) && $_SESSION['login'] == true){
        return true;
    }
    return false;
}
?>
