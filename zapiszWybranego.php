<style>
    .button {
        background-color: gray;
        border: 1px solid;
        color: white;
        padding: 10px;
        width: 200px;
        text-align: center;
        text-decoration: none;
        display: block;
        font-size: 16px;
    }
</style>

<?php
session_start();

if(isset($_POST['somename'])) {
    $_SESSION['uzytkownik'] = $_POST['somename'];
}
if(isset($_SESSION['uzytkownik'])) {
    echo "Wybrany użytkownik to ".$_SESSION['uzytkownik'];
}
?>
<a href="aktywujKonto.php" class="button">Aktywuj konto wybranego użytkownika</a>
<a href="zmienHaslo.php" class="button">Zmień hasło wybranego użytkownika</a>
<a href="naAdministrator.php" class="button">Zmień typ wybranego konta użytkownika na administrator</a>
<a href="naUzytkownik.php" class="button">Zmień typ wybranego konta na użytkownik</a>
<a href="usunUzytkownika.php" class="button">Usuń wybranego użytkownika</a>


