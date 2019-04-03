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
    $word = $_POST["word"];
    // SQL query to call the procedures
    $sql = "select business.name, review.text from business join review on business.id=review.business_id where review.text like '%$word%' limit 25";
    $result = $conn->query($sql);    
    //Output the searching result
    echo "<table border=\"1\">";
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><a href=\"showDetails.php?name={$row['name']}\">Show details</a></td>";
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
