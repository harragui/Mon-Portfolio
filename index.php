<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--logo cv-->
    <link rel="icon" href="images//cv.jpg" type="image">
    <title>MON CV</title>

    <link rel="stylesheet" href="index.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
        <div class="container">

            <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">A propos de
                            moi</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#skills">Compétences</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Portfolio</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#education">Educations</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contacter
                            moi</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="login.php">login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--button-->
    <section id="about" class="container-fluid">
        <div class="col-xs-8 col-md-4 profile-picture"><img src="images//1.png" alt="moi" class="img-circle">
            <h1>Hello,c'est moi Abdel-ilah</h1>
            <h3>Développeur Web</h3><a href="HARRAGUI ABDEL.pdf" class="button1">Télécharger CV</a>
        </div>
    </section>
    <!--Compétences-->
    <section id="skills">
        <div class="red-divider"></div>
        <div class="heading">
            <h2>Compétences</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width:85% ; background: #43f93d;">
                            <h5>HTML <span>85</span>%</h5>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="50" style="width:65%; background: #61eb11;">
                            <h5>CSS <span>65</span>%</h5>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="10" style="width:60%; background: #11ebaa;">
                            <h5>BOOTSTRAP <span>60</span>%</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width:60%; background: #11ebaa;">
                            <h5>JAVASCRIPT <span>60</span>%</h5>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="50" style="width:30%; background: #eb4411;">
                            <h5>PHP <span>30</span>%</h5>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="10" style="width:30%; background: #eb4411;">
                            <h5>SQL <span>30</span>%</h5>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!--portfolio-->

    <section id="portfolio">
        <h2 style="text-align: center;">Portfolio </h2>
        <div id="slider">
            <a href="#slider ul" class="control_next">></a>
            <a href="#slider ul" class="control_prev"></a>
            <ul>

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
                                <li> <a class="thumbnail" href="<?php echo $row['lienGithub'] ?>" target="_blank"><img src="<?php echo  $row['image'] ?>" alt="" width="90%"></a></li>
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
        </div>

        <div class="slider_option">
            <input type="checkbox" id="checkbox">
            <label for="checkbox">Autoplay</label>
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <!--education-->


        <section id="education">
            <div class="container">
                <div class="white-divider"></div>
                <div class="heading">
                    <h2>Educations</h2>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="education-block">
                            <h5>2012-2013</h5>
                            <span class="glyphicon glyphicon-education"></span>
                            <h3>lycee Ibn Abdoun</h3>
                            <h4>baccalauriat</h4>
                            <div class="red-divider"></div>
                            <p>SVT</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="education-block">
                            <h5>2017-2018</h5>
                            <span class="glyphicon glyphicon-education"></span>
                            <h3>FPK</h3>
                            <h4>licence</h4>
                            <div class="red-divider"></div>
                            <p>SEG</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--contact-->

        <?php include "contact.php"; ?>
        <!-- Footer -->
        <!-- Social buttons -->
        <footer>
            <ul class="list-unstyled list-inline text-center">

                <li class="list-inline-item">
                    <a href="https://gitlab.com/aharragui?nav_source=navbar" target="_blank"><i class="fab fa-gitlab"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="https://github.com/harragui" target="_blank"><i class="fab fa-github"></i></a>
                </li>
            </ul>
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2018 Copyright: <strong>HARRAGUI ABDEL-ILAH</strong>
            </div>
        </footer>
        <!-- Optional JavaScript -->
        <script src="index.js"></script>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
</body>

</html>