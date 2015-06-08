<?php
#Page2.php - CS290, Emmalee Jones, Assignment Final Project
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
                      
                      <p><img class="img-responsive" src="img/farmer-with-fruits-2_t.jpg" alt="Market"/>
                    </p>   
                                 
                  </div>
                  <!-----------------------------Begin Right column ----------------------------->
                  <div class="col-md-6">
                     <div class="container-fluid" >  
                      <br>
                      <!-- Form to create registration-->
                      <form action="Page1.php" method="POST" name="addForm"
                          <div class="form-group"> 
                          </div>    
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
    ini_set('display_errors', 'On');
                
    #Build video listing table, filter if category selection made
    $formShare = 1;
    
    $tableList = "SELECT username, location, size, description FROM vendor WHERE share=\"{$formShare}\"";

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

                if (!$stmt->bind_result($tabUsername, $tabLocation, $tabSize, $tabDescription)) {
                    echo "Error: Binding failed: (" . $stmt->errno . ") " 
                       . $stmt->error;
              }
 ?>
              
        <form action="Page1.php" method="POST" name="printForm">
            <br/>
                 <h3>Shared Vendor Registration Information</h3>
            <table border="1">
                <tbody>
                    <tr>
                        <th>Username</th>
                        <th>Location</th>
                        <th>Size</th>
                        <th>Short Description</th>
                    </tr>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'ON');

// Populate the table rows with movie data.
while ($stmt->fetch()) {   
    printf("<tr>\n" . "\t<td>%s</td>\n" . "\t<td>%s</td>\n" . "\t<td>%s</td>\n" 
        . "\t<td>%s</td>\n"  
        . "</tr>\n", $tabUsername, $tabLocation, $tabSize, $tabDescription);
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


