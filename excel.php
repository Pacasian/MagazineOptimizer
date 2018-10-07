<?php
$db = mysqli_connect('192.168.64.2', 'root', 'password', 'test');
$output="";
if (isset($_POST['export_excel'])){
  $sql = "SELECT * FROM `report`";
  $setRec = mysqli_query($db, $sql);
  $columnHeader = '';
  $columnHeader = "Name" . "\t" . "Count" . "\t";
  $setData = '';
  while ($rec = mysqli_fetch_row($setRec)) {
  $rowData = '';
  foreach ($rec as $value) {
  $value = '"' . $value . '"' . "\t";
  $rowData .= $value;
  }
  $setData .= trim($rowData) . "\n";
  }
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=magazineCountReport.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
  echo ucwords($columnHeader) . "\n" . $setData . "\n";
}
mysqli_close($db);
?>
