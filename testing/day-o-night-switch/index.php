
<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    ?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Art Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body id="body">
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">Homepage</a>
        <a href="gallery-page-v2.php">Gallery</a>
        <a href="comment-page.php">Leave a comment</a>
        <?php if (isset($_SESSION["user"])) { ?>
        <a href="./system/logout.php">Sign out</a>
        <?php } ?>
    </div>

    <span class="menu" onclick="openNav()"><p class="menu-icon">menu</p><p> &#9776;</p></span>

    <div class="container">
        <div class="main-wrapper">
            <span class="toggle"></span>
             <span class="wave"></span>

            <div class="title-wrapper light animate__animated animate__fadeInLeft">
                <h1 id="header">Welcome</h1>
                <h2 id="undertext">to the online art gallery</h2>
            </div>

            <div class="homepage-grid">
                <div class="homepage-img"></div>
                <div class="homepage-img2"></div>
            </div>
        </div>
        <div class="comment-section-wrapper">
            <div class="comment-header">
                <h2>Recent Comments</h2>
            </div>
            <div class="comment-grid">
                
            </div>
        </div>

        <div class="login-wrapper">
          <h2>Want to leave a comment? Sign in or sign up.</h2>
            <!-- Button trigger modal -->
<button type="button" id="signUpBtn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signUpModal">
    Sign Up
  </button>
  
  <!-- Modal -->
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

  <button type="button" id="signInBtn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signInModal">
    Sign In
  </button>
  
  <!-- Modal -->
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

    <script src="toggle.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script defer>
       /*
       // call ajax
        var ajax = new XMLHttpRequest();
        var method = "GET";
        var url = "comments.php";
        var asynchronous = true;

        ajax.open(method, url, asynchronous);
        // sending ajax request
        ajax.send();

        // receiving response from php
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // converting JSON back to array
                var data = JSON.parse(this.responseText);
                console.log(data);


                var html = "";
                for (let a = 0; a < data.length; a++) {
                    var user = data[a].user;
                    var comment = data[a].comment;

                    html += "<div class=\"comment\">";
                    html += "<div class=\"user-title\">" + user + "</div>";
                    html += "<br>";
                    html += comment;
                    html += "</div>";
                }
                console.log(html);
                document.querySelector(".comment-grid").innerHTML = html;
                //document.querySelector("#header").innerHTML = 'hejhej';
            }
        } */

        fetch("./system/comments.php")
            .then(response => response.json())
            .then(data => {
                var html = "";
                for (let a = 0; a < data.length; a++) {
                    var user = data[a].user;
                    var comment = data[a].comment;

                    html += "<div class=\"comment\">";
                    html += "<div class=\"user-title\">" + user + "</div>";
                    html += "<br>";
                    html += comment;
                    html += "</div>";
                }
                document.querySelector(".comment-grid").innerHTML = html;
            })
    </script>
</body>

</html>