<?php
include 'database.php';
$name=$_POST['name'];
$email=$_POST['email'];
$telephone=$_POST['telephone'];
$feedback=$_POST['feedback'];

$sql= "INSERT INTO surveys(name, email, telephone, feedback)
VALUES ('$name', '$email', '$telephone', '$feedback')";

if (mysqli_query($conn, $sql)){
    echo json_encode(array("statusCode"=>200));
}
else {
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($conn);
?>
