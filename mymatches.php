<?php  
 
	session_start();
	
	$email = $_SESSION['email'];
	
	
	$mysqli = mysqli_connect('localhost','root','','test');
	
	
	$result = $mysqli->query("SELECT * FROM SelfInformation WHERE email='$email'");

	?>
	<h1>Your Submitted Matches</h1>
	<table cellpadding="0" cellspacing="0" border="0">
  <tr>
    <th >Username</th><th>First Name</th>
    <th>Major</th><th>Met At</th>
  </tr>
  
	<?php while($row = $result->fetch_assoc() ){ 
			$id = $row['id'];
			$res = $mysqli->query("SELECT * FROM SearchingFor WHERE id='$id'");	
			while($thisres = $res->fetch_assoc() ){
				
				
	
	?>
		
	 <tr>
    <td style='width: 150px;'><?php echo $email; ?></td><td style='width: 150px;'><?php echo $thisres['name']; ?></td><td style='width: 150px;'><?php echo $thisres['major']; ?></td><td style='width: 150px;'><?php echo $thisres['locationtype'] ?></td>
  </tr>
		
	<?php }}
	
	$result = $mysqli->query("SELECT * FROM FoundMatches WHERE email0='$email'");
			?>
			
<br>
<br>		
	<table cellpadding="0" cellspacing="0" border="0">
  <tr>
    <th >Their Email</th><th>Their Name</th>
  </tr>
  
	<?php while($row = $result->fetch_assoc() ){ 
		
			
				
				
	
	?>
		
	 <tr>
    <td style='width: 150px;'><?php echo $row['email1']; ?></td><td style='width: 150px;'><?php echo $row['name1']; ?></td><td style='width: 150px;'><?php echo $thisres['major']; ?></td><td style='width: 150px;'><?php echo $thisres['locationtype'] ?></td>
  </tr>
		
	<?php }
			?>
	

 