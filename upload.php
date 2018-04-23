<?php
	//Check if the file is well uploaded
	if($_FILES['file']['error'] > 0) { echo 'Error during uploading, try again'; }
	
	//We won't use $_FILES['file']['type'] to check the file extension for security purpose
	
	//Set up valid image extensions
	$extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );
	
	//Extract extention from uploaded file
		//substr return ".jpg"
		//Strrchr return "jpg"
		
	$extUpload = strtolower( substr( strrchr($_FILES['file']['name'], '.') ,1) ) ;
	//Check if the uploaded file extension is allowed
	
	if (in_array($extUpload, $extsAllowed) ) { 
	
	//Upload the file on the server
	
	$name = "img/{$_FILES['file']['name']}";
	$result = move_uploaded_file($_FILES['file']['tmp_name'], $name);
	
	if($result){echo "<img src='$name'/>";}
		
	} else { echo 'File is not valid. Please try again'; }

	

// check if form has been submitted

	if($_SERVER['REQUEST_METHOD'] == "POST")

	{

// check for uploaded file

		if(isset($_FILES['upload']))

		{

// file name, type, size, temporary name

			$file_name = $_FILES['upload']['name'];

			$file_type = $_FILES['upload']['type'];

			$file_tmp_name = $_FILES['upload']['tmp_name'];

			$file_size = $_FILES['upload']['size'];

// target directory

			$target_dir = dirname(dirname(dirname(dirname(__FILE__))))."/runtime/tmp/";
			chown($target_dir, 0755);

// uploding file

			if(move_uploaded_file($file_tmp_name,$target_dir.$file_name))

{

// connect to database

			$cdb = mysqli_connect('localhost','root','','BoulderConnects');

// query

			$q = 'INSERT INTO users(images) VALUES("'.$target_dir.$file_name.'")';

// run query

			$r = mysqli_query($cdb,$q);

			if(mysqli_affected_rows($cdb) == 1)

{

echo "<p style='color:green'><b>File has been successfully uploaded</b></p>";

}

else

{

echo "<p>A system error has been occurred</p>".mysqli_error($cdb);

}

}

else

{

echo "File can not be uploaded";

}

}

}


	
?>