<?php
#registered.php - CS290, Emmalee Jones, Assignment Final Project
#Create user in the the application
#Error Reporting Settings
error_reporting(E_ALL);
ini_set('display_errors', 'OFF');

$servername = "oniddb.cws.oregonstate.edu"; 
$usernameDb = "jonese8-db";
$passwordDb = "TfZeyz4VAqmA0Rld";
$dbname = "jonese8-db";
 
$mysqli = new mysqli($servername, $usernameDb, $passwordDb, $dbname);
 
if ($mysqli->connect_errno) {
    echo "Error: Database connection error: " . $mysqli->connect_errno . " - "
    . $mysqli->connect_error;
}
/*Bring in data from POST*/
$username = $_POST["username"];
$password = $_POST["password"];
$hashed_password = \base64_encode(hash('sha256',$password));
$passedEdits = TRUE;

/*Test for Duplicate username*/
if (!($stmt = $mysqli->prepare("SELECT custid FROM users WHERE username=? "))) {
    echo "Error: Failed prepare: (" . $mysqli->errno . ") " . $mysqli->error;
}
    
if (!$stmt->bind_param("s", $username)) {    
    echo "Error: Failed Bind: (" . $stmt->errno . ") " . $stmt->error;
}
    
if (!$stmt->execute()) {
    echo "Error: Failed execute: (" . $stmt->errno . ") " . $stmt->error;
}
    
$tabcustid = NULL;
    
if (!$stmt->bind_result($tabcustid)) {
    echo "Error: Failed bind_result: (" . $stmt->errno . ") " . $stmt->error;
}
          
if(!$stmt->fetch()){  
    //echo "Error: Failed fetch: (" . $stmt->errno . ") " . $stmt->error;
    //No match 
}
else {
    echo "Dupname"; 
    $passedEdits = FALSE;
}
    
$stmt->close();  

#Passed Edits and store row in database
if ($passedEdits === TRUE) {

    /*Insert a new user*/

    if (!($stmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)"))) {
        echo "Error: Prepare failed: (" . $mysqli->errno . ") " 
                    . $mysqli->error;
    } 
    
    if (!$stmt->bind_param("ss", $username, $hashed_password)) {
                    echo "Error: Binding parameters failed: (" . $stmt->errno 
                        . ") " . $stmt->error;
    }

    if (!$stmt->execute()) {
                    echo "Error: Execute failed: (" . $stmt->errno . ") " 
                        . $stmt->error;
    }
    else {
     /* Valid New User */   
        echo "ok";   
    }
    $stmt->close(); 
}
$mysqli->close();
?>

