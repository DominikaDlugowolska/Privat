<?php
include "./system/conn.php";
include "./system/api.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Art Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
    <div id="sidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php">Homepage</a>
        <a href="gallery-page-v2.php">Gallery</a>
        <a href="#">Leave a comment</a>
        <?php if (isset($_SESSION["user"])) { ?>
        <a href="./system/logout.php">Sign out</a>
        <?php } ?>
    </div>

    <span class="sidenavActivator" onclick="openNav()"><p class="sidenavActivator__text">sidenavActivator</p><p> &#9776;</p></span>

    <div class="container">
        <div class="comments">
            <div class="comments__title">
                <h2>Leave a comment</h2>
            </div>
            <div class="comments__wrapper-page">
            <?php if (isset($_SESSION['user'])) { ?>
                <p>Welcome <?php echo $_SESSION['user']['first'] . " " . $_SESSION['user']['last']?></p>
                
                <div style="grid-column: 1; grid-row: 2" class="form-floating">
                    <form action="#" method="post">
                        <textarea class="form-control" placeholder="Leave a comment here" name="commentText" style="height: 100px"></textarea>
                        <button style="margin-top: 1em">Send</button>
                    </form>
                </div>
            <?php } else { ?>
                <h2>Vänligen logga in</h2>
            <?php } ?>
            <div class="api-div">
                <h2 style="padding-top: 1em; font-weight: bold;">News from the world</h2>
                <?php
                echo "<br>
                      <p style=\"font-size: 20px\">$title</p>
                      <br>
                      <p style=\"font-size: 15px; text-align: left\">$author</p>
                      <p>$content</p>";
                ?>
            </div>
            </div>
        </div>

    <?php 
        
        
        $commentText = filter_input(INPUT_POST, 'commentText', FILTER_SANITIZE_STRING);

        // Om data finns..
        if ($commentText) {
            $fullname = $_SESSION['user']['first'] . " " . $_SESSION['user']['last'];
            // SQL-satsen
            $sql = "INSERT INTO `comments`(user, comment) VALUES ('$fullname', '$commentText')";

            $result = $conn->query($sql);

            // Gick det bra att köra SQL-satsen?
            if (!$result) {
                die("Något blev fel med SQL-satsen");
            } else {
                echo "<p class=\"alert alert-success\" role=\"alert\">Inlägget har registrerats</p>";
            }
            
            // Steg 3: Stänga ned anslutningen
            $conn->close();
        }
        
    ?>
        

    </div>

    <script src="./index.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>