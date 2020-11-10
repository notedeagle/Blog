<?php

$nick = $email = $tekst = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nick"])) {
        echo "<color=red>Nick jest wymagany<br>";
    } else {
        $nick = input_data($_POST["nick"]);

        if (!preg_match("/^[a-zA-Z0-9]*$/", $nick)) {
            echo "<color=red>Nick może się składać tylko z liter i cyfr<br>";
        }
    }

    if (empty($_POST["email"])) {
        echo "<color=red>Email jest wymagany<br>";
    } else {
        $email = input_data($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<color=red>Błędny email<br>";
        }
    }

    if (empty($_POST["tekst"])) {
        echo "<color=red>Komentarz jest wymagany<br>";
    } else {
        $tekst = input_data($_POST["tekst"]);
    }
}

function input_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
