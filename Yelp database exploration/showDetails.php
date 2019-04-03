<!DOCTYPE html>
<html>
<head>
    <title>
        Yelp Exploration
    </title>
</head>
<body>
    <?php 
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $database = "yelp_db";
    $conn = new mysqli($servername, $username, $password, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);
    } 
    echo "<font color=\"red\"> Connected successfully </font><br><br>";
    // Get the data
    $name = $_GET["name"];
    // SQL query to call the procedures
    $sql = "select * from business where business.name =\"$name\"";
    $result = $conn->query($sql);
    //Output the searching result
    echo "<table border=\"1\">";
    echo "<tr>
            <td>ID</td>
            <td>Name</td>
            <td>Neighborhood</td>
            <td>Address</td>
            <td>City</td>
            <td>State</td>
            <td>Postal code</td>
            <td>Latitude</td>
            <td>Longitude</td>
            <td>Stars</td>
            <td>Review Count</td>
            <td>IsOpen</td>
        </tr>";
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>".$value."</td>";
            }
            echo "</tr>";
        }
    }
    $result->free();
    echo "</table>";
    // Close connection
    mysqli_close($conn);
    ?><br>
    <a href="index.php">Back to home</a>
</body>
