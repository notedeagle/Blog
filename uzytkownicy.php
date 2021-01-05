<section id="uzytkownicy">
    <h2>Wszyscy zarejestrowani użytkownicy:</h2>
    <?php
    $conn = openConn();
    $sql = "SELECT nick, rola, ostatnioZalogowany FROM uzytkownik";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Nick: " . $row["nick"]. "<br>" . "Rola: " . $row["rola"]. "<br>" .
                "Data ostatniego logowania: " . $row["ostatnioZalogowany"]. "<br>" . "<br>";
        }
    } else {
        echo "Brak zarejestrowanych użytkowników";
    }
    $conn->close();
    ?>
</section>
