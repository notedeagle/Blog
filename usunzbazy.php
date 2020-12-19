<?php
include "connection.php";

$nickname = $_POST['nickname'];
$tytulKomentarza = $_POST['tytulDoUsuniecia'];

$conn = openConn();
$sql = "DELETE komentarz_do_wpisu FROM komentarz_do_wpisu INNER JOIN uzytkownik ON 
    komentarz_do_wpisu.IDuzytkownika = uzytkownik.IDuzytkownika WHERE uzytkownik.nick = '$nickname' AND 
    komentarz_do_wpisu.tytul = '$tytulKomentarza'";

if ($conn->query($sql) === TRUE && mysqli_affected_rows($conn) !== 0) {
    echo "Komentarz usunięty pomyślnie";?>
    <a href="index.php">Przejdź do strony głównej</a>
<?php
} else {
    echo "Błąd przy usuwaniu: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>