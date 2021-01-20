<?php
$liczby = $_POST['name'];
$n = $_POST['n'];

if($n % 2 != 0) {
    echo '<script>alert("Podana liczba musi być parzysta!")</script>';
} else {
    $tablica = explode(';', $liczby);
    foreach ($tablica as $liczba) {
        if ($liczba < 0 || $liczba > 100) {
            echo '<script>alert("Podane liczby muszą być z zakresu [0-100]!")</script>';
            return 0;
        }
    }
    wyswietl($tablica, $n);
}

function wyswietl($tablica, $n) {
    $min = min($tablica);
    $max = max($tablica);
    $wynik = $min + $max;
    echo $min." + ".$max." = ".$wynik."<br>";

    $tab2 = [$min, $max];
    $tablica = array_diff($tablica, $tab2);
    if($n > 2) {
        $n -= 2;
        wyswietl($tablica, $n);
    }
}
?>
