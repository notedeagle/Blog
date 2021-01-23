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

    <?php
    include 'pasekBoczny.php';
    include 'footer.php';?>
</body>
</html>






