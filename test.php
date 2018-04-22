<?php

	$value1 =  $_REQUEST['nickname'];
	$value2 =  $_REQUEST['major'];
	$value3 =  $_REQUEST['locationone'];
	$value4 =  $_REQUEST['locationtwo'];
	$value5 =  $_REQUEST['locationthree'];
	$value6 =  $_REQUEST['date'];
	$value7 =  $_REQUEST['phone'];

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


$result = $mysqli->query("SELECT * FROM SelfInformation WHERE major='$tvalue2'");


if ( $result->num_rows > 0 ){

	while($row = $id->fetch_assoc() ){
		$score = 1;
		if('$value1' == $row['nickname']){
			$score = $score + 1;
		}
		if('$value3' == $row['locationtype']){
			$score = $score + 1;
		}
		if('$value4' == $row['locationdetail1']){
			$score = $score + 1;
		}
		if('$value4' == $row['locationdetail2']){
			$score = $score + 1;
		}
		if('$value5' == $row['daymet']){
			$score = $score + 1;
		}
		if('$value7' == $row['phonenumber']){
			$score = $score + 1;
		}

      $index = $row['id'] + 1 ;
}

}



















$sql = "INSERT INTO SelfInformation (email , name , nickname , major , locationtype , locationdetail1 , locationdetail2  , daymet , phonenumber , id) VALUES ('1' , '2','$value1', '$value2', '$value3','$value4', '$value5', '$value6' , '$value7' , $index)";
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
