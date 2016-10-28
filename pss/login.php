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
      
<?php

include_once 'db.php';

if (isset($_POST["loginForm"])) { //prevent null bind
        $username = strtoupper($_POST["username"]); //remove case sensitivity on the username
        //echo $username;
        $password = $_POST["password"];       
        //echo $password;

	if ($username != NULL && $password != NULL){
		//include the class and create a connection
		include (dirname(__FILE__) . "/adLDAP/adLDAP.php");
        try {
		    $adldap = new adLDAP();
        }
        catch (adLDAPException $e) {
            echo $e; 
            exit();   
        }
		
		//authenticate the user
		if ($adldap->authenticate($username, $password)){
			//establish your session and redirect
//			session_start();
			$_SESSION["username"] = $username;
                        $_SESSION["userinfo"] = $adldap->user()->info($username);
                        $userinfo=$_SESSION["userinfo"];                 
                        
                        
                        $collection = $adldap->user()->infoCollection($username);
                        //print_r($collection->memberOf);
                        //echo $collection->samaccountname;
                        //$collection->mail;
                        $isAdminUser = $adldap->user()->inGroup("$username","sga-PSS-IT-SHZ");
                        if($isAdminUser){
                            $_SESSION["adminUser"] = 1;
                        }else{
                            $_SESSION["adminUser"] = 0;
                        }

                        
                        // After login, then to generate the PR Number
                        $sqlRequest = "SELECT `prNumber` FROM `request` ORDER BY `prNumber` DESC LIMIT 1";
                        $stmtRequest = $db->prepare($sqlRequest);
                        $stmtRequest->execute();
                        $rowRequest = $stmtRequest->fetch(PDO::FETCH_ASSOC);

                        // To check DB is there any PR number records.
                        if ($rowRequest){
                        //    echo "True";
                            $lastNumber = $rowRequest['prNumber'];
                        //    echo $lastNumber;
                        }else{
                            $lastNumber = date("y") * 1000000;
                        //    echo "False";
                        //    echo $lastNumber;
                        }
                        echo "<div class='row'>";
                        echo "<div class='col-xs-4'>";
                        echo "</div>";
                        echo "<div class='col-xs-4'>";
                        echo "<button class='btn btn-lg btn-primary btn-block' onclick=\"location.href='new.php?lastNumber=$lastNumber'\">New Purchasing Request</button>";
                        echo "<button class='btn btn-lg btn-primary btn-block' onclick=\"location.href='list.php'\">Purchasing Request History</button>";                        
                        echo "</div>";
                        echo "<div class='col-xs-4'>";
                        echo "</div>";
                        echo "</div>";
                        

			//$redir = "Location: http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/new.php?lastNumber=$lastNumber";
			//header($redir); 
                        exit();  
		}
                
	}
	$failed = 1;

        echo "<div class='alert alert-warning'>";
        echo " <center><h3> Login failed, please try again.</h3></center><br>";
        echo " <center><h4> <a href='index.php'>Go back</a></h4></center>";
        echo "</div>";
}else{
        echo "<div class='alert alert-warning'>";
        echo " <center><h3> Login failed, please try again.</h3></center><br>";
        echo " <center><h4> <a href='index.php'>Go back</a></h4></center>";
        echo "</div>";    
}
?>      




  </body>
</html>

