<?php
include('includes/db.php');
$userID=($_COOKIE['userID']);
if(isset($_FILES["file"]["type"]))
{
$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["file"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
) && ($_FILES["file"]["size"] < 10000000)//Approx. 10MB files can be uploaded.
&& in_array($file_extension, $validextensions)) {
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
}
else
{

$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
$targetPath = "images/portfolio/"; // Target path where file is to be stored
$File_Name = strtolower($_FILES['myfile']['name']);
//$file_exts            = substr($File_Name, strrpos($File_Name, '.')); //get file extention
$Random_Number      = rand(0, 9999999999); //Random number to be added to name.
$NewFileName 		= $Random_Number.".".$file_extension; //new file name

$project_name=($_POST['project_name']);
$desc=mysql_real_escape_string($_POST['desc']);
$owner=mysql_real_escape_string($_POST['owner']);

move_uploaded_file($sourcePath,$targetPath.$NewFileName) ; // Moving Uploaded file

//perform query
$query = mysql_query("INSERT INTO fr_portfolio (`userid`, `name`, `desc`,`owner`, `pic_ref`) VALUES ('$userID','$project_name','$desc','$owner','$NewFileName') ") or die(mysql_error().$query);


echo '<span id="success"><img src="images/icons/good.png" height="16">Your file is valid and portfolio details added successfully</span><br/>';

}
}

else
{
echo "<span id='invalid'>Unable to process request: Invalid file Size or Format. Only Jpeg and Png files are allowed.<span>";
}
}
?>