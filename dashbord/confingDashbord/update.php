<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update product</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/contact.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-3 text-secondary">UP DATE THIS ITEM</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="controle-form" method="post">
            <input type="text" name="lienGithub" placeholder="Type lien of Github" class="form-control">
            <input type="file" name="image" class="my-4">
            <input type="submit" class="btn btn-primary btn-block" name="submit" value="Valid">
            <i class="fas fa-paper-plane "></i>
        </form>
    </div>
    <?php
    // will get the id with the methode GET lock to the url you will see the id 
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $_SESSION["id"] = $_GET['id'];
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $image = $_POST["image"];
        $lienGithub = $_POST["lienGithub"];
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "abdelilah";
        $conn =  mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            if (!empty($image)) {
                $sql = "UPDATE portefolio SET image='$image' WHERE id='" . $_SESSION['id'] . "'";
                if ($conn->query($sql) === TRUE) { }
            } elseif (!empty($$lienGithub)) {
                $sql = "UPDATE portefolio SET lienGithub='$lienGithub' WHERE id='" . $_SESSION['id'] . "'";
                if ($conn->query($sql) === TRUE) { }
            } else {
                echo "<script> alert(\"There is some errors\")</script>";
                if ($conn->query($sql) === TRUE) { }
            }
            $conn->close();
            session_unset($_SESSION['id']);
            header('Location: ../index.php');
        }
    }
    // }

    ?>
    <!-- bootstrap CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>




</body>

</html>