<section id="komentarze">
    <h2>Wszystkie komentarze:</h2>
    <?php
    include "connection.php";
    $conn = openConn();
    $sql = "SELECT uzytkownik.nick, komentarz_do_wpisu.tytul, komentarz_do_wpisu.tresc_komentarza FROM uzytkownik 
     INNER JOIN komentarz_do_wpisu ON uzytkownik.IDuzytkownika = komentarz_do_wpisu.IDuzytkownika";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Nick: " . $row["nick"]. "<br>" . "Tytul komentarza: " . $row["tytul"]. "<br>" .
                "Treść komentarza: " . $row["tresc_komentarza"]. "<br>" . "<br>";
        }
    } else {
        echo "Brak komentarzy w bazie";
    }
    $conn->close();
    ?>
    <a href="usunKomentarz.php">Usuń komentarz</a>
</section>