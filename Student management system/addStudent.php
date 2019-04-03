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
    // Get the data
    $id = $_POST["ID"];
    $name = $_POST["name"];
    $dept = $_POST["dept_name"];
    $tot = $_POST["tot_cred"];
    // Input SQL query and insert the data
    $sql = "INSERT INTO student(ID, name, dept_name,tot_cred) VALUES ('$id','$name','$dept','$tot')";
    if ($conn->query($sql) === TRUE){
    	echo "Successful!<a href=\"selectStudent.php\">Check the result</a>";
    }
    else{
    	echo "Something wrong!<a href=\"addStudent.html\">Try again</a>";
    }
    //Close connection
    mysqli_close($conn);
	?><br>
</body>
</html>