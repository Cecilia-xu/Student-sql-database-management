<!DOCTYPE html>
<html>
<head>
	<title>
		Welome to INFSCI 2710
	</title>
</head>
<body>
    <a href="addStudent.html">Add New Student</a><br>
    <br>
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
    //Input SQL query and get the searching result
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);
    //Initialize $count(represent student number) and $sumCredit (represent the sum of tot_cred)
    $count = 0;
    $sumCredit = 0;
    //Output the searching result
    echo "<table border=\"1\">";
    if ($result) {
        while ($row = $result->fetch_assoc()) {
        	echo "<tr>";
            //Add delete button
            echo "<td><a href=\"deleteStudent.php?id={$row['ID']}\">Delete</a></td>";
            //Add edit button
            echo "<td><a href=\"editStudent.php?id={$row['ID']}\">Edit</a></td>";
        	foreach ($row as $value) {
        		echo "<td>".$value."</td>";
        	}
        	echo "</tr>";
        	$count++;
        	$sumCredit+= $row["tot_cred"];
        }
    }
    $result->free();
    echo "</table>";
    // Close connection
    mysqli_close($conn);
	?><br>
    
    The total number of students are
    <?php
    echo $count."<br>";
    ?><br>
    The average grade of student are
    <?php
    echo $sumCredit/$count;
    ?>
</body>
</html>