<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Day & Night Toggle Switch</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link defer rel="stylesheet" href="./css/style.css" />
</head>

<body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php">Homepage</a>
        <a href="#">Gallery</a>
        <a href="comment-page.php">Leave a comment</a>
        <?php if (isset($_SESSION["user"])) { ?>
        <a href="./system/logout.php">Sign out</a>
        <?php } ?>
    </div>

    <span class="menu" onclick="openNav()"><p class="menu-icon">menu</p><p> &#9776;</p></span>

    <div class="container">
        <div class="painting-wrapper">
            <div>
                <p>Girl with a Pearl Earring (Dutch: Meisje met de parel) is an oil painting by Dutch Golden Age painter Johannes Vermeer, dated c. 1665. Going by various names over the centuries, it became known by its present title towards the end of the 20th century after the earring worn by the girl portrayed there.[3] The work has been in the collection of the Mauritshuis in The Hague since 1902 and has been the subject of various literary treatments. In 2006, the Dutch public selected it as the most beautiful painting in the Netherlands.
                <br><br>
                <a href="https://en.wikipedia.org/wiki/Girl_with_a_Pearl_Earring"> Read more on Wikipedia</a>
                </p>
                <img class="img-small" style="height: 25em; width: auto;" src="./bilder/girl-with-a-pearl-earring.jpg" alt="">
            </div>
            <div class="img-small">
                <img style="height: 25em; width: auto;" src="./bilder/sunflowers.jpg" alt="">
                <p>Sunflowers (original title, in French: Tournesols) is the name of two series of still life paintings by the Dutch painter Vincent van Gogh. The first series, executed in Paris in 1887, depicts the flowers lying on the ground, while the second set, made a year later in Arles, shows a bouquet of sunflowers in a vase. In the artist's mind both sets were linked by the name of his friend Paul Gauguin, who acquired two of the Paris versions.
                <br><br>
                <a href="https://en.wikipedia.org/wiki/Sunflowers_(Van_Gogh_series)"> Read more on Wikipedia</a>
                </p>
            </div>
            <div class="img-left">
                <p>Dutch Post-Impressionist painter Vincent van Gogh painted a self-portrait in oil on canvas in September 1889. The work, which may have been Van Gogh's last self-portrait, was painted shortly before he left Saint-Rémy-de-Provence in southern France.
                <br><br>
                <a href="https://en.wikipedia.org/wiki/Van_Gogh_self-portrait_(1889)"> Read more on Wikipedia</a>
                </p>
                <img style="height: 25em; width: auto;" src="./bilder/vincent-van-gogh-selfportrait.jpg" alt="">
            </div>
            <div>
                <img src="./bilder/creation-of-adam.jpg" alt="">
                <p>The Creation of Adam (Italian: Creazione di Adamo) is a fresco painting by Italian artist Michelangelo, which forms part of the Sistine Chapel's ceiling, painted c. 1508–1512. It illustrates the Biblical creation narrative from the Book of Genesis in which God gives life to Adam, the first man.
                <br><br>
                <a href="https://en.wikipedia.org/wiki/The_Creation_of_Adam"> Read more on Wikipedia</a>
                </p>
            </div>
        </div>

    </div>
    <script src="./toggle.js"></script>
</body>

</html>