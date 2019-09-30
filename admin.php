<?php
    session_start();
    //Connect to database
    $db = mysqli_connect("localhost", "root", "", "register");

    if(isset($_POST['admin_btn'])){
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
          header("location: admin.php");
        }else{
          $_SESSION['message'] = "Username/password combination incorrect";
        }}
 ?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Tutors246: Admininstration Login Page </title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <style>


  /*
  CODEPEN INTERFACE FIX
*/
body,
html {
  width: 100%;
  height: 100%;
}
.animakuz-container {
  position: relative;
  width: 100%;
  height: 100%;
}
/*
  ANIMATIONS
*/
@-webkit-keyframes fade-in-anim {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
@keyframes fade-in-anim {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
@-webkit-keyframes fade-out-anim {
  from {
    opacity: 1;
  }
  to {
    opacity: 0;
  }
}
@keyframes fade-out-anim {
  from {
    opacity: 1;
  }
  to {
    opacity: 0;
  }
}
body,
html {
  margin: 0;
  padding: 0;
  border: 0;
}
.animakuz-container {
  min-height: 100%;
  height: auto;
}
header {
  text-align: center;
  padding-top: 40px;
  margin-bottom: 50px;
  color: #50280a;
}
header h1 {
  margin-top: 0;
  margin-bottom: 5px;
  font-family: 'Encode Sans Expanded', sans-serif;
}
header p {
  margin-top: 0;
  font-family: 'Pontano Sans', sans-serif;
  font-size: 18px;
}
header .angular-version {
  background-color: rgba(137, 61, 61, 0.4);
  padding: 2px 4px;
  color: #ffeded;
  font-size: 12px;
  font-family: 'Encode Sans Expanded', sans-serif;
}
#app-container {
  width: 90%;
  max-width: 1024px;
  margin: 0 auto;
  padding-bottom: 40px;
  font-family: 'Pontano Sans', sans-serif;
  /*
    General elements
    */
  /* Base mixins */
  /* Reusable elements */
  /* Inputs */
  /* Sex icon */
  /* Icon buttons */
  /* Elements of views */
  /* General styles for list items */
  /* Editable items and status bar */
}
@media screen and (max-width: 991px) {
  #app-container {
    width: 92%;
  }
}
@media screen and (max-width: 767px) {
  #app-container {
    width: 94%;
  }
}
@media screen and (max-width: 480px) {
  #app-container {
    width: 96%;
  }
}
#app-container nav {
  list-style-type: none;
  margin: 0;
  border: 0;
  padding: 0;
}
#app-container nav ul {
  margin: 0;
  border: 0;
  padding: 0;
  margin-bottom: 5px;
}
#app-container nav li {
  display: inline-block;
  margin: 0;
  border: 0;
  padding: 0;
}
#app-container nav a {
  text-decoration: none;
  color: rgba(0, 0, 0, 0.6);
  background-color: rgba(255, 255, 255, 0.4);
  padding: 5px 20px 5px 10px;
  border-radius: 5px 10px 0 0;
  border: 1px solid rgba(0, 0, 0, 0.2);
  box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.14);
}
#app-container nav a:hover,
#app-container nav a:active {
  background-color: #e1e6f5;
  color: rgba(0, 0, 0, 0.8);
}
#app-container nav a.active {
  border-bottom: 0;
  padding: 6px 20px 6px 10px;
  background-color: #f0f4ff;
  color: rgba(0, 0, 0, 0.9);
}
@media screen and (max-width: 991px) {
  #app-container nav a {
    font-size: 20px;
    padding-right: 40px;
  }
  #app-container nav a.active {
    padding-right: 40px;
  }
}
@media screen and (max-width: 767px) {
}
@media screen and (max-width: 480px) {
  #app-container nav li {
    width: 33%;
    margin-bottom: -10px;
  }
  #app-container nav li:last-child {
    margin-left: 2px;
  }
  #app-container nav a {
    display: inline-block;
    width: 100%;
    padding-right: 0;
    padding-left: 0;
    border-radius: 0;
    font-size: 20px;
    text-align: center;
  }
  #app-container nav a.active {
    padding-right: 0;
    padding-left: 0;
  }
}
#app-container .view-wrapper {
  min-height: 200px;
  border: 1px solid rgba(0, 0, 0, 0.2);
  padding: 20px;
  border-radius: 0 5px 5px 5px;
  box-shadow: 0 4px 4px 2px rgba(0, 0, 0, 0.14);
  background-color: #f0f4ff;
}
#app-container .view-wrapper h2 {
  color: rgba(80, 40, 10, 0.8);
  font-family: 'Encode Sans Expanded', sans-serif;
}
@media screen and (max-width: 480px) {
  #app-container .view-wrapper {
    border-radius: 0 0 5px 5px;
  }
}
#app-container .material-box {
  background-color: rgba(255, 255, 255, 0.5);
  border: 1px solid transparent;
  border-bottom: 1px solid rgba(0, 0, 0, 0.2);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
}
#app-container .material-box:hover {
  border: 1px solid rgba(0, 85, 170, 0.4);
  border-bottom: 1px solid rgba(0, 85, 170, 0.4);
  box-shadow: 0 0 2px rgba(0, 0, 0, 0.3);
}
#app-container .material-box-outline {
  background-color: rgba(255, 255, 255, 0.5);
  border: 1px solid transparent;
  border-bottom: 1px solid rgba(0, 0, 0, 0.2);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(0, 0, 0, 0.2);
}
#app-container .material-box-outline:hover {
  border: 1px solid rgba(0, 85, 170, 0.4);
  border-bottom: 1px solid rgba(0, 85, 170, 0.4);
  box-shadow: 0 0 2px rgba(0, 0, 0, 0.3);
}
#app-container .btn-wrapper {
  position: relative;
  display: inline-block;
  width: 26px;
  height: 26px;
  border-left: 1px solid rgba(0, 0, 0, 0.5);
  vertical-align: middle;
}
#app-container .base-input-style {
  border-radius: 4px;
  border: 1px solid rgba(25, 25, 25, 0.4);
  font-size: 14px;
}
#app-container input {
  border-radius: 4px;
  border: 1px solid rgba(25, 25, 25, 0.4);
  font-size: 14px;
  padding: 4px;
  font-size: 16px;
}
#app-container input[role="date-admitted-input"] {
  width: 80px;
  text-align: center;
}
#app-container input[role="course-code-input"] {
  width: 80px;
  text-align: center;
}
#app-container input[role="short-number-input"] {
  width: 24px;
  text-align: center;
}
#app-container input[role="long-number-input"] {
  width: 80px;
  text-align: right;
}
#app-container select {
  border-radius: 4px;
  border: 1px solid rgba(25, 25, 25, 0.4);
  font-size: 14px;
  background-color: #fff;
  padding: 5px;
}
#app-container select option {
  font-size: 16px;
}
#app-container .sex {
  display: inline-block;
  width: 30px;
  height: 30px;
  background-image: url('http://i65.tinypic.com/20kf48m.jpg');
  background-size: 120px 60px;
  vertical-align: middle;
  margin: 0;
}
#app-container .sex.male {
  background-position: 0 0;
}
#app-container .sex.female {
  background-position: -30px 0;
}
#app-container .sex.other {
  background-position: -60px 0;
}
#app-container .sex.option {
  opacity: 0.8;
  margin: 0 2px;
  cursor: pointer;
}
#app-container .sex:hover {
  opacity: 1;
  outline: 1px solid rgba(0, 128, 0, 0.5);
}
#app-container .sex.selected {
  opacity: 1;
  outline: 2px solid green;
}
#app-container .btn-icon {
  display: inline-block;
  width: 30px;
  height: 30px;
  border: 0;
  border-radius: 0;
  background: none;
  background-image: url('http://i65.tinypic.com/20kf48m.jpg');
  background-size: 120px 60px;
  cursor: pointer;
  color: transparent;
}
#app-container .btn-icon .add-icon {
  opacity: 0.8;
  outline: 2px solid transparent;
  vertical-align: middle;
}
#app-container .btn-icon .add-icon:hover {
  opacity: 1;
  outline-color: rgba(0, 153, 0, 0.15);
  background-color: rgba(0, 153, 0, 0.15);
}
#app-container .btn-icon.delete {
  background-position: -30px -30px;
}
#app-container .btn-icon.delete:hover {
  background-color: rgba(255, 0, 0, 0.1);
}
#app-container .btn-icon.add-user {
  opacity: 0.8;
  outline: 2px solid transparent;
  vertical-align: middle;
  background-position: -60px -30px;
}
#app-container .btn-icon.add-user:hover {
  opacity: 1;
  outline-color: rgba(0, 153, 0, 0.15);
  background-color: rgba(0, 153, 0, 0.15);
}
#app-container .btn-icon.add-course {
  opacity: 0.8;
  outline: 2px solid transparent;
  vertical-align: middle;
  background-position: -90px -30px;
}
#app-container .btn-icon.add-course:hover {
  opacity: 1;
  outline-color: rgba(0, 153, 0, 0.15);
  background-color: rgba(0, 153, 0, 0.15);
}
#app-container .btn-icon.save-edit {
  opacity: 0.8;
  outline: 2px solid transparent;
  vertical-align: middle;
  background-position: 0px -30px;
}
#app-container .btn-icon.save-edit:hover {
  opacity: 1;
  outline-color: rgba(0, 153, 0, 0.15);
  background-color: rgba(0, 153, 0, 0.15);
}
#app-container .btn-icon.btn-lg {
  -webkit-transform-origin: 0 0;
          transform-origin: 0 0;
  -webkit-transform: scale(1.2);
          transform: scale(1.2);
}
#app-container .btn-icon.btn-sm {
  -webkit-transform-origin: 0 0;
          transform-origin: 0 0;
  -webkit-transform: scale(0.8);
          transform: scale(0.8);
}
#app-container .btn-icon .wide-button {
  width: 150px;
  height: 40px;
  -webkit-transform: scale(1);
          transform: scale(1);
  background-image: none;
  background-color: #006600;
  box-shadow: 0 2px 2px rgba(0, 51, 0, 0.5);
  color: #fff;
  font-weight: bold;
  font-size: 18px;
  padding: 0;
  line-height: 40px;
}
#app-container .btn-icon .wide-button:hover {
  background-color: #eeffee;
  color: #2b552b;
}
#app-container .btn-icon.btn-confirm {
  margin-top: -10px;
  margin-left: 20px;
  /* modify confirm button for responsive mode */
}
@media screen and (max-width: 991px) {
  #app-container .btn-icon.btn-confirm.add-course {
    width: 150px;
    height: 40px;
    -webkit-transform: scale(1);
            transform: scale(1);
    background-image: none;
    background-color: #006600;
    box-shadow: 0 2px 2px rgba(0, 51, 0, 0.5);
    color: #fff;
    font-weight: bold;
    font-size: 18px;
    padding: 0;
    line-height: 40px;
    margin: 5px 0 30px;
  }
  #app-container .btn-icon.btn-confirm.add-course:hover {
    background-color: #eeffee;
    color: #2b552b;
  }
}
@media screen and (max-width: 767px) {
  #app-container .btn-icon.btn-confirm {
    width: 150px;
    height: 40px;
    -webkit-transform: scale(1);
            transform: scale(1);
    background-image: none;
    background-color: #006600;
    box-shadow: 0 2px 2px rgba(0, 51, 0, 0.5);
    color: #fff;
    font-weight: bold;
    font-size: 18px;
    padding: 0;
    line-height: 40px;
    margin: 5px 0 30px;
  }
  #app-container .btn-icon.btn-confirm:hover {
    background-color: #eeffee;
    color: #2b552b;
  }
}
@media screen and (max-width: 480px) {
  #app-container .btn-icon.btn-confirm {
    width: 100%;
  }
  #app-container .btn-icon.btn-confirm.add-course {
    width: 100%;
  }
}
#app-container .add-new {
  margin-bottom: 50px;
}
#app-container .add-new h3 {
  margin: 0 0 10px;
}
#app-container .add-new form {
  display: inline-block;
  width: 100%;
  height: 40px;
  line-height: 40px;
}
#app-container .add-new .left-separator {
  padding-left: 10px;
  border-left: 2px solid rgba(0, 0, 0, 0.1);
}
#app-container .add-new .right-separator {
  padding-right: 10px;
  border-right: 2px solid rgba(0, 0, 0, 0.1);
}
#app-container .add-new .add-name {
  display: inline-block;
  padding-right: 20px;
}
#app-container .add-new input[role="item-name-input"] {
  width: 100%;
}
#app-container .add-new .select-sex {
  display: inline-block;
  margin-left: 5px;
  padding: 2px 4px;
  border: 1px solid rgba(0, 0, 85, 0.2);
}
#app-container .add-new .select-date {
  margin-left: 10px;
  padding-left: 10px;
  border-left: 2px solid rgba(0, 0, 0, 0.1);
}
#app-container .add-new .add-credits {
  padding-left: 10px;
  border-left: 2px solid rgba(0, 0, 0, 0.1);
  margin-left: 10px;
}
#app-container .add-new .add-quota {
  padding-right: 10px;
  border-right: 2px solid rgba(0, 0, 0, 0.1);
  margin-left: 10px;
}
#app-container .add-new .select-teacher {
  margin-left: 5px;
}
#app-container .add-new .add-salary {
  padding-left: 10px;
  border-left: 2px solid rgba(0, 0, 0, 0.1);
  margin-left: 10px;
}
#app-container .add-new .row-break {
  display: none;
}
@media screen and (max-width: 991px) {
  #app-container .add-new .course-add-name {
    width: 60%;
  }
  #app-container .add-new .row-break {
    display: block;
    margin: 5px 0 10px;
  }
  #app-container .add-new .add-credits {
    margin-left: 0;
    padding-left: 0;
    border-left: 0;
  }
}
@media screen and (max-width: 767px) {
  #app-container .add-new .add-name {
    width: 60%;
  }
  #app-container .add-new .resp-row {
    display: block;
    margin: 10px 0 5px;
  }
  #app-container .add-new .clear-left {
    margin-left: 0;
    padding-left: 0;
    border-left: 0;
  }
  #app-container .add-new .select-date {
    margin-left: 0;
    padding-left: 0;
    border-left: 0;
  }
  #app-container .add-new .add-quota {
    border-right: 0;
    margin-left: 20px;
  }
  #app-container .add-new .select-teacher {
    margin-left: 0;
    padding-left: 0;
    border-left: 0;
  }
  #app-container .add-new .add-salary {
    margin-left: 0;
    padding-left: 0;
    border-left: 0;
  }
}
@media screen and (max-width: 480px) {
  #app-container .add-new .add-name {
    width: 96%;
  }
  #app-container .add-new .add-code {
    display: inline-block;
    margin: 5px 0;
  }
  #app-container .add-new .row-break {
    display: none;
  }
  #app-container .add-new .resp-row.course-credits-quota {
    margin: 5px 0 5px 20px;
    display: inline-block;
  }
  #app-container .add-new .select-sex {
    margin-top: 10px;
    margin-bottom: 5px;
  }
  #app-container .add-new .resp-row.student-date {
    padding-left: 10px;
    border-left: 2px solid rgba(0, 0, 0, 0.1);
    display: inline-block;
    margin-left: 10px;
  }
  #app-container .add-new .resp-row.course-teacher {
    margin: 0;
  }
  #app-container .add-new .resp-row.teacher-salary {
    padding-left: 10px;
    border-left: 2px solid rgba(0, 0, 0, 0.1);
    margin-left: 10px;
    display: inline-block;
  }
}
#app-container .list-title {
  font-family: 'Encode Sans Expanded', sans-serif;
}
#app-container .person-item,
#app-container .course-item {
  background-color: rgba(255, 255, 255, 0.5);
  border: 1px solid transparent;
  border-bottom: 1px solid rgba(0, 0, 0, 0.2);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
  position: relative;
  padding: 10px;
  margin: 5px 0;
  /* Course item in list of courses for student */
}
#app-container .person-item:hover,
#app-container .course-item:hover {
  border: 1px solid rgba(0, 85, 170, 0.4);
  border-bottom: 1px solid rgba(0, 85, 170, 0.4);
  box-shadow: 0 0 2px rgba(0, 0, 0, 0.3);
}
#app-container .person-item .student-name,
#app-container .course-item .student-name,
#app-container .person-item .student-date,
#app-container .course-item .student-date,
#app-container .person-item .course-name,
#app-container .course-item .course-name,
#app-container .person-item .course-code,
#app-container .course-item .course-code,
#app-container .person-item .course-credits,
#app-container .course-item .course-credits,
#app-container .person-item .course-quota,
#app-container .course-item .course-quota,
#app-container .person-item .edit-teacher,
#app-container .course-item .edit-teacher,
#app-container .person-item .teacher-name,
#app-container .course-item .teacher-name,
#app-container .person-item .teacher-salary,
#app-container .course-item .teacher-salary {
  vertical-align: middle;
}
#app-container .person-item > .btn-icon.delete,
#app-container .course-item > .btn-icon.delete {
  visibility: hidden;
  position: absolute;
  top: 4px;
  right: -2px;
  cursor: pointer;
  opacity: 0.8;
}
#app-container .person-item > .btn-icon.delete:hover,
#app-container .course-item > .btn-icon.delete:hover {
  opacity: 1;
}
#app-container .person-item:hover > .btn-icon.delete,
#app-container .course-item:hover > .btn-icon.delete {
  visibility: visible;
}
#app-container .person-item .student-course,
#app-container .course-item .student-course {
  background-color: rgba(255, 255, 255, 0.5);
  border: 1px solid transparent;
  border-bottom: 1px solid rgba(0, 0, 0, 0.2);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(0, 0, 0, 0.2);
  position: relative;
  display: inline-block;
  height: 26px;
  width: auto;
  margin: 4px 2px;
}
#app-container .person-item .student-course:hover,
#app-container .course-item .student-course:hover {
  border: 1px solid rgba(0, 85, 170, 0.4);
  border-bottom: 1px solid rgba(0, 85, 170, 0.4);
  box-shadow: 0 0 2px rgba(0, 0, 0, 0.3);
}
#app-container .person-item .student-course .course-code,
#app-container .course-item .student-course .course-code {
  padding: 0 5px;
  vertical-align: middle;
}
#app-container .person-item .student-course .course-details,
#app-container .course-item .student-course .course-details {
  display: inline-block;
  position: absolute;
  z-index: 2;
  top: 100%;
  left: -1px;
  background-color: #fff;
  padding: 5px 10px;
  border: 1px solid rgba(0, 85, 170, 0.4);
  box-shadow: 0 2px 1px rgba(0, 85, 170, 0.4);
  line-height: 24px;
  white-space: nowrap;
}
#app-container .person-item .student-course .btn-icon.deletem,
#app-container .course-item .student-course .btn-icon.deletem,
#app-container .person-item .student-course .btn-icon.add-user,
#app-container .course-item .student-course .btn-icon.add-user {
  position: absolute;
  top: 1px;
  left: 1px;
}
#app-container .person-item .edit-teacher,
#app-container .course-item .edit-teacher {
  background-color: rgba(255, 255, 255, 0.5);
  border: 1px solid transparent;
  border-bottom: 1px solid rgba(0, 0, 0, 0.2);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(0, 0, 0, 0.2);
  position: relative;
  display: inline-block;
  padding: 2px 0 2px 4px;
}
#app-container .person-item .edit-teacher:hover,
#app-container .course-item .edit-teacher:hover {
  border: 1px solid rgba(0, 85, 170, 0.4);
  border-bottom: 1px solid rgba(0, 85, 170, 0.4);
  box-shadow: 0 0 2px rgba(0, 0, 0, 0.3);
}
#app-container .person-item .block-row,
#app-container .course-item .block-row {
  display: block;
  margin: 10px 0 0;
}
@media screen and (max-width: 991px) {
  #app-container .person-item .resp-row.student-courses,
  #app-container .course-item .resp-row.student-courses {
    display: block;
    margin: 10px 0 0;
  }
  #app-container .person-item .resp-row.course-teacher,
  #app-container .course-item .resp-row.course-teacher {
    display: block;
    margin: 10px 0 0;
  }
}
@media screen and (max-width: 767px) {
  #app-container .person-item .resp-row.student-date,
  #app-container .course-item .resp-row.student-date {
    display: block;
    margin: 10px 0 0;
  }
  #app-container .person-item .resp-row.course-credits-quota,
  #app-container .course-item .resp-row.course-credits-quota {
    display: block;
    margin: 10px 0 0;
    margin-left: 5px;
  }
  #app-container .person-item .resp-row.course-teacher,
  #app-container .course-item .resp-row.course-teacher {
    margin-left: 5px;
  }
}
@media screen and (max-width: 480px) {
}
#app-container .editable {
  background-color: rgba(255, 255, 255, 0.05);
  border: 1px solid transparent;
  padding: 0 5px;
}
#app-container .editable:hover {
  color: blue;
  background-color: rgba(255, 255, 255, 0.6);
  border-color: rgba(51, 51, 51, 0.5);
}
#app-container #status-bar {
  color: #339;
  text-align: center;
  padding: 5px 0;
  background-color: rgba(255, 255, 255, 0.8);
  transition: opacity .3s;
}
#app-container #status-bar.hidden {
  opacity: 0;
}

    </style>


</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->
    <div class="sidebar-wrapper">
            <div class="logo">
                <img src="img/logo.png.png"/>
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="dashboard.php">
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
                    <a href="enrolled_courses.php">
                        <i class="pe-7s-note2"></i>
                        <p>Enrolled Courses</p>
                    </a>
                </li>
                <li>
                    <a href="progress.php">
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
                    <a href="Course_List.php">
                        <i class="pe-7s-culture pe-fw"></i>
                        <p>Courses</p>
                    </a>
                </li>
                 <li>
            <a href="admin.php">
                <i class="pe-7s-config pe-fw"></i>
                <p>Admininstration Login</p>
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
                        <a class="navbar-brand" href="dashboard.php">Home</a>
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
                                        <b class="caret hidden-sm hidden-xs"></b>
                                        <span class="notification hidden-sm hidden-xs">5</span>
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
                                            Courses
                                            <b class="caret"></b>
                                        </p>

                                  </a>
                                  <ul class="dropdown-menu">
                                    <li><a href="dashboard.php">Home</a></li>
                                    <li><a href="enrolled_courses.php">Enrolled Courses</a></li>
                                    <li><a href="progress.php">Progress Report</a></li>
                                    <li><a href="Course_List.php">Courses</a></li>
                                    <li><a href="www.tutors246.com/ourtutors.html">Available Tutors</a></li>

                                     </ul>
                            </li>
                            <li>
                                <a href="logout.php">
                                    <p>Log out</p>
                                </a>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="animakuz-container gradient-bg-blue">
  <header>
    <h1>Admininstration Page</h1>
    <p>View enrolled students and active courses.</p>
  </header>

<form action="admin.php" method="post">

  <table>
    <tr>
      <td>Enrolled Students</td>
    <br />  <td><?php echo $_SESSION['username'];?></td>
    </tr>

    <tr>
      <td>Active Courses</td>
    <br />  <td><?php echo $_SESSION['course'];?></td>
    </tr>

  <div id="app-container" ng-app="studentApp">
    <nav ng-controller="navCtrl">
      <ul>
        <li>
          <a href="#/students" ng-class="active == 0 ? 'active' : ''" ng-click="setNav(0)">Students</a>
        </li><li>
          <a href="#/courses" ng-class="active == 1 ? 'active' : ''" ng-click="setNav(1)">Courses</a>
        </li><li>
          <a href="#/teachers" ng-class="active == 2 ? 'active' : ''" ng-click="setNav(2)">Teachers</a>
        </li>
      </ul>
    </nav>
    <div class="view-wrapper">
      <div ng-view></div>
    </div>

<!--     TEMPLATES -->

<!-- add new person record (student, course, teacher) -->
  <script type="text/ng-template" id="addNewDrv.tmp">
    <div class="add-new">
      <h3>Add New {{ type | capFirst }}</h3>
      <form >
        <span class="add-name" ng-class="type==='course' ? 'course-add-name' : ''"><!--
        --><input type="text" placeholder="{{ type | capFirst }} Name"
            ng-model="data.name" ng-class="type==='course' ? 'course-name-input' : ''" role="item-name-input"><!--
     --></span>
        <span class="select-sex" ng-if="type !== 'course'"><!--
        --><si-sex-btn option="M" data="data" callback=""></si-sex-btn><!--
        --><si-sex-btn option="F" data="data" callback=""></si-sex-btn><!--
        --><si-sex-btn option="O" data="data" callback=""></si-sex-btn><!--
     --></span>

        <span class="other-details" ng-transclude></span>

        <span class="resp-row confirm-button"><!--
       --><input class="btn-icon btn-confirm btn-lg" type="button" value="Add {{ type | capFirst}}"
            ng-click="triggerAdd()"
            ng-class="type=='course' ? 'add-course' : 'add-user'" />
        </span>
      </form>
    </div>
  </script>

<!-- teacher in course info -->
  <script type="text/ng-template" id="courseTeacherDrv.tmp">
    <span ng-class="view==='courses' ? 'edit-teacher' : ''">
      <span ng-if="showLabel">Teacher: </span>
      <span ng-if="view==='students' && teacher !== null">{{ teacher.name }}</span>
      <span ng-if="view==='courses' && teacher !== null && !editing" ng-dblclick="startEdit()" si-editable="Course Teacher">{{ teacher.name }}</span>

      <!-- Edit Teacher -->
      <span ng-if="editing">

        <select ng-model="edit.teacher" ng-options="teacher as teacher.name for teacher in teachers">

        </select>
      </span>
      <button ng-if="showButton && editing" class="btn-icon btn-sm save-edit"
        ng-click="saveEdit()"></button>

      <!-- Add Teacher -->
      <span ng-if="adding">
        <select ng-model="add.ref">
          <option ng-repeat="teacher in teachers" value="{{teacher.id}}">{{ teacher.name }}</option>
        </select>
      </span>

        <button ng-if="showButton && adding" class="btn-icon btn-sm save-edit"
          ng-click="confirmAdd()"></button>
        <button ng-if="showButton && teacher === null && !adding" class="btn-icon btn-sm add-user"
          ng-click="startAdd()"></button>
        <span class="btn-wrapper" ng-if="showButton && teacher !== null && !editing">
          <button  class="btn-icon btn-sm delete" ng-click="triggerDelete()"></button>
        </span>

    </span>
  </script>

<!-- course in list of courses for student -->
  <script type="text/ng-template" id="studentCourseDrv.tmp">
    <span class="student-course" ng-mouseover="showingDetail=true" ng-mouseout="showingDetail=false">
      <span class="course-code">{{ course.code }}</span><!--
   --><span class="course-details" ng-show="showingDetail">
        <span class="name">{{ course.name }}</span><br>
        <span class="credits">Credits: {{ course.credits }}</span>
        <span class="quota">Quota: {{ course.nStudents }} / {{ course.quota }}</span><br>
        <si-course-teacher ref="{{course.teacherRef}}" view="students"
          ng-if="course.teacherRef !== undefined"></si-course-teacher>
      </span><!--
   --><span class="btn-wrapper">
        <button class="btn-icon btn-sm delete" ng-click="removeCourse(course.id)"></button>
      </span>
    </span>
  </script>

<!-- person item in list (student or teacher) -->
  <script type="text/ng-template" id="personItemDrv.tmp">
    <div class="person-item item-{{type}}" >
      <span class="resp-row person-name-sex">
        <si-sex-icon ng-if="!editingSex" sex="{{ person.sex }}" ng-click="editSex()"></si-sex-icon>
        <si-sex-btn ng-if="editingSex" ng-repeat="option in sexOptions" option="{{option}}"
          data="person" callback="saveEditSex()"></si-sex-btn>
        <span ng-if="!editingName" ng-class="type + '-name'" ng-dblclick="editName()"
        si-editable="Person Name">{{ person.name }}</span>
        <span ng-if="editingName">
          <input type="text" ng-model="person.name" />
          <button class="btn-icon btn-sm save-edit" ng-click="saveEditName()"></button>
        </span>
      </span>
      <span class="other-details" ng-transclude></span>
      <button class="btn-icon btn-sm delete" ng-click="deletePerson(person.id)"></button>
    </div>
  </script>

<!-- course item in list -->
  <script type="text/ng-template" id="courseItemDrv.tmp">
    <div class="course-item" >

      <span class="resp-row course-name-code">
        <span ng-if="!editing.code" class="course-code" ng-dblclick="edit('code')"
        si-editable="Course Code">{{ course.code }}</span>
        <span ng-if="editing.code">
          <input type="text" role="course-code-input" ng-model="course.code"/>
          <button class="btn-icon btn-sm save-edit" ng-click="saveCode()"></button>
        </span>
        <span ng-if="!editing.name" class="course-name" ng-dblclick="edit('name')"
        si-editable="Course Name">{{ course.name }}</span>
        <span ng-if="editing.name">
          <input type="text" ng-model="course.name"/>
          <button class="btn-icon btn-sm save-edit" ng-click="saveName()"></button>
        </span>
      </span>

      <span class="resp-row course-credits-quota">
        <span>Credits:
          <span ng-if="!editing.credits" class="course-credits" ng-dblclick="edit('credits')" si-editable="Credits"> {{ course.credits }}</span>
          <span ng-if="editing.credits">
            <input type="text" role="short-number-input" ng-model="course.credits"/>
            <button class="btn-icon btn-sm save-edit" ng-click="saveCredits()"></button>
          </span>
        </span>
        <span>Quota: {{ course.nStudents }} /
          <span ng-if="!editing.quota" class="course-quota" ng-dblclick="edit('quota')" si-editable="Quota"> {{ course.quota}} </span>
          <span ng-if="editing.quota">
            <input type="text" role="short-number-input" ng-model="course.quota"/>
            <button class="btn-icon btn-sm save-edit" ng-click="saveQuota()"></button>
          </span>
        </span>
      </span>

      <span class="resp-row course-teacher">
        <si-course-teacher ref="{{course.teacherRef}}" view="courses" options="teacherOptions"></si-course-teacher>
      </span>
      <button class="btn-icon btn-sm delete" ng-click="deleteCourse(course.id)"></button>
    </div>
  </script>

<!-- students view -->
  <script type="text/ng-template" id="students.tmp">
    <h2>Students</h2>

    <si-add-new  data="data" type="student" add-data="addData()">
      <span class="resp-row student-date">
        <label class="select-date">Admitted: <si-date-picker role="date-admitted-input" format="dd-mm-yy" date="data.adDate"></si-date-picker></label>
      </span>
    </si-add-new>

    <!--div class="search-box">
      <input type="text" placeholder="find student..." ng-model="searchFilter">
    </div-->

    <h3 class="list-title" >Students Registered</h3>
    <si-person-item ng-repeat="student in students" person="student" type="student"
      ng-init="student.editingDate = false">

      <span class="resp-row student-date">
        <span class="student-date">Admitted:
          <span ng-if="!student.editingDate" ng-dblclick="student.editingDate = true" si-editable="Date Admitted">{{ student.adDate | date : 'dd-MM-yy'}}</span>
          <span ng-if="student.editingDate">
            <si-date-picker  role="date-admitted-input" format="dd-mm-yy" date="student.adDate"></si-date-picker>
            <button class="btn-icon btn-sm save-edit" ng-click="saveDate(student)"></button>
          </span>
        </span>
      </span>

      <span class="resp-row student-courses">
        <span class="student-courses">
          <span class="info-label">Courses</span>
          <si-student-course ng-repeat="ref in student.courseRefs" ref="{{ref}}" ></si-student-course>
          <span>
            <select ng-if="student.addingCourse" ng-model="student.newCourseRef">
              <option ng-repeat="course in student.availableCourses" value="{{ course.id }}">{{ course.code}}</option>
            </select>
            <button ng-if="!student.addingCourse && coursesAvailable(student)" class="btn-icon add-course" ng-click="addCourse(student)"></button>
            <button ng-if="student.addingCourse" class="btn-icon btn-sm save-edit" ng-click="confirmAddCourse(student)"></button>
          </span>
        </span>
      </span>


    </si-person-item>
  </script>

<!-- courses view -->
  <script type="text/ng-template" id="courses.tmp">
    <h2>Courses</h2>

    <si-add-new  data="data" type="course" add-data="addData()">
      <span class="add-code">
       <input type="text" role="course-code-input" placeholder="code" ng-model="data.code" />
      </span>
      <div class="row-break"></div>
      <span class="resp-row course-credits-quota"><!--
     --><label class="add-credits">Credits: <input type="text" role="short-number-input" ng-model="data.credits" /></label><!--
     --><label class="add-quota">Quota: <input type="text" role="short-number-input" ng-model="data.quota" /></label><!--
   --></span>
      <span class="resp-row course-teacher"><!--
     --><label class="select-teacher" >Teacher
          <select name="teacher"
            ng-model="data.teacherRef">
            <option ng-repeat="teacher in teachers" value="{{ teacher.id }}">{{ teacher.name }}</option>
          </select>
        </label>
      </span>
      <div class="row-break"></div>

    </si-add-new>

    <!--div class="search-box">
      <input type="text" placeholder="find course..." ng-model="searchFilter">
    </div-->

    <h3 class="list-title" >Courses Registered</h3>
    <si-course-item ng-repeat="course in courses" course="course"></si-course-item>

  </script>

<!-- teachers view -->
  <script type="text/ng-template" id="teachers.tmp">
    <h2>Teachers</h2>

    <si-add-new  data="data" type="teacher" add-data="addData()">
      <span class="resp-row teacher-salary">
        <label class="add-salary">Salary: <input type="text" role="long-number-input" ng-model="data.salary" /></label>
      </span>
    </si-add-new>

    <!--div class="search-box">
      <input type="text" placeholder="find teacher..." ng-model="searchFilter">
    </div-->

    <h3 class="list-title" >Teachers Registered</h3>
    <si-person-item ng-repeat="teacher in teachers" person="teacher" type="teacher"
      ng-init="teacher.editingSalary = false">
      <span class="resp-row teacher-salary">
        <span class="teacher-salary">Salary
          <span ng-if="!teacher.editingSalary" ng-dblclick="teacher.editingSalary = true" si-editable="Salary">{{ teacher.salary }}</span>
          <span ng-if="teacher.editingSalary">
            <input role="long-number-input" type="text" ng-model="teacher.salary" />
            <button class="btn-icon save-edit btn-sm" ng-click="saveSalary(teacher)"></button>
          </span>
        </span>
      </span>
    </si-person-item>
  </script>

    <p id="status-bar" class="hidden"></p>
  </div>

</div>

<footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="http://tutors246.com/">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="http://tutors246.com/about.html">
                                    Tutors246
                                </a>
                            </li>
                            <li>
                                <a href="http://tutors246.com/">
                                    Portfolio
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
                        &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://tutors246.wordpress.com/">Tutors246</a>, Achieve Academic Success!
                    </p>
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
