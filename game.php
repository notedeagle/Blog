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

<nav id="menu">
    <ul>
        <li><a class="active" href="index.php">Strona główna</a></li>
        <li><a href="#">Wpisy</a> </li>
        <li><a href="#">Edukacja</a></li>
        <li><a href="#">GitHub</a></li>
        <li><a href="game.php">Gra</a></li>
        <li style="float:right"><a href="#">O mnie</a></li>
    </ul>
</nav>
<section id="gra">
<?php
Class gra
{
    private static $kolory = array("Pik", "Kier", "Trefl", "Karo");
    private static $karty = array('2', '3', '4', '5', '6', '7', '8', '9', '10', "J", "Q", "K", "A");




    public static function losowanie()
    {
        $talia = array();

        foreach (static::$kolory as $kolor) {
            foreach (static::$karty as $karta) {

                $talia[] = $karta.' - '.$kolor;
            }
        }
        shuffle($talia);

        return $talia;
    }


    public static function graj(array &$talia, &$numery)
    {
        $numer = array_shift($talia);
        $numery[] = $numer;
    }
}
class obliczenie {
    public static function wynik(array $numery) {
        $total = 0;
        foreach ($numery as $numer) {
            $wartosc = explode(' - ', $numer)[0];
            if (is_numeric($wartosc)) {
                $total += $wartosc;
            }
            else if ($wartosc == 'A') {
                $total += 11;
            } else {
                $total += 10;
            }
        }
        return $total;
    }

}

session_start();

if (!isset($_GET['akcja'])) {

    $_SESSION['talia'] = gra::losowanie();
    $_SESSION['gracz'] = array();
    $_SESSION['krupier'] = array();

    gra::graj($_SESSION['talia'], $_SESSION['gracz']);
    gra::graj($_SESSION['talia'], $_SESSION['gracz']);
    gra::graj($_SESSION['talia'], $_SESSION['krupier']);
} else if (isset($_GET['akcja']) && $_GET['akcja'] == 'graj') {
    gra::graj($_SESSION['talia'], $_SESSION['gracz']);
    gra::graj($_SESSION['talia'], $_SESSION['krupier']);
} else if (isset($_GET['akcja']) && $_GET['akcja'] == 'stop') {

    while (obliczenie::wynik($_SESSION['krupier']) < 18) {
        gra::graj($_SESSION['talia'], $_SESSION['krupier']);
    }

    $gracz = obliczenie::wynik($_SESSION['gracz']);
    $krupier = obliczenie::wynik($_SESSION['krupier']);
    $wygrany = 'Krupier';
    $graczprzegral = false;
    $rozdajacyprzegral = false;

    if ($gracz > 21) {
        $graczprzegral = true;
    }

    if ($krupier > 21) {
        $rozdajacyprzegral = true;
    }

    if ($graczprzegral && $rozdajacyprzegral) {
        $wygrany = 'Remis';

    } elseif ((!$graczprzegral && $gracz > $krupier) || $rozdajacyprzegral) {
        $wygrany = 'Gracz';
    }
    ?>
    <section id="wygral">
        <?php
        echo  'Gre wygrywa: '.$wygrany.' 
        <a href="game.php">Restart</a><br/>';
        echo 'Gracz: '.$gracz.', Krupier: '.$krupier. '<br/>';
        ?>
    </section>
    <?php
}
?>
    <section id="wynik">
        Karty gracza: <?= implode(', ', $_SESSION['gracz']) ?><br>
        Karty krupiera: <?= implode(', ', $_SESSION['krupier']) ?><br>
    </section>
    <?php if (!isset($winner)) { ?>
        <section id="przyciski">
            <a id="dalej" href="?akcja=graj">Ciągnij karte</a>
            <a id="stop" href="?akcja=stop">Koniec</a><br/>
        </section>
    <?php } 
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
    <section id="komentarze">
        <header>
            <h2>Dodaj komentarz</h2>
            <span class = "error">Wszystkie pola są wymagane</span>
            <br><br>
            <form method="post" action="komentarz.php""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
</section>

<footer id="stopka">
    <p>Dawid Kluczewski 2020</p>
</footer>
</body>
</html>