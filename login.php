<?php
#login.php - CS290, Emmalee Jones, Assignment Final Project
#Login and set session to go to Farmer Home page
#Error Reporting Settings
error_reporting(E_ALL);
ini_set("display_errors", "OFF");
//Start PHP Session
session_start();
#ob_start();

//Database info
$servername = "oniddb.cws.oregonstate.edu"; 
$usernameDb = "jonese8-db";
$passwordDb = "TfZeyz4VAqmA0Rld";
$dbname = "jonese8-db";
 
$mysqli = new mysqli($servername, $usernameDb, $passwordDb, $dbname);

 
if ($mysqli->connect_errno) {
    echo "Error: Database connection error: " . $mysqli->connect_errno . " - "
    . $mysqli->connect_error;
}

if(isset($_POST["username"]) && isset($_POST["password"])){

    /* Username and Password*/
    $username = $_POST["username"];
    $password = $_POST["password"];
   
    $hashed_password = \base64_encode(hash("sha256",$password));
    
    if (!($stmt = $mysqli->prepare("SELECT custid, username, password FROM users WHERE username=? "))) {
        echo "Error: Failed prepare: (" . $mysqli->errno . ") " . $mysqli->error;
    }

        if (!$stmt->bind_param("s", $username)) {    
           echo "Error: Failed Bind: (" . $stmt->errno . ") " . $stmt->error;
        }
        
        if (!$stmt->execute()) {
            echo "Error: Failed execute: (" . $stmt->errno . ") " . $stmt->error;
        }
        
        $tabcustid = NULL;
        $tabusername = NULL;
        $tabpassword = NULL;

        if (!$stmt->bind_result($tabcustid, $tabusername, $tabpassword)) {
            echo "Error: Failed bind_result: (" . $stmt->errno . ") " . $stmt->error;
        }
            
           if(!$stmt->fetch()){  
            echo "Error: Failed fetch: (" . $stmt->errno . ") " . $stmt->error;
            echo "notOk"; 
           }
           else {
               if ($hashed_password === $tabpassword) {
               /*Create session variables */
               $_SESSION["custid"] = $tabcustid;
               $_SESSION["username"] = $tabusername;
               $_SESSION["loggedIn"] = 1;
               echo "ok"; 
               } 
               else {
                  echo "Password do not match";
                  echo "notOk";   
               }
           }
    $stmt->close();    
$mysqli->close();
   
}

?>
