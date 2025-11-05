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
	
	
	
	
	</div>
	<div class="col-md-3"></div>
	</div>
      <div class="row" style="padding-right:0px; margin-right:0px;">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="background:#E2F0D9;box-shadow: -2px 2px 2px 2px #999; border:#00CC33 1px solid;  margin-bottom:50px; padding-bottom:50px;">
		
		
		<div class="row" style="background:#548235;  font-family:Georgia; font-size:16px; font-weight:bold; color:#006600;  margin-bottom:20px; padding-bottom:20px;">
		<h3 style="font-family:Georgia; color:#fff; text-align:center; font-size:16px; font-weight:bold; padding:0px; margin-top:10px;">CHOOSE A SERVICE PROVIDER </h3>
		
		</div>
		
	<div class="container" style="padding-bottom:20px;">
	
	
	<div class="col-md-12">
	<div class="row">
	
	<div class="col-md-6">
	<h3 style="font-family:candara; font-size:18px; font-weight:bold; color:#999">Application Stage 1/2</h3>
	<h4 style="font-family:candara; font-size:14px; font-weight:bold; margin-bottom:0px; color:#006600">Registration Details</h4>
	
	<span style="font-family:candara; font-size:12px; font-weight:normal; width:100px;display:block; float:left; text-align:justify"><strong>Company Name:</strong></span><span style="padding-left:20px; font-weight:lighter; font-size:12px; float:left; text-align:justify">Crop Life Nigeria Limited</span><br>
	<span style="font-family:candara; font-size:12px; font-weight:normal; width:100px;display:block; float:left;text-align:justify"><strong>Address:</strong></span><span style="padding-left:20px; font-weight:lighter; font-size:12px; float:left;text-align:justify">Plot 25, Cleverly Way, Abuja</span><br><br>	
	<h4 style="font-family:candara; font-size:14px; font-weight:bold; margin-bottom:0px; color:#006600">Select Your Preferred Service Provider</h4>
	<div class="row" style="margin:auto; padding-top:10px;">
	<span style="float:left"><input type="radio" name="service_provider"></span> <span style="font-family:candara; display:block; margin:0px; padding-left:10px; float:left">Lagos</span>
	</div>
	<div class="row" style="margin:auto">
	<span style="float:left"><input type="radio" name="service_provider"></span> <span style="font-family:candara; display:block; margin:0px; padding-left:10px; float:left">Other States</span>
	</div>
		
	</div>
	
	
	
	<div class="col-md-6" style="padding-top:65px;">
	
	<span style="font-family:candara; font-size:12px; font-weight:400px; width:150px;display:block; float:left;text-align:justify"><strong>Name of Contact Person:</strong></span><span style="padding-left:20px; font-weight:lighter; font-size:12px; float:left;text-align:justify">Ralph Laurence</span><br>
	<span style="font-family:candara; font-size:12px;  width:150px;display:block; float:left;text-align:justify"><strong>Email Address:</strong></span><span style="padding-left:20px; font-weight:lighter; font-size:12px; float:left;text-align:justify">info@croplife.com.ng</span><br>
	
		
	</div>
	
	</div>
	
	
	
	
	
	
	
	<hr>
	
	<div class="row" style=" padding:2px; margin:auto; border:#ccc dotted 1px;">
		<div class="col-md-4" style="padding-top:5px; padding-left:0px;">
		<div class="label" style="color:#666;  font-size:12px; height:25px; font-weight:200; text-align:justify;font-family:candara;">Exact Location of Commodity:</div>
		</div>
		<div class="col-md-8" style="padding:0px; margin:0px;">
		<select class="form-control" name="exact_location" style="border-radius:0px; border:#009933 1px solid; height:30px;">
		<option></option>
		<option></option>
		</select>
		</div>
		</div>
		
		<div class="row" style=" padding:2px; margin:auto; border:#ccc dotted 1px;">
		<div class="col-md-4" style="padding-top:5px; padding-left:0px;">
		<div class="label" style="color:#666;  font-size:12px; height:25px; font-weight:200; text-align:justify;font-family:candara;">Service Provider:</div>
		</div>
		<div class="col-md-8" style="padding:0px; margin:0px;">
		<select class="form-control" name="service_provider" style="border-radius:0px; border:#009933 1px solid; height:30px;">
		<option></option>
		<option></option>
		</select>
		</div>
		</div>
		
		
		
		<div class="row" style="margin-top:50px; text-align:center">
	  <button type="submit" style=" font-family:calibri; background:#Ef9950; border:none; color:#fff; margin-bottom:20px; border-radius:5px; padding:2px; width:100px">Continue &gt; &gt;</button>
	</div>
	
	
	</div>
          
		  
		  
        </div>
		
		<div class="col-md-2"></div>
      </div>
	  
	  
	  
	  
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