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
	<a href="home" style="text-decoration:none; color:#fff; border:none; font-family:Arial; text-align:center; padding-left:5px; padding-right:5px; padding-top:2px; padding-bottom:2px; margin-right:10px;"  >
		Home
	
		</a>
		<a href="sign-in" style="text-decoration:none"><button class="btn-warning" style="border:none; font-family:Arial; text-align:center; padding-left:5px; padding-right:5px; padding-top:2px; padding-bottom:2px;">
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
	
	