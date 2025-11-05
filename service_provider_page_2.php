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
	
	
    <div class="container" style="padding:10px;">
	<div class="row" style="padding-right:0px; margin:auto; margin-right:5px;">
	<div class="col-md-3"></div>
	<div class="col-md-6" style="padding:0px; margin:auto; text-align:center">
	
	<ul class="nav nav-tabs" style="float:right; padding-right:0px; margin-right:0px;">
  
  <li class="dropdown" style="background:#E2F0D9; border:#009933 solid 1px;">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:#333; padding-top:2px; padding-bottom:2px; font-family:calibri; font-size:12px;">My Account
    </a>
    <ul class="dropdown-menu" style="padding:1px;">
      <li style="font-family:calibri; font-size:12px; padding:1px;"><a href="#">Reset Password</a></li>
	  
      
    </ul>
  </li>
  <li style=" background:#E2F0D9; border:#009933 solid 1px;"><a href="#" style="color:#333; padding-top:2px; padding-bottom:2px; font-family:calibri; font-size:12px;">View Application</a></li>
  
  
 
 
  <li style=" background:#E2F0D9; border:#009933 solid 1px;"><a href="#" style="color:#333; padding-top:2px; padding-bottom:2px; font-family:calibri; font-size:12px;">Logout</a></li>
  
  <li>
  <form method="POST" name="search_app" action="search_serviceprovider">
  <div class="row" style="margin:auto">
  <input name="search" placeholder="Search" style="height:25px; border:#009933 solid 1px; margin:auto; padding:2px; background-image:url(images/icons/magnifier.png); background-position:99%; background-repeat:no-repeat; text-align:center">
  </div>
  </form>
  </li>
 
 
</ul>
	
	
	</div>
	<div class="col-md-3"></div>
	</div>
      
	  
	  
	  <div class="row" style="margin:auto; border:#ccc solid 1px; text-align:center; margin-top:50px; margin-bottom:100px;">
	  <div class="col-md-6" style="background:#E2F0D9; margin-left:25%; margin-right:25%">
	  <h4>Upload Treatment Certificate</h4>
	  <form method="post" action="">
	  <input id="uploadFile" placeholder="Choose treatment certificate" disabled="disabled" />
<div class="fileUpload btn btn-primary" style="background:#006600; color:#fff">
    <span>Browse</span>
    <input id="uploadBtn" type="file" class="upload" />
</div>
	  
	  
	  <div class="row" style="margin:auto; text-align:center">
	  <button type="submit" style=" background:#E64A00; border:none; color:#fff; margin-bottom:20px; border-radius:5px; padding:2px; width:100px">Send</button>
	  
	  </div>
	  </form>
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