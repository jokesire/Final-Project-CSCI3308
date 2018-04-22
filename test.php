<?php    
    session_start();
	$value1 =  $_REQUEST['nickname'];
	$value2 =  $_REQUEST['major'];
	$value3 =  $_REQUEST['locationone'];
	$value4 =  $_REQUEST['locationtwo'];
	$value5 =  $_REQUEST['locationthree'];
	$value6 =  $_REQUEST['date'];
	$value7 =  $_REQUEST['phone'];
	
	$tvalue0 =  "";
	$tvalue1 =  "";
	$tvalue2 =  "";
	$tvalue3 =  "";
	$tvalue4 =  "";
	$tvalue5 =  "";
	$tvalue6 =  "";
	$tvalue7 =  "";
	$tvalue0 =  $_REQUEST['tname'];
	$tvalue1 =  $_REQUEST['tnickname'];
	$tvalue2 =  $_REQUEST['tmajor'];
	$tvalue3 =  $_REQUEST['tlocationone'];
	$tvalue4 =  $_REQUEST['tlocationtwo'];
	$tvalue5 =  $_REQUEST['tlocationthree'];
	$tvalue6 =  $_REQUEST['tdate'];
	$tvalue7 =  $_REQUEST['tphone'];
	$index = 0;
	$score = 0;
	 $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
//Connecting to sql db.
$mysqli = mysqli_connect('localhost','root','','test');
//Sending form data to sql db.
echo "CONNECT";
if(!$mysqli){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$id = $mysqli->query("SELECT id FROM SearchingFor ORDER BY id DESC LIMIT 1");


while($row = $id->fetch_assoc() ){
      $index = $row['id'] + 1 ;
}

 


$result = $mysqli->query("SELECT * FROM SelfInformation WHERE name='$tvalue0'");


if ( $result->num_rows > 0 ){
	echo "LENGTH";
	echo $result->num_rows;
	while($row = $result->fetch_assoc() ){
		$score = 1;
	
		if($tvalue1 == $row['nickname']){
			$score = $score + 2;
		}
		if($tvalue2 == $row['major']){
			$score = $score + 1;        
		}
		if($tvalue3 == $row['locationtype']){
			$score = $score + 1;
		}
		if($tvalue4 == $row['locationdetail1']){
			$score = $score + 1;
		}
		if($tvalue4 == $row['locationdetail2']){
			$score = $score + 1;
		}
		if($tvalue6 == $row['daymet']){
			$score = $score + 1;
		}
		if($tvalue7 == $row['phonenumber']){
			$score = $score + 5;
		}
		echo $score;
		if($score > 2){
			$score = 0;
		
			$index = $row['id'] + 1 ;
		  
		  # if($index > 4){
			  $res = $mysqli->query("SELECT * FROM SearchingFor");
			  echo "LENGTH";
			
			
			if ( $res->num_rows > 0 ){
				
				while($trow = $res->fetch_assoc() ){
								$score = 1;
								  echo $trow['id'];
								  echo "CCCCC";
					if($value1 == $trow['nickname']){
						$score = $score + 2;
					}
					if($value2 == $trow['major']){
						$score = $score + 1;        
					}
					if($value3 == $trow['locationtype']){
						$score = $score + 1;
					}
					if($value4 == $trow['LocationDetail1']){
						$score = $score + 1;
					}
					if($value4 == $trow['LocationDetail2']){
						$score = $score + 1;
					}
					#if($value6 == $trow['date']){
					#	$score = $score + 1;
					# }
					# if($value7 == $trow['phonenumber']){
					#	$score = $score + 5;
					# }
					if($score > 2){
						echo "A";
						echo $trow['id'];
						echo "B";
						echo $row['id'];
						
						if($trow['id'] == $row['id']){
							$email1 = $row['email'];
							$tname = $row['name'];
							$sql = "INSERT INTO FoundMatches (email0 , email1 , name0 , name1 ) VALUES ( '$email', '$email1' , '$tvalue0' , '$tname'  )";
							$sql1 = "INSERT INTO FoundMatches (email0 , email1 , name0 , name1 ) VALUES ( '$email1', '$email0' , '$tname' , '$tvalue0'  )";
							if(mysqli_query($mysqli, $sql)) and mysqli_query($mysqli, $sql1)) {
								header("location: profile.php");
								exit();
							} else{
								echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
							}
						}
					}
				}
			# }
		  }
		  }
	}
		
	}
	
















	

$sql = "INSERT INTO SelfInformation (email , name , nickname , major , locationtype , locationdetail1 , locationdetail2  , daymet , phonenumber , id) VALUES ('$email' , '$first_name','$value1', '$value2', '$value3','$value4', '$value5', '$value6' , '$value7' , $index)";
if(mysqli_query($mysqli, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}

$sql = "INSERT INTO SearchingFor ( name , nickname , major , locationtype , locationdetail1 , locationdetail2  , daymet , phonenumber , id ) VALUES (  '$tvalue0','$tvalue1', '$tvalue2', '$tvalue3','$tvalue4', '$tvalue5', '$tvalue6' , '$tvalue7' , $index)";
if(mysqli_query($mysqli, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}

$result = $mysqli->query("SELECT * FROM SelfInformation WHERE major='$tvalue2'");


if ( $result->num_rows > 0 ){
	
	print("HELLO");
	
}
print("NO");


mysqli_close($mysqli);
?>
