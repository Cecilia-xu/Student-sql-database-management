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
    $date_s = $_POST["date_s"];
    $date_l = $_POST["date_l"];
    $date1 = $_POST["date1"];
    $date2 = $_POST["date2"];
    // SQL query to call the procedures
    if  ($date_s!="" && $date_l != ""){
        $sql1 = "call `the_most_popular_res`('$date_s','$date_l')";
        $result = $conn->query($sql1);
    }    
    else {
        $sql2 = "call `top5_hair_salons_in_pa`('$date1','$date2')";
        $result = $conn->query($sql2);
    }    
    //Output the searching result
    echo "<table border=\"1\">";
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            //Add details buttons
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
    <a href="index.php"></a>
</body>
