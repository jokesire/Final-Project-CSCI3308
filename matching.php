<?php

 
	# $nickname =  $_POST['nickname'];
	
 	$eventname = $_POST['eventid'];
	print $eventname;
	
 	$email = $_SESSION['email'];
 	 $id = $mysqli->query("SELECT * FROM myevents WHERE eventname = '$eventname' and email = '$email';");
 	while($row = $id->fetch_assoc() ){

 		$myfirstname = $row['first_name'];
		$myeventname = $row['eventname'];
 		// $mylastname = $row['lastname'];
 		$mydate = $row['date'];
 		$myeventtype = $row['eventtype'];
 		$mylocationdescription = $row['locationdescription'];
 		$myadditionalinfo = $row['additionalinfo'];
 		$myhat = $row['hat'];
 		$myglasses = $row['glasses'];
 		$myhair = $row['hair'];
 		$myhaircolor = $row['haircolor'];
 		$myshirt = $row['shirt'];
 		$myshirtcolor = $row['shirtcolor'];
		

 		



 	}

 	$value1 =  $_POST['firstname'];
	//$value3 =  $_POST['event'];
	$value2 =  $_POST['eventname'];
	//$value3 =  $_POST['event'];
	$value4 =  $_POST['date'];
	$value5 =  $_POST['eventtype'];
	$value6 =  $_POST['locationdescription'];
	$value7 =  $_POST['additionalinfo'];
	$value8 =  $_POST['hat'];
	$value9 =  $_POST['glasses'];
	$value10 =  $_POST['hair'];
	$tvalue3 =  $_POST['haircolor'];
	$tvalue4 =  $_POST['shirt'];
	$tvalue5 =  $_POST['shirtcolor'];



	$index = 0;
	$score = 0;
	
	 $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    


    $result = $mysqli->query("SELECT * FROM myevents WHERE date='$mydate'");
if ( $result->num_rows > 0 ){
	while($row = $result->fetch_assoc() ){
		$score = 1;
		if($eventname == $row['eventname']){
			$score = $score + 1;
		}
		if($value1 == $row['first_name']){
			$score = $score + 3;
		}
		if($value5 == $row['eventtype']){
			$score = $score + 1;
		}
		if($value6 == $row['locationdescription']){
		    $score = $score + 1;
		}
		if($value8 == $row['hat']){
		    $score = $score + 1;
		}
		if($value9 == $row['glasses']){
		    $score = $score + 1;
		}
		if( $value10 == $row['hair']){
			 $score = $score + 1;
		}
		if( $tvalue3 == $row['haircolor']){
			 $score = $score + 1;
		}
		if( $tvalue4 == $row['shirt']){
			 $score = $score + 1;
		}
		if( $tvalue5 == $row['shirtcolor']){
			 $score = $score + 1;
		}
	

		if($score > 4){
			$score = 0;
			$dat = $row['date'];
			$res = $mysqli->query("SELECT * FROM activesearches WHERE date = '$dat';");
			while($trow = $res->fetch_assoc() ){
				$score = 1;
				if( $myfirstname == $trow['first_name']){
					$score = $score + 3;
				}

				if( $eventname == $trow['eventname']){
					$score = $score + 3;
				}

				if( $myeventtype == $trow['eventtype']){
					$score = $score + 1;
				}

				if( $mylocationdescription == $trow['locationdescription']){
					$score = $score + 1;
				}

				if( $myhat == $trow['hat']){
					 $score = $score + 1;
				}
				if( $myglasses == $trow['glasses']){
					 $score = $score + 1;
				}
				if( $myhair == $row['hair']){
					 $score = $score + 1;
				}
				if( $myhaircolor == $row['haircolor']){
					 $score = $score + 1;
				}
				if( $myshirt == $row['shirt']){
					 $score = $score + 1;
				}
				if( $myshirtcolor == $row['shirtcolor']){
					 $score = $score + 1;
				}
				if($score > 4){
					$email1 = $row['email'];
					$tname = $value1;
					if($email1 != $email){
					$sql = "INSERT INTO matches (Email1 , Email2 , User1 , User2 ) VALUES ( '$email', '$email1' , '$first_name' , '$tname'  )";

						$sql1 = "INSERT INTO matches (Email1 , Email2 , User1 , User2 ) VALUES ( '$email1', '$email' , '$tname' , '$first_name'  )";

						if(mysqli_query($mysqli, $sql) and mysqli_query($mysqli, $sql1)) {
								header("location: profile.php");
								exit();
							} else{
								echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
							}

				}
				}

			}
		}
	}
}

		echo $score;

		  $sql = "INSERT INTO activesearches (first_name, last_name, email, eventname, date, eventtype, locationdescription,additionalinfo ,nickname, hat, glasses,hair,haircolor, shirt, shirtcolor) "
            . "VALUES ('$value1', ' ', ' ', '$myeventname', '$mydate', '$value5', '$value6','$value7',' ', '$value8', '$value9','$value10','$tvalue3', '$tvalue4', '$tvalue5')";


     if ( $mysqli->query($sql) ){
        $_SESSION['message'] = "Event Added";
        header("location: profile.php");
    }

    else {
        $_SESSION['message'] = 'Add Event Failed!';
        header("location: profile.php");
    }

 


    ?>
