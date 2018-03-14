<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

$mysqli = new mysqli("mysql.eecs.ku.edu","z897m200","oo3Kietu","z897m200");

if ($mysqli->connect_errno){
  echo "Connect failed: %s\n". $mysqli->connect_error;
  exit();
}

echo "<form method='post' action='CreateUser.html'>";

$uName = $_POST['userName'];
$query = "SELECT user_id FROM Users WHERE user_id='".$uName."'";
$result = $mysqli->query($query);

if ($uName == ""){
  echo "Username field cannot be left blank";
}
else if (!($result->num_rows == 0)){
  echo "Username already exists: " . $uName;
}
else{
  $query = "INSERT INTO Users (user_id) VALUES ('".$uName."') ";
  echo $uName . "<br>";
  echo $result = $mysqli->query($query)?"Success!":"Failed. Error: " .  $mysqli->error;

}

echo "<br/><input type='submit' value='Back'></form>";

$mysqli->close();

?>
