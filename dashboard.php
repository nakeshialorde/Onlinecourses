
<?php
session_start();
//Connect to database
$db = mysqli_connect("sql3.freemysqlhosting.net", "sql3253250", "Ll3KWDrcpq", "sql3253250");

if(isset($_POST['login_btn'])){
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $course = mysqli_real_escape_string($db, $_POST['course']);

  $password = md5($password);
  $course = ($course);
  $sql = "SELECT * FROM login WHERE username='$username' AND password='$password' AND course='$course'";
  $result = mysqli_query($db, $sql);
  if (mysqli_num_rows($result) == 1){
  $_SESSION['message'] = "You are now logged in";
  $_SESSION['username'] = $username;
  $_SESSION['course'] = $course;
  header("location: dashboard.php");
    }else{
  $_SESSION['message'] = "Username/password combination incorrect";
    }}
?>
<!DOCTYPE html>
<html lang="en">

<head>

 <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var jsonData = $.ajax({
          url: "getData.php",
          dataType: "json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, {width: 1500, height: 240});
    }

    </script>


    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Tutors246 Online Course Portal</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <style>
    /*

RESPONSTABLE 2.0 by jordyvanraaij
  Designed mobile first!

If you like this solution, you might also want to check out the 1.0 version:
  https://gist.github.com/jordyvanraaij/9069194

*/
.responstable {
  margin: 1em 0;
  width: 100%;
  overflow: hidden;
  background: #fff;
  color: #024457;
  border-radius: 10px;
  border: 1px solid #167f92;
}
.responstable tr {
  border: 1px solid #d9e4e6;
}
.responstable tr:nth-child(odd) {
  background-color: #eaf3f3;
}
.responstable th {
  display: none;
  border: 1px solid #fff;
  background-color: #167f92;
  color: #fff;
  padding: 1em;
}
.responstable th:first-child {
  display: table-cell;
  text-align: center;
}
.responstable th:nth-child(2) {
  display: table-cell;
}
.responstable th:nth-child(2) span {
  display: none;
}
.responstable th:nth-child(2):after {
  content: attr(data-th);
}
@media (min-width: 480px) {
  .responstable th:nth-child(2) span {
    display: block;
  }
  .responstable th:nth-child(2):after {
    display: none;
  }
}
.responstable td {
  display: block;
  word-wrap: break-word;
  max-width: 7em;
}
.responstable td:first-child {
  display: table-cell;
  text-align: center;
  border-right: 1px solid #d9e4e6;
}
@media (min-width: 480px) {
  .responstable td {
    border: 1px solid #d9e4e6;
  }
}
.responstable th,
.responstable td {
  text-align: left;
  margin: 0.5em 1em;
}
@media (min-width: 480px) {
  .responstable th,
  .responstable td {
    display: table-cell;
    padding: 1em;
  }
}

body {
  padding: 0 2em;
  font-family: Arial, sans-serif;
  color: #024457;
  background: #f2f2f2;
}

h1 {
  font-family: Verdana;
  font-weight: normal;
  color: #024457;
}
h1 span {
  color: #167f92;
}
</style>
<style>
.hd_gradeDiv {
  width: 100%;
}
.hd_goToClassBtn {
  background-color: #4b8edb;
  font-size: 16px;
  margin-top: 8px;
  float: right;
  width: 40%;
  padding-left: 5px;
  padding-right: 5px;
}
.hd_courseBtnText {
  color: #ffffff;
  vertical-align: middle;
  text-align: center;
  font-size: 12px;
  font-weight: 800;
  height: 30px;
  line-height: 30px;
}
.hd_instructor {
  width: 100%;
  float: left;
  padding-top: 10px;
}
.hd_ins_Left {
  float: left;
  vertical-align: middle;
  border-radius: 50px;
}

.hd_instructorInfo{
  padding-left: 10px;
}
.clearBorder {
  border: 0;
}
.hd_instructorContactButtons {
  color: #ADADAD;
  padding: 15px;
  float: right;
  font-size: 1.3em;
}
</style>
</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-color="white">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="dashboard.php" class="simple-text">
                        <img src="img/logo.png.png" />
                    </a>
                </div>

                <ul class="nav">
                    <li class="active">
                        <a href="dashboard.html">
                            <i class="pe-7s-graph"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="user.html">
                            <i class="pe-7s-user"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="enrolled_courses.html">
                            <i class="pe-7s-note2"></i>
                            <p>Enrolled Courses</p>
                        </a>
                    </li>
                    <li>
                        <a href="progress.html">
                            <i class="pe-7s-study"></i>
                            <p>Progress Report</p>
                        </a>
                    </li>
                    <li>
                        <a href="http://tutors246.com/ourtutors.html">
                            <i class="pe-7s-notebook"></i>
                            <p>Schedule A Tutor</p>
                        </a>
                    </li>
                    <li>
                        <a href="Course_List.html">
                            <i class="pe-7s-culture pe-fw"></i>
                            <p>Courses</p>
                        </a>
                    </li>

                    <li>
                        <a href="adminlogin.html">
                            <i class="pe-7s-config pe-fw"></i>
                            <p>Admin Login</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                        <a class="navbar-brand" href="#">Dashboard</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-dashboard"></i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-lg hidden-md"></b>
                                    <p class="hidden-lg hidden-md">
                                        5 Notifications
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Notification 1</a></li>
                                    <li><a href="#">Notification 2</a></li>
                                    <li><a href="#">Notification 3</a></li>
                                    <li><a href="#">Notification 4</a></li>
                                    <li><a href="#">Another notification</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-search"></i>
                                    <p class="hidden-lg hidden-md">Search</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="">
                                    <p>Account</p>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        Dropdown
                                        <b class="caret"></b>
                                    </p>

                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="logout.php" onclick="logout()">
                                    <p>Log out</p>
                                </a>
                            </li>
                            <li class="separator hidden-lg"></li>
                        </ul>
                    </div>
                </div>
            </nav>

		<div align = "center"><h4>Welcome <?php echo $_SESSION['username'];?>, you are currently enrolled in <?php echo $_SESSION['course'];?></h4></div>

<div align="center"><h4 class="title">Course Content</h4></div>
		<div align="center">
    <div class="content">
			 <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                             </div>
								<div id="chart_div"></div>
							    </div>
                            </div>
                        </div>

<div align="center">
<h4 class="title"><?php echo $_SESSION['course'];?> Quiz Scores </h4>

<!--
<table class="responstable">
  <tr>
    <th>Sections</th>
    <th data-th="Driver details"><span>Chapter 1</span></th>
    <th>Chapter 2</th>
    <th>Chapter 3</th>
    <th>Chapter 4</th>
    <th>Chapter 5</th>
    <th>Chapter 6</th>
    <th>Chapter 7</th>
    <th>Chapter 8</th>
    <th>Chapter 9</th>
  </tr>

  <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section2']?></td>
    <td><?php echo ['section3']?></td>
    <td><?php echo ['section4']?></td>
     <td><?php echo ['section5']?></td>
    <td><?php echo ['section6']?></td>
    <td><?php echo ['section7']?></td>
    <td><?php echo ['section8']?></td>
    <td><?php echo ['section9']?></td>
  </tr>

  <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
     <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>
  <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
     <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>
  <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
     <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>
  <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
     <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>
  <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
     <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>
  <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
     <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>
  <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
     <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>
  <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
     <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>
  <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
     <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>
  <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
     <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>
  <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
     <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>
  <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
     <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>

<tr>
  <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>

 <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
     <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>
  <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
     <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>
  <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
     <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>
  <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
     <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>
  <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
     <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>
  <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
     <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>
  <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
     <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>
  <tr>
    <td>Secttion 1</td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
     <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
    <td><?php echo ['section1']?></td>
  </tr>

</table>-->
</div>

<div class="panel">
              <h1>Chapter 1</h1>
              <br />This Chapter is worth 9% of the exam, the total average reflects your performance in this section.
<br /><br />
<Table>
<tr>
<th>PROFILES</th>
<th>PAPER 01 </th>
<th>PAPER 02 </th>
<th>PAPER 03 </th>
<th>TOTAL (%)</th>
</tr>

<tr><th>Knowledge (K)</th></tr>
<tr><th>Comprehension (C)</th></tr>
<tr><th>Reasoning (R) </th></tr>
<tr><th>TOTAL</th></tr><br />
<tr><th>Percentage</th></tr>


</Table>
</div>
</div>

<style>
.panel
{
  height: 1550px auto !important;
  width: 500px auto !important;
  color: white;
  background-color: #FCF3CF;
  text-align: left;
  font: arial;
}

.tr{
  padding-left: 55px;
  padding-right: 55px;
  margin-top: 50px;
  margin-bottom: 50px;
  }

  .td{
    padding-left: 55px;
    padding-right: 55px;
    margin-top: 50px;
    margin-bottom: 50px;
    }
</style>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="card ">
                                <div class="header">
                                    <h4 class="title"><?php echo $_SESSION['course'];?> Course Progress</h4>
                                    <p class="category">Check your progress</p>
                                </div>
                                <div class="content">
                                    <div id="chartActivity" class="ct-chart"></div>

                                    <div class="footer">
                                        <div class="legend">
                                            <i class="fa fa-circle text-info"></i> Tesla Model S
                                            <i class="fa fa-circle text-danger"></i> BMW 5 Series
                                        </div>
                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-check"></i> Data information certified
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card ">
                                <div class="header">
                                    <h4 class="title">Enrolled Courses</h4>
                                    <p class="category">Courses in progress</p><br />
									<p> You are currently enrolled in <?php echo $_SESSION['course'];?>
                              <br/>
                                <div class="hd_goToClassBtn">
                                  <a href="cxc_courses\CXC_MATHEMATICS\index.html"><p class="hd_courseBtnText">Launch Course</p></a>
                                </div>  </div>












                                    <div class="footer">
                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-history"></i> Updated 3 minutes ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="dashboard.html">
                                Home
                            </a>
                            </li>
                            <li>
                                <a href="http://tutors246.com/">
                                Tutors246
                            </a>
                            </li>
                            <li>
                                <a href="http://tutors246.com/ourtutors.html">
                               Tutors
                            </a>
                            </li>
                            <li>
                                <a href="https://tutors246.wordpress.com/">
                               Blog
                            </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script> <a href="">Tutors246</a>: Achieve Academic Success! </p>
                </div>
            </footer>

        </div>
    </div>

</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

</html>
