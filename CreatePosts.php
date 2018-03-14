<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

$mysqli = new mysqli("mysql.eecs.ku.edu","z897m200","oo3Kietu","z897m200");

if ($mysqli->connect_errno){
  echo "Connect failed: %s\n". $mysqli->connect_error;
  exit();
}

echo "<form method='post' action='CreatePosts.html'>";

$uName = $_POST['userName'];
$postText = $_POST['postText'];

$query = "SELECT user_id FROM Users WHERE user_id='".$uName."'";
$result = $mysqli->query($query);

if ($uName == ""){
  echo "Username field cannot be left blank";
}
else if ($postText == ""){
  echo "Your post must have something in it";
}
else if (!($result->num_rows == 0)){
  echo "Hello " . $uName . "<br/>";
  $query = "INSERT INTO Posts (content, author_id) VALUES ('".$postText."','".$uName."')";
  echo $result = $mysqli->query($query)?"Success! Post successfully added <br/> Your post: <br/>" . $postText:"Failed. Error: " .  $mysqli->error;

}
else{
  echo "Sorry, you need to already be a user to post something";

}

echo "<br/><input type='submit' value='Back'></form>";

$mysqli->close();

?>
