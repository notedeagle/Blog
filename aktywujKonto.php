<?php
session_start();
include "connection.php";
$username = $_SESSION['uzytkownik'];
$conn = openConn();
$update = "UPDATE uzytkownik SET czy_aktywny = '1' WHERE nick = '$username'";
$conn->query($update);
echo '<script>
alert("Konto zostało aktywowane!");
window.location.href="index.php";
</script>';
$conn->close();
unset($_SESSION['uzytkownik']);
?>
