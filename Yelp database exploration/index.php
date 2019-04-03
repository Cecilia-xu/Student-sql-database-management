<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Yelp Exploration</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  		<a class="navbar-brand" href="#">Explore in yelp</a>

    <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
      <input class="form-control mr-lg-8" type="search" placeholder="What do you want to search in yelp database" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Business<span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="select in yelp.html">
                  <span data-feather="users"></span>
                  The most popular restaurant
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="select in yelp.html">
                  <span data-feather="layers"></span>
                  Top 5 best Hair Salons in PA
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./viz.php?action=mon_dis">
                  <span data-feather="bar-chart-2"></span>
                  Dashboard
                </a>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <h2>Browse businesses in Pittsburgh</h2>
          <div class="table-responsive">
            <?php 
            $servername = "localhost";
            $username = "root";
            $password = "mysql";
            $database = "yelp_db";
            $conn = new mysqli($servername, $username, $password, $database);
            //Input SQL query and get the searching result
            $sql = "SELECT name,address,stars,review_count,category.category FROM business join category on business.id=category.business_id where city=\"Pittsburgh\" ";
            $result = $conn->query($sql);
            
            echo"<table class= \"table table-striped table-sm\">";
              echo"<thead>";
                echo"<tr>";
                  echo"<th>Name</th>";
                  echo"<th>Address</th>";
                  echo"<th>Stars</th>";
                  echo"<th>Review_count</th>";
                  echo"<th>Category</th>";
                echo"</tr>";
              echo"</thead>";
              echo"<tbody>";
              
                  if ($result) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    foreach ($row as $value) {
                      echo "<td>".$value."</td>";
                    }
                    echo "</tr>";
                    }
                }
               

                 // Close connection
                mysqli_close($conn);
                ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script> 
  </body>
</html>