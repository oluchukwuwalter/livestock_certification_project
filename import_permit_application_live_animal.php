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
legend {
color: #abda0f;
    padding:2px;
    margin-left: 14px;
    font-weight:bold;
    font-size: 14px;
    font-weight:100;
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
	
    
        
        <div class="col-md-12" style="background:#E2F0D9;box-shadow: -2px 2px 2px 2px #999; border:#00CC33 1px solid;  margin-bottom:50px; padding-bottom:50px;">
		
		
		<div class="row" style="background:#548235;  font-family:Georgia; font-size:16px; font-weight:bold; color:#006600; padding-bottom:20px; border:#FF8000 1px solid">
		<h3 style="font-family:Georgia; color:#fff; text-align:center; font-size:16px; font-weight:bold; padding:0px; margin-top:10px;">DEPARTMENT OF LIVESTOCK </h3>
		<h3 style=" font-family:'Times New Roman'; color:#fff; text-align:center; font-size:12px; font-weight:lighter; padding:0px; margin-top:10px;">IMPORT PERMIT FORM FOR LIVE ANIMALS</h3>
		
		</div>
		
	<div class="container" style="padding-bottom:20px;">
	<h2 style="font-family:candara; color:#999; font-size:14px; margin:0px; padding-top:10px; font-weight:bold; ">
Import Permit Application Form . </h2>
	
	<div class="row" style="margin:auto; border:1.5px solid #CCCCCC; border-radius:15px; height:auto; margin-top:10px; margin-bottom:20px; padding-bottom:20px;  padding-right:10px;">
	<h3 style="font-family:candara; font-size:12px; color:#006633; font-weight:bold; margin-left:20px;"> 1.    Description of consignment </h3>
	<div class="container">
	<div class="col-md-6">
	<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Name of Importer</span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto"><input type="text"  style="height:20px; border: #006633 solid 1px; border-radius:0px;" class="form-control"></span>
		</div>
		</div>
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Address of Importer  </span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto"><input type="text"  style="height:20px; border: #006633 solid 1px; border-radius:0px;" class="form-control"></span>
		</div>
		</div>
		
		
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">  Email Address </span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto">
		<input type="text"  style="height:20px; border: #006633 solid 1px; border-radius:0px;" class="form-control"></span>
		</div>
		</div>
		
		
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">  Phone No </span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto">
		<input type="number"  style="height:20px; border: #006633 solid 1px; border-radius:0px" class="form-control"></span>
		</div>
		</div>
		
		
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">   Registered Name/Number of Animal </span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto">
		<input type="text"  style="height:20px; border: #006633 solid 1px; border-radius:0px;" class="form-control"></span>
		</div>
		</div>
		
		
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Tattoo (If Available)</span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto">
		<input type="text"  style="height:20px; border: #006633 solid 1px; border-radius:0px;" class="form-control"></span>
		</div>
		</div>
		
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Tag No.</span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto">
		<input type="text"  style="height:20px; border: #006633 solid 1px; border-radius:0px;" class="form-control"></span>
		</div>
		</div>
		
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px"> Age </span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto">
		<input type="text"  style="height:20px; border: #006633 solid 1px; border-radius:0px;" class="form-control"></span>
		</div>
		</div>
		
		
	</div>
	<div class="col-md-6">
	
	<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Name of Consignee</span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto"><input type="text"  style="height:20px; border: #006633 solid 1px; border-radius:0px;" class="form-control"></span>
		</div>
		</div>
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Postal Address</span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto"><input type="text"  style="height:20px; border: #006633 solid 1px; border-radius:0px;" class="form-control"></span>
		</div>
		</div>
		
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Country of Origin</span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto">
		<select  style="border: #006633 solid 1px; border-radius:0px" class="form-control">         
		

<option>Afghanistan</option>
<option>Aland Islands (Finland)</option>
<option>Albania</option>
<option>Algeria</option>
<option>American Samoa (USA)</option>
<option>Andorra</option>
<option>Angola</option>
<option>Anguilla (UK)</option>
<option>Antigua and Barbuda</option>
<option>Argentina</option>
<option>Armenia</option>
<option>Aruba (Netherlands)</option>
<option>Australia</option>
<option>Austria</option>
<option>Azerbaijan</option>
<option>Bahamas</option>
<option>Bahrain</option>
<option>Bangladesh</option>
<option>Barbados</option>
<option>Belarus</option>
<option>Belgium</option>
<option>Belize</option>
<option>Benin</option>
<option>Bermuda (UK)</option>
<option>Bhutan</option>
<option>Bolivia</option>
<option>Bosnia and Herzegovina</option>
<option>Botswana</option>
<option>Brazil</option>
<option>British Virgin Islands (UK)</option>
<option>Brunei</option>
<option>Bulgaria</option>
<option>Burkina Faso</option>
<option>Burma</option>
<option>Burundi</option>
<option>Cambodia</option>
<option>Cameroon</option>
<option>Canada</option>
<option>Cape Verde</option>
<option>Caribbean Netherlands (Netherlands)</option>
<option>Cayman Islands (UK)</option>
<option>Central African Republic</option>
<option>Chad</option>
<option>Chile</option>
<option>China</option>
<option>Christmas Island (Australia)</option>
<option>Cocos (Keeling) Islands (Australia)</option>
<option>Colombia</option>
<option>Comoros</option>
<option>Cook Islands (NZ)</option>
<option>Costa Rica
<option>Croatia</option>
<option>Cuba</option>
<option>Curacao (Netherlands)</option>
<option>Cyprus</option>
<option>Czech Republic</option>
<option>Democratic Republic of the Congo</option>
<option>Denmark</option>
<option>Djibouti</option>
<option>Dominica</option>
<option>Dominican Republic</option>
<option>Ecuador</option>
<option>Egypt</option>
<option>El Salvador</option>
<option>Equatorial Guinea</option>
<option>Eritrea</option>
<option>Estonia</option>
<option>Ethiopia</option>
<option>Falkland Islands (UK)</option>
<option>Faroe Islands (Denmark)</option>
<option>Federated States of Micronesia</option>
<option>Fiji</option>
<option>Finland</option>
<option>France</option>
<option>French Guiana (France)</option>
<option>French Polynesia (France)</option>
<option>Gabon</option>
<option>Gambia</option>
<option>Georgia</option>
<option>Germany</option>
<option>Ghana</option>
<option>Gibraltar (UK)</option>
<option>Greece</option>
<option>Greenland (Denmark)</option>
<option>Grenada</option>
<option>Guadeloupe (France)</option>
<option>Guam (USA)</option>
<option>Guatemala</option>
<option>Guernsey (UK)</option>
<option>Guinea</option>
<option>Guinea-Bissau</option>
<option>Guyana</option>
<option>Haiti</option>
<option>Honduras</option>
<option>Hong Kong (China)</option>
<option>Hungary</option>
<option>Iceland</option>
<option>India</option>
<option>Indonesia</option>
<option>Iran</option>
<option>Iraq</option>
<option>Ireland</option>
<option>Isle of Man (UK)</option>
<option>Israel</option>
<option>Italy</option>
<option>Ivory Coast</option>
<option>Jamaica</option>
<option>Japan</option>
<option>Jersey (UK)</option>
<option>Jordan</option>
<option>Kazakhstan</option>
<option>Kenya</option>
<option>Kiribati</option>
<option>Kosovo</option>
<option>Kuwait</option>
<option>Kyrgyzstan</option>
<option>Laos</option>
<option>Latvia</option>
<option>Lebanon</option>
<option>Lesotho</option>
<option>Liberia</option>
<option>Libya</option>
<option>Liechtenstein</option>
<option>Lithuania</option>
<option>Luxembourg</option>
<option>Macau (China)</option>
<option>Macedonia</option>
<option>Madagascar</option>
<option>Malawi</option>
<option>Malaysia</option>
<option>Maldives</option>
<option>Mali</option>
<option>Malta</option>
<option>Marshall Islands</option>
<option>Martinique (France)</option>
<option>Mauritania</option>
<option>Mauritius</option>
<option>Mayotte (France)</option>
<option>Mexico</option>
<option>Moldov</option>
<option>Monaco</option>
<option>Mongolia</option>
<option>Montenegro</option>
<option>Montserrat (UK)</option>
<option>Morocco</option>
<option>Mozambique</option>
<option>Namibia</option>
<option>Nauru</option>
<option>Nepal</option>
<option>Netherlands</option>
<option>New Caledonia (France)</option>
<option>New Zealand</option>
<option>Nicaragua</option>
<option>Niger</option>
<option>Nigeria</option>
<option>Niue (NZ)</option>
<option>Norfolk Island (Australia)</option>
<option>North Korea</option>
<option>Northern Mariana Islands (USA)</option>
<option>Norway</option>
<option>Oman</option>
<option>Pakistan</option>
<option>Palau</option>
<option>Palestine</option>
<option>Panama</option>
<option>Papua New Guinea</option>
<option>Paraguay</option>
<option>Peru</option>
<option>Philippines</option>
<option>Pitcairn Islands (UK)</option>
<option>Poland</option>
<option>Portugal</option>
<option>Puerto Rico</option>
<option>Qatar</option>
<option>Republic of the Congo</option>
<option>Reunion (France)</option>
<option>Romania</option>
<option>Russia</option>
<option>Rwanda</option>
<option>Saint Barthelemy (France)</option>
<option>Saint Helena, Ascension and Tristan da Cunha (UK)</option>
<option>Saint Kitts and Nevis</option>
<option>Saint Lucia</option>
<option>Saint Martin (France)</option>
<option>Saint Pierre and Miquelon (France)</option>
<option>Saint Vincent and the Grenadines</option>
<option>Samoa</option>
<option>San Marino</option>
<option>Sao Tom and Principe</option>
<option>Saudi Arabia</option>
<option>Senegal</option>
<option>Serbia</option>
<option>Seychelles</option>
<option>Sierra Leone</option>
<option>Singapore</option>
<option>Sint Maarten (Netherlands)</option>
<option>Slovakia</option>
<option>Slovenia</option>
<option>Solomon Islands</option>
<option>Somalia</option>
<option>South Africa</option>
<option>South Korea</option>
<option>South Sudan</option>
<option>Spain</option>
<option>Sri Lanka</option>
<option>Sudan</option>
<option>Suriname</option>
<option>Svalbard and Jan Mayen (Norway)</option>
<option>Swaziland</option>
<option>Sweden</option>
<option>Switzerland</option>
<option>Syria</option>
<option>Taiwan</option>
<option>Tajikistan</option>
<option>Tanzania</option>
<option>Thailand</option>
<option>Timor-Leste</option>
<option>Togo</option>
<option>Tokelau (NZ)</option>
<option>Tonga</option>
<option>Trinidad and Tobago</option>
<option>Tunisia</option>
<option>Turkey</option>
<option>Turkmenistan</option>
<option>Turks and Caicos Islands (UK)</option>
<option>Tuvalu</option>
<option>Uganda</option>
<option>Ukraine</option>
<option>United Arab Emirates</option>
<option>United Kingdom</option>
<option>United States</option>
<option>United States Virgin Islands (USA)</option>
<option>Uruguay</option>
<option>Uzbekistan</option>
<option>Vanuatu</option>
<option>Vatican City</option>
<option>Venezuela</option>
<option>Vietnam</option>
<option>Wallis and Futuna (Franvce)</option>
<option>Western Sahara</option>
<option>Yemen</option>
<option>Zambia</option>
<option>Zimbabwe</option>


		</select>
		</span>
		</div>
		</div>
		<br>
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Breed  </span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto">
		<select  style="border: #006633 solid 1px; border-radius:0px;" class="form-control">         
		<option>xys hyett eiwtgsb</option>
		<option></option></select>
		</span>
		</div>
		</div>
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Specie </span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto">
		<select  style=" border: #006633 solid 1px; border-radius:0px;" class="form-control">         
		<option>xys hyett eiwtgsb</option>
		<option></option></select>
		</span>
		</div>
		</div>
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Sex </span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto">
		<select  style=" border: #006633 solid 1px; border-radius:0px;" class="form-control">         
		<option>xys hyett eiwtgsb</option>
		<option></option></select>
		</span>
		</div>
		</div>
		
	</div>
	</div>
	
	</div>
          
		<div class="col-md-12" style="border:#FF8040 1px solid; height:auto; font-family:candra; padding-right:20px; padding-left:20px; padding-top:10px; padding-bottom:10px;">
		<h3 class="legend-header">2. Purpose of Importation </h3>
		
		<div class="col-md-3"></div>
		<div class="col-md-6" style="margin:auto; text-align:center">
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Country Visited by the Animal in the last two (2) Years</span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto"><input type="text"  style="height:20px; border: #006633 solid 1px; border-radius:0px;" class="form-control"></span>
		</div>
		</div>
		
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Proposed Date of Dispatch</span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto"><input type="text"  style="height:20px; border: #006633 solid 1px; border-radius:0px;" class="form-control"></span>
		</div>
		</div>
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Proposed Date of Arrival</span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto"><input type="text"  style="height:20px; border: #006633 solid 1px; border-radius:0px;" class="form-control"></span>
		</div>
		</div>
		
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Means of Conveyance</span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto">
		<select  style="height:20px; border: #006633 solid 1px; border-radius:0px;" class="form-control">         
		<option>xys hyett eiwtgsb</option>
		<option></option></select></span>
		</div>
		</div>
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Point of Entry</span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto"><input type="text"  style="height:20px; border: #006633 solid 1px; border-radius:0px;" class="form-control"></span>
		</div>
		</div>
		
		
		</div>
		<div class="col-md-3"></div>
		</div>
		
		
		  
        </div>
		
		<div class="container">
		<div class="row" style="background:#DAEAD1; border-radius:15px; height:auto; margin:auto; padding-bottom:10px" >
		<h3 style="font-family:candara; font-size:12px; color:#006633; font-weight:bold; margin-left:20px;"> 3.    Declaration </h3>
		<p style="font-family:candara; font-size:12px; color:#999; margin:auto; padding-left:20px; padding-right:20px">I/We hereby request the Nigeria Plant Quarantine Service to arrange for the inspection of the consignment (s) of plants listed overleaf and for the issuance of phytosanitory certificates as prescribed by the regulations of the importing country. I/We have read and accepted the general conditions set out below:</p>
		<h3 style="font-family:candara; font-size:12px; color:#006633; font-weight:bold; margin-left:20px;"> 4.    Terms and conditions of service  </h3>
		<input type="checkbox" value="" name="agree" id="agree" style="margin-left:20px; border:solid 1px #009900" />
                    <label style="font-family:candara; font-size:12px; color:#999">*  I accept the Terms and Conditions</label>
		</div>
		
		
		<div class="row" style="margin-top:50px; text-align:center">
	  <button type="submit" style=" font-family:calibri; background:#006600; border:none; color:#fff; margin-bottom:20px; border-radius:5px; padding:2px; width:100px">Submit &gt; &gt;</button>
	</div>
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