<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<meta name="decription" content="Mój blog">
<meta name="keywords” content=" blog, lifestyle, Dawid, Kluczewski, informatyka”>
<meta name="author" content="Dawid Kluczewski">
<style>
    .error {color:red;}
</style>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<head>
    <meta charset="UTF-8">
    <title>Dawid Kluczewski</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <header id="naglowek">
        <p>Tu jest naglowek</p>
    </header>

    <?php include 'menu.php';
    include "connection.php";
    if(isset($_GET['contact'])) {
        include "kontakt.php";
    } else {
        include "posty.php";
    }
    include 'pasekBoczny.php';
    include 'footer.php';?>
</body>
</html>






