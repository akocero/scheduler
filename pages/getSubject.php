<?php 
include('../dist/includes/dbcon.php');

$idcateg = trim($_POST['idcategory']);
$activeSem = trim($_POST['input_active_semester']);
$result = array();
// $id = mysqli_real_escape_string($idcateg);
$res = mysqli_query($con, "select * from subject where year = '$idcateg' and sem = '$activeSem'");
while ($row = mysqli_fetch_array($res)) {
  $result[] = array(
    'id' => $row['subject_id'],
    'desc' => $row['subject_title'],
  );
}   
echo json_encode($result);


?>