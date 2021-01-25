<?php
$conn = openConn();
$sql = "SELECT nick, email, tresc FROM wiadomosc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<br><br>" . "Wszystkie wiadomości:"."<br><br>";
    while($row = $result->fetch_assoc()) { ?>
        <article> <?php
            echo "Nick: " . $row["nick"]. "<br>" . "Email: " . $row["email"]. "<br>" .
                    "Treść wiadomości: " . $row["tresc"]. "<br>" . "<br>"; ?>
        </article>    <?php
    }
} else {
    echo "Brak wiadomości w bazie";
}
$conn->close();
?>