<?php
	session_start();
	require_once "Linkclass.php";
$obj = new processes();

	if(isset($_POST["exec_seizure"])){
		
		
		$prdt_name = $_SESSION['product_name'] = $obj->test_input($_POST["product_name"]);
		$quantity = $_SESSION['quantity'] = $obj->test_input($_POST["quantity"]);
		$containerdeteNumber = $_SESSION['container_number'] = $obj->test_input($_POST["container_number"]);
		$reasonSeizure = $_SESSION['reason_for_seizure'] = $obj->test_input($_POST["reason_for_seizure"]);
		$importNumber = $_SESSION['import_permit_number'] = $obj->test_input($_POST["import_permit_number"]);
		$country = $_SESSION['country'] = $obj->test_input($_POST["country"]);
		$dateSeizure = $_SESSION['date_of_seizure'] = $obj->test_input($_POST["date_of_seizure"]);
		$nextAction = $_SESSION['next_action'] = $obj->test_input($_POST["next_action"]);
		$nameOfficer = $_SESSION['name_of_officer'] = $obj->test_input($_POST["name_of_officer"]);
		$rank = $_SESSION['rank'] = $obj->test_input($_POST["rank"]);
		
		
		$field = "Product Name"; 
		$page = "Admin/reports/export/zonal/seizure?status=";
		
		$obj->checkIfEmpty($prdt_name, $field, $page);
		$field = "Quantity";
		$obj->checkIfEmpty($quantity, $field, $page);
		$field = "Container Number";
		$obj->checkIfEmpty($containerNumber, $field, $page);
		$field = "Reason for Seizure";
		$obj->checkIfEmpty($reasonSeizure, $field, $page);
		$field = "Import Permit Number";
		$obj->checkIfEmpty($importNumber, $field, $page);
		$field = "Country";
		$obj->checkIfEmpty($country, $field, $page);
		$field = "Date of Seizure";
		$obj->checkIfEmpty($dateSeizure, $field, $page);
		$field = "Next_Action";
		$obj->checkIfEmpty($nextAction, $field, $page);
		$field = "Name of officer";
		$obj->checkIfEmpty($nameOfficer, $field, $page);
		$field = "Rank";
		$obj->checkIfEmpty($rank, $field, $page);
		
		$field = "Bill of Laden";
		$obj->checkIfEmpty($_FILES["bill_of_laden"]["name"], $field, $page);
		
		$field = "Export Certificate";
		$obj->checkIfEmpty($_FILES["export_certificate"]["name"], $field, $page);
		
		$file = new pic_handler();
		
		$page = "Admin/reports/export/zonal/seizure?status=";
		
		$target_dir = array("Admin/reports/export/zonal/seizure_certs/bill_of_laden/", "Admin/reports/export/zonal/seizure_certs/export_certs/"); 
		
		$fileToUpload = array("bill_of_laden", "export_certificate");
		
		$filename = array("_billOfLaden", "_exportCertificate");

		for($i = 0; $i < count($fileToUpload); $i++){
			
				$temp = explode(".", $_FILES[$fileToUpload[$i]]["name"]);
			
				$newfilename = round(microtime(true)) .$filename[$i].'.' . end($temp);
			
				
				$fin_name = $target_dir[$i].$newfilename;
			
			
				$file->startUpload($target_dir[$i], $fileToUpload[$i]);
				$file->imageFileType($file->target_file);
				$file->imageFileTypeTwo($fileToUpload[$i], $file->target_file);
				//$file->fileTypeInfo($file->target_file);
				$file->checkIfake($fileToUpload[$i]);
				$file->checkExistence($file->target_file);
				$file->limitFileSize($fileToUpload[$i]);
				//$file->limitFileType($obj->imageFileType);
				$file->completeUpload($fileToUpload[$i], $fin_name, $page);
		}
		
		if($_COOKIE["zone"] == "South West"){
			$zone = "South West";
		}elseif($_COOKIE["zone"] == "South East"){
			$zone = "South East";
		}elseif($_COOKIE["zone"] == "South South"){
			$zone = "South South";
		}elseif($_COOKIE["zone"] == "North West"){
			$zone = "North West";
		}elseif($_COOKIE["zone"] == "North East"){
			$zone = "North East";
		}
		
		$bill_of_laden = "seizure_certs/bill_of_laden/".round(microtime(true)) .$filename[0].'.' . end($temp);
		
		$export_cert = "seizure_certs/export_certs/".round(microtime(true)) .$filename[1].'.' . end($temp);
		
		
		
		$dateNow = $obj->getDateNow();
		
		$table = "seizure"; 
		$fields = array("product_name", "quantity", "container_no", "reason_for_seizure", "import_permit_no", "country_of_origin", "date_of_seizure", "next_action", "name_of_officer ", "rank", "bill_of_laden", "export_cert", "date", "zone");
		$values = array("$prdt_name", "$quantity", "$containerNumber", "$reasonSeizure", "$importNumber", "$country", "$dateSeizure", "$nextAction", "$nameOfficer ", "$rank", "$bill_of_laden", "$export_cert", "$dateNow", "$zone");
		$obj->insert($table,$fields,$values);
		if(isset($obj->_sucMsg)){
			
			unset($_SESSION['product_name']);
			unset($_SESSION['quantity']);
			unset($_SESSION['container_number']);
			unset($_SESSION['reason_for_seizure']);
			unset($_SESSION['import_permit_number']);
			unset($_SESSION['country']);
			unset($_SESSION['date_of_seizure']);
			unset($_SESSION['next_action']);
			unset($_SESSION['name_of_officer']);
			unset($_SESSION['rank']);
			
			
			
			
			$error = "Seizure report was successfully submitted";
			$error = base64_encode($error);
			$pic = "<img src='../../../../images/icons/accept.png' alt='Logo' width='18px' height='18px'>";
			$pic = base64_encode($pic);
			$color = "color:#548235";
			$color = base64_encode($color);
			header("location:".$page.$error."&&pic=".$pic."&&color=".$color);
		}
		
		
		
	}




if(isset($_POST["detention_form"])){
		
		
		$prdt_name = $_SESSION['prdt_name'] = $obj->test_input($_POST["prdt_name"]);
	
		$quantity = $_SESSION['qunty'] = $obj->test_input($_POST["qunty"]);
	
		$containerNumber = $_SESSION['cont_no'] = $obj->test_input($_POST["cont_no"]);
	
		$reasonDetention = $_SESSION['reason_f_detention'] = $obj->test_input($_POST["reason_f_detention"]);
	
		$importNumber = $_SESSION['permit_no'] = $obj->test_input($_POST["permit_no"]);
	
		$country = $_SESSION['country_origin'] = $obj->test_input($_POST["country_origin"]);
	
		$dateDetention = $_SESSION['detention_date'] = $obj->test_input($_POST["detention_date"]);
	
		$dateRelease = $_SESSION['release_date'] = $obj->test_input($_POST["release_date"]);
	
		$releaseReason = $_SESSION['release_reason'] = $obj->test_input($_POST["release_reason"]);
	
		$nameOfficer = $_SESSION['officer_name'] = $obj->test_input($_POST["officer_name"]);
	
		$rank = $_SESSION['officer_rank'] = $obj->test_input($_POST["officer_rank"]);
		
		
		$field = "Product Name"; 
		$page = "Admin/reports/export/zonal/detention?status=";
		
		$obj->checkIfEmpty($prdt_name, $field, $page);
		$field = "Quantity";
		$obj->checkIfEmpty($quantity, $field, $page);
		$field = "Container Number";
		$obj->checkIfEmpty($containerNumber, $field, $page);
		$field = "Reason for Detention";
		$obj->checkIfEmpty($reasonDetention, $field, $page);
		$field = "Import Permit Number";
		$obj->checkIfEmpty($importNumber, $field, $page);
		$field = "Country";
		$obj->checkIfEmpty($country, $field, $page);
		$field = "Date of Detention";
		$obj->checkIfEmpty($dateDetention, $field, $page);
		$field = "Date of Release";
		$obj->checkIfEmpty($dateRelease, $field, $page);
		$field = "Reason for Realease";
		$obj->checkIfEmpty($releaseReason, $field, $page);
		$field = "Name of officer";
		$obj->checkIfEmpty($nameOfficer, $field, $page);
		$field = "Rank";
		$obj->checkIfEmpty($rank, $field, $page);
		
		$field = "Bill of Laden";
		$obj->checkIfEmpty($_FILES["bill_laden"]["name"], $field, $page);
		
		$field = "Export Certificate";
		$obj->checkIfEmpty($_FILES["export_cert"]["name"], $field, $page);
		
		$file = new pic_handler();
		
		$page = "Admin/reports/export/zonal/detention?status=";
		
		$target_dir = array("Admin/reports/export/zonal/detention_certs/bill_of_laden/", "Admin/reports/export/zonal/detention_certs/export_certs/"); 
		
		$fileToUpload = array("bill_laden", "export_cert");
	
		$filename = array("_billOfLaden", "_exportCertificate");
	

		for($i = 0; $i < count($fileToUpload); $i++){
				
				$temp = explode(".", $_FILES[$fileToUpload[$i]]["name"]);
			
				$newfilename = round(microtime(true)) .$filename[$i].'.' . end($temp);
			
				
				$fin_name = $target_dir[$i].$newfilename;
			
				$file->startUpload($target_dir[$i], $fileToUpload[$i]);
				$file->imageFileType($file->target_file);
				$file->imageFileTypeTwo($fileToUpload[$i], $file->target_file);
				//$file->fileTypeInfo($file->target_file);
				$file->checkIfake($fileToUpload[$i]);
				$file->checkExistence($file->target_file);
				$file->limitFileSize($fileToUpload[$i]);
				//$file->limitFileType($obj->imageFileType);
				$file->completeUpload($fileToUpload[$i], $fin_name, $page);
		}
		
		if($_COOKIE["zone"] == "South West"){
			$zone = "South West";
		}elseif($_COOKIE["zone"] == "South East"){
			$zone = "South East";
		}elseif($_COOKIE["zone"] == "South South"){
			$zone = "South South";
		}elseif($_COOKIE["zone"] == "North West"){
			$zone = "North West";
		}elseif($_COOKIE["zone"] == "North East"){
			$zone = "North East";
		}
		
		$bill_of_laden = "detention_certs/bill_of_laden/".round(microtime(true)) .$filename[0].'.' . end($temp);
		
		$export_cert = "detention_certs/export_certs/".round(microtime(true)) .$filename[1].'.' . end($temp);
		
		
	
		$dateNow = $obj->getDateNow();
		
		$table = "detention_table"; 
		$fields = array("product_name", "quantity", "container_number", "reason_for_detention", "import_permit_number", "country_of_origin", "date_of_detention", "date_of_release", "reason_for_release", "name_of_officer", "rank", "bill_of_laden", "export_cert", "date", "zone");
		$values = array("$prdt_name", "$quantity", "$containerNumber", "$reasonDetention", "$importNumber", "$country", "$dateDetention", "$dateRelease", "$releaseReason", "$nameOfficer ", "$rank", "$bill_of_laden", "$export_cert", "$dateNow", "$zone");
		$obj->insert($table,$fields,$values);
		if(isset($obj->_sucMsg)){
			
			unset($_SESSION['prdt_name']);
			unset($_SESSION['qunty']);
			unset($_SESSION['cont_no']);
			unset($_SESSION['reason_f_detention']);
			unset($_SESSION['permit_no']);
			unset($_SESSION['country_origin']);
			unset($_SESSION['detention_date']);
			unset($_SESSION['release_date']);
			unset($_SESSION['release_reason']);
			unset($_SESSION['officer_name']);
			unset($_SESSION['officer_rank']);
			
			
			
			$page = "Admin/reports/export/zonal/detention?status=";
			$error = "Detention report was successfully submitted";
			$error = base64_encode($error);
			$pic = "<img src='../../../../images/icons/accept.png' alt='Logo' width='18px' height='18px'>";
			$pic = base64_encode($pic);
			$color = "color:#548235";
			$color = base64_encode($color);
			header("location:".$page.$error."&&pic=".$pic."&&color=".$color);
		}
		
		
		
	}



	
	if(isset($_POST["destruction_form"])){
		
		
		$prdt_name = $_SESSION['p_name'] = $obj->test_input($_POST["p_name"]);
	
		$quantity = $_SESSION['qty'] = $obj->test_input($_POST["qty"]);
	
		$containerNumber = $_SESSION['con_no'] = $obj->test_input($_POST["con_no"]);
	
		$reasonDestruction = $_SESSION['r_for_destruction'] = $obj->test_input($_POST["r_for_destruction"]);
	
		$importNumber = $_SESSION['imp_per_no'] = $obj->test_input($_POST["imp_per_no"]);
	
		$country = $_SESSION['c_of_origin'] = $obj->test_input($_POST["c_of_origin"]);
	
		$dateDestruction = $_SESSION['d_of_detention'] = $obj->test_input($_POST["d_of_detention"]);
	
		$costDestruction = $_SESSION['c_of_destruction'] = $obj->test_input($_POST["c_of_destruction"]);
		
		$placeDestruction = $_SESSION['place'] = $obj->test_input($_POST["place"]);
	
		$nameOfficer = $_SESSION['n_of_officer'] = $obj->test_input($_POST["n_of_officer"]);
	
		$rank = $_SESSION['rk'] = $obj->test_input($_POST["rk"]);
		
		
		$field = "Product Name"; 
		$page = "Admin/reports/export/zonal/destruction?status=";
		
		$obj->checkIfEmpty($prdt_name, $field, $page);
		$field = "Quantity";
		$obj->checkIfEmpty($quantity, $field, $page);
		$field = "Container Number";
		$obj->checkIfEmpty($containerNumber, $field, $page);
		$field = "Reason for Destruction";
		$obj->checkIfEmpty($reasonDestruction, $field, $page);
		$field = "Import Permit Number";
		$obj->checkIfEmpty($importNumber, $field, $page);
		$field = "Country";
		$obj->checkIfEmpty($country, $field, $page);
		$field = "Date of Destruction";
		$obj->checkIfEmpty($dateDestruction, $field, $page);
		$field = "Cost of Destruction";
		$obj->checkIfEmpty($costDestruction, $field, $page);
		$field = "Place of Destruction";
		$obj->checkIfEmpty($placeDestruction, $field, $page);
		$field = "Name of officer";
		$obj->checkIfEmpty($nameOfficer, $field, $page);
		$field = "Rank";
		$obj->checkIfEmpty($rank, $field, $page);
		
		$field = "Bill of Laden";
		$obj->checkIfEmpty($_FILES["b_of_laden"]["name"], $field, $page);
		
		$field = "Export Certificate";
		$obj->checkIfEmpty($_FILES["export_c"]["name"], $field, $page);
		
		$file = new pic_handler();
		
		$page = "Admin/reports/export/zonal/destruction?status=";
		
		$target_dir = array("Admin/reports/export/zonal/destruction_certificates/bill_of_laden/", "Admin/reports/export/zonal/destruction_certificates/export_certs/"); 
		
		$fileToUpload = array("b_of_laden", "export_c");
	
		$filename = array("_billOfLaden", "_exportCertificate");
	

		for($i = 0; $i < count($fileToUpload); $i++){
				
				$temp = explode(".", $_FILES[$fileToUpload[$i]]["name"]);
			
				$newfilename = round(microtime(true)) .$filename[$i].'.' . end($temp);
			
				
				$fin_name = $target_dir[$i].$newfilename;
			
				$file->startUpload($target_dir[$i], $fileToUpload[$i]);
				$file->imageFileType($file->target_file);
				$file->imageFileTypeTwo($fileToUpload[$i], $file->target_file);
				//$file->fileTypeInfo($file->target_file);
				$file->checkIfake($fileToUpload[$i]);
				$file->checkExistence($file->target_file);
				$file->limitFileSize($fileToUpload[$i]);
				//$file->limitFileType($obj->imageFileType);
				$file->completeUpload($fileToUpload[$i], $fin_name, $page);
		}
		
		if($_COOKIE["zone"] == "South West"){
			$zone = "South West";
		}elseif($_COOKIE["zone"] == "South East"){
			$zone = "South East";
		}elseif($_COOKIE["zone"] == "South South"){
			$zone = "South South";
		}elseif($_COOKIE["zone"] == "North West"){
			$zone = "North West";
		}elseif($_COOKIE["zone"] == "North East"){
			$zone = "North East";
		}
		
		$bill_of_laden = "destruction_certificates/bill_of_laden/".round(microtime(true)) .$filename[0].'.' . end($temp);
		
		$export_cert = "destruction_certificates/export_certs/".round(microtime(true)) .$filename[1].'.' . end($temp);
		
		
		
		$dateNow = $obj->getDateNow();
		
		$table = "destruction_table"; 
		$fields = array("product_name", "quantity", "container_number", "reason_for_destruction", "import_permit_number", "country_of_origin", "date_of_destruction", "cost_of_destruction", "place", "name_of_officer", "rank", "bill_of_laden", "export_cert", "date", "zone");
		
		$values = array("$prdt_name", "$quantity", "$containerNumber", "$reasonDestruction", "$importNumber", "$country", "$dateDestruction", "$costDestruction", "$placeDestruction", "$nameOfficer ", "$rank", "$bill_of_laden", "$export_cert", "$dateNow", "$zone");
		$obj->insert($table,$fields,$values);
		if(isset($obj->_sucMsg)){
			
			
			unset($_SESSION['p_name']);
			unset($_SESSION['qty']);
			unset($_SESSION['con_no']);
			unset($_SESSION['r_for_destruction']);
			unset($_SESSION['imp_per_no']);
			unset($_SESSION['c_of_origin']);
			unset($_SESSION['d_of_detention']);
			unset($_SESSION['c_of_destruction']);
			unset($_SESSION['place']);
			unset($_SESSION['n_of_officer']);
			unset($_SESSION['rk']);
			
			
			
			$page = "Admin/reports/export/zonal/destruction?status=";
			$error = "Destruction report was successfully submitted";
			$error = base64_encode($error);
			$pic = "<img src='../../../../images/icons/accept.png' alt='Logo' width='18px' height='18px'>";
			$pic = base64_encode($pic);
			$color = "color:#548235";
			$color = base64_encode($color);
			header("location:".$page.$error."&&pic=".$pic."&&color=".$color);
		}
		
		
		
	}



	if(isset($_POST["disease_form"])){
		
		
		$disease_name = $_SESSION['name_disease'] = $obj->test_input($_POST["name_disease"]);
	
		$state_affected = $_SESSION['state_affected'] = $obj->test_input($_POST["state_affected"]);
	
		$local_affected = $_SESSION['local_affected'] = $obj->test_input($_POST["local_affected"]);
	
		$farm_no = $_SESSION['farm_no'] = $obj->test_input($_POST["farm_no"]);
	
		$date_of_firstAppearance = $_SESSION['date_of_first'] = $obj->test_input($_POST["date_of_first"]);
	
		$symtem_observed = $_SESSION['symtom_observed'] = $obj->test_input($_POST["symtom_observed"]);
	
		$cause_outbreak = $_SESSION['cause_outbreak'] = $obj->test_input($_POST["cause_outbreak"]);
	
		$action_takenL = $_SESSION['action_taken'] = $obj->test_input($_POST["action_taken"]);
		
		$action_naqs = $_SESSION['action_naqs'] = $obj->test_input($_POST["action_naqs"]);
	
		$officerName = $_SESSION['officerName'] = $obj->test_input($_POST["officerName"]);
	
		$office_rank = $_SESSION['office_rank'] = $obj->test_input($_POST["office_rank"]);
		
		
		$field = "Disease Name"; 
		$page = "Admin/reports/export/zonal/disease?status=";
		
		$obj->checkIfEmpty($disease_name, $field, $page);
		$field = "State Affected";
		$obj->checkIfEmpty($state_affected, $field, $page);
		$field = "L.G.A Affected";
		$obj->checkIfEmpty($local_affected, $field, $page);
		$field = "Number of Farms Affected";
		$obj->checkIfEmpty($farm_no, $field, $page);
		$field = "Dates of First Appearance";
		$obj->checkIfEmpty($date_of_firstAppearance, $field, $page);
		$field = "Systems Observed";
		$obj->checkIfEmpty($symtem_observed, $field, $page);
		$field = "Cause of Outbreak";
		$obj->checkIfEmpty($cause_outbreak, $field, $page);
		$field = "Action Taken By locals";
		$obj->checkIfEmpty($action_takenL, $field, $page);
		$field = "Action Taken by Naqs";
		$obj->checkIfEmpty($action_naqs, $field, $page);
		$field = "Name of officer";
		$obj->checkIfEmpty($officerName, $field, $page);
		$field = "Rank";
		$obj->checkIfEmpty($office_rank, $field, $page);
		
		$field = "Bill of Laden";
		$obj->checkIfEmpty($_FILES["bill_lad"]["name"], $field, $page);
		
		$field = "Export Certificate";
		$obj->checkIfEmpty($_FILES["export_ct"]["name"], $field, $page);
		
		$file = new pic_handler();
		
		$page = "Admin/reports/export/zonal/disease?status=";
		
		$target_dir = array("Admin/reports/export/zonal/disease_certificates/bill_of_laden/", "Admin/reports/export/zonal/disease_certificates/export_certs/"); 
		
		$fileToUpload = array("bill_lad", "export_ct");
	
		$filename = array("_billOfLaden", "_exportCertificate");
	

		for($i = 0; $i < count($fileToUpload); $i++){
				
				$temp = explode(".", $_FILES[$fileToUpload[$i]]["name"]);
			
				$newfilename = round(microtime(true)) .$filename[$i].'.' . end($temp);
			
				
				$fin_name = $target_dir[$i].$newfilename;
			
				$file->startUpload($target_dir[$i], $fileToUpload[$i]);
				$file->imageFileType($file->target_file);
				$file->imageFileTypeTwo($fileToUpload[$i], $file->target_file);
				//$file->fileTypeInfo($file->target_file);
				$file->checkIfake($fileToUpload[$i]);
				$file->checkExistence($file->target_file);
				$file->limitFileSize($fileToUpload[$i]);
				//$file->limitFileType($obj->imageFileType);
				$file->completeUpload($fileToUpload[$i], $fin_name, $page);
		}
		
		if($_COOKIE["zone"] == "South West"){
			$zone = "South West";
		}elseif($_COOKIE["zone"] == "South East"){
			$zone = "South East";
		}elseif($_COOKIE["zone"] == "South South"){
			$zone = "South South";
		}elseif($_COOKIE["zone"] == "North West"){
			$zone = "North West";
		}elseif($_COOKIE["zone"] == "North East"){
			$zone = "North East";
		}
		
		$bill_of_laden = "disease_certificates/bill_of_laden/".round(microtime(true)) .$filename[0].'.' . end($temp);
		
		$export_cert = "disease_certificates/export_certs/".round(microtime(true)) .$filename[1].'.' . end($temp);
		
		
		$dateNow = $obj->getDateNow();
		
		$table = "disease_table"; 
		$fields = array("disease_name", "state_affected", "lga_affected", "farms_affected", "date_of_first_appearance", "symptoms_observed", "cause_of_outbreak", "action_by_locals", "action_by_naqs", "name_of_officer", "rank ", "bill_of_laden", "export_cert", "date", "zone");
		
		$values = array("$disease_name", "$state_affected", "$local_affected", "$farm_no", "$date_of_firstAppearance", "$symtem_observed", "$cause_outbreak", "$action_takenL", "$action_naqs", "$officerName ", "$office_rank", "$bill_of_laden", "$export_cert", "$dateNow", "$zone");
		
		$obj->insert($table,$fields,$values);
		if(isset($obj->_sucMsg)){
			
			unset($_SESSION['name_disease']);
			unset($_SESSION['state_affected']);
			unset($_SESSION['local_affected']);
			unset($_SESSION['farm_no']);
			unset($_SESSION['date_of_first']);
			unset($_SESSION['symtom_observed']);
			unset($_SESSION['cause_outbreak']);
			unset($_SESSION['action_taken']);
			unset($_SESSION['action_naqs']);
			unset($_SESSION['officerName']);
			unset($_SESSION['office_rank']);
			
			
			
			$page = "Admin/reports/export/zonal/disease?status=";
			$error = "Disease Outbreak report was successfully submitted";
			$error = base64_encode($error);
			$pic = "<img src='../../../../images/icons/accept.png' alt='Logo' width='18px' height='18px'>";
			$pic = base64_encode($pic);
			$color = "color:#548235";
			$color = base64_encode($color);
			header("location:".$page.$error."&&pic=".$pic."&&color=".$color);
		}
		
		
		
	}


		if(isset($_POST["monthly_form"])){//monthly user form
		
		
		$plant_export = $_SESSION['plant_export'] = $obj->test_input($_POST["plant_export"]);
	
		$plant_import = $_SESSION['plant_import'] = $obj->test_input($_POST["plant_import"]);
	
		$animal_export = $_SESSION['animal_export'] = $obj->test_input($_POST["animal_export"]);
	
		$animal_import = $_SESSION['animal_import'] = $obj->test_input($_POST["animal_import"]);
	
		$aquatic_export = $_SESSION['aquatic_export'] = $obj->test_input($_POST["aquatic_export"]);
	
		$aquatic_import = $_SESSION['aquatic_import'] = $obj->test_input($_POST["aquatic_import"]);
	
		$other = $_SESSION['other'] = $obj->test_input($_POST["other"]);
	
		$officer_n = $_SESSION['officer_n'] = $obj->test_input($_POST["officer_n"]);
		
		$officer_r = $_SESSION['officer_r'] = $obj->test_input($_POST["officer_r"]);
		
		
		$field = "Plant Export"; 
		$page = "Admin/reports/export/zonal/monthly?status=";
		
		$obj->checkIfEmpty($plant_export, $field, $page);
		$field = "Plant Import";
		$obj->checkIfEmpty($plant_import, $field, $page);
		$field = "Animal Export";
		$obj->checkIfEmpty($animal_export, $field, $page);
		$field = "Animal Import";
		$obj->checkIfEmpty($animal_import, $field, $page);
		$field = "Aquatic Export";
		$obj->checkIfEmpty($aquatic_export, $field, $page);
		$field = "Aquatic Import";
		$obj->checkIfEmpty($aquatic_import, $field, $page);
		$field = "Other";
		$obj->checkIfEmpty($other, $field, $page);
		$field = "Name of Officer";
		$obj->checkIfEmpty($officer_n, $field, $page);
		$field = "Rank";
		$obj->checkIfEmpty($officer_r, $field, $page);
			
		
		if($_COOKIE["zone"] == "South West"){
			$zone = "South West";
		}elseif($_COOKIE["zone"] == "South East"){
			$zone = "South East";
		}elseif($_COOKIE["zone"] == "South South"){
			$zone = "South South";
		}elseif($_COOKIE["zone"] == "North West"){
			$zone = "North West";
		}elseif($_COOKIE["zone"] == "North East"){
			$zone = "North East";
		}
		
		
		$dateNow = $obj->getDateNow();
		
		$table = "monthly_user_table";
			
		$fields = array("plant_export", "plant_import", "animal_export", "animal_import", "aquatic_export", "aquatic_import", "other", "name_of_officer", "rank", "date", "zone");
		
		$values = array("$plant_export", "$plant_import", "$animal_export", "$animal_import", "$aquatic_export", "$aquatic_import", "$other", "$officer_n", "$officer_r", "$dateNow", "$zone ");
		
		$obj->insert($table,$fields,$values);
		if(isset($obj->_sucMsg)){
			
			unset($_SESSION['plant_export']);
			unset($_SESSION['plant_import']);
			unset($_SESSION['animal_export']);
			unset($_SESSION['animal_import']);
			unset($_SESSION['aquatic_export']);
			unset($_SESSION['aquatic_import']);
			unset($_SESSION['other']);
			unset($_SESSION['officer_n']);
			unset($_SESSION['officer_r']);
			
			
			
			$page = "Admin/reports/export/zonal/monthly?status=";
			$error = "Data Was Successfully Submitted";
			$error = base64_encode($error);
			$pic = "<img src='../../../../images/icons/accept.png' alt='Logo' width='18px' height='18px'>";
			$pic = base64_encode($pic);
			$color = "color:#548235";
			$color = base64_encode($color);
			header("location:".$page.$error."&&pic=".$pic."&&color=".$color);
			
		}
		
		
		
	}


	if(isset($_POST["incidence_form"])){//incidence form 
		
		
		$incidence_name = $_SESSION['incidence_name'] = $obj->test_input($_POST["incidence_name"]);
	
		$des_of_incidence = $_SESSION['des_of_incidence'] = $obj->test_input($_POST["des_of_incidence"]);
	
		$location = $_SESSION['location'] = $obj->test_input($_POST["location"]);
	
		$start_date = $_SESSION['start_date'] = $obj->test_input($_POST["start_date"]);
	
		$end_date = $_SESSION['end_date'] = $obj->test_input($_POST["end_date"]);
	
		$start_time = $_SESSION['start_time'] = $obj->test_input($_POST["start_time"]);
	
		$end_time = $_SESSION['end_time'] = $obj->test_input($_POST["end_time"]);
	
		$involved_parties = $_SESSION['involved_parties'] = $obj->test_input($_POST["involved_parties"]);
		
		$name_off = $_SESSION['name_off'] = $obj->test_input($_POST["name_off"]);
	
		$office_rank = $_SESSION['ranker'] = $obj->test_input($_POST["ranker"]);
		
		
		$field = "Incidence Name"; 
		$page = "Admin/reports/export/zonal/incident?status=";
		
		$obj->checkIfEmpty($incidence_name, $field, $page);
		$field = "Description of Incidence";
		$obj->checkIfEmpty($des_of_incidence, $field, $page);
		$field = "Location";
		$obj->checkIfEmpty($location, $field, $page);
		$field = "Start Date";
		$obj->checkIfEmpty($start_date, $field, $page);
		$field = "End Date";
		$obj->checkIfEmpty($end_date, $field, $page);
		$field = "Start Time";
		$obj->checkIfEmpty($start_time, $field, $page);
		$field = "End Time";
		$obj->checkIfEmpty($end_time, $field, $page);
		$field = "Involved Parties";
		$obj->checkIfEmpty($involved_parties, $field, $page);
		$field = "Name of Officer";
		$obj->checkIfEmpty($name_off, $field, $page);
		$field = "Rank";
		$obj->checkIfEmpty($office_rank, $field, $page);
		
		$field = "Evidence 1";
		$obj->checkIfEmpty($_FILES["evidence_1"]["name"], $field, $page);
		
		$field = "Evidence 2";
		$obj->checkIfEmpty($_FILES["evidence_2"]["name"], $field, $page);
		
		$file = new pic_handler();
		
		$page = "Admin/reports/export/zonal/incident?status=";
		
		$target_dir = array("Admin/reports/export/zonal/incident_documents/", "Admin/reports/export/zonal/incident_documents/"); 
		
		$fileToUpload = array("evidence_1", "evidence_2");
	
		$filename = array("_evidence1", "_evidence2");
	

		for($i = 0; $i < count($fileToUpload); $i++){
				
				$temp = explode(".", $_FILES[$fileToUpload[$i]]["name"]);
			
				$newfilename = round(microtime(true)) .$filename[$i].'.' . end($temp);
			
				
				$fin_name = $target_dir[$i].$newfilename;
			
				$file->startUpload($target_dir[$i], $fileToUpload[$i]);
				$file->imageFileType($file->target_file);
				$file->imageFileTypeTwo($fileToUpload[$i], $file->target_file);
				//$file->fileTypeInfo($file->target_file);
				$file->checkIfake($fileToUpload[$i]);
				$file->checkExistence($file->target_file);
				$file->limitFileSize($fileToUpload[$i]);
				//$file->limitFileType($obj->imageFileType);
				$file->completeUpload($fileToUpload[$i], $fin_name, $page);
		}
		
		if($_COOKIE["zone"] == "South West"){
			$zone = "South West";
		}elseif($_COOKIE["zone"] == "South East"){
			$zone = "South East";
		}elseif($_COOKIE["zone"] == "South South"){
			$zone = "South South";
		}elseif($_COOKIE["zone"] == "North West"){
			$zone = "North West";
		}elseif($_COOKIE["zone"] == "North East"){
			$zone = "North East";
		}
		
		$bill_of_laden = "incident_documents/".round(microtime(true)) .$filename[0].'.' . end($temp);
		
		$export_cert = "incident_documents/".round(microtime(true)) .$filename[1].'.' . end($temp);
		
		
		$dateNow = $obj->getDateNow();
		
		$table = "incident_table"; 
		$fields = array("incidence_name", "description_of_incidence", "location", "start_date", "end_date", "start_time", "end_time", "involved_parties", "name_of_officer", "rank", "bill_of_laden", "export_cert", "date", "zone");
		
		$values = array("$incidence_name", "$des_of_incidence", "$location", "$start_date", "$end_date", "$start_time", "$end_time", "$involved_parties", "$name_off", "$office_rank", "$bill_of_laden", "$export_cert", "$dateNow", "$zone");
		
		$obj->insert($table,$fields,$values);
		if(isset($obj->_sucMsg)){
			
			unset($_SESSION['incidence_name']);
			unset($_SESSION['des_of_incidence']);
			unset($_SESSION['location']);
			unset($_SESSION['start_date']);
			unset($_SESSION['end_date']);
			unset($_SESSION['start_time']);
			unset($_SESSION['end_time']);
			unset($_SESSION['involved_parties']);
			unset($_SESSION['name_off']);
			unset($_SESSION['ranker']);
			
			
			
			$page = "Admin/reports/export/zonal/incident?status=";
			$error = "Incidence report was successfully submitted";
			$error = base64_encode($error);
			$pic = "<img src='../../../../images/icons/accept.png' alt='Logo' width='18px' height='18px'>";
			$pic = base64_encode($pic);
			$color = "color:#548235";
			$color = base64_encode($color);
			header("location:".$page.$error."&&pic=".$pic."&&color=".$color);
		}
		
		
		
	}


	if(isset($_POST["farm_inspection_form"])){//farm inspection form 
		
		
		$nameOfFarm = $_SESSION['nameOfFarm'] = $obj->test_input($_POST["nameOfFarm"]);
	
		$nameOfOwner = $_SESSION['nameOfOwner'] = $obj->test_input($_POST["nameOfOwner"]);
	
		$farm_locatn = $_SESSION['farm_locatn'] = $obj->test_input($_POST["farm_locatn"]);
	
		$insptnReason = $_SESSION['insptnReason'] = $obj->test_input($_POST["insptnReason"]);
	
		$date_of_inspection = $_SESSION['date_of_inspection'] = $obj->test_input($_POST["date_of_inspection"]);
	
		$findings = $_SESSION['findings'] = $obj->test_input($_POST["findings"]);
	
		$actionTaken = $_SESSION['actionTaken'] = $obj->test_input($_POST["actionTaken"]);
	
		$of_name = $_SESSION['of_name'] = $obj->test_input($_POST["of_name"]);
		
		$of_rank = $_SESSION['of_rank'] = $obj->test_input($_POST["of_rank"]);
		
		
		$field = "Name of Farm"; 
		$page = "Admin/reports/export/zonal/farmInspection?status=";
		
		$obj->checkIfEmpty($nameOfFarm, $field, $page);
		$field = "Name of Owner";
		$obj->checkIfEmpty($nameOfOwner, $field, $page);
		$field = "Farm Location";
		$obj->checkIfEmpty($farm_locatn, $field, $page);
		$field = "Reason(s) for Inspection";
		$obj->checkIfEmpty($insptnReason, $field, $page);
		$field = "Date of Inspection";
		$obj->checkIfEmpty($date_of_inspection, $field, $page);
		$field = "Findings";
		$obj->checkIfEmpty($findings, $field, $page);
		$field = "Action Taken";
		$obj->checkIfEmpty($actionTaken, $field, $page);
		$field = "Name of Oficer";
		$obj->checkIfEmpty($of_name, $field, $page);
		$field = "Rank";
		$obj->checkIfEmpty($of_rank, $field, $page);
	
		
		if($_COOKIE["zone"] == "South West"){
			$zone = "South West";
		}elseif($_COOKIE["zone"] == "South East"){
			$zone = "South East";
		}elseif($_COOKIE["zone"] == "South South"){
			$zone = "South South";
		}elseif($_COOKIE["zone"] == "North West"){
			$zone = "North West";
		}elseif($_COOKIE["zone"] == "North East"){
			$zone = "North East";
		}
		
		$zone = "North East";
		$dateNow = $obj->getDateNow();
		
		$table = "farm_inpection_table"; 
		$fields = array("name_of_farm", "name_of_owner", "farm_location", "reason_for_inspection", "date_of_inpection", "findings", "action_taken", "name_of_officer", "rank", "date", "zone");
		

		$values = array("$nameOfFarm", "$nameOfOwner", "$farm_locatn", "$insptnReason", "$date_of_inspection", "$findings", "$actionTaken", "$of_name", "$of_rank", "$dateNow", "$zone");
		
		$obj->insert($table,$fields,$values);
		if(isset($obj->_sucMsg)){
			
			unset($_SESSION['nameOfFarm']);
			unset($_SESSION['nameOfOwner']);
			unset($_SESSION['farm_locatn']);
			unset($_SESSION['insptnReason']);
			unset($_SESSION['date_of_inspection']);
			unset($_SESSION['findings']);
			unset($_SESSION['actionTaken']);
			unset($_SESSION['of_name']);
			unset($_SESSION['of_rank']);
			
			
			
			$page = "Admin/reports/export/zonal/farmInspection?status=";
			$error = "Farm Inspection report was successfully submitted";
			$error = base64_encode($error);
			$pic = "<img src='../../../../images/icons/accept.png' alt='Logo' width='18px' height='18px'>";
			$pic = base64_encode($pic);
			$color = "color:#548235";
			$color = base64_encode($color);
			header("location:".$page.$error."&&pic=".$pic."&&color=".$color);
		}
		
		
		
	}


	if(isset($_POST["re_export_form"])){//farm inspection form 
		
		
		$pdt_name = $_SESSION['pdt_name'] = $obj->test_input($_POST["pdt_name"]);
	
		$pdt_qtty = $_SESSION['pdt_qtty'] = $obj->test_input($_POST["pdt_qtty"]);
	
		$cntner_no = $_SESSION['cntner_no'] = $obj->test_input($_POST["cntner_no"]);
	
		$intended_country = $_SESSION['intended_country'] = $obj->test_input($_POST["intended_country"]);
	
		$re_export_reason = $_SESSION['re_export_reason'] = $obj->test_input($_POST["re_export_reason"]);
	
		$date_of_entry = $_SESSION['date_of_entry'] = $obj->test_input($_POST["date_of_entry"]);
	
		$date_of_exit = $_SESSION['date_of_exit'] = $obj->test_input($_POST["date_of_exit"]);
	
		$officer_nme = $_SESSION['officer_nme'] = $obj->test_input($_POST["officer_nme"]);
		
		$ranking = $_SESSION['ranking'] = $obj->test_input($_POST["ranking"]);
		
		
		$field = "Product Name"; 
		$page = "Admin/reports/export/zonal/re_export?status=";
		
		$obj->checkIfEmpty($pdt_name, $field, $page);
		$field = "Quantity";
		$obj->checkIfEmpty($pdt_qtty, $field, $page);
		$field = "Container Number";
		$obj->checkIfEmpty($cntner_no, $field, $page);
		$field = "Intended Country";
		$obj->checkIfEmpty($intended_country, $field, $page);
		$field = "Re-export Reason";
		$obj->checkIfEmpty($re_export_reason, $field, $page);
		$field = "Date of Entry";
		$obj->checkIfEmpty($date_of_entry, $field, $page);
		$field = "Date of Exit";
		$obj->checkIfEmpty($date_of_exit, $field, $page);
		$field = "Name of Officer";
		$obj->checkIfEmpty($officer_nme, $field, $page);
		$field = "Rank";
		$obj->checkIfEmpty($ranking, $field, $page);
		
		
		$field = "Bill of Laden";
		$obj->checkIfEmpty($_FILES["lad_bill"]["name"], $field, $page);
		
		$file = new pic_handler();
		
		$page = "Admin/reports/export/zonal/re_export?status=";
		
		$target_dir = array("Admin/reports/export/zonal/re_export_documents/"); 
		
		$fileToUpload = array("lad_bill");
	
		$filename = array("_billOfLaden");
	

		for($i = 0; $i < count($fileToUpload); $i++){
				
			$temp = explode(".", $_FILES[$fileToUpload[$i]]["name"]);

			$newfilename = round(microtime(true)) .$filename[$i].'.' . end($temp);


			$fin_name = $target_dir[$i].$newfilename;

			$file->startUpload($target_dir[$i], $fileToUpload[$i]);
			$file->imageFileType($file->target_file);
			$file->imageFileTypeTwo($fileToUpload[$i], $file->target_file);
					//$file->fileTypeInfo($file->target_file);
			$file->checkIfake($fileToUpload[$i]);
			$file->checkExistence($file->target_file);
			$file->limitFileSize($fileToUpload[$i]);
					//$file->limitFileType($obj->imageFileType);
			$file->completeUpload($fileToUpload[$i], $fin_name, $page);
		}
		
		if($_COOKIE["zone"] == "South West"){
			$zone = "South West";
		}elseif($_COOKIE["zone"] == "South East"){
			$zone = "South East";
		}elseif($_COOKIE["zone"] == "South South"){
			$zone = "South South";
		}elseif($_COOKIE["zone"] == "North West"){
			$zone = "North West";
		}elseif($_COOKIE["zone"] == "North East"){
			$zone = "North East";
		}
		
		$bill_of_laden = "re_export_documents/".$newfilename;
		
		$zone = "North East";
		$dateNow = $obj->getDateNow();
		
		$table = "re_export_table"; 
		$fields = array("product_name", "quantity", "container_number", "intended_country", "reason_for_re_export", "date_of_entry", "date_of_exit", "name_of_officer", "rank", "bill_of_laden", "date", "zone");

		$values = array("$pdt_name", "$pdt_qtty", "$cntner_no", "$intended_country", "$re_export_reason", "$date_of_entry", "$date_of_exit", "$officer_nme", "$ranking", "$bill_of_laden", "$dateNow", "$zone");
		
		$obj->insert($table,$fields,$values);
		if(isset($obj->_sucMsg)){
			
			unset($_SESSION['pdt_name']);
			unset($_SESSION['pdt_qtty']);
			unset($_SESSION['cntner_no']);
			unset($_SESSION['intended_country']);
			unset($_SESSION['re_export_reason']);
			unset($_SESSION['date_of_entry']);
			unset($_SESSION['date_of_exit']);
			unset($_SESSION['officer_nme']);
			unset($_SESSION['ranking']);
			
			
			
			$page = "Admin/reports/export/zonal/re_export?status=";
			$error = "Farm Inspection report was successfully submitted";
			$error = base64_encode($error);
			$pic = "<img src='../../../../images/icons/accept.png' alt='Logo' width='18px' height='18px'>";
			$pic = base64_encode($pic);
			$color = "color:#548235";
			$color = base64_encode($color);
			header("location:".$page.$error."&&pic=".$pic."&&color=".$color);
		}
		
		
		
	}

?>