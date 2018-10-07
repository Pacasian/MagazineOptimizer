<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Issue Magazine</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="header">
  	<h2>Issue Magazine</h2>
  </div>
  <form method="post" action="login.php" class="content">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Member Number:</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Magazine Name:</label>
  		<input type="text" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Issue</button>
  	</div>
  	<p>
  		Not yet a having a plan? <a href="register.php">Sign up</a>
  	</p>
      <p>
          <a href="return.php" class="btn2">Return the Magazine </a>
          <br/>
          <br/>
          <br/>
          <a href="report.php" class="btn3">Report</a>
          <br/>
          <br/>
  </form>
</body>
</html>
