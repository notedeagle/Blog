<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<meta name="decription" content="Mój blog">
<meta name="keywords” content=" blog, lifestyle, Dawid, Kluczewski, informatyka”>
<meta name="author" content="Dawid Kluczewski">
<style>
    .error {color:red;}
</style>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<head>
    <meta charset="UTF-8">
    <title>Dawid Kluczewski</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<header id="naglowek">
    <p>Tu jest naglowek</p>
</header>

<nav id="menu">
    <ul>
        <li><a class="active" href="index.php">Strona główna</a></li>
        <li><a href="#">Wpisy</a> </li>
        <li><a href="#">Edukacja</a></li>
        <li><a href="#">GitHub</a></li>
        <li><a href="game.php">Gra</a></li>
        <li style="float:right"><a href="#">O mnie</a></li>
        <?php  if (!isset($_SESSION['username'])) : ?>
            <li style="float: right"><a href="index.php">Zaloguj się</a> </li>
        <?php endif ?>
    </ul>
</nav>

<?php

if (isset($_GET['str'])) {
    $nr_str = $_GET['str'];
}

if (!isset($nr_str)) {
    echo ('<a href="index.php?str=1">Strona 2</a>');
} else if (isset($nr_str)) {
    if ($nr_str == '1') {
        echo ('<a href="index.php?str=2">Strona 2</a>');?>
        <section id="wpis">
            <article>
                <header>
                    <h2>Tu coś kiedyś będzie :)</h2>
                </header>
                <section>
                    <p>
                        Tu też coś kiedyś będzie
                    </p>
                </section>
            </article>
        </section>
        <?php
    } else {
        echo ('<a href="index.php?str=3">Strona 3</a>');?>
        <section id="wpis">
            <article>
                <header>
                    <h2>Tu też coś kiedyś będzie :)</h2>
                </header>
                <section>
                    <p>
                        Tu też coś kiedyś będzie... chyba
                    </p>
                </section>
            </article>
        </section>
        <?php
    }
}
?>

<section id="wpis">
    <?php

    $tresc = 'Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst
                    Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst
                    Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst';

    $tytul = array("Tytul 1", "Tytul 2", "Tytul 3", "Tytul 4", "Tytul 5", "Tytul 6", "Tytul 7", "Tytul 8");

    foreach ($tytul as $i) { ?>
        <article>
            <header>
                <h2>
                    <?php
                    echo "$i";
                    ?>
                </h2>
            </header>
            <section>
                <p>
                    <?php
                    echo $tresc;
                    ?>
                </p>
            </section>
        </article>
    <?php } ?>
</section>

<?php
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Najpierw musisz się zalogować!"; ?>
    <section id="rejestrajca">
    <header>
        <h2>Zarejestruj się</h2>
        <span class = "error">Wszystkie pola są wymagane</span>
        <br><br>
        <form method="post" action="register.php""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Nick:
        <label>
            <input type="text" name="nick">
        </label>
        <br><br>
    E-mail:
        <label>
            <input type="email" name="email">
        </label>
        <br><br>
    Hasło:
        <label>
            <input type="password" name="haslo1">
        </label>
        <br><br>
    Powtórz hasło:
        <label>
            <input type="password" name="haslo2">
        </label>
        <br><br>
        <input type="submit" name="zarejestruj" value="Zarejestruj się">
        <br><br>
    </header>
</section>
<?php
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    $_SESSION['msg'] = "Najpierw musisz się zalogować!"; ?>
    <section id="rejestrajca">
        <header>
            <h2>Zarejestruj się</h2>
            <span class = "error">Wszystkie pola są wymagane</span>
            <br><br>
            <form method="post" action="register.php""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Nick:
            <label>
                <input type="text" name="nick">
            </label>
            <br><br>
            E-mail:
            <label>
                <input type="email" name="email">
            </label>
            <br><br>
            Hasło:
            <label>
                <input type="password" name="haslo1">
            </label>
            <br><br>
            Powtórz hasło:
            <label>
                <input type="password" name="haslo2">
            </label>
            <br><br>
            <input type="submit" name="zarejestruj" value="Zarejestruj się">
            <br><br>
        </header>
    </section>
    <?php
}?>

<div class="content">
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>

    <?php  if (isset($_SESSION['username'])) : ?>
        <p>Witaj <strong><?php echo $_SESSION['username']; ?></strong></p>
        <p> <a href="index.php?logout='1'" style="color: red;">Wyloguj</a> </p>
    <?php endif ?>
</div>

<?php
include 'pasekBoczny.php';
?>
<?php include 'footer.php';?>
</body>
</html>










