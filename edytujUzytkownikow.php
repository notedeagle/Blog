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

<?php include 'menu.php';?>

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
    $_SESSION['msg'] = "Najpierw musisz się zalogować!";
    include "logowanie.php";
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    include "logowanie.php";
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
<section id="pasekBoczny">
    <article id="calendar">
        <p>Data/Godzina: <span id="datetime"></span></p>

        <script>
            let dt = new Date();
            document.getElementById("datetime").innerHTML = (("0"+dt.getDate()).slice(-2)) +"."+ (("0"+(dt.getMonth()+1)).slice(-2)) +"."+ (dt.getFullYear()) +" "+ (("0"+dt.getHours()).slice(-2)) +":"+ (("0"+dt.getMinutes()).slice(-2));
        </script>
    </article>

    <article id="link">
        <header>
            <h2>Tu mnie znajdziesz</h2>
        </header>
        <p>
            <a href="#">Github</a>
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">E-mail</a>
        </p>
    </article>

    <article id="archiwum">
        <header>
            <h2>
                Archiwum
            </h2>
        </header>
        <p>
            Tu
            będzie
            archiwium
            wpisów
        </p>
    </article>
    <p>Wybierz użytkownika do edycji:</p>
    <?php
    unset($_SESSION['uzytkownik']);
    include "connection.php";
    $conn = openConn();
    $sql = "SELECT nick, rola FROM uzytkownik";
    $result = mysqli_query($conn, $sql);
    ?>
    <form action="zapiszWybranego.php" method="post">
        <select name="somename">
            <?php while($row1 = mysqli_fetch_array($result)):;?>
                <option value="<?php echo $row1[0];?>"><?php echo $row1[0];?> - <?php echo $row1[1]?></option>
            <?php
            endwhile; ?>
        </select>
        <input type="submit">
    </form>
</section>
<?php include 'footer.php';?>
</body>
</html>



