<?php
session_start();

include "connection.php";

$nickname = $_SESSION['username'];
$tytulPostu = $_POST['tytul'];
$trescPostu = $_POST['tekst'];

$conn = openConn();

$sql = "INSERT INTO  wpis (IDuzytkownika, tytul, dataStworzenia, dataModyfikacji, trescWpisu)
VALUES((SELECT IDuzytkownika FROM uzytkownik WHERE nick = '$nickname'), '$tytulPostu', NOW(), NOW(), '$trescPostu')";

if ($conn->query($sql) === TRUE) {
    echo "Post został dodany!";
    ?>
    <a href="index.php">Przejdź do strony głównej</a>
    <?php
} else {
    echo "Błąd przy dodawaniu: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>