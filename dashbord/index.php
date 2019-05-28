<?php
session_start();
// script delete from data base
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "abdelilah";
$conn =  mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
// take the get methode from the boocle while 
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['id'])) {
        // we get the id from <a href="dashbord.php?id= <?php $row['id'];"> line presque 125
        $id = (int)($_GET['id']);
        $delete = "DELETE FROM portefolio WHERE id= $id";
        if (mysqli_query($conn, $delete)) { } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>
        Overview &middot;
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
    <link href="assets/css/toolkit-inverse.css" rel="stylesheet">
    <link href="assets/css/application.css" rel="stylesheet">
    <style>
        /* note: this is a hack for ios iframe for bootstrap themes shopify page */
        /* this chunk of css is not part of the toolkit :) */
        body {
            width: 1px;
            min-width: 100%;
            *width: 100%;
        }
    </style>
</head>


<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 sidebar">
                <nav class="sidebar-nav">
                    <div class="sidebar-header">
                        <button class="nav-toggler nav-toggler-sm sidebar-toggler" type="button" data-toggle="collapse" data-target="#nav-toggleable-sm">
                            <span class="sr-only">Toggle nav</span>
                        </button>
                        <a class="sidebar-brand img-responsive" href="index.html">
                            <span class="icon icon-leaf sidebar-brand-icon"></span>
                        </a>
                    </div>

                    <div class="collapse nav-toggleable-sm" id="nav-toggleable-sm">
                        <form class="sidebar-form">
                            <input class="form-control" type="text" placeholder="Search...">
                            <button type="submit" class="btn-link">
                                <span class="icon icon-magnifying-glass"></span>
                            </button>
                        </form>
                        <ul class="nav nav-pills nav-stacked">
                            <!-- <li class="nav-header">Dashboards</li> -->
                            <li class="active ml-5">
                                <a href="index.php">Overview</a>
                            </li>
                            <li>
                                <a href="order-history/index.html" class="ml-5">Order history</a>
                            </li>
                            <!-- <li>
                                <a href="fluid/index.html">Fluid layout</a>
                            </li> -->
                            <li>
                                <a href="icon-nav/index.html" class="ml-5">Icon nav</a>
                            </li>

                            <!-- <li class="nav-header">More</li> -->
                            <li class="ml-5">
                                <a href="docs/index.html">
                                    Toolkit docs
                                </a>
                            </li>
                            <li class="ml-5">
                                <a href="http://getbootstrap.com" target="blank">
                                    Bootstrap docs
                                </a>
                            </li>
                            <!-- <li>
                                <a href="light/index.html">Light UI</a>
                            </li> -->
                            <li class="ml-5">
                                <a href="#docsModal" data-toggle="modal">
                                    Example modal
                                </a>
                            </li>
                        </ul>
                        <hr class="visible-xs m-t">
                    </div>
                </nav>
            </div>
            <div class="col-sm-9 content">
                <div class="dashhead">
                    <div class="dashhead-titles">
                        <h6 class="dashhead-subtitle">Dashboards</h6>
                        <h2 class="dashhead-title">Overview</h2>
                    </div>

                    <div class="btn-toolbar dashhead-toolbar">
                        <div class="btn-toolbar-item input-with-icon">
                            <input type="text" value="01/01/15 - 01/08/15" class="form-control" data-provide="datepicker">
                            <span class="icon icon-calendar"></span>
                        </div>
                    </div>
                </div>

                <hr class="m-t">
                <div class="btn btn-outline-success" style="margin:20px;">
                    <a href="confingDashbord/addproject.php">Add product</a>
                </div>

                <?php
                // coonect with data base to show the result 
                $host = "localhost";
                $dbUsername = "root";
                $dbPassword = "";
                $dbName = "abdelilah";
                $conn =  mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } else {
                    $sql = "SELECT  image,lienGithub,id FROM portefolio";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) { ?>
                        <div class='row'>
                            <?php
                            // bookle while for show the data in dashbord 
                            while ($row = $result->fetch_assoc()) { ?>
                                <div class="col-sm-12 col-lg-4 mb-4  ">

                                    <div class="card" style="width: 23rem;">
                                        <img src="<?php echo "../" . $row['image'] ?>" class="card-img-top" alt="...">
                                        <div class="card-body">

                                            <a href="<?php echo $row['lienGithub'] ?>" class="btn btn-primary">Go to Github</a>
                                        </div>
                                    </div>
                                    <div class="btn btn-outline-danger">
                                        <a href="index.php?id=<?= $row['id']; ?>"> delete</a>
                                    </div>
                                    <!-- btn to update data from data base  -->
                                    <div class="btn btn-outline-success"><a href="confingDashbord/update.php?id=<?= $row['id']; ?>">
                                            update</a>
                                    </div>
                                </div>

                            <?php
                        } ?>
                        </div>
                    <?php
                } else {
                    echo "0 results";
                }
                $result->close();
            }
            ?>

                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                <script src="assets/js/jquery.min.js"></script>
                <script src="assets/js/chart.js"></script>
                <script src="assets/js/tablesorter.min.js"></script>
                <script src="assets/js/toolkit.js"></script>
                <script src="assets/js/application.js"></script>
                <script>
                    // execute/clear BS loaders for docs
                    $(function() {
                        while (window.BS && window.BS.loader && window.BS.loader.length) {
                            (window.BS.loader.pop())()
                        }
                    })
                </script>
</body>

</html>