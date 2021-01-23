<?php
include "connection.php";

session_start();

$idWpisu = $_SESSION['idWpisu'];

$conn = openConn();
$sql = "DELETE wpis FROM wpis WHERE idWpisu = '$idWpisu'";

if ($conn->query($sql) === TRUE && mysqli_affected_rows($conn) !== 0) {
    echo "Komentarz usunięty pomyślnie";?>
    <a href="index.php">Przejdź do strony głównej</a>
    <?php
} else {
    echo "Błąd przy usuwaniu: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>