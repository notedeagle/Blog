<?php
session_start();
include "connection.php";
$username = $_SESSION['uzytkownik'];
$conn = openConn();
$update = "DELETE FROM uzytkownik WHERE nick = '$username'";
$conn->query($update);
echo '<script>
alert("Użytkownik został usunięty!");
window.location.href="index.php";
</script>';
$conn->close();
unset($_SESSION['uzytkownik']);
?>