<?php
$servername = "localhost";
      $username = "root";
      $password = "mysql";
      $database = "yelp_db";
      $conn = new mysqli($servername, $username, $password, $database);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 
      $sql = "";
      switch($_GET[action]){
        case 'mon_dis':$sql = "SELECT MONTH(r.date) AS n, COUNT(*) AS t FROM review r WHERE YEAR(date) = '2017' GROUP BY n;";
        break;
        case 'ann_dis':$sql = "SELECT YEAR(r.date) AS n, COUNT(*) AS t FROM review r GROUP BY n;";
        break;
        case 'cer_dis':$sql = "SELECT MONTH(r.date) AS n,COUNT(*) AS t from review r Join business b ON b.id = r.business_id WHERE YEAR(r.date) = '2017' AND b.name = 'Primal Brewery' GROUP BY n;";
        break;
        default: $sql = "SELECT MONTH(r.date) AS n, COUNT(*) AS t FROM review r WHERE YEAR(date) = '2017' GROUP BY n;";
      }
      $result = $conn->query($sql);
      $output = "letter\tfrequency\n";
      if ($result) {
        while ($row = $result->fetch_assoc()) {
          $output .= $row['n'] . "\t" . $row['t'] . "\n";
          }
        }
        $result->free();
        echo $output;
        // Close connection
        mysqli_close($conn);
?>