<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/GalleryStyles.css">
    <title>Gallery</title>
</head>
<body>
    <div class="fixed">
        <header id="header">
            <a class="logo" href="#">Gallery</a>
            <div class="burger"><img src="../IMG/menu.png"></div>
            <div class="link-container">
                <div class="pages">
                <a class="buts" href="../index.html">Home</a>
                    <a class="buts" href="../pages/Aboutme.php">About me</a>
                    <a class="buts" href="../pages/Hobbies.php">Hobbies</a>
                    <a class="buts" href="../pages/Gallery.php">Gallery</a>
                    <a class="buts" href="../template/profile.php">Profile</a>
                </div>
                <div class="soc">
                    <a class="social" target="blank" href="https://www.instagram.com/tomasaxuuu/"><img src="../IMG/inst.png" width="25" height="25"></a>
                    <a class="social" target="blank" href="https://vk.com/tomasaxuuu"><img src="../IMG/vk.png" width="25" height="25"></a>
                    <a class="social" target="blank" href="https://open.spotify.com/user/5uh6ik7nbma6wbpaiq9ljr3i9"><img src="../IMG/spoty.png" width="25" height="25"></a>
                </div>
                <div class="url"><a href="../pages/Links.php">Links</a></div>
            </div>
        </header>
    </div>
    <main>
        <div class="content">
            <div class="slider">
                <div class="slider_container">
                    <div class="slide"><img src="../IMG/1.jpg" width="700" height="700"></div>
                    <div class="slide"><img src="../IMG/2.jpg" width="700" height="700"></div>
                    <div class="slide"><img src="../IMG/3.jpg" width="700" height="700"></div>
                    <div class="slide"><img src="../IMG/4.jpg" width="700" height="700"></div>
                    <div class="slide"><img src="../IMG/9.jpg" width="700" height="700"></div>
                    <div class="slide"><img src="../IMG/6.jpg" width="700" height="700"></div>
                    <div class="slide"><img src="../IMG/7.jpg" width="700" height="700"></div>
                    <div class="slide"><img src="../IMG/8.jpg" width="700" height="700"></div>
                    <div class="slide"><img src="../IMG/5.jpg" width="700" height="700"></div>
                </div>
                <a href="#" class="slider_navigation prev" data-dir="aprev"><img src="../IMG/prev.png" height="55" width="55"></a>
                <a href="#" class="slider_navigation next" data-dir="anext"><img src="../IMG/next.png" height="55" width="55"></a>
            </div>
        </div>
    </main>
    <script src="../scripts/GalleryScript.js"></script>
</body>
</html>