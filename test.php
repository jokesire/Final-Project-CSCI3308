<?php    
if(isset($_POST['SubmitButton'])){ //check if form was submitted
  $input = $_POST['inputText']; //get input text
  $message = "Success! You entered: ".$input;
    

//Connecting to sql db.
$connect = mysqli_connect("SERVER NAME","USERNAME","PASSWORD","label");
//Sending form data to sql db.
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "INSERT INTO persons (firstname, lastname, email) VALUES (firstname, lastname, email";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
mysqli_close($link);
?>
