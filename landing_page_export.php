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
	
	
    <div class="container" style="padding:10px;min-height:500px">
	<div class="row" style="padding-right:0px; margin:auto; margin-right:5px;">
	<div class="col-md-3"></div>
	<div class="col-md-6" style="padding:0px; margin:auto; text-align:center">
	
	<ul class="nav nav-tabs" style="float:right; padding-right:0px; margin-right:0px;">
  
  <li class="dropdown" style="background:#E2F0D9; border:#009933 solid 1px;">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:#333; padding-top:2px; padding-bottom:2px; font-family:calibri; font-size:12px;">My Account
    </a>
    <ul class="dropdown-menu" style="padding:1px;">
      <li style="font-family:calibri; font-size:12px; padding:1px;"><a href="#">Reset Password</a></li>
	  <li style="font-family:calibri; font-size:12px; padding:1px;"><a href="#">Transaction History</a></li>
	  <li style="font-family:calibri; font-size:12px; padding:1px;"><a href="#">Account Information</a></li>
	  
      
    </ul>
  </li>
  <li style=" background:#E2F0D9; border:#009933 solid 1px;"><a href="#" style="color:#333; padding-top:2px; padding-bottom:2px; font-family:calibri; font-size:12px;">Payment</a></li>
  
  
  <li style=" background:#E2F0D9; border:#009933 solid 1px;"><a href="#" style="color:#333; padding-top:2px; padding-bottom:2px; font-family:calibri; font-size:12px;">FAQ</a></li>
 
  <li style=" background:#E2F0D9; border:#009933 solid 1px;"><a href="#" style="color:#333; padding-top:2px; padding-bottom:2px; font-family:calibri; font-size:12px;">Logout</a></li>
  
  
 
 
</ul>
	
	
	</div>
	<div class="col-md-3"></div>
	</div>
      <div class="row" style="padding-right:0px; margin-right:0px;">
        <div class="col-md-3"></div>
        <div class="col-md-6" style="background:#E2F0D9; border-radius: 4px 0px 40px 5px;box-shadow: -2px 2px 2px 2px #999; border:#00CC33 1px solid;  margin-bottom:50px; padding-bottom:50px;">
		
		
		<div class="row" style="background:#385723; border-radius: 4px 0px 7px 0px; padding:10px;  font-family:Georgia; font-size:16px; font-weight:bold; color:#006600; height:70px; padding-top:30px; margin-bottom:20px;"><span style="text-align:right; display:block; float:right; font-size:12px; color:#fff; font-weight:lighter"><font style="color:#00CC00">Welcome,</font><i> Bill Carson</i></span></div>
		
	
          
		  
		  <div class="container" style="border: padding:0px;">
		
		<h3 style="font-size:12px; font-style:italic; padding-left:20px">
Application for examination & certification of plants for exportation</h3>
		
		<div class="row" style="padding-left:5%;padding-right:5%;">
		<div class="col-md-5" style="display:block; padding:2px; background:#385723; border-radius:4px; width:40%; margin-left:20px;text-align:center; margin-top:20px"><a href="" style="color:#fff; font-size:10px;   ">Click here to apply for Export Certification</a></div>
		 <div class="col-md-5" style="display:block; padding:2px; background:#FF8040; border-radius:4px; width:40%;margin-left:20px;text-align:center; margin-top:20px"><a href="" style="color:#fff; font-size:10px;   ">Click here to apply via Fast Track</a></div>
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