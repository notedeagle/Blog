<!DOCTYPE html>
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

    <?php include 'pasekBoczny.php';?>

    <?php include 'footer.php';?>
</body>
</html>






