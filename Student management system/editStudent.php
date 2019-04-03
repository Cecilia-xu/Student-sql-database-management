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
    // SQL to select the record that we want to update
    $ID = $_GET["id"];
    $sql = "SELECT * FROM student WHERE id=$ID";
    $result = $conn->query($sql);
    //Initailize variables
    $name = " ";
    $dept = " ";
    $tot_cred = 0;
    //Assign values from the row selected
    if ($result) {
    	while($row = $result->fetch_assoc()) {
        	$ID = $row["ID"];
        	$name = $row["name"];
        	$dept = $row["dept_name"];
        	$tot_cred = $row["tot_cred"];
    	}
    }
    //Close connection
    mysqli_close($conn);
	?><br>
	<!--edit the student info-->
	Add new student:<br>
	<br>
	<form  action=<?php echo "updateStudent.php?id=".$ID ?> method="post">
		Name: <input type="text" name="name" value=<?php echo $name;?>><br>
		Department:
		<select name="dept_name">
			<?php echo "<option value=\"$dept\">$dept</option>";?>
			<option value="Comp. Sci.">Comp. Sci.</option>
			<option value="History">History</option>
			<option value="Finance">Finance</option>
			<option value="Physics">Physics</option>
			<option value="Music">Music</option>
			<option value="Elec. Eng.">Elec. Eng.</option>
			<option value="Biology">Biology</option>
		</select><br>
		Credit: <input type="text" name="tot_cred" value=<?php echo $tot_cred;?>><br>
		<input type="submit" value="Submit"/>
	</form>
</body>
</html>