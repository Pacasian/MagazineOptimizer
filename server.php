<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('192.168.64.2', 'root', 'password', 'test');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);//no of months
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);//no of magazine
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);//date

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Member Number is required"); }
  if (empty($email)) { array_push($errors, "NUmber of Months is required"); }
  if (empty($password_1)) { array_push($errors, "Number of magazine is required"); }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email


  $user_check_query = "SELECT * FROM reg WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] == $username) {
      array_push($errors, "Member Number already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = ($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO reg (password, email, username,dates)
  			  VALUES('$password', '$email', '$username','$password_2')";
  	mysqli_query($db, $query);

    //Updating the expiry date
    $query6 = "UPDATE reg SET dates = DATE_ADD( CURDATE(),INTERVAL '$email' MONTH ) WHERE username='$username'";
  	mysqli_query($db, $query6);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Member Number is required");
  }
  if (empty($password)) {
  	array_push($errors, "Magazine Name is required");
  }
//if no errors then put the username and check //whether the user exists
  if (count($errors) == 0) {
  	$query = "SELECT * FROM reg WHERE username='$username'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) === 1) {
      $user_check_query = "SELECT * FROM reg WHERE username='$username'";
      $result2 = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result2);
      if ($user) { // if user exists
        if ($user['password'] != "No book") {
          array_push($errors,"The book ".$user['password']." already present"."<br>"." Please Return this book" );
        }//if the there is no book in the cart then //add the magazine
          else {
            $query1 = "UPDATE reg SET password='$password' WHERE username='$username'";
    	    $results1 = mysqli_query($db, $query1);
            //The entered magazine will be added in the report table with the increment in its count
            $query_for_report="UPDATE report SET count +1 WHERE name='$password'";
            mysqli_query($db,$query_for_report);
          array_push($errors,"The book ".$password." is issued" );
        }
  	  // $_SESSION['username'] = $username;
  	  // $_SESSION['success'] = "You are now logged in";
  	  // header('location: index.php');
  	}
  }else {
  		array_push($errors, "Wrong Member Number combination");
  	}
  }
}
//SELECT * FROM reg WHERE date < CURDATE();
//RETURN SECTION
if (isset($_POST['return_user'])){
  $username1 = mysqli_real_escape_string($db, $_POST['username']);
  $password1 = mysqli_real_escape_string($db, $_POST['password']);
  if (empty($username1)){
    array_push($errors,"Member Number is required");
  }
  if (empty($password1)){
    array_push($errors,"Magaine name is required");
  }
    $query10 = "SELECT * FROM reg WHERE username='$username1' AND password='$password1'";
    $results10= mysqli_query($db, $query10);
    if (mysqli_num_rows($results10) === 1) {
      $query11="UPDATE reg SET password='No book' WHERE username='$username1'";
      $result11=mysqli_query($db,$query11);
      echo ("Successfully Removed");
  }
  else {
    array_push($errors, "Magazine name or Member Number is wrong");
  }

}

?>
