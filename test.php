<?php    
    
	$value1 =  $_REQUEST['firstname'];
	$value2 =  $_REQUEST['lastname'];
	$value3 =  $_REQUEST['email'];
//Connecting to sql db.
$mysqli = mysqli_connect('localhost','root','','test');
//Sending form data to sql db.
echo "CONNECT";
if(!$mysqli){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "INSERT INTO testTable (firstname , lastname , email) VALUES ('$value1', '$value2', '$value3')";
if(mysqli_query($mysqli, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}

mysqli_close($mysqli);
?>
