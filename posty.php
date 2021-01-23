<?php
$conn = openConn();
$sql = "SELECT wpis.idwpisu, wpis.tytul, wpis.dataModyfikacji, wpis.trescWpisu, uzytkownik.nick FROM wpis 
     INNER JOIN uzytkownik ON uzytkownik.IDuzytkownika = wpis.iduzytkownika";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<article><header><h2>".$row['tytul']."</h2></header>";
        echo "<p>"."Autor wpisu: ".$row['nick']."</p>";
        echo "<section><p>".$row['trescWpisu']."</p></section>";
        if(isset($_SESSION['username']) && ($row['nick'] == $_SESSION['username']) || (isset($_SESSION['rola']) && $_SESSION['rola'] == 'Administrator')) {
            echo "<a style='text-decoration: none; color: white;' href='usunPost.php'>"."Usuń post"."</a></article>";
            $_SESSION['idWpisu'] = $row['idwpisu'];
        } else {
            echo "</article>";
        }
    }
} else {
    echo "Brak postów w bazie";
}
$conn->close();
?>
