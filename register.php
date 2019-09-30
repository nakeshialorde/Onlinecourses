<?php
    session_start();
    //Connect to database
    $db = mysqli_connect("sql3.freemysqlhosting.net", "sql3253250", "Ll3KWDrcpq", "sql3253250");

    if(isset($_POST['register_btn'])){
      $username = mysqli_real_escape_string($db, $_POST['username']);
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $password = mysqli_real_escape_string($db, $_POST['password']);
      $password2 = mysqli_real_escape_string($db, $_POST['password2']);
      $course = mysqli_real_escape_string($db, $_POST['course']);

      if ($password == $password2){
        //Create User
      $password = md5($password); //Hash password before storing for security purposes




        $sql = "INSERT INTO login(username, email, password, course) VALUES('$username', '$email', '$password', '$course')";
        mysqli_query($db, $sql);
        $_SESSION['message'] = "You are logged in";
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $userid;
        $_SESSION['course'] = $course;

        header("location: login.php"); //redirect to dashboard on login
      }
      else {
      $_SESSION['message'] = "The two passwords do not match";
      }
    }
 ?>

 <!DOCTYPE html>
 <html>
<head>
  <title> Tutors246 Registration </title>
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
  .panel1 {
    display: flex;
    justify-content: center;
    background-color: #fff;
    flex-direction: column;

  }

  .panel1 > div {
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

  <br clear="all"><div style="text-align: center;">	<h2>Welcome to our online learning community!</h2> <p style="font-size: 25px">Register</p></div><br clear="all">
<div class="panel">
<form method="post" action="register.php">
  <table>

    <tr>
      <td>Username:</td>
      <td><input type="text" name="username" class="textInput" autocomplete="on" required></td>
    </tr>

    <tr>
      <td>Email:</td>
      <td><input type="email" name="email" class="textInput" autocomplete="on" required></td>
    </tr>

    <tr>
      <td>Password:</td>
      <td><input type="password" name="password" class="textInput" autocomplete="on" required ></td>
    </tr>

    <tr>
      <td>Confirm Password:</td>
      <td><input type="password" name="password2" id="password2" class="textInput" autocomplete="on" required></td><br>
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
      <td><input type="submit" name="register_btn" value="Register" onclick="success()"></td>
    </tr>
  </table>
</form>
</div>
<script>
function success() {
    alert("Registration Successful!");
}
</script>
<script>
$('input[type=submit]').on('click', validate);


function validate() {
  var password1 = $("#password1").val();
  var password2 = $("#password2").val();

    if(password1 == password2) {
       $("#validate-status").text("valid");
    }
    else {
        $("#validate-status").text("invalid");
    }
}
</script>
<script>
$to      = $email; // Send email to our user
$subject = "Email Verification mail"; // Give the email a subject
$emessage = "Welcome to Tutors246 Online Learning Community";
$info = <?php echo ['username'] ?><?php echo ['password'] ?><?php echo ['course'] ?>

// if emessage is more than 70 chars
$emessage = wordwrap($emessage, 70, "\r\n");

// Our emessage above including the link
$headers   = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/plain; charset=iso-8859-1";
$headers[] = "From: no-reply <noreply@yourdomain.com>";
$headers[] = "Subject: {$subject}";
$headers[] = "X-Mailer: PHP/".phpversion(); // Set from headers

mail($to, $subject, $emessage, $info, implode("\r\n", $headers));
</script>
</body>
 </html>
