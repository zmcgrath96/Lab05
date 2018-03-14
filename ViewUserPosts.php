<?php


error_reporting(E_ALL);
ini_set("display_errors",1);

$mysqli = new mysqli("mysql.eecs.ku.edu","z897m200","oo3Kietu","z897m200");

if ($mysqli->connect_errno){
  echo "Connect failed: %s\n". $mysqli->connect_error;
  exit();
}

$currentAuthor = $_POST['author'];


echo "<head>
<title>Posts</title>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

<!--Style Sheets-->
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
<link href = 'style.css' rel = 'stylesheet' type = 'text/css'/>
</head>
<body>
<main  role='main' class ='container-fluid'>
    <div class='jumbotron' style='background-color: lightblue'>
            <h1 class='display-3'>Posts</h1>
            <p class = 'lead'>
                <b>Here are the posts</b>
                </p>
    </div>
</main>";

echo "<div class='container-fluid'> <form method='post' action='ViewUserPosts.html'>";

$query = "SELECT * FROM Posts WHERE author_id = '".$currentAuthor."'";
$result = $mysqli->query($query);
$postArray = Array();
$postID = Array();

if($result->num_rows == 0){
    echo $currentAuthor . " has no posts yet <br/>";
}
else{
    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        $postArray[] =  $row['content'];  
        $postID[] = $row['post_id'];
    }

    echo "<style>th, td {width: 75%;}</style>";
    echo "<table> <tr><th>Post ID</th><th>Post</th></tr>";

    for ($i = 0; $i < sizeof($postArray); $i++){
        echo "<tr> <td>" .$postID[$i] . "</td><td> " . $postArray[$i] . "</td></tr>";
    }
    
    echo "</table>";
}



echo "<input type='submit' class='btn' value='Back'>";
echo"</form> </div>";
echo "</body>";

echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>";
?>