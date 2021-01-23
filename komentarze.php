<section id="komentarze">

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="data">Wybierz datę:</label>
        <input type="date" name="data">
        <input type="submit" value="Pokaż">
    </form>
    <?php
    if(!isset($_POST['data'])) {
    ?>
    <h2>Wszystkie komentarze:</h2>
    <?php
    $conn = openConn();
    $sql = "SELECT uzytkownik.nick, komentarz_do_wpisu.tytul, komentarz_do_wpisu.tresc_komentarza, komentarz_do_wpisu.dataModyfikacji FROM uzytkownik 
     INNER JOIN komentarz_do_wpisu ON uzytkownik.IDuzytkownika = komentarz_do_wpisu.IDuzytkownika";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Nick: " . $row["nick"]. "<br>" . "Tytul komentarza: " . $row["tytul"]. "<br>" .
                "Treść komentarza: " . $row["tresc_komentarza"]. "<br>" . "Data dodania komentarza: " .
                $row["dataModyfikacji"] . "<br>" . "<br>";
        }
    } else {
        echo "Brak komentarzy w bazie";
    }
    $conn->close();
    ?>
    <a href="usunKomentarz.php">Usuń komentarz</a>
    </section> <?php
    } else { ?>
    <section id="komentarze">
        <h2>Komentarze z wybranej daty:</h2>
        <?php
        $data = $date = date('Y-m-d', strtotime($_POST['data']));
        $conn = openConn();
        $sql = "SELECT uzytkownik.nick, komentarz_do_wpisu.tytul, komentarz_do_wpisu.tresc_komentarza, komentarz_do_wpisu.dataModyfikacji FROM uzytkownik 
         INNER JOIN komentarz_do_wpisu ON uzytkownik.IDuzytkownika = komentarz_do_wpisu.IDuzytkownika AND DATE(komentarz_do_wpisu.dataModyfikacji) = DATE('$data')";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "Nick: " . $row["nick"]. "<br>" . "Tytul komentarza: " . $row["tytul"]. "<br>" .
                    "Treść komentarza: " . $row["tresc_komentarza"]. "<br>" . "Data dodania komenatarza: " .
                    $row["dataModyfikacji"] . "<br>" . "<br>";
            }
        } else {
            echo "Brak komentarzy z $data w bazie";
        }
        $conn->close();
        ?>
        <a href="usunKomentarz.php">Usuń komentarz</a>
    </section>
        <?php
    }
    ?>
