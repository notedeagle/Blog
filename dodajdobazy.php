<?php
session_start();

include "connection.php";

$nickname = $_SESSION['nick'];
$tresc = $_SESSION['tekst'];
$tytulKomentarza = $_SESSION['tytul'];
$IDwpisu = $_SESSION['idWpisu'];

$conn = openConn();

$sql = "INSERT INTO  komentarz_do_wpisu (IDuzytkownika, IDwpisu, tytul, dataStworzenia, dataModyfikacji, tresc_komentarza)
VALUES((SELECT IDuzytkownika FROM uzytkownik WHERE nick = '$nickname'), (SELECT IDwpisu FROM wpis WHERE IDwpisu = '$IDwpisu'),
       '$tytulKomentarza', NOW(), NOW(), '$tresc')";

if ($conn->query($sql) === TRUE) {
    echo "Komentarz dodany!";
    ?>
    <a href="index.php">Przejdź do strony głównej</a>
<?php
} else {
    echo "Błąd przy dodawaniu: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>