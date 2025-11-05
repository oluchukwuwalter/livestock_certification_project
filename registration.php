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
	
	<script>
function passwordStrength(password)
{
	var desc = new Array();
	desc[0] = "Very Weak";
	desc[1] = "Weak";
	desc[2] = "Better";
	desc[3] = "Medium";
	desc[4] = "Strong";
	desc[5] = "Strongest";

	var score   = 0;

	//if password bigger than 6 give 1 point
	if (password.length > 6) score++;

	//if password has both lower and uppercase characters give 1 point	
	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

	//if password has at least one number give 1 point
	if (password.match(/\d+/)) score++;

	//if password has at least one special caracther give 1 point
	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;

	//if password bigger than 12 give another 1 point
	if (password.length > 12) score++;

	 document.getElementById("passwordDescription").innerHTML = desc[score];
	 document.getElementById("passwordStrength").className = "strength" + score;
}
</script>
<style type="text/css">
#passwordStrength
{
	height:10px;
	display:block;
	float:left;
}

.strength0
{
	width:50%;
	background:#cccccc;
}

.strength1
{
	width:50px;
	background:#ff0000;
}

.strength2
{
	width:100px;	
	background:#ff5f5f;
}

.strength3
{
	width:150px;
	background:#56e500;
}

.strength4
{
	background:#4dcd00;
	width:200px;
}

.strength5
{
	background:#399800;
	width:250px;
}

.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
	</style>
	<script type="text/javascript">
	document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
	</script>
	
	
  </head>
  <body style="background-image:url(images/background.png); background-repeat:repeat; padding-bottom:0px; margin-bottom:0px;">
    <?php include('header.php'); ?>
	<?php include('coat_of_arm_section.php'); ?>
	
    <div class="container" style="padding:10px;">
	<div class="row" style="padding-right:0px; margin-right:0px;">
	<div class="col-md-3"></div>
	<div class="col-md-6" style=" padding-right:0px;">
<?php
require_once('includes/db.php');
//include('functions.php');
//session_start();
//$_SESSION['random_number'];
//include ('get_captcha.php');
// Force script errors and warnings to show during production only
error_reporting(E_ALL);
ini_set('display_errors', '1');


if(isset($_POST['register'])){

//get all input variables
$company_name=$_POST['company_name'];
$contact_person=($_POST['contact_person']);
$Username=$_POST['Username'];
$Phone=$_POST['Phone'];
$Email=$_POST['Email'];
$contact_address=($_POST['contact_address']);


// set up session variables for input consistency
$_SESSION['company_name']=$company_name;
$_SESSION['contact_person']=$contact_person;
$_SESSION['Username']=$Username;
$_SESSION['Phone']=$Phone;
$_SESSION['Email']=$Email;
$_SESSION['contact_address']=$contact_address;

if ($_POST['company_name']=='' || strlen($_POST['company_name'])<4)
	{
		$errors[] = 'Company name is required and must contain 4 characters or more';
	}
	
	if ($_POST['contact_person']=='' || strlen($_POST['contact_person'])<4)
	{
		$errors[] = 'Name of contact person is required and must contain 4 characters or more';
	}

	if ($_POST['contact_address']=='' || strlen($_POST['contact_address'])<3)
	{
		$errors[] = 'Contact address is required and must contain 10 characters or more';
	}


	if ($_POST['Username']=='' || strlen($_POST['Username'])<3)
	{
		$errors[] = 'Username is required and must be atleast 3 characters';
	}
	
	



	
	$UniqueUsername="SELECT ID, Username FROM naqs_project_users WHERE Username = '".($_POST['Username'])."'";
	if(!$result = $db->query($UniqueUsername)){
    die('Could not retrieve users info [' . $db->error . ']');
}
	while($row = $result->fetch_assoc()){
			if(mysqli_num_rows($result)==1)
			{//there's user with the same username
			$errors[] = 'Username is already taken,please choose another username and try agian';
	}
	}
	

	if ($_POST['Password']=='' || alpha_numeric($_POST['Password'])==FALSE || strlen($_POST['Password'])<8)
	{
		$errors[] = 'Your password must be 8 characters or more and must be alpha-numeric';
	}

	if ($_POST['Password']!=$_POST['re_Password'])
	{
		$errors[] = 'The two passwords must match';
	}
	
	if ($_POST['Phone']=="")
	{
		$errors[] = 'Phone no must not be empty';
	}
	
	if (!empty($_POST['captcha'])) {
    if (empty($_SESSION['captcha']) || trim(strtolower($_POST['captcha'])) != $_SESSION['captcha']) {
        $errors[] = 'Incorrect Verification code';
        
    } 
   

    
    //unset($_SESSION['captcha']);
}
	
	

	if (valid_email($_POST['Email'])==FALSE)
	{
		$errors[] = 'Please supply a valid email address';
	}
	
	
	$checkUniqueEmail="SELECT ID, Email FROM naqs_project_users WHERE Email = '".($_POST['Email'])."'";
	if(!$result2 = $db->query($checkUniqueEmail)){
    die('Could not retrieve email data  [' . $db->error . ']');
}
	while($row2 = $result2->fetch_assoc()){
			if(mysqli_num_rows($result2)==1)
			{//there's user with the same username
			$errors[] = 'A user with this email exist,please choose another email and try agian';
	}
	}
   
   
   
   if ($_POST['contact_address']=='' || strlen($_POST['contact_address'])<10)
	{
		$errors[] = 'Please provide a valid contact address not less than 10 characters';
	}
	
	
//if (imagepng($image,get_captcha,php)!=($_POST['captcha-code'])){
//$errors[] = 'Invalid code';
//}

if(($_FILES["myfile"]["name"])!="") 
{

if (($_FILES["myfile"]["type"] != "image/png")&&($_FILES["myfile"]["type"] != "image/jpeg")&&($_FILES["myfile"]["type"] != "image/jpg"))  {

$errors[] = 'Your CAC file is invalid, only JPEG, PNG or JPG file formats are allowed';

}


if (($_FILES["myfile"]["size"] > 10000000))  {

$errors[] = 'Your CAC file is invalid, maximum size allowed is 10MB';

}
}
if(isset($errors))
	{
		echo '<div class="message-div" style="text-align:justify; margin-bottom:20px; border: #EF9950 2px solid; background:#CCFFCC; color:#333; padding:5px; font-size:11px; font-weight:bold">';
		echo '<img src="images/icons/warning.png" />';
		echo '<strong><span style="color:#ef9950;"><u>Request failed. Check the following errors</u><span></strong><br>';
	
		while (list($key,$value) = each($errors))
		{

			echo '<span style="color:#666; text-align:justify; padding:10px; font-size:12px; font-weight:normal;">'.$value.'</span><br />';
			
		}
		echo'</div>';
	}
	
	elseif($_POST['Username']!='' && $_POST['Password']!='' && $_POST['Password']==$_POST['re_Password'] && $_POST['Email']!='' && valid_email($_POST['Email'])==TRUE) 
		{
		
		
		//get  CAC file variables  
		$validextensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["myfile"]["name"]);
        $file_extension = end($temporary);

		$sourcePath = $_FILES['myfile']['tmp_name']; // Storing source path of the file in a variable
        $targetPath = "images/uploads/cac/"; // Target path where file is to be stored
        $File_Name = strtolower($_FILES['myfile']['name']);
        //$file_exts            = substr($File_Name, strrpos($File_Name, '.')); //get file extention
         $Random_Number      = rand(0, 9999999999); //Random number to be added to name.
          $NewFileName 		= $Random_Number.".".$file_extension; //new file name
 
		$Company_Name=mysqli_real_escape_string($db,$_POST['company_name']);
		$contact_person=mysqli_real_escape_string($db,$_POST['contact_person']);
		$Username=mysqli_real_escape_string($db,$_POST['Username']);
		$Password=mysqli_real_escape_string($db,md5($_POST['Password']));
		$contact_address=mysqli_real_escape_string($db,$_POST['contact_address']);
		$Phone=mysqli_real_escape_string($db,$_POST['Phone']);
		$Email=mysqli_real_escape_string($db,$_POST['Email']);
		
		$Random_key=random_string('alnum', 32);
		
		
		//move the CAC file to the server
		move_uploaded_file($sourcePath,$targetPath.$NewFileName) ; // Moving Uploaded file

		
			$createAccountQuery = "INSERT INTO naqs_project_users (`Company_Name`,`contact_person`, `Username`, `Password`,`Phone_no`, `Email`, `Random_key`, `contact_address`, `cac_img_ref`) VALUES ('$Company_Name','$contact_person','$Username','$Password','$Phone','$Email','$Random_key','$contact_address','$NewFileName')";
			 if(!$resultCreate = $db->query($createAccountQuery)){
    die('Could not create user at this time [' . $db->error . ']');
}
			
			$getUser ="SELECT ID, Username, Email, Random_key FROM naqs_project_users WHERE Username = '$Username'";
			
	     if(!$resultGetUser = $db->query($getUser)){
    die('Could not retrieve email info [' . $db->error . ']');
}
    //$result=mysqli_query($db,$getUser)
	//$row3 = $resultGetUser->fetch_assoc();
			if(mysqli_num_rows($resultGetUser)==1)
		
	
			
			{
			
				$row3 = mysqli_fetch_assoc($resultGetUser);
				$headers = "From: noreply@naqs.gov.ng ". "\r\n";
			$headers .= "Reply-To: No- Reply". "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				$subject = "Activation Email From NAQS";
				$message = '<html><body>';
				$message .= '<div style="background-image:url(images/home/real/ash-bkg.jpg); background-repeat:repeat; padding:10px; color:#333; border:#8ac956 solid 5px;"><span style="color:#8ac956; font-weight:bold; font-size:14px">'.($subject).'</span><br /><br /><strong>Dear '.$row3['Username'].',</strong><br /><br /><p style="text-align:justify">You have successfully registered with the NAQS Online portal. <br/>However, you just need few more steps to confirm your registration and you are done. <br><br> Click here<a href="http://www.multisimstechnology.com/naqs/confirm-registration?rand/BVM='.$row3['ID'].'&dew='.$row3['Random_key'].'" style="background:#8ac956; padding:5px; color:#fff; font-weight:bold; font-size:20px; text-decoration:none;">CONFIRM REGISTRATION</a>  to complete your registration and proceed to use this platform.<br> <br>Thank you for using this platform.</p><p><strong>Best Regards,</strong><br />NAQS Support Team.</p></div>';
				$message .= '</body></html>';
				if(mail($row3['Email'], $subject, $message, $headers)){
			
				//we show the good guy only in one case and the bad one for the rest.
				$msg =	 '<b>CONGRATULATION!</b> Your account was successfully created. Please login to the email, '. $row3['Email']. ' you provided during registration and confirm your membership. Check your spam folder incase the mail does not appear on the inbox folder.';	
				}
				
				else {
					$msg = '<b>CONGRATULATION!</b> Your account was successfully created but the validation email could not be sent to ' .$row3['Email'].'. Please check your network connection or contact our system administrator with our help desk support hotline(s) provided at the home page.';
				}
			}
			else {
				$msg2 = 'You just made possible the old guy (the impossible). Please inform my boss in order to give you the price for this.';
			}
							
		}
		else {		
			$msg2= 'There was an error in your data. Please make sure you filled in all the required data, you provided a valid email address and that the password fields match';	
		}
	}
?>


	<?php if(isset($msg)) {  ?>
	<p style="text-align:center; border: #00CC00 2px solid; margin-bottom:150px; background:#CCFFCC; color:#333; padding:5px; font-size:11px; font-weight:bold"><span><img src="images/icons/good.png"></span><?php echo $msg;  echo ">>"; ?> </p>
	<?php } ?>
	
	<?php if(isset($msg2)) {  ?>
	<p style="text-align:center; border: #00CC00 2px solid; background:#CCFFCC; color:#333; padding:5px; font-size:11px; font-weight:bold"><span><img src="images/icons/warning.png"></span><?php echo $msg2;  echo ">>"; ?> </p>
	<?php } ?>
	
	</div>
	<div class="col-md-3" style="padding-right:0px; margin-right:0px;">
	
	
	
	
	</div>
	</div>
	<?php if((!isset($msg))){ ?>
	<form action="sign-up" method="post" enctype="multipart/form-data">
      <div class="row" style="padding-right:0px; margin-right:0px; margin:auto; margin-bottom:50px;">
        <div class="col-md-3"></div>
        <div class="col-md-6" style="background:#E2F0D9; box-shadow: 0px 2px 5px 0px #333; padding:0px; margin:0px;">
		<div class="row" style="padding:0px; border:#FB7D00 solid 1px; height:50px; margin:0px; background:#A9D18E;">
		<label style="font-weight:normal; font-size:22px; font-family:candara; padding:10px;">User Registration Form</label>
		</div>
		<div class="container" style="padding:50px">
		<div class="row" style=" padding:2px; margin:auto; border:#ccc dotted 1px;">
		<div class="col-md-4" style="padding-top:5px; padding-left:0px;">
		<div class="label" style="color:#666;  font-size:14px; font-family:candara; height:25px; font-weight:200; text-align:justify;">Company Name:</div>
		</div>
		<div class="col-md-8" style="padding:0px; margin:0px;">
		<input name="company_name" class="form-control" type="text"  required="required"  style=" height:25px; border-radius:0px; padding-left:5px; padding-top:0px; padding-bottom:0px;" value="<?php if(isset($_SESSION['company_name'])) { echo $_SESSION['company_name']; } ?>">
		</div>
		</div>
		
		
		<div class="row" style=" padding:2px; margin:auto; border:#ccc dotted 1px;">
		<div class="col-md-4" style="padding-top:5px; padding-left:0px;">
		<div class="label" style="color:#666;  font-size:14px; font-family:candara; height:25px; font-weight:200; text-align:justify;">Name of Contact Person:</div>
		</div>
		<div class="col-md-8" style="padding:0px; margin:0px;">
		<input name="contact_person" class="form-control" type="text"  required="required"  style=" height:25px; border-radius:0px;padding-left:5px; padding-top:0px; padding-bottom:0px;" value="<?php if(isset($_SESSION['contact_person'])) { echo $_SESSION['contact_person']; } ?>">
		</div>
		</div>
		<div class="row" style=" padding:2px; margin:auto; border:#ccc dotted 1px;">
		<div class="col-md-4" style="padding-top:5px; padding-left:0px;">
		<div class="label" style="color:#666;  font-size:14px; height:25px; font-weight:200; text-align:justify;font-family:candara;">Username:</div>
		</div>
		<div class="col-md-8" style="padding:0px; margin:0px;">
		<input name="Username" class="form-control" type="text"  style=" height:25px; border-radius:0px; padding-left:5px; padding-top:0px; padding-bottom:0px;"  required="required" value="<?php if(isset($_SESSION['Username'])) { echo $_SESSION['Username']; } ?>">
		</div>
		</div>
		
		
		<div class="row" style=" padding:2px; margin:auto; border:#ccc dotted 1px;">
		<div class="col-md-4" style="padding-top:5px; padding-left:0px;">
		<div class="label" style="color:#666;  font-size:14px; height:25px; font-weight:200; text-align:justify;font-family:candara;">Password:</div>
		</div>
		<div class="col-md-8" style="padding:0px; margin:0px;">
		 
		<input class="form-control" type="password"  style=" height:25px; border-radius:0px; padding-left:5px; padding-top:0px; padding-bottom:0px;" id="Password" value="" size="32" onKeyUp="passwordStrength(this.value)"    name="Password"  placeholder="(8 characters minimum, only alphanumeric characters">
		</div>
		</div>
		
		<div class="row" style=" padding:2px; margin:auto; border:#ccc dotted 1px;">
		<div class="col-md-4" style="padding-top:5px; padding-left:0px;">
		<div class="label" style="color:#666;  font-size:14px; height:25px; font-weight:200; text-align:justify;font-family:candara;">Re-type Password:</div>
		</div>
		<div class="col-md-8" style="padding:0px; margin:0px;">
		<input name="re_Password" class="form-control" type="password"  style=" height:25px; border-radius:0px; padding-left:5px; padding-top:0px; padding-bottom:0px;">
		</div>
		</div>
		
		<div class="row" style=" padding:2px; margin:auto; border:#ccc dotted 1px;">
		<div class="col-md-4" style="padding-top:5px; padding-left:0px;">
		<div class="label" style="color:#666;  font-size:14px; height:25px; font-weight:200; text-align:justify;font-family:candara;">Password strength</div>
		</div>
		<div class="col-md-8" style="padding:0px; margin:0px;">
		<div id="passwordDescription">Password not entered</div>
		<div id="passwordStrength" class="strength0"></div>
		</div>
		</div>
		
		<div class="row" style=" padding:2px; margin:auto; border:#ccc dotted 1px;">
		<div class="col-md-4" style="padding-top:5px; padding-left:0px;">
		<div class="label" style="color:#666;  font-size:14px; height:25px; font-weight:200; text-align:justify;font-family:candara;">Phone No:</div>
		</div>
		<div class="col-md-8" style="padding:0px; margin:0px;">
		<input name="Phone" class="form-control" type="tel"  style=" height:25px; border-radius:0px; padding-left:5px; padding-top:0px; padding-bottom:0px;" required placeholder="e.g  080-1234-5678" value="<?php if(isset($_SESSION['Phone'])) { echo $_SESSION['Phone']; } ?>">
		</div>
		</div>
		
		<div class="row" style=" padding:2px; margin:auto; border:#ccc dotted 1px;">
		<div class="col-md-4" style="padding-top:5px; padding-left:0px;">
		<div class="label" style="color:#666;  font-size:14px; height:25px; font-weight:200; text-align:justify;font-family:candara;">Email:</div>
		</div>
		<div class="col-md-8" style="padding:0px; margin:0px;">
		<input name="Email"  class="form-control" type="email"  style=" height:25px; border-radius:0px;padding-left:5px; padding-top:0px; padding-bottom:0px; " required placeholder="Enter a valid email address" value="<?php if(isset($_SESSION['Email'])) { echo $_SESSION['Email']; } ?>">
		</div>
		</div>
		
		
		
		<div class="row" style=" padding:2px; margin:auto; border:#ccc dotted 1px;">
		<div class="col-md-4" style="padding-top:5px; padding-left:0px;">
		<div class="label" style="color:#666;  font-size:14px; height:25px; font-weight:200; text-align:justify;font-family:candara;">Contact Address:</div>
		</div>
		<div class="col-md-8" style="padding:0px; margin:0px;">
		<input name="contact_address" class="form-control" type="text"  style=" height:25px; border-radius:0px; padding-left:5px; padding-top:0px; padding-bottom:0px;" value="<?php if(isset($_SESSION['contact_address'])) { echo $_SESSION['contact_address']; } ?>">
		</div>
		</div>
		
		<div class="row" style=" padding:2px; margin:auto; border:#ccc dotted 1px;">
		<div class="col-md-4" style="padding-top:5px; padding-left:0px;">
		<div class="label" style="color:#666;  font-size:14px; height:25px; font-weight:200; text-align:justify;font-family:candara;"></div>
		</div>
		<div class="col-md-8" style="padding:0px; margin:0px;">
		
		</div>
		</div>
		
		<div class="row" style=" padding:2px; margin:auto; ">
		<div class="col-md-4" style="padding-top:5px; padding-left:0px;">
		<div class="label" style="color:#666;  font-size:14px; height:25px; font-weight:200; text-align:justify;font-family:candara;">Upload CAC Certificate</div>
		</div>
		<div class="col-md-8" style="padding:0px; margin:0px;">
		
		</div>
		</div>
		
		
		
		<div class="row" style=" padding:2px; margin:auto; ">
		<div class="col-md-6" style="padding-top:5px; padding-left:0px;">
		
		<div class="col-md-12">
		<input id="uploadFile" placeholder="Choose file" disabled="disabled"   style="float:left; width:70px; font-size:10px;" >
<div class="fileUpload btn btn-primary" style="background:#006600; color:#fff; padding:0px; margin:0px;">
    <span style="height:30px; font-size:10px; padding:2px;">Browse</span>
    <input id="uploadBtn" require="required" type="file" class="upload"   name="myfile" onChange="document.getElementById('uploadFile').value = this.value.split('\\').pop().split('/').pop()"/>
	
</div>
		
		</div>
		
		</div>
		<div class="col-md-6" style="padding:0px; margin:0px;">
		<div class="row" style="padding:0px; margin:auto">
		<h5 style="font-size:11px; text-align:center">Just to make sure you are human</h5>
		</div>
		
		<div class="row" style="margin:auto; padding:0px; background:#fff; padding-top:5px">
		<h4 style="color:#009933; font-variant:small-caps; text-align:center; margin:auto; font-size:10px">ENTER CAPTCHA <span style="display:block; margin-left:20px; color:#006600; font-size:10px; font-variant:normal">
		<a href="#" onClick="document.getElementById('captcha').src='captcha.php?'+Math.random();
    document.getElementById('captcha-form').focus();"
    id="change-image" style="color:#006600; font-size:10px;">Try Another Code</a></span></h4>
		<div class="col-md-3"></div>
		<div class="col-md-7" style="text-align:"><img src="captcha.php" id="captcha"  width="150px"/><br/></div>
		<div class="col-md-3"></div>
		</div>
		<div class="row" style="margin:auto; background:#fff; padding-left:10px">
		<label style="font-weight:normal; font-size:12px">Captcha:</label>
		<input name="captcha" id="captcha-form" type="text"  required="required"  style="height:20px; background:#CCCCCC; border:#009900 1px solid; text-align:center;">
		<br />

<!-- if the variable "wrong_code" is sent from previous page then display the error field -->
<?php if(isset($_GET['wrong_code'])){?>
<div style="border:1px solid #990000; background-color:#D70000; color:#FFFFFF; padding:4px; padding-left:6px;width:295px;">Wrong verification code</div><br /> 
<?php ;}?>
		</div>
		<div class="row" style="margin:auto; padding:0px;">
		
		</div>
		</div>
		</div>
		
		<div class="row" style=" padding:2px; margin:auto; margin-top:20px;">
		<div class="col-md-4" style="padding-top:5px; padding-left:0px;">
		<div class="label" style="color:#666;  font-size:14px; height:25px; font-weight:200; text-align:justify;"></div>
		</div>
		<div class="col-md-4" style="padding:0px; margin:0px;"></div>
		<div class="col-md-4" style="padding:0px; margin:0px;">
		<button class="form-control" type="submit" name="register"  style=" height:30px; background:#006600; padding:5px; text-align:center; width:70px; font-family:calibri; color:#fff; ">Register</button>
		</div>
		</div>
		
		
		<div class="row" style=" padding:2px; margin:auto;">
		<div class="col-md-4" style="padding-top:5px; padding-left:0px;">
		<div class="label" style="color:#666;  font-size:14px; height:25px; font-weight:200; text-align:justify;"></div>
		</div>
		<div class="col-md-3" style="padding:0px; margin:0px;"></div>
		<div class="col-md-5" style="padding:0px; margin:0px;">
		<span  style="padding:5px; text-align:center; width:70px; font-family:calibri; color:#666; "><a href="sign-in" style="color:#666">Already registered ? Login</a></span>
		</div>
		</div>
		
		
		</div>
          
        </div>
		
		<div class="col-md-3"></div>
      </div>
	  </form>
	  <?php } ?>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script>
      $.validate({
        lang: 'es'
      });
    </script>
    
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