<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Return</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <div class="header" id="head1">
    <h2>Return Magazine</h2>
  </div>
  <form method="post" action="login.php">
    <?php include('errors.php');?>
    <div class="input-group">
      <label>Member Number:</label>
      <input type="text" name="username">
    </div>
    <div class="input-group">
      <label>Magazine Name:</label>
      <input type="text" name="password">
    </div>
    <div class="input-group">
  		<button type="submit" class="btn" name="return_user">Return</button>
  	</div>
  	<p>
      <a href="login.php">Issue</a>

  </form>
</body>

</html>
