<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$userIsLoggedIn = isset($_SESSION["user"]);
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Art Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body id="body">
    <!-- SIDENAV -->
    <div id="sidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">Homepage</a>
        <a href="gallery-page-v2.php">Gallery</a>
        <a href="comment-page.php">Leave a comment</a>
        <?php if ($userIsLoggedIn) { ?>
            <a href="./system/logout.php">Sign out</a>
        <?php } ?>
    </div>

    <!-- SIDENAV ACTIVATOR -->
    <span class="sidenavActivator" onclick="openNav()">
        <p class="sidenavActivator__text">Menu</p>
        <p> &#9776;</p>
    </span>

    <div class="container">
        <div class="container__header">

            <!-- LIGHT BUTTON -->
            <span class="toggle"></span>
            <span class="wave"></span>

            <!-- WEB TITLE -->
            <div class="title-wrapper light animate__animated animate__fadeInLeft">
                <h1 id="header">Welcome</h1>
                <h2 id="undertext">to the online art gallery</h2>
            </div>

            <!-- IMAGES -->
            <div class="homepage-grid">
                <div class="homepage-img"></div>
                <div class="homepage-img2"></div>
            </div>
        </div>

        <!-- COMMENTS -->
        <div class="comments">
            <div class="comments__title">
                <h2>Recent Comments</h2>
            </div>
            <div class="comments__wrapper"></div>
        </div>

        <!-- LOGIN REGISTER -->
        <div class="login">
            <h2>Want to leave a comment? Sign in or sign up.</h2>

            <button type="button" id="signUpBtn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signUpModal">
                Sign Up
            </button>
            <button type="button" id="signInBtn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signInModal">
                Sign In
            </button>

            <!-- MODALS -->
            <div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="signUpModalLabel">Sign Up</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="./system/register.php" method="post">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="name@example.com">
                                    <label for="email">Email address</label>
                                </div>

                                <div class="row form-floating mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control" name="firstName" placeholder="First name" aria-label="First name">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="lastName" placeholder="Last name" aria-label="Last name">
                                    </div>
                                </div>

                                <div class="form-floating">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <label for="password">Password</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" id="registerBtn" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="signInModalLabel">Sign In</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="./system/login.php" method="POST">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="name@example.com">
                                    <label for="email">Email address</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="password2" placeholder="Password">
                                    <label for="password2">Password</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="index.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script defer>
        // fetch comments
        fetch("./system/comments.php")
            .then(response => response.json())
            .then(data => {

                let commentsHTML = "";
                for (let a = 0; a < data.length; a++) {

                    const userName = data[a].user;
                    const comment = data[a].comment;

                    commentsHTML += "<div class=\"comment\">";
                    commentsHTML += "<div class=\"user-title\">" + userName + "</div>";
                    commentsHTML += "<br>";
                    commentsHTML += comment;
                    commentsHTML += "</div>";
                }

                document.querySelector(".comments__wrapper").innerHTML = commentsHTML;
            })
    </script>
</body>

</html>