<?php
session_start();

if(isset($_POST['somename'])) {
    $_SESSION['uzytkownik'] = $_POST['somename'];
}
if(isset($_SESSION['uzytkownik'])) {
    echo "Wybrany użytkownik to ".$_SESSION['uzytkownik'];
}
?>
<a href="aktywujKonto.php">Aktywuj konto wybranego użytkownika</a>
<a href="#">Zmień hasło wybranego użytkownika</a>
<a href="naAdministrator.php">Zmień typ wybranego konta użytkownika na administrator</a>
<a href="naUzytkownik.php">Zmień typ wybranego konta na użytkownik</a>
<a href="usunUzytkownika.php">Usuń wybranego użytkownika</a>
