<?php


error_reporting(E_ALL);
ini_set("display_errors",1);

$mysqli = new mysqli("mysql.eecs.ku.edu","z897m200","oo3Kietu","z897m200");

if ($mysqli->connect_errno){
  echo "Connect failed: %s\n". $mysqli->connect_error;
  exit();
}

$query = "SELECT user_id FROM Users";
$result = $mysqli->query($query);
$userArray = Array();
while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    $userArray[] =  $row['user_id'];  
}

echo "<head>
<title>Users</title>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

<!--Style Sheets-->
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
<link href = 'style.css' rel = 'stylesheet' type = 'text/css'/>
</head>
<body>
<main  role='main' class ='container-fluid'>
    <div class='jumbotron' style='background-color: lightblue'>
            <h1 class='display-3'>Users</h1>
            <p class = 'lead'>
                <b>Here are all the users</b>
                </p>
    </div>
</main>";

echo "<div class='container-fluid'> <form method='post' action='AdminHome.html'>";

foreach ($userArray as $userName){
    echo $userName . "<br/>";
}

echo "<input type='submit' class='btn' value='Back'>";
echo"</form> </div>";
echo "</body>";

echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>";
?>