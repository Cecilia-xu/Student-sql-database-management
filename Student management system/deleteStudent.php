<!DOCTYPE html>
<html>
<head>
	<title>
		Welome to INFSCI 2710
	</title>
</head>
<body>
	<?php 
	$servername = "localhost";
    $username = "root";
    $password = "mysql";
    $database = "lab";
    $conn = new mysqli($servername, $username, $password, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    echo "<font color=\"red\"> Connected successfully </font><br><br>";
    // SQL to delete the record
    $ID = $_GET["id"];
    $sql = "DELETE FROM student WHERE id=$ID";
    if ($conn->query($sql) === TRUE){
    	echo "Successfully!<a href=\"selectStudent.php\">Check the result</a>";
    }
    else{
    	echo "Something wrong!<a href=\"selectStudent.php\">Try again</a>";
    }
    //Close connection
    mysqli_close($conn);
	?><br>
</body>
</html>