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
                    <a class="navbar-brand" href="index.php"> Farmer's Market Friend</a>  
                  <!-- --------------------------------- Login Form --------------------------------- -->
                  <form class="navbar-form pull-right" method="POST" onsubmit="login(); return false;">
                      <input class="span2" name="username" type="text" id="username" placeholder="Username" required>
                      <input class="span2" name="password" type="password" id="password" placeholder="Password" required >
                      <input type="submit" value = "Sign in" name="login form)"> 
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
          
          <p><img class="img-responsive" src="img/FarmersMarket2.jpg" alt="Market"/>
            </p>
          <div class="row">   
              <div class="col-md-6">
                  <h1></br></h1>
                  <h2>Our next Market Day</h2>
                  <h2>is Saturday, July 4th</h2>
                  <h2>Reserve your space</h2>
                  <h2>today and participate</h2>
                  <h2>in our Independence</h2>
                  <h2>Day Market and</h2>
                  <h2>Festival</h2>
                  <ul>
                  <li><h3><b>Sign in now at the top of this page </b> or complete the registration</h3></li>
                  </ul>
              </div>  
      <!-- --------------------------------- Registration Form --------------------------------- -->
              <div class="col-md-6" >
                  <h1>First Time Sign Up</h1>
                  <div class="container-fluid" >
                      <form method="POST" onsubmit="editdata(); return false;">
                              <div class="form-group col-lg-12">
                                  <label for="username" class="control-label">Username</label>
                                  <input name="username" type="text" class="form-control" id="usernamer" placeholder="Username(Email)" required>
                              </div>
                              <div class="form-group col-sm-6">
                                  <label for="password" class="control-label">Password</label>
                                  <input name="password" type="password" class="form-control" id="passwordr" placeholder="Password" required>
                                  <span class="help-block">Minimum of 8 characters</span>
                              </div>
                              <div class="form-group col-sm-6">
                                  <label for="matchpassword" class="control-label">Re-enter Password</label>
                                  <input name="matchpassword" type="password" class="form-control" id="matchpassword" placeholder="Password" required>
                                  <div class="help-block with-errors" ></div>
                              </div>
                              <div class="form-group">
                                  <button type="submit" name="signin form" class="btn btn-primary">Sign Up</button>   
                              </div>
                             <div class="col-sm-6" style="color:#FF0000" id="register_message"></div>
                      </form> 
                  </div>
              </div>
          </div>
      </div> 

      <div class="container">
          <div class="row">   
              <div class="col-sm-4"></div> 
              <div class="col-sm-4"></div>
              <div class="col-sm-4" style="color:#006600" id="signed_message"></div>
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