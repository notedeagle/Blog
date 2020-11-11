<!DOCTYPE html>
<html lang="en">
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
            <li><a class="active" href="#">Strona główna</a></li>
            <li><a href="#">Wpisy</a> </li>
            <li><a href="#">Edukacja</a></li>
            <li><a href="#">GitHub</a></li>
            <li style="float:right"><a href="#">O mnie</a></li>
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
    </section>

    <section id="komentarze">
        <header>
            <h2>Dodaj komentarz</h2>
            <span class = "error">Wszystkie pola są wymagane</span>
            <br><br>
            <form method="post" action="test.php""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                Nick:
                <label>
                    <input type="text" name="nick">
                </label>
                <br><br>
                Email:
                <label>
                    <input type="email" name="email">
                </label>
                <br><br>
                Treść:
                <label>
                    <textarea name="tekst" rows="5" cols="40"></textarea>
                </label>
                <br><br>
                <div class="g-recaptcha" data-sitekey="6Lcb3-EZAAAAAJjrPuqtPF6VdYhZgnQ1uo5OkW_d"></div>
                <input type="submit" name="potwierdz" value="Wyślij komentarz">
                <br><br>
        </header>
    </section>
    <footer id="stopka">
        <p>Dawid Kluczewski 2020</p>
    </footer>
</body>
</html>






