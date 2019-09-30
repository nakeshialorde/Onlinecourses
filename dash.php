<?php
    session_start();
    //Connect to database
    $db = mysqli_connect("localhost", "root", "", "register");

    if(isset($_POST['login_btn'])){
      $username = mysqli_real_escape_string($db, $_POST['username']);
      $password = mysqli_real_escape_string($db, $_POST['password']);
      $course = mysqli_real_escape_string($db, $_POST['course']);
	  $numbers = mysqli_real_escape_string($db, $_POST['numbers']);
      $consumer = mysqli_real_escape_string($db, $_POST['consumer']);
      $sets = mysqli_real_escape_string($db, $_POST['sets']);
      $measurement = mysqli_real_escape_string($db, $_POST['measurement']);
      $statistics = mysqli_real_escape_string($db, $_POST['statistics']);
      $algebra = mysqli_real_escape_string($db, $_POST['algebra']);
      $relations = mysqli_real_escape_string($db, $_POST['relations']);
      $geometry = mysqli_real_escape_string($db, $_POST['geometry']);
      $vectors = mysqli_real_escape_string($db, $_POST['vectors']);



      $password = md5($password);
	    $course = ($course);
      $sql = "SELECT * FROM login WHERE username='$username' AND password='$password' AND course='$course' AND numbers='$numbers' AND consumer='$consumer' AND sets='$sets' AND measurement='$measurement' AND statistics='$statistics' AND algebra='$algebra' AND relations='$relations' AND geometry='$geometry' AND vectors='$vectors'";
      $result = mysqli_query($db, $sql);
      if (mysqli_num_rows($result) == 1){
      $_SESSION['message'] = "You are now logged in";
      $_SESSION['username'] = $username;
		  $_SESSION['course'] = $course;
		  $_SESSION['numbers'] = $numbers;
		  $_SESSION['consumer'] = $consumer;
		  $_SESSION['sets'] = $sets;
		  $_SESSION['measurement'] = $measurement;
		  $_SESSION['statistics'] = $statistics;
		  $_SESSION['algebra'] = $algebra;
		  $_SESSION['relations'] = $relations;
		  $_SESSION['geometry'] = $geometry;
		  $_SESSION['vectors'] = $vectors;
          header("location: dashboard.php");
        }else{
      $_SESSION['message'] = "Username/password combination incorrect";
        }}
 ?>

<?php

// This is just an example of reading server side data and sending it to the client.
// It reads a json formatted text file and outputs it.

$string = file_get_contents("sampleData.json");
echo $string;

// Instead you can query your database and parse into JSON etc etc
?>
