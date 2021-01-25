<?php
include "connection.php";

$nickname = $_POST['name'];
$email = $_POST['email'];
$tresc = $_POST['tresc'];

$conn = openConn();

$sql = "INSERT INTO  wiadomosc (email, nick, tresc)
VALUES ('$email', '$nickname', '$tresc')";

if ($conn->query($sql) === TRUE) {
    echo "Wysłano!";
    ?>
    <a href="index.php">Przejdź do strony głównej</a>
    <?php
} else {
    echo "Błąd przy dodawaniu: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>