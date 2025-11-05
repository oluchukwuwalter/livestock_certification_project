<!-- top nav bar -->
	<div class="row" style="margin:auto">
	<div class="col-md-12">
	<ul class="nav nav-tabs" style="float:right; padding-right:0px; margin-right:0px;">
   <li style=" background:#E2F0D9; border:#a4cb8a solid 1px; min-width:120px; text-align:center">
   <a href="home" style="color:#333; padding-top:2px; padding-bottom:2px; font-family:calibri; font-size:12px;">Home</a></li>
 
  <li class="dropdown" style="background:#E2F0D9;border:#a4cb8a solid 1px;  min-width:120px; text-align:center">
    <a  data-toggle="dropdown" href="#" style="color:#333; padding-top:2px; padding-bottom:2px; font-family:calibri; font-size:12px;">My Account
    </a>
    <ul class="dropdown-menu">
      <li style="  font-family:calibri; font-size:12px;"><a href="password" style=" padding:2px">Reset Password</a></li>
	   
      <li style=" font-family:calibri; font-size:12px;"><a href="myAccount" style=" padding:2px">Account Information</a></li>
	 
    </ul>
  </li>
   <li style=" background:#E2F0D9; border:#a4cb8a solid 1px; min-width:120px; text-align:center"><a href="welcome" style="color:#333; padding-top:2px; padding-bottom:2px; font-family:calibri; font-size:12px;">My Applications</a></li>
   
  <li style=" background:#E2F0D9; border:#a4cb8a solid 1px; min-width:120px; text-align:center">
  <a href="payment" style="color:#333; padding-top:2px; padding-bottom:2px; font-family:calibri; font-size:12px;">Payment</a></li>
  <li style=" background:#E2F0D9; border:#a4cb8a solid 1px; min-width:120px; text-align:center"><a href="help" style="color:#333; padding-top:2px; padding-bottom:2px; font-family:calibri; font-size:12px;">Help</a></li>
 
 
 
  <li style=" background:#E2F0D9; border:#a4cb8a solid 1px; min-width:120px; text-align:center"><a href="logout" style="color:#333; padding-top:2px; padding-bottom:2px; font-family:calibri; font-size:12px;">Logout</a></li>
 
</ul>
	
	</div>

	</div>
	<div class="row" style="margin:auto; text-align:right; padding-right:20px; font-size:12px;"><?php if(isset($_COOKIE["contact_person"])) { echo $_COOKIE["contact_person"]; } ?></div>
	<!-- close top nav bar -->