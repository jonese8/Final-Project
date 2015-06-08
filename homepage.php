<?php
#homepage.php - CS290, Emmalee Jones, Assignment Final Project
#
#Error Reporting Settings
error_reporting(E_ALL);
ini_set('display_errors', 'OFF');

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
                         <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                    
                     
                        <h4>Navigate This Website</h4>
                        <ol class="list-unstyled">
                            <li><a href="homepage.php">Homepage</a></li> 
                            <li><a href="Page1.php">Registration Entry</a></li>
                            <li><a href="Page2.php">Vendor Listing</a></li>
                        </ol>
                    </br>
                    </br>      
                </div> 
    </div>  
                     
              
     <div class="container">
             <div class="row">
                            <div class="col-md-6">
                     <div class="container-fluid" >  
                            
                           <h1>Farmer's Market Friend</h1>
                            
                        <br>
                  </div>
                </div>   
             </div>
          <div class="row">   
              <div class="col-md-6"> 
              
              <iframe width="560" height="315" src="https://www.youtube.com/embed/_GgLM4tZX0Y?rel=0" frameborder="0" allowfullscreen></iframe>
              <div class="panel-heading text-center">
                  <h4>Need ideas to set up a successful booth at the Festival?</h4>
              <h4>Watch this video from Purdue University for preparation tips.</h4>
                  </br>
                  </br>
                  </br>
                  </br>
                  </br>
                  </br>
                  </br>

              </div>
              </div>  
          </div>
         </div>
     
     <!-- --------------------------------- Footer --------------------------------- -->
        <footer class="blog-footer">
            <p>Powered by <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a></p>
        </footer>
        <script src="js/bootstrap.min.js"></script>
  </body>
</html>

