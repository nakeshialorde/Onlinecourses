<?php
    session_start();
    //Connect to database
    $db = mysqli_connect("sql3.freemysqlhosting.net", "sql3253250", "Ll3KWDrcpq", "sql3253250");

    if(isset($_POST['login_btn'])){
      $username = mysqli_real_escape_string($db, $_POST['username']);
      $password = mysqli_real_escape_string($db, $_POST['password']);
      $course = mysqli_real_escape_string($db, $_POST['course']);

      $password = md5($password);
        $sql = "SELECT * FROM login WHERE username='$username' AND password='$password' AND course='$course'";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) == 1){
          $_SESSION['message'] = "You are now logged in";
          $_SESSION['username'] = $username;
		  $_SESSION['userid'] = $userid;
          $_SESSION['course'] = $course;

          header("location: dashboard.php");
        }else{
          $_SESSION['message'] = "Username/password combination incorrect";
        }}
 ?>

 <!DOCTYPE html>
 <html>
<head>
  <title> Tutors246 Login </title>
  <link rel="stylesheet" href="assets/css/style.css">
   <style>
          body,
          html {
              height: 100%;
              font-family: Arial, Helvetica, sans-serif;
          }
          * {
              box-sizing: border-box;
          }
          .bg-img {
              /* The image used */
              background-image: url("https://static1.squarespace.com/static/52d6cb6be4b0b5fc69b8d205/t/5307d431e4b06c565def6aa7/1393022004734/education-background-checks.jpg?format=1500w");
              text-rendering: all;
              min-height: 100%;
              /* Center and scale the image nicely */
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
          }
          /* Add styles to the form container */
          .container {
              position: center relative;
              right: 0;
              margin: 20px;
              max-width: 600px;
              padding: 16px;
              background-color: white;
              margin-right: auto;
              margin-left: auto;
          }
          /* Full-width input fields */
          input[type=text],
          input[type=password] {
              width: 100%;
              padding: 15px;
              margin: 5px 0 22px 0;
              border: none;
              background: #f1f1f1;
          }
              input[type=text]:focus,
              input[type=password]:focus {
                  background-color: #ddd;
                  outline: none;
              }
          /* Set a style for the submit button */
          .btn {
              background-color: #4CAF50;
              color: white;
              padding: 16px 20px;
              border: none;
              cursor: pointer;
              width: 100%;
              opacity: 0.9;
          }
              .btn:hover {
                  opacity: 1;
              }
          .imgcontainer {
              text-align: center;
              margin: 24px 0 12px 0;
          }
          img.avatar {
              width: 40%;
              border-radius: 50%;
          }
      </style>

      <style>
  	input[type=text], select {
      width: 100%;
      padding: 5px 10px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
  	}
  	input[type=password], select {
      width: 100%;
      padding: 5px 10px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
  	}

  	input[type=email], select {
      width: 100%;
      padding: 5px 10px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
  	}

	<style>
.panel {
  display: flex;
  justify-content: center;
  background-color: #fff;
  flex-direction: column;

}

.panel > div {
  background-color: #f1f1f1;
  width: 850px;
  margin: 10px;
  text-align: center;
  line-height: 75px;
  font-size: 30px;
}
</style>

</head>

<body>

      <div class="bg-img">
      <br />
      <div align="center">
      <img src="http://tutors246.com/img/logo.png.png" align="center" height="auto" width="auto" />
      </div>

  <br clear="all"><div style="text-align: center;">	<h2>Welcome to our online learning community!</h2> <p style="font-size: 25px">Login</p></div><br clear="all">
<div class="panel">
<form method="post" action="login.php">
  <table>

    <tr>
      <td>Username:</td>
      <td><input type="text" name="username" class="textInput" autocomplete="on" required></td>
    </tr>

    <tr>
      <td>Password:</td>
      <td><input type="password" name="password" class="textInput" autocomplete="on" required></td>
    </tr>

    <tr>
      <td>Select Course:</td>
      <td><select class="course" name="course">
           <option class="course">CSEC 1278 - Mathematics</option>
            <option class="course">CSEC 1279 - English Language</option>
            <option class="course">CSEC 1280 - Principles of Business</option>
            <option class="course">CSEC 1281 - Office Procedures</option>
            <option class="course">CSEC 1282 - Additional Mathematics</option>
      </select></td>
    </tr>

    <tr>
      <td></td>
      <td><input type="submit" name="login_btn" value="Login"></td>
    </tr>
  </table>
</form>
</div>

</body>
 </html>
