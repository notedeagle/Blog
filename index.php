<!DOCTYPE html>
<html lang="en">
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
                var dt = new Date();
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

    <footer id="stopka">
        <p>Dawid Kluczewski 2020</p>
    </footer>
</body>
</html>