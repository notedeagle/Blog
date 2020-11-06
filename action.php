<?php
if (isset($_POST["wyslij"])) {
    if (empty($_POST["nick"]) || empty($_POST["email"]) || empty($_POST["tekst"])) {
        echo "<p style=\"color:red\">Musisz wypełnić wszystkie pola!</p>";
    } else {
        ?>
        <h3>Komeatarz dodany!</h3>
        <?php
    }
}