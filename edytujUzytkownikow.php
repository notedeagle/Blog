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

<?php include 'menu.php';
include "connection.php";
?>

<?php
if (isset($_GET['str'])) {
    $nr_str = $_GET['str'];
} ?>

<section id="wpis">
    <?php
    if (!isset($nr_str)) {
        include "posty.php";
        echo ('<a href="index.php?str=1">Strona 2</a>');
    } else if (isset($nr_str)) {
        if ($nr_str == '1') {
//                    include "posty.php";
            echo ('<a href="index.php?str=2">Strona 3</a>');
        } else {
            echo ('<a href="index.php?str=3">Strona 4</a>');
        }
    }
    ?>
</section>


<section id="login">
    <?php

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "Najpierw musisz się zalogować!";
        include "logowanie.php";
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        include "logowanie.php";
    }

    if (isset($_SESSION['success'])) : ?>
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
    <?php
    endif;

    ?>
</section>

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

    <?php
    if(isset($_SESSION['username'])) { ?>
        <section id="dodajKomentarz">
            <header>
                <h2>Dodaj komentarz</h2>
                <span class = "error">Wszystkie pola są wymagane</span>
                <br>
                <form method="post" action="walidacja.php">
                    <br><br>
                    Tytuł komentarza: <br>
                    <label>
                        <input type="text" name="tytul">
                    </label>
                    <br><br>
                    Treść: <br>
                    <label>
                        <textarea name="tekst" rows="5" cols="40"></textarea>
                    </label>
                    <br><br>
                    <div class="g-recaptcha" data-sitekey="6Lcb3-EZAAAAAJjrPuqtPF6VdYhZgnQ1uo5OkW_d"></div>
                    <input type="submit" name="potwierdz" value="Wyślij komentarz">
                    <br><br>
                </form>
            </header>
        </section>
        <?php
    }
    ?>
    <article>
        <?php
        include "komentarze.php"
        ?>
    </article>

    <p>Wybierz użytkownika do edycji:</p>
    <?php
    unset($_SESSION['uzytkownik']);
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
        <input type="submit" value="Dalej">
    </form>

</section>
<?php
include 'footer.php';?>

</body>
</html>






