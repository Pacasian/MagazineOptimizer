
<?php include('excel.php') ?>
<!DOCTYPE html>
<html>

<head>
  <title>Report</title>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="table-responsive">
<br/>
<br/>
<br/>
<div class="container">
<h2 align="center" class="header">Export the Data</h2>
<div id="live_data"></div>
<form action="excel.php" align="center" method="post">
  <?php
$con=mysqli_connect("192.168.64.2","root","password","test");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM report");

echo "<table border='2' class='tables'>
<tr>
<th>Name</th>
<th>Count</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['count'] . "</td>";
echo "</tr>";
}
echo "</table>";
?>
    <input type="submit" name="export_excel" class="btn1" value="Export to Excel"/>
    <a href="bi.html" class="btn2" >Show the Statistics<a/>
    </form>
</div>
</div>
</body>

</html>
