<?php

$nick = $email = $tekst = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nick"])) {
        echo "<span style=\"color:red;\">Nick jest wymagany<br></span>";
    } else {
        $nick = input_data($_POST["nick"]);

        if (!preg_match("/^[a-zA-Z0-9]*$/", $nick)) {
            echo "<span style=\"color:red;\">Nick może się wkładać tylko z liter i cyfr<br></span>";

        }
    }

    if (empty($_POST["email"])) {
        echo "<span style=\"color:red;\">Email jest wymagany<br></span>";

    } else {
        $email = input_data($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<span style=\"color:red;\">Błędny email<br></span>";

        }
    }

    if (empty($_POST["tekst"])) {
        echo "<span style=\"color:red;\">Komentarz jest wymagany<br></span>";

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
