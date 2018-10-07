<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Magazine Registration</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register a plan</h2>
  </div>

  <form method="post" action="register.php" class="regheight">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Member number</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Number of months</label>
  	  <input type="number" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Number of magazine</label>
  	  <input type="number" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Date</label>
  	  <input type="date" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
