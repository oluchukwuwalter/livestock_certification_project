<?php if(!isset($_COOKIE['userID']))
{
$msg="Your Login session has expired. Login again to continue";
$info=base64_encode($msg);
header("Location:sign-in?MVC/K=$info");
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
	.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 20px;
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
	<?php include('top_nav_bar.php'); ?>
	<?php include('coat_of_arm_section.php'); ?>
	
    <div class="container" style="padding:10px;min-height:500px">
	<div class="row" style="padding-right:0px; margin:auto; margin-right:5px;">
	<div class="col-md-3"></div>
	<div class="col-md-6" style="padding:0px; margin:auto; text-align:center">
	
	
	
	
	</div>
	<div class="col-md-3"></div>
	</div>
      <div class="row" style="padding-right:0px; margin-right:0px;">
        <div class="col-md-3"></div>
        <div class="col-md-6" style="background:#E2F0D9;box-shadow: -2px 2px 2px 2px #999; border:#00CC33 1px solid;  margin-bottom:50px; padding-bottom:50px;">
		
		
		<div class="row" style="background:#548235;  font-family:Georgia; font-size:16px; font-weight:bold; color:#006600;  margin-bottom:10px; padding-bottom:20px; padding-right:5px;">
		<span class="pull-right"><a href="home"><img src="images/icons/cross circle.png" height="16" width="16" title="Close"></a></span>
		
		<h3 style="font-family:Georgia; color:#FFFFCC; padding-top:20px; text-align:center; font-size:14px; font-weight:normal; margin:0px;">Click <a href="" style="color:#00CC33">Remita.net</a>  to make payment</h3>
		</div>
		
	<div class="container" style="padding-bottom:20px;">
	<div class="row">
	<h5 style="margin-top:0px; font-weight:lighter; font-size:12px; font-style:italic; text-align:center;">Upon return, please upload evidence of payment for confirmation</h5>
	
	</div>
	
	<div class="row" style="margin:auto;">
	
	<div class="col-md-3"><span style="font-family:candara; font-size:14px; padding-left:0px;">Application No:</span></div>
	<div class="col-md-7" style="padding:0px; margin:0px;"><span style="font-family:candara; font-size:12px;"><input type="text"  style="height:20px; border: #006633 solid 1px; border-radius:0px;padding-bottom:0px; padding-left:2px; padding-top:0px;" class="form-control"></span></div>
	<div class="col-md-2"></div>
	</div>
	<div class="sepetaor" style="height:10px; width:100%"></div>
	
	<div class="row" style="margin:auto;">
	<?php include('includes/get_exporter.php'); ?>
	<div class="col-md-3" style="padding-left:0px;"><span style="font-family:candara; font-size:14px;">Company Name:</span></div>
	<div class="col-md-7" style="padding:0px; margin:0px;"><span style="font-family:candara; font-size:12px;"><input type="text"  style="height:20px; border: #006633 solid 1px; border-radius:0px; padding-bottom:0px; padding-left:2px; padding-top:0px;" class="form-control" value="<?php if(isset($Exporter_Company_Name)) { echo  $Exporter_Company_Name; } ?>" readonly="readonly"></span></div>
	<div class="col-md-2"></div>
	</div>
	
	
	<div class="row" style="box-shadow: -2px 2px 2px 2px #999; border: #FE6001 1px solid; margin-left:10%; margin-right:10%; margin-top:20px;">
	
	<div class="row" style="margin-left:15%; margin-right:15%;">
	<input id="uploadFile" placeholder="Choose file to upload" disabled="disabled"   style="border:1px solid #006633;"/>
<div class="fileUpload btn btn-primary" style="background:#006600; color:#fff">
    <span>Browse</span>
    <input id="uploadBtn" type="file" class="upload" onChange="document.getElementById('uploadFile').value = this.value.split('\\').pop().split('/').pop()" />
</div>
</div>
	  
	  
	  <div class="row" style="margin:auto; text-align:center">
	  <button type="submit" style=" background:#Ef9950; border:none; color:#fff; margin-bottom:20px; border-radius:5px; padding:2px; width:100px">Send</button>
	  
	  </div>
	
	
	</div>
	
	</div>
          
		  
		  
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