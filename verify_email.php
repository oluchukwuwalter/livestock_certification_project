<?php
session_start();
function valid_email ( $str )
	{
		return ( ! preg_match ( "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str ) ) ? FALSE : TRUE;
	}
	function alpha_numeric ( $str )
	{
		return ( ! preg_match ( "/^([-a-z0-9])+$/i", $str ) ) ? FALSE : TRUE;
	}
	
	function random_string ( $type = 'alnum', $len = 8 )
	{					
		switch ( $type )
		{
			case 'alnum'	:
			case 'numeric'	:
			case 'nozero'	:
			
					switch ($type)
					{
						case 'alnum'	:	$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
							break;
						case 'numeric'	:	$pool = '0123456789';
							break;
						case 'nozero'	:	$pool = '123456789';
							break;
					}
	
					$str = '';
					for ( $i=0; $i < $len; $i++ )
					{
						$str .= substr ( $pool, mt_rand ( 0, strlen ( $pool ) -1 ), 1 );
					}
					return $str;
			break;
			case 'unique' : return md5 ( uniqid ( mt_rand () ) );
			break;
		}
	}
?>
<?php

//confirm.php
require_once('includes/db.php');
//include('includes/functions.php');

$ID=($_GET['rand/BVM']);
$key=($_GET['dew']);
$user_key=base64_encode($ID);

//echo $ID;
//echo $key;

	if($_GET['rand/BVM']!='' && strlen($_GET['dew'])==32 && alpha_numeric($_GET['dew'])==TRUE)
	{

		$selectQuery = "SELECT ID, Username, Random_key, Active FROM naqs_project_users WHERE ID = '".($_GET['rand/BVM'])."'";
		if(!$result = $db->query($selectQuery)){
    die('Could not retrieve users info [' . $db->error . ']');
}
		
		//$execute = $db->query($selectQuery);
		
		if(mysqli_num_rows($result)==1)
		{
			$row = mysqli_fetch_assoc($result);
			$username=$row['Username'];
			$user_id=$row['ID'];
			if($row['Active']==1)
			{
				$error1 = 'This account has already been activated. Please <a href="sign-in">login here </a>  to continue !';
			}
			elseif($row['Random_key']!=$_GET['dew'])
			{
				$error2 = 'The confirmation code that was generated for this member does not match with the one entered , try again!';
			}
			else
			{
				$updateQuery = "UPDATE naqs_project_users SET Active=1 WHERE ID='".($row['ID'])."'";
				if(!$result2 = $db->query($updateQuery)){
    die('Could not retrieve users info [' . $db->error . ']');
}
				//$update = $db->query($updateQuery);
				
				$username=$row['Username'];
			    $userID=$row['ID'];
			   
				 setcookie("username", $username, time()+3600);  /* expires in one hr */
				setcookie("userID", $userID, time()+3600);  /* expires in one hr */
				
	              $userID = $_COOKIE["userID"];
				  $userName = $_COOKIE["username"];
					
		           ;
				    $Random_key=random_string('alnum', 32);
								
				
				$msg = '<img src="images/icons/good.png" /> Email Successfully Verified.';
			}
		}
		else {
		
			$error3 = ' This user could not be found in our database, <a href="sign-up" style="color:#8AC956"> <strong> click here to create an account </strong></a> and try again. !';
		
		}

	}
	else {

		$error4 = ' Invalid data provided, please  <a href="sign-up" style="color:#8AC956"> <strong> click here to create an account </strong></a> and try again. !';

	}

?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nigeria Agricultural Quarantine Service Official Portal">
    <meta name="author" content="@naqs IT Team">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>NAQS | Nigeria Agricultural Quarantine Service </title>
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
	<style type="text/css">
	.dropdown-menu > li{
	border-bottom:#009933 1px solid;
	border-right:#009933 1px solid;
	border-left:#009933 1px solid;
	}
	</style>
  </head>
  <body style="background-image:url(images/background.png); background-repeat:repeat; padding-bottom:0px; margin-bottom:0px;">
    <?php include('header.php'); ?>
	
	
    <div class="container" style="padding:10px; min-height:500px ">
	
      <div class="row" style="padding-right:0px; margin-right:0px; height:300px;">
        <div class="col-md-3"></div>
        <div class="col-md-6" style="text-align:center">
		
		
         
	<?php if(isset($msg)) { ?>
	<p style="text-align:center"><img  src="images/icons/mail-success-icon.jpg" alt="mail-icon-successful"></p>
	<p style="text-align:center; font-size:14px; color:#000000; font-weight:bold;p">Congratulations, <?php echo  $userName; ?> </b>!<br>

 <span style="color:#8AC956;">You have successfully activated your account with NAQS platform. Enjoy !</span></p>
	
	
	<p style="display:block; background-color:#8AC956; color:#FFFFFF; text-align:center; margin-left:auto; margin-right:auto; padding-bottom:10px; padding-left:10px; padding-right:10px; padding-top:10px; font-size:14px; height:auto;"><a href="home" style="color:#fff">Click here to proceed &gt; &gt;</a></p>
	<?php } ?>
	
	<?php if(isset($error1)) { ?>
	<p style="display:block; padding:5px; margin-top:30px; background:#fff; color:#ef9950; text-align:center;  border:#ef9950 solid 2px;  font-size:12px;"><img src="images/icons/warning.png">  <?php echo $error1; ?></p>
	<?php } ?>
	
	<?php if(isset($error2)) { ?>
	<p style="display:block; padding:5px; margin-top:30px; background:#fff; color:#ef9950; text-align:center; border:#ef9950 solid 2px;  font-size:12px;"><img src="images/icons/warning.png">  <?php echo $error2; ?></p>
	<?php } ?>
	<?php if(isset($error3)) { ?>
	<p style="display:block; padding:5px; margin-top:30px; background:#fff; color:#ef9950; text-align:center;  border:#ef9950 solid 2px;  font-size:12px;"><img src="images/icons/warning.png">  <?php echo $error3; ?></p>
	<?php } ?>
	<?php if(isset($error4)) { ?>
	<p style="display:block; padding:5px; margin-top:30px; background:#fff; color:#ef9950; text-align:center;  border:#ef9950 solid 2px;  font-size:12px;"><img src="images/icons/warning.png">  <?php echo $error4; ?></p>
	<?php } ?>
        </div>
		
		<div class="col-md-3"></div>
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