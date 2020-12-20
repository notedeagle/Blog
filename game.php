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

<?php
include "menu.php";
?>
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

<?php
include "pasekBoczny.php";

include "footer.php";
?>
</body>
</html>