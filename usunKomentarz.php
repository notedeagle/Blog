<?php
include "connection.php";

session_start();

$IDkomentarza = $_SESSION['IDkomentarza'];

$conn = openConn();
$sql = "DELETE komentarz_do_wpisu FROM komentarz_do_wpisu WHERE IDkomentarza = '$IDkomentarza'";

if ($conn->query($sql) === TRUE && mysqli_affected_rows($conn) !== 0) {
    echo "Komentarz usunięty pomyślnie";?>
    <a href="index.php">Przejdź do strony głównej</a>
    <?php
} else {
    echo "Błąd przy usuwaniu: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
