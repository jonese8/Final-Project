<?php
#Page1.php - CS290, Emmalee Jones, Assignment Final Project
#
#Error Reporting Settings
error_reporting(E_ALL);
ini_set('display_errors', 'ON');

//Start PHP session
session_start();

#Test for valid Session
if (!isset($_Session['username']) && !isset($_SESSION['loggedIn'])) {
    $_SESSION = array();
    session_destroy();
    $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
    $filePath = implode('/', $filePath);
    $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
    header("Location: {$redirect}/index.php", true);
    die();
}
?>
<?php
#Connect To Database
#Error Reporting Settings
error_reporting(E_ALL);
ini_set("display_errors", "ON");

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

#Test for duplicate name from video_store
function isNameUniq ($custid, $mysqli) {
    if (!($nameRows = $mysqli->query("SELECT custid FROM vendor WHERE custid=\"{$custid}\""))) {
        echo "Error: custid Field Not Found: " . $mysqli->errno . " - " . $mysqli->error;
    }
    return mysqli_num_rows($nameRows);
}

#Delete one row of videos from video_store
function delRow($custid, $mysqli) {
    if (!($mysqli->query("DELETE FROM vendor WHERE custid=\"{$custid}\""))) {
        echo "Error: custid Field Not Found on Delete: " . $mysqli->errno . " - " . $mysqli->error;
    }
}

#Check for various POST Buttons on Form and valid data
if ($_POST) {

    #Test for deleting on video store row
    if (isset($_POST['delete'])) {
        $id = $_POST ['delete'];
        $formCustid = $_SESSION["custid"];
        delRow($formCustid, $mysqli);
    }
    #Initialize valid data edit flag
    $passedEdits = TRUE;
    
   #Test POST and data validation for register form
    if (!isset($_POST['delete'])) {
        
    if (isset($_POST ['location']) && ($_POST ['location'] != NULL)) {
        $formLocation = $_POST ['location'];
        $formCustid = $_SESSION["custid"];
        $formUsername = $_SESSION["username"];
        
        #Test for Unique Registration
        if (isNameUniq($formCustid, $mysqli) == 1) { 
        $passedEdits = FALSE; 
        echo "<p>Error: Only One Registration Per Vendor.</p>\n"; 
        }
    }
    else{
     $passedEdits = FALSE;  
     echo "<p>Error: Location is a required field.</p>\n";   
    }
        
    #Test POST and valid size
    if ((isset($_POST ['size'])) && ($_POST ['size'] != NULL)) {
       $formSize = $_POST ['size'];
       
    }
    else
    {
        $passedEdits = FALSE;  
        echo "<p>Error: Size is a required field.</p>\n";   
    }
    
    #Test POST and valid description
    if ((isset($_POST ['description']) && ($_POST ['description'] != NULL))) {
       $formDescription = $_POST ['description'];
       
    }
    else
    {
        $passedEdits = FALSE;  
        echo "<p>Error: Size is a required field.</p>\n";   
    } 
    
    #Test POST and valid share
    if ((isset($_POST ['share']) && ($_POST ['share'] != NULL))) {
        $formTest = $_POST ['share'];
        
         
        if ($formTest === "share") {
            #Share vendor information
            $formShare = 1;  
         
        }
        else
        {
            #Do not share vendor information
            $formShare = 0;
            
        }
    }        
    else
    {
        $passedEdits = FALSE;  
        echo "<p>Error: Share is a required field.</p>\n";   
    }
    
    #Passed Edits and store row in database
    if ($passedEdits === TRUE) {

        if (!($stmt = $mysqli->prepare("INSERT INTO vendor"
            . "(custid, username, location, size, description, share) VALUES (?,?,?,?,?,?)"))) {
             echo "Error: Prepare failed: (" . $mysqli->errno . ") " 
            . $mysqli->error;
        }

        if (!$stmt->bind_param("issssi", $formCustid, $formUsername, $formLocation, $formSize, $formDescription, $formShare)) {
            echo "Error: Binding parameters failed: (" . $stmt->errno 
            . ") " . $stmt->error;
        }

        if (!$stmt->execute()) {
            echo "Error: Execute failed: (" . $stmt->errno . ") " 
            . $stmt->error;
        }
             $stmt->close();
    }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Farmer's Market Friend">
    <meta name="author" content="Emmalee Jones">


    <title>Farmer's Market Friend</title>

    <!-- CSS -->
    <title>Software to support Farmer's Market Friend</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/functions.js"></script>

   
  </head>
  <body>
     <!-- --------------------------------- Navigation Bar --------------------------------- -->
    
    <div class="blog-masthead">
        <div class="container">
                <nav class="blog-nav">
                     <img src="img/FarmersMarket2.jpg" width='45' height ='45'>  
                   <a class="navbar-brand" href="logout.php"> Farmer's Market Friend</a>  
                  <form class="navbar-brand pull-right">
                      <a> <?php echo "Username:" . " " . $_SESSION['username']; ?> </a>
                  </form>
                  <!-- --------------------------------- Logout Form --------------------------------- -->
                  <form class="navbar-form pull-right" method="POST" action="logout.php">
                      <input type="submit" value = "Sign out" name="logout form)"> 
                  </form>
                </nav>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
        </div>
    </div>
     
    <div class="container">
          <div class="row"> 
                  <br/>
              <div class="col-sm-4"></div> 
              <div class="col-sm-4"></div>
              <div class="col-sm-4" style="color:#FF0000" id="login_message"></div>
                </br>
              </div>     
    </div>  
        <!-- --------------------------------- Left screen  Panel -------------------------------- -->
          <div class="container">
              <div class="row">
                  <div class="col-md-6">
                      
                    <p><img class="img-responsive" src="img/farmers_market.jpg" alt="Market"/>
                    </p>   
                                 
                  </div>
                  <!-----------------------------Begin Right column ----------------------------->
                  <div class="col-md-6">
                     <div class="container-fluid" >  
                      <br>
                      <!-- Form to create registration-->
                      <form action="Page1.php" method="POST" name="addForm"
                          <div class="form-group">
                         <h3>Registration Entry Independence Day Market & Festival</h3>
                           <label for="location">Select Location (Select One)</label>
                           <select class="form-control" id="location" name="location">
                             <option>Northside/Grandstand Area</option>
                             <option>SouthSide/Shady Area</option>
                             <option>Westside/Picnic Area</option>
                           </select>
                           <br/> 
                           <label for="size">Select Size(Select One)</label>
                           <select class="form-control" id="size" name="size">
                             <option>Large Booth/ $100</option>
                             <option>Medium Booth/ $80</option>
                             <option>Small Booth/ $50</option>
                           </select> 
                          <br/>    
                         <label>Booth Description: <input type="text" class="form-control" name="description" id="description" required></label>
                         <br/> 
                         <br/> 
                         <label class="radio-inline"><input type="radio" id="share1" name="share" value="share">Share Vendor Information</label>
                         <label class="radio-inline"><input type="radio" id="share2" name="share" value="notshare">Do Not Share</label>
                         <br/>
                         <br/>
                         <button type="submit" name="signin form" class="btn btn-primary">Add Registration</button> 
                         <br/>  
                          <div class="col-sm-4" style="color:#FF0000" id="error_message"></div>
                         </div>
                      </form> 
                  </div>
                </div>
              </div>  
          </div>
           
                <div class="col-sm-3 col-sm-offset-1 blog-sidebar">

                    <div class="sidebar-module">
                        <h4>Navigate This Website</h4>
                        <ol class="list-unstyled">
                            <li><a href="homepage.php">Homepage</a></li> 
                            <li><a href="Page1.php">Registration Entry</a></li>
                            <li><a href="Page2.php">Vendor Listing</a></li>
                        </ol>
                    </div>

                </div><!-- /.blog-sidebar -->   
              
         <div class="container">
          <div class="row">   
              <div class="col-sm-12"></div> 
              
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'ON');
                
    #Build video listing table, filter if category selection made
    $formCustid = $_SESSION["custid"];
    
    $tableList = "SELECT username, location, size, description, share FROM vendor WHERE custid=\"{$formCustid}\"";

        if (!($stmt = $mysqli->prepare($tableList))) {
            echo "Error: Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
                }

            if (!$stmt->execute()) {
                echo "Error: Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
           }
                $tabUsername = NULL;
                $tabLocation = NULL;
                $tabSize = NULL;
                $tabDescription = NULL;
                $tabShare = NULL;
                $tabId = NULL;

                if (!$stmt->bind_result($tabUsername, $tabLocation, $tabSize, $tabDescription, $tabShare)) {
                    echo "Error: Binding failed: (" . $stmt->errno . ") " 
                       . $stmt->error;
              }
 ?>
              
        <form action="Page1.php" method="POST" name="printForm">
            <br/>
                 <h3>Vendor Registration Information</h3>
            <table border="1">
                <tbody>
                    <tr>
                        <th>Username</th>
                        <th>Location</th>
                        <th>Size</th>
                        <th>Short Description</th>
                        <th>Share</th>
                        <th>Events</th>
                    </tr>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'ON');

// Populate the table rows with movie data.
while ($stmt->fetch()) {  
    if ($tabShare === 1) {
        $tabShare = "Yes";
    }
    else {
        $tabShare = "No";
    }
    printf("<tr>\n" . "\t<td>%s</td>\n" . "\t<td>%s</td>\n" . "\t<td>%s</td>\n" 
        . "\t<td>%s</td>\n" ."\t<td>%s</td>\n" . "\t<td><button type=\"submit\" name=\"delete\"" 
        . " value=\"{$tabId}\">Delete</button></td>\n" 
        . "</tr>\n", $tabUsername, $tabLocation, $tabSize, $tabDescription, $tabShare);
}
#Close fetch of $stmt
$stmt->close();

?>                    
                </tbody>
            </table>
        </form>         
                  </br>
                  </br>
                  </br>
                  </br>
                  </br>
                  </br>
                  </br>
                  </br>
                  </br>
                  </br>
                  </br>
                  </br>
                  </br>
              </div> 
         </div>
   
              
     <!-- --------------------------------- Footer --------------------------------- -->
        <footer class="blog-footer">
            <p>Powered by <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a></p>
        </footer>
        <script src="js/bootstrap.min.js"></script>
  </body>
</html>


