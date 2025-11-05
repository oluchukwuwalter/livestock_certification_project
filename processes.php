<?php
	
	class processes 
	{
		private static $_instance = null;
		private $connect;
		
		function __construct(){//construct method
			try{
			//$this->connect = new PDO('mysql:host=localhost;dbname=cashlinkDB','cashlink_AdminDB','Cashroll@2017');
			$this->connect = new PDO('mysql:host=localhost;dbname=naqs','root','');
			$this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch( PDOException $e ){
			die($e->getMessage());
			}
			
		
		}
		
		public static function getInstance(){//class instance
			if(isset(self::$_instance)){
			return self::$_instance;
			}
			self::$_instance = new processes();
			return self::$_instance;
		}
		
		
		
		
		function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
		}
		
			
		
		function checkPassword($password){//checking of passwords and username
				if((passwordHash($password) == passwordHash($this->user_password)) && ($user ==$this->user) ){
						echo "Password Match";
				}else{
						echo "Password do not match";
				}
		 }
		
		function checkIfEmpty($post, $field, $page){
			
			if($post == ""){
				
				$error = "Field for $field cannot be empty, please supply value";
				$error = base64_encode($error);
				$pic = "<img src='../../../../images/icons/warning.png' alt='Logo' width='18px' height='18px'>";
				$color = "color:red";
				$color = base64_encode($color);
				$pic = base64_encode($pic);
				header("location:".$page.$error."&&pic=".$pic."&&color=".$color);
				die();
			}
			
		}
		
		
		function checkIfSessionIsSet($page, $main_session, $expire){
			
			
			if(isset($main_session)){// for session time
	
				$now = time(); // Checking the time now when home page starts.

				if ($now > $expire) {
					session_destroy();
					$error = "Your session has expired, please login again";
					$error = base64_encode($error);
					$pic = "<img src='../../../../images/icons/warning.png' alt='Logo' width='18px' height='18px'>";
					$color = "color:red";
					$color = base64_encode($color);
					$pic = base64_encode($pic);
					header("location:".$page.$error."&&pic=".$pic."&&color=".$color);
				}

			}else{
				$error = "please login first";
				$error = base64_encode($error);
				$pic = "<img src='../../../../images/icons/warning.png' alt='Logo' width='18px' height='18px'>";
				$color = "color:red";
				$color = base64_encode($color);
				$pic = base64_encode($pic);
				header("location:".$page.$error."&&pic=".$pic."&&color=".$color);
			}
			
		}
 


		function passwordHash($password){//for hashing of passwords
			return hash('sha256', md5($password));
		}
		
		
		
		
		function selectFromAnyTableWith3Con($table, $second_con_ans, $first_con, $first_con_ans, $second_con, $andOr, $andOr2, $third_con, $third_con_ans){
					$call = processes::getInstance();
					//$this->_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
					if($statement =$call->connect->prepare("SELECT * from ".$table." where ".$first_con." = '$first_con_ans'".$andOr." ".$second_con." = '$second_con_ans'".$andOr2." ".$third_con." = '$third_con_ans'")){

							if($statement->execute()){
								$this->_results = $statement->fetchAll(PDO::FETCH_OBJ);
								$this->_count = $statement->rowCount();
								if($this->_count == 0){
									$this->_error = true;
								$this->_errMsg = "No results";	
								}
							}else{
								$this->_error = true;
								$this->_errMsg = "An error occured";	
							}
					}else{
						$this->_error = true;
						$errInfo = $call->connect->errorInfo();
						$this->_errMsg = $errInfo[2];	
					}
				return $this->_results;
				//echo json_encode($this->_results);
				//echo "myFunc(".json_encode($this->order_results).")";
		}
		
			
		function selectFromAnyTableWith3ConAndOrder($table, $first_con, $first_con_ans, $second_con, $sec_con_ans, $order_col, $order, $andOr, $andOr2, $third_con, $third_con_ans){
					$call = processes::getInstance();
					//$this->_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
					if($statement =$call->connect->prepare("SELECT * from ".$table." where ".$first_con." = '$first_con_ans'".$andOr." ".$second_con." = '$sec_con_ans'" .$andOr2." ".$third_con." = '$third_con_ans' ORDER BY ".$order_col." ".$order)){
							if($statement->execute()){
								$this->_results = $statement->fetchAll(PDO::FETCH_OBJ);
								$this->order_count_row = $statement->rowCount();
								if($this->order_count_row == 0){
									$this->_error = true;
								$this->_errMsg = "No results";	
								}
							}else{
								$this->_error = true;
								$this->_errMsg = "An error occured";	
							}
					}else{
						$this->_error = true;
						$errInfo = $call->connect->errorInfo();
						$this->_errMsg = $errInfo[2];	
					}
				return $this;
				//echo "{ 'records' : ".json_encode($this->_results)." }";
				//echo "myFunc(".json_encode($this->order_results).")";
		}
		
		
		
		function selectFromAnyTableWith3ConAndOrderWithLimit($table, $first_con, $first_con_ans, $second_con, $sec_con_ans, $order_col, $order, $andOr, $limit, $andOr2, $third_con, $third_con_ans){
					$call = processes::getInstance();
					//$this->_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
					if($statement =$call->connect->prepare("SELECT * from ".$table." where ".$first_con." = '$first_con_ans'".$andOr." ".$second_con." = '$sec_con_ans'".$andOr2." ".$third_con." = '$third_con_ans' ORDER BY ".$order_col." ".$order." LIMIT ".$limit)){
							if($statement->execute()){
								$this->_results = $statement->fetchAll(PDO::FETCH_OBJ);
								$this->order_count_row = $statement->rowCount();
								if($this->order_count_row == 0){
										$this->_error = true;
										$this->_threemain_result = "No results";	
								}else{
										$this->_threemain_result = $this->_results;
								}
							}else{
								$this->_error = true;
								$this->_errMsg = "An error occured";	
							}
					}else{
						$this->_error = true;
						$errInfo = $call->connect->errorInfo();
						$this->_errMsg = $errInfo[2];	
					}
				return $this;
				//echo "{ 'records' : ".json_encode($this->_results)." }";
				//echo "myFunc(".json_encode($this->order_results).")";
		}
		
		
		
		function selectFromAnyTableWith2Con($table, $second_con_ans, $first_con, $first_con_ans, $second_con, $andOr){
					$call = processes::getInstance();
					//$this->_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
					if($statement =$call->connect->prepare("SELECT * from ".$table." where ".$first_con." = '$first_con_ans'".$andOr." ".$second_con." = '$second_con_ans'")){

							if($statement->execute()){
								$this->_results = $statement->fetchAll(PDO::FETCH_OBJ);
								$this->_count = $statement->rowCount();
								if($this->_count == 0){
									$this->_error = true;
									$this->_errMsg = "No results";	
								}else{
									$this->twoOrderResult = $this->_results;
								}
							}else{
								$this->_error = true;
								$this->_errMsg = "An error occured";	
							}
					}else{
						$this->_error = true;
						$errInfo = $call->connect->errorInfo();
						$this->_errMsg = $errInfo[2];	
					}
				return $this->_results;
				//echo json_encode($this->_results);
				//echo "myFunc(".json_encode($this->order_results).")";
		}
		
		
		
		function selectFromAnyTableWith2ConAndOrder($table, $first_con, $first_con_ans, $second_con, $sec_con_ans, $order_col, $order, $andOr){
					$call = processes::getInstance();
					//$this->_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
					if($statement =$call->connect->prepare("SELECT * from ".$table." where ".$first_con." = '$first_con_ans'".$andOr." ".$second_con." = '$sec_con_ans' ORDER BY ".$order_col." ".$order)){
							if($statement->execute()){
								$this->_results = $statement->fetchAll(PDO::FETCH_OBJ);
								$this->order_count_row = $statement->rowCount();
								if($this->order_count_row == 0){
									$this->_error = true;
									$this->_errMsg = "No results";	
								}else{
									$this->twoOrder_results = $this->_results;
								}
							}else{
								$this->_error = true;
								$this->_errMsg = "An error occured";	
							}
					}else{
						$this->_error = true;
						$errInfo = $call->connect->errorInfo();
						$this->_errMsg = $errInfo[2];	
					}
				return $this;
				//echo "{ 'records' : ".json_encode($this->_results)." }";
				//echo "myFunc(".json_encode($this->order_results).")";
		}
		
		
		
		function selectFromAnyTableWith2ConAndOrderWithLimit($table, $first_con, $first_con_ans, $second_con, $sec_con_ans, $order_col, $order, $andOr, $limit){
					$call = processes::getInstance();
					//$this->_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
					if($statement =$call->connect->prepare("SELECT * from ".$table." where ".$first_con." = '$first_con_ans'".$andOr." ".$second_con." = '$sec_con_ans' ORDER BY ".$order_col." ".$order." LIMIT ".$limit)){
							if($statement->execute()){
								$this->_results = $statement->fetchAll(PDO::FETCH_OBJ);
								$this->order_count_row = $statement->rowCount();
								if($this->order_count_row == 0){
										$this->_error = true;
										$this->_main_result = "No results";	
								}else{
										$this->_main_result = $this->_results;
								}
							}else{
								$this->_error = true;
								$this->_errMsg = "An error occured";	
							}
					}else{
						$this->_error = true;
						$errInfo = $call->connect->errorInfo();
						$this->_errMsg = $errInfo[2];	
					}
				return $this;
				//echo "{ 'records' : ".json_encode($this->_results)." }";
				//echo "myFunc(".json_encode($this->order_results).")";
		}
		
		
		function selectFromAnyTableWithOneCon($table, $cond, $clause){
					$call = processes::getInstance();
					//$this->_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
					if($statement =$call->connect->prepare("SELECT * from ".$table." where ".$cond." = '$clause'")){
							if($statement->execute()){
								$this->order_results = $statement->fetchAll(PDO::FETCH_OBJ);
								$this->order_count_row = $statement->rowCount();
								if($this->order_count_row == 0){
									$this->_error = true;
								$this->_errMsg = "No results";	
								}else{
									$this->order_results = $this->order_results;
								}
							}else{
								$this->_error = true;
								$this->_errMsg = "An error occured";	
							}
					}else{
						$this->_error = true;
						$errInfo = $call->connect->errorInfo();
						$this->_errMsg = $errInfo[2];	
					}
				return $this;
				//echo json_encode($this->order_results);
				//echo "myFunc(".json_encode($this->order_results).")";
			
		}
		
		function selectFromAnyTableWithOneConOrder($table, $cond, $cond_ans, $orderCol, $order){//selects from any table with one condition adnd order
					$call = processes::getInstance();
					//$this->_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
					if($statement =$call->connect->prepare("SELECT * from ".$table." where ".$cond." = '$cond_ans' ORDER BY ".$orderCol." ".$order)){
							if($statement->execute()){
								$this->order_results = $statement->fetchAll(PDO::FETCH_OBJ);
								$this->order_count_row = $statement->rowCount();
								if($this->order_count_row == 0){
									$this->_error = true;
									$this->_errMsg = "No results";	
								}else{
									$this->order_results = $this->order_results;
								}
							}else{
								$this->_error = true;
								$this->_errMsg = "An error occured";	
							}
					}else{
						$this->_error = true;
						$errInfo = $call->connect->errorInfo();
						$this->_errMsg = $errInfo[2];	
					}
				return $this;
				//echo json_encode($this->order_results);
				//echo "myFunc(".json_encode($this->order_results).")";
			
		}
		
		function selectFromAnyTableWithOneConOrderWithLimit($table, $cond, $cond_ans, $orderCol, $order, $limit){//selects from any table with one condition adnd order
					$call = processes::getInstance();
					$this->connect->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
					if($statement =$call->connect->prepare("SELECT * from ".$table." where ".$cond." = '$cond_ans' ORDER BY ".$orderCol." ".$order." LIMIT ".$limit)){
							if($statement->execute()){
								$this->order_results = $statement->fetchAll(PDO::FETCH_OBJ);
								$this->order_count_row = $statement->rowCount();
								if($this->_count == 0){
									$this->_error = true;
								$this->_errMsg = "No results";	
								}
							}else{
								$this->_error = true;
								$this->_errMsg = "An error occured";	
							}
					}else{
						$this->_error = true;
						$errInfo = $call->connect->errorInfo();
						$this->_errMsg = $errInfo[2];	
					}
				return $this;
				//echo json_encode($this->order_results);
				//echo "myFunc(".json_encode($this->order_results).")";
			
		}
		/*SELECT *  FROM ".." WHERE".$first_con." >= '$first_con_ans'".$andOr." ".$second_con." < '$second_con_ans'*/
			
		
		function selectFromAnyTableWithDateInterval($table, $first_con, $first_con_ans, $second_con_ans, $andOr){
					$call = processes::getInstance();
					$this->connect->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
					if($statement =$call->connect->prepare("SELECT * FROM ".$table." WHERE"." ( ".date($first_con)." BETWEEN "."'date($first_con_ans)' "."AND"." 'date($second_con_ans)')")){

							if($statement->execute()){
								$this->_date_results = $statement->fetchAll(PDO::FETCH_OBJ);
								$this->_date_count = $statement->rowCount();
								if($this->_date_count == 0){
									$this->_error = true;
									$this->_errMsg = "No results";	
								}else{
									$this->_date_results = $this->_date_results;
								}
							}else{
								$this->_error = true;
								$this->_errMsg = "An error occured";	
							}
					}else{
						$this->_error = true;
						$errInfo = $call->connect->errorInfo();
						$this->_errMsg = $errInfo[2];	
					}
				return $this;
				//echo json_encode($this->_results);
				//echo "myFunc(".json_encode($this->order_results).")";
		}
		
		
		function selectFromAnyTableWithDateIntervalAndAnotherCon($table, $first_con, $first_con_ans, $second_con_ans, $andOr, $secCol, $secCol_ans){
					$call = processes::getInstance();
					$this->connect->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
					if($statement =$call->connect->prepare("SELECT * FROM ".$table." WHERE"." ( ".date($first_con)." BETWEEN "."'date($first_con_ans)' "."AND"." 'date($second_con_ans)' ".") ".$andOr." ".$secCol." = '$secCol_ans'")){

							if($statement->execute()){
								$this->_date_results = $statement->fetchAll(PDO::FETCH_OBJ);
								$this->_date_count = $statement->rowCount();
								if($this->_date_count == 0){
									$this->_error = true;
									$this->_errMsg = "No results";	
								}else{
									$this->_date_results = $this->_date_results;
								}
							}else{
								$this->_error = true;
								$this->_errMsg = "An error occured";	
							}
					}else{
						$this->_error = true;
						$errInfo = $call->connect->errorInfo();
						$this->_errMsg = $errInfo[2];	
					}
				return $this;
				//echo json_encode($this->_results);
				//echo "myFunc(".json_encode($this->order_results).")";
		}
		
		
		function selectFromAnyTableWithDateIntervalAnd2Con($table, $first_con, $first_con_ans, $second_con_ans, $andOr, $secCol, $secCol_ans, $andOr2, $thirdCol, $thirdCol_ans){
					$call = processes::getInstance();
					$this->connect->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
					if($statement =$call->connect->prepare("SELECT * FROM ".$table." WHERE"." ( ".$first_con." BETWEEN "."'date($first_con_ans)' "."AND"." 'date($second_con_ans)' ".") ".$andOr." ".$secCol." = '$secCol_ans'".$andOr2." ".$thirdCol." = '$thirdCol_ans'")){

							if($statement->execute()){
								$this->_3date_results = $statement->fetchAll(PDO::FETCH_OBJ);
								$this->_3date_count = $statement->rowCount();
								if($this->_3date_count == 0){
									$this->_error = true;
									$this->_errMsg = "No results";	
								}else{
									$this->_3date_results = $this->_3date_results;
								}
							}else{
								$this->_error = true;
								$this->_errMsg = "An error occured";	
							}
					}else{
						$this->_error = true;
						$errInfo = $call->connect->errorInfo();
						$this->_errMsg = $errInfo[2];	
					}
				return $this;
				//echo json_encode($this->_results);
				//echo "myFunc(".json_encode($this->order_results).")";
		}
		
		function generalSelectStatement($query){
					$call = processes::getInstance();
					$this->connect->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
					if($statement =$call->connect->prepare($query)){

							if($statement->execute()){
								$this->_general_result = $statement->fetchAll(PDO::FETCH_OBJ);
								$this->_general_count = $statement->rowCount();
								if($this->_general_count == 0){
									$this->_error = true;
									$this->_errMsg = "No results";	
								}else{
									$this->_general_result = $this->_general_result;
								}
							}else{
								$this->_error = true;
								$this->_errMsg = "An error occured";	
							}
					}else{
						$this->_error = true;
						$errInfo = $call->connect->errorInfo();
						$this->_errMsg = $errInfo[2];	
					}
				return $this;
				//echo json_encode($this->_results);
				//echo "myFunc(".json_encode($this->order_results).")";
		}
		
		function sumArraysByKeys($main_counter){
			
			$this->sumArray = array();

			foreach ($main_counter as $k => $subArray) {
			  foreach ($subArray as $id => $value) {
				@$this->sumArray[$id]+=$value;
			  }
			}
			
			return $this->sumArray;
		}
		
		
		public function insert($table,$fields = array(),$values = array()){
			if(is_array($fields) && is_array($values)){
					if(count($fields)&& count($values)){
					$this->_error = false;
					$db = processes::getInstance();
					
					$queryFields =  implode(",",$fields);
					$s = self::generateQuestionMark($fields);
					$this->connect->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
					$query = "INSERT INTO ".$table." (".$queryFields.") VALUES (".$s.");";
					if($statement = $this->connect->prepare($query)){
						$x= 1;
						foreach($values as $val){
							$statement->bindValue($x,$val);
							$x++;
						}
						if($statement->execute()){
							$this->_sucMsg = "Insertion was successful";
						}else{
						$this->_error = true;
						$this->_errMsg = "An error occured,please try again";
					}
					}else{
						$this->_error = true;
						$errInfo = $this->connect->errorInfo();
						$this->_errMsg = $errInfo[2];
					}
				}else{
					die("invalid parameters.Empty arrays");	
				}
			
			}else{
				die("invalid parameters.Parameters must be arrays");	
			}
			return $this;
	}
	
	function selectUser($user, $pass){// selects company email from company_info table for email validation
			
						$call = processes::getInstance();		
						$state = "select * from cashlink_member where Username = '$user'and Password = '$pass'";
						if($statement = $call->connect->query($state)){
							
							while($fetch = $statement->fetch()){
																
								$this->user =  $fetch["Username"];
								$this->user_id =  $fetch["ID"];
								$this->admin_count = $statement->rowCount();
								
							}
							
						}else{
							$failure = $statement->errorInfo();
							print_r($failure);
						}
						return $this;
					
	}
	
	function selectReciever($level, $level_access, $level_ans, $amount, $id){// selects company email from company_info table for email validation
			
						$call = processes::getInstance();		
						$state = "select * from cashlink_member where Level = '$level'and Level_access = '$level_access'";
						if($statement = $call->connect->query($state)){
							$this->admin_count = $statement->rowCount();
							$this->count = 0;
							while($fetch = $statement->fetch()){
																
								$this->user[] =  $fetch[$level_ans];
								$this->amount[] =  $fetch[$amount];
								$this->user_id[] =  $fetch[$id];
								$this->count++;
								
							}
							
						}else{
							$failure = $statement->errorInfo();
							print_r($failure);
						}
						return $this;
					
	}
	
	function selectDonor($amount){// selects company email from company_info table for email validation
			
						$call = processes::getInstance();		
						$state = "select * from donation where merged_to = '0'and amount = '$amount'";
						if($statement = $call->connect->query($state)){
							$this->donor_count = $statement->rowCount();
							$this->count = 0;
							while($fetch = $statement->fetch()){
																
								$this->user_match_id[] =  $fetch["user_id"];
								$this->count++;
								
							}
							
						}else{
							$failure = $statement->errorInfo();
							print_r($failure);
						}
						return $this;
					
	}
	
	function selectMainDonor($id){// selects company email from company_info table for email validation
			
						$call = processes::getInstance();		
						$state = "select * from cashlink_member where ID = '$id'";
						if($statement = $call->connect->query($state)){
							$this->mainDonor_count = $statement->rowCount();
							$this->count = 0;
							while($fetch = $statement->fetch()){
																
								$this->user[] =  $fetch["Full_Name"];
								$this->amount[] =  $fetch["Level"];
								$this->user_id[] =  $fetch["ID"];
								$this->count++;
								
							}
							
						}else{
							$failure = $statement->errorInfo();
							print_r($failure);
						}
						return $this;
					
	}
	
	
	
	public function update($table,$fields = array(),$values = array(),$condition,$clause){
		if(is_array($fields) && is_array($values)){
			if(count($fields)&& count($values)){
			$this->_error = false;
			$db = processes::getInstance();
			
			$queryFields =  implode(",",$fields);
			$query = self::generateUpdateQuery($table,$fields,$condition,$clause);
			$this->connect->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
			if($statement  = $this->connect->prepare($query)){
				$x= 1;
				foreach($values as $val){
					$statement->bindValue($x,$val);
					$x++;
				}
					if($statement->execute()){
						$this->sucMsg = "Update was successful";
					}else{
						$this->_error = true;
						$this->_error = "An error occured,please try again";
					}
			}else{
				$this->_error = true;
				echo $this->connect->errorInfo();
				//$this->_errMsg = $errInfo[2];
			}
		}else{
			die("invalid parameters.Empty arrays");	
		}
		
		}else{
			die("invalid parameters.Parameters must be arrays");	
		}
		return $this;
	}
	
	
	private static function generateQuestionMark($arr){//generates question mark for insert
			$count = count($arr);
			$x = 0;
			$s = "";
			foreach($arr as $value){
					if($x === ($count - 1)){
						$s = $s."?";
					}else{
							$s = $s."?,";
					}
					$x++;
			}	
			return $s;
	}
	
	
	private static function generateUpdateQuery($table,$arr,$condition,$clause){//generate update query
			$count = count($arr);
			$x = 0;
			$s = "UPDATE {$table} SET ";
			foreach($arr as $value){
					if($x === ($count - 1)){
						$s = $s."{$value} = ?";
					}else{
							$s = $s."{$value} = ?,";
					}
					$x++;
			}	
			return $s." WHERE {$condition} = '$clause'";
	}
	
	function delete($table, $cond, $cond_ans){//deletes row from any table
			$call = processes::getInstance();
			
			try{
				$delete = "DELETE FROM ".$table." WHERE ".$cond." = '$cond_ans'";
				$statement = $call->connect->prepare($delete);
				if($statement->execute() ){
					$this->sucMsg = "Row Succesfully Deleted";
				}else{
					$failure = $statement->errorInfo();
					print_r($failure);
				}
			}catch(PDOException $e){
    			echo $delete . "<br>" . $e->getMessage();
    		}
		}
		
		
		
		function selectFromAnyTableWithOneConOrder2ndtype($table, $cond, $cond_ans, $orderCol, $order){//selects last invoice id from the invoice table and adds 1
			$call = processes::getInstance();
			
			$state = "SELECT * from ".$table." where ".$cond." = '$cond_ans' ORDER BY ".$orderCol." ".$order;
			if($statement = $call->connect->query($state)){
							
				while($fetch = $statement->fetch()){							
					$this->invoice_id = $fetch["invoice_id"];
					$this->_count = $statement->rowCount();
					//$this->_s = $fetch["customers_email"].'<br>';
								
				}
							
			}
			return $this;
		}
		
		function valid_email ( $str ){
			return ( ! preg_match ( "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str ) ) ? FALSE : TRUE;
		}

		function alpha_numeric ( $str ){
			return ( ! preg_match ( "/^([-a-z0-9])+$/i", $str ) ) ? FALSE : TRUE;
		}


		//lets generate alphanumeric key, we will use in session validation
		function random_string($length) {
			$this->key = '';
			$this->keys = array_merge(range(0, 3));

			for ($i = 0; $i < $length; $i++) {
				$this->key .= $this->keys[array_rand($this->keys)];
			}

			return $this->key;
		}
		
		function validator($table,$cond,$clause){
			 
			processes::selectFromAnyTableWithOneCon($table, $cond, $clause);

			if($this->order_count_row == 0){
				echo 0;
			}

			if($this->order_count_row > 0){
				echo 1;
			}
		}
		
		
		public function p_amtCheck(){
			if ($this->_count == 0){
				$this->p_id_s = 0;
			}else{
				$this->p_id_s = $this->p_id;
			}		
		}

		
		function InvoiceIdCheck(){//checks row count and assigns the proper variable
			if($this->_count == 0){
				$this->invoice_id_s = 0;
			}else{
				$this->invoice_id_s = $this->invoice_id;
			}
		}
		
		
		function generatePamt(){//generates the p_amt no
		
				$selectP_amt = array("AV","CD","MV","PH","GH","HW","RV", "SV", "FT", "PT", "DS", "FG", "HU", "PO", "MT", "SP", "HG", "JU", "NO", "LM");
				
				$this->p_id_s++;
				
				$Amt_Pre = "P_";
				$randAmt = rand(0, 19);
				$pickAmt = $selectP_amt[$randAmt];
				
				$paddAmt = sprintf("%02d", $this->p_id_s);
				
				$this->P_amt = $Amt_Pre.$paddAmt.$pickAmt;		
		}
		
		function getP_amt(){
			echo $this->P_amt;
		}
		
		function generateRandomNo($prefix ){
					$surfix = array("AVS","CDD","GMV","PUH","GHY","HUW","REV", "SDV", "WFT", "PUT", "DIS", "FGO", "HUP", "POU", "MXT", "BSP", "HJG", "JUC", "NVO", "LLM");
					$random =rand(0, 19);
					$surfix = $surfix[$random];
					$surfix = str_shuffle($surfix);
					
					$No = rand(10, 99);
					$mid_No = sprintf("%04d", $No);
					
					
					$random_no = $prefix.$mid_No.$surfix;
					
					return $random_no;
		}
		
		
		function getDatetimeNow() {
			$tz_object = new DateTimeZone('Africa/Lagos');
			//date_default_timezone_set('Brazil/East');

			$this->datetime = new DateTime();
			$this->datetime->setTimezone($tz_object);
			//return $datetime->format('Y\-m\-d\ G:i:s');
			return $this->datetime->format('G:i:s');
		}
		
		function getDateNow() {
			$tz_object = new DateTimeZone('Africa/Lagos');
			//date_default_timezone_set('Brazil/East');

			$this->datetime = new DateTime();
			$this->datetime->setTimezone($tz_object);
			return $this->datetime->format('Y-m-d');
			//return $this->datetime->format('G:i:s');
		}
		
		function dateAdder(){
			date_default_timezone_set('Africa/Lagos');

			$dated=date('Y-m-d H:i');
			$dates=date('Y\-m\-d\ G:i:s', strtotime($dated . " +24 hours"));
			//$dates=date('Y-m-d H:i', strtotime($dated . " +2 minutes"));

			return $dates;
		}
		
		function generateInvoiceNumber(){//generates the invoice no
				$inv = "INV_";
				$select = array("AV","CD","MV","PH","GH","HW","RV", "SV", "FT", "PT", "DS", "FG", "HU", "PO", "MT", "SP", "HG", "JU", "NO", "LM");
				$rand = rand(0, 19);
				$pick = $select[$rand];
				
				$this->invoice_id_s++;
	 
				
				
				$a_paded = sprintf("%04d", $this->invoice_id_s);
				
				$this->main_inv = $inv.$a_paded.$pick;
				
				
				
				$selectOrder = array("AV","CD","MV","PH","GH","HW","RV", "SV", "FT", "PT", "DS", "FG", "HU", "PO", "MT", "SP", "HG", "JU", "NO", "LM");
				
				$orderPre = "ORD";
				$randOrder = rand(0, 19);
				$pickOrder = $selectOrder[$randOrder];
				
				$paddOrder = sprintf("%03d", $this->invoice_id_s);
				
				$this->OrderNo = $orderPre.$paddOrder.$pickOrder;
						
				
		}
		
		function sendMail($to, $subject, $txt, $headers){
				
				
				ini_set("SMTP", "aspmx.l.google.com");
    			ini_set("sendmail_from", "assammico66@gmail.com");
				
				mail($to,$subject,$txt,$headers);
				
				echo "Check your email now....<BR/>";
				/*$to = "somebody@example.com";  $subject = "My subject";  $txt = "Hello world!";  $headers = "From: webmaster@example.com" . "\r\n" ."CC: somebodyelse@example.com"; */
		}
		
		function getJson(){
				if($this->_main_result == "No results"){
						echo $this->_main_result;
				}else{
						echo "{ 'records' : ".json_encode($this->_main_result)." }";
				}
		}
		
		function getDonationC100Details(){
			if($this->order_count_row > 0){
				$this->donationDetails = $this->twoOrder_results;
				$this->count_Details = $this->order_count_row;
			}
		}
		
		function getReciever(){
			$this->count_reciever = $this->order_count_row;
			$this->_reciever = $this->twoOrder_results;
		}
		
		//select distinct country,year from table1 where year=(select year from table  
//where country='turkey') and country !=turkey;


	}//class ends
?>