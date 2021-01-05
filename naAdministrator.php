<?php
session_start();
include "connection.php";
$username = $_SESSION['uzytkownik'];
$conn = openConn();
$update = "UPDATE uzytkownik SET rola = 'Administrator' WHERE nick = '$username'";
$conn->query($update);
echo '<script>
alert("Rola została zmieniona na administrator!");
window.location.href="index.php";
</script>';
$conn->close();
unset($_SESSION['uzytkownik']);
?>
