<article>
    <?php
    $conn = openConn();
    $sql = "SELECT uzytkownik.nick, komentarz_do_wpisu.tytul, komentarz_do_wpisu.tresc_komentarza, komentarz_do_wpisu.dataModyfikacji, komentarz_do_wpisu.IDkomentarza, wpis.idwpisu 
    FROM uzytkownik INNER JOIN komentarz_do_wpisu ON uzytkownik.IDuzytkownika = komentarz_do_wpisu.IDuzytkownika 
    INNER JOIN wpis ON wpis.idwpisu = komentarz_do_wpisu.IDwpisu";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "Wszystkie komentarze:"."<br><br>";
        while($row = $result->fetch_assoc()) { ?>
            <article> <?php
                if($row['idwpisu'] == $_SESSION['idWpisu']) {
                    echo "Nick: " . $row["nick"]. "<br>" . "Tytul komentarza: " . $row["tytul"]. "<br>" .
                        "Treść komentarza: " . $row["tresc_komentarza"]. "<br>" . "Data dodania komentarza: " .
                        $row["dataModyfikacji"] . "<br>" . "<br>";
                    if(isset($_SESSION['username']) && ($row['nick'] == $_SESSION['username']) || (isset($_SESSION['rola']) && $_SESSION['rola'] == 'Administrator')) {
                        echo "<a href='usunKomentarz.php'>"."Usuń komentarz"."</a><br><br><br>";
                        $_SESSION['IDkomentarza'] = $row['IDkomentarza'];
                    }
                } ?>
            </article>    <?php
        }
    } else {
        echo "Brak komentarzy w bazie";
    }
    $conn->close();
    ?>
</article>


