
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

  </head>

  <body>
      
    <div class="container">
      <div class="page-header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="mailto:jackson.li@premiumsoundsolutions.com">Contact Support</a></li>
          </ul>
        </nav>
          <div style="margin:10px;width:100px;float:left;"><img src="img/pss-logo.png"></img></div>
      </div>

<!--        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">WebSiteName</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">Page 1</a></li>
              <li><a href="#">Page 2</a></li> 
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
          </div>
        </nav>        -->

          
      <div class="jumbotron">
        <H2>温馨提醒：<H2>
                <p>目前该系统仅支持 Google Chrome 和 Firefox 浏览器，如果您的电脑没有安装， 请联系IT部门安装!</p>
                <p>The system only support Google Chrome and Firefox browser, please feel free to contact IT department if you need any help!</p>
               
                <p></p>        
      </div>  
      
      <div class="form-field">
        <form class="form-signin" method="post" action="login.php" ?>
        <input type='hidden' name='loginForm' value='1'>        
          <h2 class="form-signin-heading">Login</h2>
          <label for="inputEmail" class="sr-only">Windows Account</label>
          <input type="text" id="inputEmail" class="form-control" placeholder="Your Windows Account" name="username" required autofocus>
          <br>        
          <label for="inputPassword" class="sr-only">Windows Password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Your Windows Password" name="password" required>
          <br>
          <button class="btn btn-lg btn-primary btn-block" type="submit"> Login </button> 
         </form>          
      </div>

<br>
<br>


    </div> <!-- /container -->

  </body>
</html>
