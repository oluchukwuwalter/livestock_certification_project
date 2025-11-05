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
    <!-- top header navbar -->
    
    <div class="jumbotron intro" style="padding-top:0px; padding-bottom:10px; margin-bottom:1px; background-color:#A9ABAE; box-shadow: 0px 0px 8px 0px #333; margin-left:0px; margin-right:0px; padding-right:0px">
      
	  <!-- heading title and logo -->
        <div class="row" style="margin:auto; padding-right:0px">
		<div class="col-md-1" style="text-align:center; padding-top:10px; padding-left:20px;">
		<img src="images/Logo2.png" class="img-responsive" />

		</div>
		
		
		<div class="col-md-9" style="text-align:justify; padding-top:20px; padding-left:20px; padding-right:0px;">
		<h1 style=" font-size:18px; font-weight:bold; margin:auto; color:#fff; font-family:Conthrax Sb;  display:block;">NIGERIA AGRICULTURAL <br>QUARANTINE SERVICE</h1>

		</div>
		
		
		<div class="col-md-2" style=" text-align:right; padding-top:10px; padding-left:20px; padding-right:0px; margin-right:0px;">
		<?php if(!isset($_COOKIE['userID'])) { 
	?>
		<a href="sign-in" style="text-decoration:none"><button  class="btn-warning" style=" margin-left:10px; border:none; font-family:Arial; text-align:center; padding-left:5px; padding-right:5px; padding-top:2px; padding-bottom:2px; margin-right:20px; text-decoration:none">
		Login
		</button>
		</a> 
		<a href="sign-up">
		<button  class="btn-success" style=" margin-left:10px; border:none; font-family:Arial; text-align:center; padding-left:5px; padding-right:5px; padding-top:2px; padding-bottom:2px; margin-right:20px;">
		Sign Up
		</button>
</a>
<?php } ?>

<?php if(isset($_COOKIE['userID'])) { 
	?>
		
		<a href="welcome" style="text-decoration:none; color:#fff; border:none; font-family:Arial; text-align:center; padding-left:5px; padding-right:5px; padding-top:2px; padding-bottom:2px; margin-right:10px;"  >
		My Application
	
		</a>
<?php } ?>

		</div>
		
		
		</div>
		<!-- close heading title and logo -->
		
		<!-- heading sub title -->
     <div class="row" style="height:30px; border-bottom: 2px solid #ef9956; margin:auto"></div>
	 
    </div>
	<!-- close top header -->
	<?php if(isset($_COOKIE['userID'])) { 
	include('top_nav_bar.php'); 
	}
	?>
	<!-- cote of arm section -->
	<div class="jumbotron intro" style="padding-top:30px; margin-top:0px; padding-bottom:0px; height:300px; margin-bottom:0px; background:transparent;">
	<div class="row" style="margin:auto">
	<div class="col-md-4" style="text-align:center; padding:20px"><img src="images/THREE_BKG.png" align="banner-image" class="img-responsive" style="margin:auto"></div>
	<div class="col-md-4"></div>
	<div class="col-md-4" style="text-align:center"><img src="images/TWO_BKG.png" align="banner-image" style="margin:auto"></div>
	</div>
	
	
	<div class="row" style="margin:auto">
	<div class="col-md-4"></div>
	<div class="col-md-4"><img src="images/ONE_BKG.png" align="banner-image" class="img-responsive" style="margin:auto"></div>
	<div class="col-md-4"></div>
	</div>
      
    </div>
	<!-- close cote of arm section -->
	
	
    <div class="container-fluid" style="background:#d2d3d5; padding-bottom:100px; ">
	<div class="row" style="margin:5px; background:#e1e2e3;">
	<div class="col-md-4"  style="margin-top:10px; margin-bottom:30px;box-shadow: -2px 2px 2px 2px #999; ">
	<div class="container" style="background:#fff; min-height:200px; ; padding:10px">
	<div class="row"><br>
<div class="col-md-2"></div>
<div class="col-md-6" style="">
	<h3 style="font-size:14px; color:#f58634; text-align:justify; font-weight:bold; padding-bottom:0px; margin-bottom:0px; padding-left:20px">Help Desk</h3>
	<div class="row" style="font-size:12px; margin-bottom:0px; margin-top:10px; padding-bottom:0px; padding-top:0px;text-align:justify"><img src="images/icons/mobile_phone.png" style="margin-right:20px; height:16px; "> +2349096068315</div>
	<div class="row" style="font-size:12px; margin-bottom:0px; margin-top:0px; padding-bottom:0px; padding-top:5px; text-align:justify"><img src="images/icons/envelop.png" style="margin-right:10px;"> <a href="mailto:info@naqs.gov.ng">info@naqs.gov.ng</a></div>
	<div class="row" style="font-size:12px; margin-bottom:0px; margin-top:0px; padding-bottom:0px; padding-top:5px;text-align:left; padding-right:0px;">
	
	<span><img src="images/icons/clock.png"></span>
	<span style="padding-left:10px; width:95%; font-size:11px;">Mon-Fri 8 a.m -6 p.m (local time)</span>
	</div>
	<div class="row" style="font-size:12px; margin-bottom:0px; margin-top:0px; padding-bottom:0px;text-align:justify; padding-left:30px;font-size:11px;">Sat 10 a.m - 3 p.m </div>
	
	</div>
	<div class="col-md-2" ></div>
	</div>
	</div>
	</div>
	
	<div class="col-md-4" style="margin-top:10px; margin-bottom:30px;box-shadow: -2px 2px 2px 2px #999;">
	<div class="container" style="background:#ccffcc; min-height:210px; padding:10px">
	<h3 style="text-align:center; font-size:14px; font-weight:bold"> About NAQS</h3>
	<p style="text-align:justify; font-size:12px; color:#hf7a56b">NAQS is a regulatory agency under the Federal Ministry of Agriculture and Rural Development. It was created for the harmonization of Plants, Veterinary and Aquatic resources (fisheries) Quarantine in Nigeria to promote and regulate sanitary (animal and fisheries health) and phytosanitary(plant health) measures in connection with the import and export of agricultural products with a view to minimizing the risk to agricultural economy, food safety and the environment.</p>
	</div>
	</div>
	
	<div class="col-md-4" style="margin-top:10px; margin-bottom:30px;box-shadow: -2px 2px 2px 2px #999; ">
	<div class="container" style="background:#fff; min-height:200px; padding:10px">
	<h3 style="font-size:14px; color:#f58634; text-align:justify; font-weight:bold; text-align:center; padding-bottom:0px; margin-bottom:0px;">About the Portal</h3>
	<p style="text-align:justify; font-size:12px;">Certification of Agricultural products for export has been marred with inefficient manual processes. Hence, to standardize the process of certification, NAQS created this electronic certification platform to take care of all Import-Export needs of her stakeholders, thereby creating an environment of trust and eliminate forgery.</p>
	</div>
	</div>
	</div>
	</div>
    
    
    <div class="jumbotron" style="background-color: #bfbfbf; padding-top:20px; margin:0px; padding-bottom:10px;">
    <div class="container">
      
      <footer style="background-color: #bfbfbf; padding:0px; margin:0px;">
        
        <div class="row">
          <div class="col-sm-3">
           
          </div>
          <div class="col-sm-6">
            <p style="text-align:center; font-size:12px; color:#333; padding-top:20px;"><font style="color:#FFCC00; font-size:14px;">&copy;</font> 2016 All Rights Reserved, Nigeria Agricultural Quarantine Service</p>
          </div>
		  
		  <div class="col-sm-3">
            <p style="display:block; font-size:12px; text-align:right; padding-right:10px;">
			<a href="" target="_blank" style="color:#F38440">NAQS Official Website</a><br>
			 <a href="" target="_blank" style="color:#F38440">Federal Ministry of Agriculture</a><br> 
			    <a href="" target="_blank" style="color:#F38440">Nigeria Trade Hub</a><br>
				</p>
          </div>
		  
        </div>
      </footer>
    </div>
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