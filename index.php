<?php

$nickErr = $emailErr = $tekstErr = "";
$nick = $email = $tekst = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nick"])) {
        $nickErr = "Nick jest wymagany";
    } else {
        $nick = input_data($_POST["nick"]);

        if (!preg_match("/^[a-zA-Z0-9]*$/", $nick)) {
            $nickErr = "Nick może się składać tylko z liter i cyfr";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email jest wymagany";
    } else {
        $email = input_data($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Błędny email";
        }
    }

    if (empty($_POST["tekst"])) {
        $tekstErr = "Komentarz jest wymagany";
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

<!DOCTYPE html>
<html lang="en">
<style>
    .error {color:red;}
</style>
<head>
    <meta charset="UTF-8">
    <title>Dawid Kluczewski</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <header id="naglowek">
        <p>Tu jest naglowek</p>
    </header>

    <nav id="menu">
        <ul>
            <li><a class="active" href="#">Strona główna</a></li>
            <li><a href="#">Wpisy</a> </li>
            <li><a href="#">Edukacja</a></li>
            <li><a href="#">GitHub</a></li>
            <li style="float:right"><a href="#">O mnie</a></li>
        </ul>
    </nav>

    <section id="wpis">
        <?php
        $tresc = 'Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst
                    Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst
                    Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst Jakiś tekst';

        $tytul = array("Tytul 1", "Tytul 2", "Tytul 3", "Tytul 4", "Tytul 5", "Tytul 6", "Tytul 7", "Tytul 8");

        foreach ($tytul as $i) { ?>
        <article>
            <header>
                <h2>
                    <?php
                    echo "$i";
                    ?>
                </h2>
            </header>
            <section>
                <p>
                    <?php
                    echo $tresc;
                    ?>
                </p>
            </section>
        </article>
        <?php } ?>
    </section>

    <section id="pasekBoczny">
        <article id="calendar">
            <p>Data/Godzina: <span id="datetime"></span></p>

            <script>
                let dt = new Date();
                document.getElementById("datetime").innerHTML = (("0"+dt.getDate()).slice(-2)) +"."+ (("0"+(dt.getMonth()+1)).slice(-2)) +"."+ (dt.getFullYear()) +" "+ (("0"+dt.getHours()).slice(-2)) +":"+ (("0"+dt.getMinutes()).slice(-2));
            </script>
        </article>

        <article id="link">
            <header>
                <h2>Tu mnie znajdziesz</h2>
            </header>
            <p>
                <a href="#">Github</a>
                <a href="#">Facebook</a>
                <a href="#">Twitter</a>
                <a href="#">E-mail</a>
            </p>
        </article>

        <article id="archiwum">
            <header>
                <h2>
                    Archiwum
                </h2>
            </header>
            <p>
                Tu
                będzie
                archiwium
                wpisów
            </p>
        </article>
    </section>

    <section id="komentarze">
        <header>
            <h2>Dodaj komentarz</h2>
            <span class = "error">* wymagane pole</span>
            <br><br>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                Nick:
                <label>
                    <input type="text" name="nick">
                </label>
                <span class="error">*<?php echo $nickErr;?></span>
                <br><br>
                Email:
                <label>
                    <input type="email" name="email">
                </label>
                <span class="error">*<?php echo $emailErr;?></span>
                <br><br>
                Treść:
                <label>
                    <textarea name="tekst" rows="5" cols="40"></textarea>
                </label>
                <span class="error">*<?php echo $tekstErr;?></span>
                <br><br>
                <input type="submit" name="potwierdz" value="Wyślij komentarz">
                <br><br>
            </form>
        </header>
    </section>

    <footer id="stopka">
        <p>Dawid Kluczewski 2020</p>
    </footer>
</body>
</html>
