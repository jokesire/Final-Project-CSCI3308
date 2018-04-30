<?php
if(!isset($_SESSION))
    {
      ob_start();
      session_start();
    }
require 'db.php';
/* I want this to be the place where a new database is made
containing more personalized information, avatars and connnections */
// Check if user is logged in
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "Login before viewing profile!";
  header("location: homepage.php");
}
else {
    // Makes it easier to read
    $first_name = ucwords($_SESSION['first_name']);
    $last_name = ucwords($_SESSION['last_name']);
    $email = $_SESSION['email'];
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $first_name.' '.$last_name ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"crossorigin="anonymous">
  <link rel="stylesheet" href="style/css/main.css" />

  <?php include 'style/css/css.html'; ?>
</head>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['addevent'])) { //user logging in

        require 'addevent.php';

    }

    if (isset($_POST['findmatch'])) { //user registering
       
      
        require 'matching.php';


    }

   // if (isset($_POST['mymatches'])) { //user registering

  //      require 'matching.php';
//
 //   }

}



?>

<body>
  <div class ="container">
    <div class="row">
      <div class="col-md-4">
          <img class="img-fluid" alt="Responsive image" src="style/css/images/feel.png" width="75" height="75" />
      </div>
      <div class= "col-md-4">
          <form method="POST" action="upload.php" enctype="multipart/form-data">
		<label for="file"> Pick a file :  </label>
		<input type="file" name ="file">
		<input type="submit" value = "Upload">
	</form>
      </div>
      <div class="col-md-4" id="nameplate">
        <?php
        if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
            echo $_SESSION['message'];

        endif;
        ?>

          <h1><?php echo $first_name.' '.$last_name; ?> <h4><?= $email ?></h4></h1>

          <h6>Add events you have attended using the 'Add Event' tab below. Press
          the 'Find Request' tab to find a person you liked from the events you have attended.
          Click 'View Matches' to see the people we matched you with based on the information you
          provided. </h6>
          <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

      </div>
    </div>
    <div class= "row 3">
      <div class="col-md-12">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link" href="#addevent" role="tab" data-toggle="tab">Add Event</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#findmatch" role="tab" data-toggle="tab">Find Match</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#mymatches" role="tab" data-toggle="tab">My Matches</a>
              </li>
            </ul>
            <!--*** TABBED CONTENT *** -->
      <div class = "tab-content" class>

	 <div role="tabpanel"  class="tab-pane fade in active" id="mymatches"> 
	  <h1> Your Matches </h1>
	  <?php 

	$result = $mysqli->query("SELECT * FROM matches WHERE Email1='$email'");
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
    <td style='width: 150px;'><?php echo $row['Email2']; ?></td><td style='width: 150px;'><?php echo $row['User2']; ?></td><td style='width: 150px;'></td>
  </tr>

	<?php }
			?>
	</table>
			</div>

      <!--*** ADD EVENT PANEL *** -->
      <div role="tabpanel"  class="tab-pane fade in active" id="addevent">
      </br>
      <h5>Put in as much information as possible. </br> Anything that does not apply leave blank.</h5>

      <form action="profile.php" method="post" autocomplete="off"></br>
      <h1>Event Information:</h1>

      <div class = "form-group">
        <input  type = "hidden" name = "firstname" class = "form-control" id = "firstname" value = "<?php echo htmlspecialchars($first_name); ?>" />
      </div>

      <div class = "form-group">
        <input  type = "hidden" name = "lastname" class = "form-control" id = "lastname" value = "<?php  echo htmlspecialchars($last_name); ?>" />
      </div>


      <div class = "form-group">
        <label  for = "eventname">
          Event Name:
        </label>
      <div class="col-5">
        <input type = "text" name = "eventname" class = "form-control" id = "eventname" />
      </div>
      </div>

	  


      <div class="form-group">
        <label for="date" class="col-2 col-form-label">Date</label>
        <div class="col-5">
          <input class="form-control" name="date" type="date" value="2011-08-19" id="date"/>
        </div>
      </div>

      <div class = "form-group"  >
        <label for = "eventtype">
          What type of event?
        </label>
        <div class = "col-5">
        <select type = "text" name = "eventtype" class = "form-control"
        id = "eventtype"/>
          <option>Party</option>
          <option>Club event</option>
          <option>Protest/Rally</option>
          <option>Hackathon</option>
          <option>Convention</option>
          <option>Career Fair</option>
          <option>Concert</option>
          <option>Sporting Event</option>
          <option>Other</option>
        </select>
        </div>
      </div>

      <div class = "form-group">
        <label  for = "locationdescription">
          Location Description:
        </label>
      <div class="col-5">
        <textarea type = "text" name = "locationdescription" class = "form-control" id = "locationdescription" rows ="3"> </textarea>
      </div>
      </div>

      <div class = "form-group">
        <label  for = "additionalinfo">
          Any additional info about event:
        </label>
      <div class="col-5">
        <textarea type = "text" name = "additionalinfo" class = "form-control" id = "additionalinfo" rows ="3"> </textarea>
      </div>
      </div>


      <!-- <h1>Personal Information:</h1> -->
      <div class = "form-group">
        <label  for = "nickname">
          Nickname:
        </label>
        <div class = "col-5">
        <input type = "text" name = "nickname" class = "form-control" id = "nickname" />
        </div>
      </div>

      <div class = "form-group"  >
        <label for = "hat">
          Wearing a Hat?
        </label>
        <div class = "col-5">
        <select type = "text" name = "hat" class = "form-control" id = "hat" />
          <option>yes</option>
          <option>no</option>
        </select>
        </div>
      </div>

      <div class = "form-group"  >
        <label for = "glasses">
          Wearing glasses?
        </label>
        <div class = "col-5">
        <select type = "text" name = "glasses" class = "form-control"
        id = "glasses" placeholder = "glasses"/>
          <option>yes</option>
          <option>no</option>
        </select>
        </div>
      </div>

      <div class = "form-group"  >
        <label for = "hair">
          How did you wear your hair?
        </label>
        <div class = "col-5">
        <select type = "text" name = "hair" class = "form-control"
        id = "hair" placeholder = "hair"/>
          <option>Ponytail</option>
          <option>Bun</option>
          <option>Down:Above Shoulders</option>
          <option>Down:Below Shoulders</option>
        </select>
        </div>
      </div>

      <div class = "form-group"  >
        <label for = "haircolor">
          What color was your hair?
        </label>
        <div class = "col-5">
        <select type = "text" name = "haircolor" class = "form-control"
        id = "haircolor"/>
          <option>Blonde</option>
          <option>Brunette</option>
          <option>Black</option>
          <option>Red</option>
          <option>Unnatral</option>
        </select>
        </div>
      </div>

      <div class = "form-group"  >
        <label for = "shirt">
          What kind of shirt were you wearing?
        </label>
        <div class = "col-5">
        <select type = "text" name = "shirt" class = "form-control"
        id = "shirt" placeholder = "shirt"/>
          <option>T-shirt</option>
          <option>Blouse</option>
          <option>Suit</option>
          <option>Dress</option>
          <option>Pollo</option>
          <option>Tank Top</option>
          <option>Long Sleeve</option>
          <option>Costume</option>
        </select>
        </div>
      </div>

      <div class = "form-group"  >
        <label for = "shirtcolor">
          What kind of shirt were you wearing?
        </label>
        <div class = "col-5">
        <select type = "text" name = "shirtcolor" class = "form-control"
        id = "shirtcolor" placeholder = "shirtcolor"/>
          <option>Black</option>
          <option>Brown</option>
          <option>White/Grey</option>
          <option>Purple</option>
          <option>Red</option>
          <option>Blue</option>
          <option>Green</option>
          <option>Yellow</option>
          <option>Purple</option>
          <option>Pink</option>
          <option>Patterned</option>
        </select>
        </div>
      </div>
      <button type="submit" name ="addevent" class = "btn btn-info">
        Add Event
      </button>
    </div>
<!-- END OF ADD EVENT PANEL -->
<!-- ********************************************************************************* -->
<!-- FIND MATCH PANEL -->
<div role="tabpanel"  class="tab-pane fade in active" id="findmatch">
</br>
<h5>Put in as much information as possible. </br> Anything that does not apply leave blank.</h5>

<form action="profile.php" method="post" autocomplete="off"></br>
<h1>Select which Event you met person!</h1>

 <div class = "col-5">
    <select type = "text" name = "eventid" class = "form-control"
        id = "eventid"/>
<?php 

$id = $mysqli->query("SELECT * FROM myevents WHERE email = '$email';");
$num = 0;

while($row = $id->fetch_assoc() ){
  
  ?>
<option> <?php echo $row['eventname'];?> </option>;
<?php
}
?>
</select>
<div/>


<h1>Their Information:</h1>
<div class = "form-group">
  <label  for = "firstname">
    Do you know their firstname:
  </label>
  <div class = "col-5">
  <input type = "text" name = "firstname" class = "form-control" id = "firstname" />
  </div>
</div>

<div class = "form-group">
  <label  for = "lastname">
    Did you know their lastname:
  </label>
  <div class = "col-5">
  <input type = "text" name = "lastname" class = "form-control" id = "lastname" />
  </div>
</div>

<div class = "form-group">
  <label  for = "nickname">
    Did they go by a nickname:
  </label>
  <div class = "col-5">
  <input type = "text" name = "nickname" class = "form-control" id = "nickname" />
  </div>
</div>

<div class = "form-group"  >
  <label for = "hat">
    Were they wearing a Hat?
  </label>
  <div class = "col-5">
  <select type = "text" name = "hat" class = "form-control" id = "hat" />
    <option>yes</option>
    <option>no</option>
  </select>
  </div>
</div>

<div class = "form-group"  >
  <label for = "glasses">
    Were they wearing glasses?
  </label>
  <div class = "col-5">
  <select type = "text" name = "glasses" class = "form-control"
  id = "glasses" placeholder = "glasses"/>
    <option>yes</option>
    <option>no</option>
  </select>
  </div>
</div>

<div class = "form-group"  >
  <label for = "hair">
    How did they wear their hair?
  </label>
  <div class = "col-5">
  <select type = "text" name = "hair" class = "form-control"
  id = "hair" placeholder = "hair"/>
    <option>Ponytail</option>
    <option>Bun</option>
    <option>Down:Above Shoulders</option>
    <option>Down:Below Shoulders</option>
  </select>
  </div>
</div>

<div class = "form-group"  >
  <label for = "haircolor">
    What color was their hair?
  </label>
  <div class = "col-5">
  <select type = "text" name = "haircolor" class = "form-control"
  id = "haircolor" placeholder = "hair"/>
    <option>Blonde</option>
    <option>Brunette</option>
    <option>Black</option>
    <option>Red</option>
    <option>Unnatral</option>
  </select>
  </div>
</div>

<div class = "form-group"  >
  <label for = "shirt">
    What kind of shirt were they wearing?
  </label>
  <div class = "col-5">
  <select type = "text" name = "shirt" class = "form-control"
  id = "shirt" placeholder = "shirt"/>
    <option>T-shirt</option>
    <option>Blouse</option>
    <option>Suit</option>
    <option>Dress</option>
    <option>Pollo</option>
    <option>Tank Top</option>
    <option>Long Sleeve</option>
    <option>Costume</option>
  </select>
  </div>
</div>

<div class = "form-group"  >
  <label for = "shirtcolor">
    What kind of shirt were they wearing?
  </label>
  <div class = "col-5">
  <select type = "text" name = "shirtcolor" class = "form-control"
  id = "shirtcolor" placeholder = "shirtcolor"/>
    <option>Black</option>
    <option>Brown</option>
    <option>White/Grey</option>
    <option>Purple</option>
    <option>Red</option>
    <option>Blue</option>
    <option>Green</option>
    <option>Yellow</option>
    <option>Purple</option>
    <option>Pink</option>
    <option>Patterned</option>
  </select>
  </div>
</div>
<button type="submit" name ="findmatch" class = "btn btn-info">
  Add Event
</button>
</div>
<!-- END OF FIND MATCH PANEL -->
  </div>
</div>
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>
