<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../styles/registr.css">
    <title>Registration</title>
</head>
<body>
    <div class="fixed">
        <header id="header">
            <a class="logo" href="#">Registration</a>
            <div class="link-container">
                <div class="pages">
                    <a class="buts" href="../index.html">Home</a>
                    <a class="buts" href="../pages/Aboutme.html">About me</a>
                    <a class="buts" href="../pages/Hobbies.html">Hobbies</a>
                    <a class="buts" href="../pages/Gallery.html">Gallery</a>
                    <a class="buts" href="#">Registr</a>
                </div>
                <div class="soc">
                    <a class="social" target="blank" href="https://www.instagram.com/tomasaxuuu/"><img src="../IMG/inst.png" width="25" height="25"></a>
                    <a class="social" target="blank" href="https://vk.com/tomasaxuuu"><img src="../IMG/vk.png" width="25" height="25"></a>
                    <a class="social" target="blank" href="https://open.spotify.com/user/5uh6ik7nbma6wbpaiq9ljr3i9"><img src="../IMG/spoty.png" width="25" height="25"></a>
                </div>
                <div class="url"><a href="../pages/Links.html">Links</a></div>
            </div>
        </header>
    </div>
    <main>
    <!-- Форма авторизации -->
    <form action="" method="">
        <h1>Регистрация</h1>
        <label>ФИО</label>
        <input type="text" placeholder="Введите имя">
        <label>Почта</label>
        <input type="email" placeholder="Введите почту">
        <label>Аватар</label>
        <input type="file">
        <label>Логин</label>
        <input type="text" placeholder="Введите логин">
        <label>Пароль</label>
        <input type="password" placeholder="Введите пароль">
        <label>Подтвердите пароль</label>
        <input type="password" placeholder="Введите пароль еще раз">
        <button>Войти</button>
        <p>
        Уже есть аккаунт? <a href="./auth.php">Авторизироваться</a>
        </p>
    </form>
    </main>
</body>
</html>