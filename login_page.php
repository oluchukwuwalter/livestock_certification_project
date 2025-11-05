<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();

// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}

// Finally, destroy the session.
session_destroy();
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Nigeria Agricultural Quarantine Service Official Portal">
    <meta name="author" content="@naqs IT Team">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>Signing In | NAQS Portal</title>
    <!-- Bootstrap and demo CSS -->
    <link href="sniiplets/components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="sniiplets/components/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="sniiplets/css/main.css" rel="stylesheet">
    <!-- Yamm styles-->
    <link href="naqs_scc/naqs.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js')
    
    -->
  </head>
  <body style="background-image:url(images/background.png); background-repeat:repeat; padding-bottom:0px; margin-bottom:0px;">
    <?php include('header.php'); ?>
	<?php include('coat_of_arm_section.php'); ?>
	
    <div class="container" style="padding:10px;min-height:500px">
	<div class="row" style="padding-right:0px; margin-right:0px;">
	<div class="col-md-4" style="padding-right:0px; margin-right:0px;">
	
	
	
	
	</div>
	<div class="col-md-4">
	<?php if(isset($_GET['MVC/K'])) { $message=base64_decode(($_GET['MVC/K'])); ?>
	<p style="text-align:center; background:#CCFFCC; color:#333; padding:5px; font-size:11px; font-weight:bold; width:auto; display:block"><span><img src="images/icons/warning.png"></span><?php echo $message;  echo ">>"; ?> </p>
	<?php } ?>
	
	<?php if(isset($_GET['tval/error'])) { $message=base64_decode(($_GET['tval/error'])); ?>
	<p style="text-align:center; background:#CCFFCC; color:#ef9950; padding:5px; font-size:11px; font-weight:bold"><span><img src="images/icons/warning.png"></span><?php echo $message;  echo ">>"; ?> </p>
	<?php } ?>
	
	</div>
	<div class="col-md-4" style="padding-right:0px; margin-right:0px;">
	
	
	
	
	</div>
	</div>
      <div class="row" style="padding-right:0px; margin-right:0px; margin:auto; margin-bottom:50px; min-height:400px">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="background:#C5E0B4; border-radius: 40px ;box-shadow: 0px 2px 5px 0px #333; border:#ef9950 1px solid; padding:10px">
		<form action="authenticate-user" method="POST">
		<div class="container" style="padding:50px">
		<div class="row" style=" padding:2px; margin:auto; border:#ccc dotted 1px;">
		<div class="col-md-4" style="padding-top:5px; padding-left:0px;">
		<div class="label" style="color:#666;  font-size:14px; height:30px; font-weight:200; text-align:justify;">Username</div>
		</div>
		<div class="col-md-8" style="padding:0px; margin:0px;">
		<input name="username" class="form-control" type="text"  style=" height:30px; border-radius:0px;">
		</div>
		</div>
		
		<div class="row" style=" padding:2px; margin:auto; border:#ccc dotted 1px; margin-top:10px;">
		<div class="col-md-4" style="padding-top:5px; padding-left:0px;">
		<div class="label" style="color:#666;  font-size:14px; height:30px; font-weight:200; text-align:justify;">Password</div>
		</div>
		<div class="col-md-8" style="padding:0px; margin:0px;">
		<input name="password" class="form-control" type="password"  style=" height:30px; border-radius:0px;">
		</div>
		</div>
		
		
		<div class="row" style=" padding:2px; margin:auto; margin-top:20px;">
		<div class="col-md-4" style="padding-top:5px; padding-left:0px;">
		<div class="label" style="color:#666;  font-size:14px; height:30px; font-weight:200; text-align:justify;"></div>
		</div>
		<div class="col-md-8" style="padding:0px; margin:0px;">
		<button name="login" class="form-control" type="submit"  style=" height:30px; border-radius:7px; background:#ef9950; padding:5px; text-align:center; width:70px; font-family:calibri; color:#fff; ">Login</button>
		</div>
		</div>
		
		
		<div class="row" style=" padding:2px; margin:auto;">
		<div class="col-md-4" style="padding-top:5px; padding-left:0px;">
		<div class="label" style="color:#666;  font-size:14px; height:30px; font-weight:200; text-align:justify;"></div>
		</div>
		<div class="col-md-8" style="padding:0px; margin:0px;">
		<span  style="padding:5px; text-align:center; width:70px; font-family:calibri; color:#666; "><a href="sign-up" style="color:#666">Not Registered ? <span style="color:#FF8040">Sign up!</span></a></span>
		</div>
		</div>
		
		<div class="row" style=" padding:2px; margin:auto;">
		<div class="col-md-4" style="padding-top:5px; padding-left:0px;">
		<div class="label" style="color:#666;  font-size:14px; height:30px; font-weight:200; text-align:justify;"></div>
		</div>
		<div class="col-md-8" style="padding:0px; margin:0px;">
		<span  style="padding:5px; text-align:center; width:70px; font-family:calibri; color:#666; "><a href="admin-login" style="color:#666">Login as Admin</a></span>
		</div>
		</div>
		</div>
         </form> 
        </div>
		
		<div class="col-md-4"></div>
      </div>
	  
	  
    </div>
    
    
    <div class="jumbotron" style="background-color: #bfbfbf; padding-top:20px; margin:0px; padding-bottom:10px;">
    <?php include('footer.php'); ?>
	</div>
    <!-- /container -->
    <!-- Bootstrap core JavaScript-->
    <script src="sniiplets/components/jquery/dist/jquery.js"></script>
    <script src="sniiplets/components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=css"></script>
    <script>
      $(function() {
        window.prettyPrint && prettyPrint()
        $(document).on('click', '.yamm .dropdown-menu', function(e) {
          e.stopPropagation()
        })
      })
    </script>
    <!-- tweet and share :)-->
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </body>
</html>