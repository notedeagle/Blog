<?php
session_start();

$username = $email = "";
$errors = array();

include "connection.php";

if(isset($_POST['zarejestruj'])) {
    $conn = openConn();
    $username = mysqli_real_escape_string($conn, $_POST['nickname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $haslo1 = mysqli_real_escape_string($conn, $_POST['haslo1']);
    $haslo2 = mysqli_real_escape_string($conn, $_POST['haslo2']);

    if (empty($username)) {
        array_push($errors, "Musisz podać nazwę użytkownika! ");
    }
    if (empty($email)) {
        array_push($errors, "Musisz podać adres email! ");
    }
    if (empty($haslo1)) {
        array_push($errors, "Musisz podać hasło! ");
    }
    if ($haslo1 !== $haslo2) {
        array_push($errors, "Hasła są różne! ");
    }

    $czy_istnieje = "SELECT nick, email FROM uzytkownik WHERE nick = '$username' OR email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $czy_istnieje);
    $uzytkownik = mysqli_fetch_assoc($result);

    if ($uzytkownik) {
        if ($uzytkownik['nick'] === $username) {
            array_push($errors, "Ten użytkownik już istnieje! ");
        }

        if ($uzytkownik['email'] === $email) {
            array_push($errors, "Ten email już istnieje! ");
        }
    }

    if(isset($_POST['g-recaptcha-response'])){
        $captcha=$_POST['g-recaptcha-response'];
    }
    if(!$captcha){
        array_push($errors, "Sprawdź captche! ");
    }

    $secretKey = "6Lcb3-EZAAAAACDOrPSwLbNoGXlysdImMDrNJ2TW";
    $ip = $_SERVER['REMOTE_ADDR'];
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
    $response = file_get_contents($url);
    $responseKeys = json_decode($response,true);

    if (count($errors) == 0 && $responseKeys['success']) {
        $password = password_hash($haslo1, PASSWORD_BCRYPT);
        $sql = "INSERT INTO uzytkownik(nick, rola, email, haslo, ostatnioZalogowany) VALUES
                ('$username', 'Uzytkownik', '$email', '$password', NOW())";
        mysqli_query($conn, $sql);
//        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Zostałeś zarejestrowany! Administrator musi aktywować twoje konto.";
        header('location: index.php');
    } else {
        err($errors);
    }
    $conn->close();
}

if(isset($_POST['zaloguj'])) {
    $conn = openConn();
    $username = mysqli_real_escape_string($conn, $_POST['nick']);
    $haslo = mysqli_real_escape_string($conn, $_POST['haslo']);

    if (empty($username)) {
        array_push($errors, "Musisz podać nazwę użytkownika! ");
    }
    if (empty($haslo)) {
        array_push($errors, "Musisz podać hasło! ");
    }

    if (count($errors) == 0) {
        $sql = "SELECT nick, haslo, rola, czy_aktywny FROM uzytkownik WHERE nick = '$username'";
        $update = "UPDATE uzytkownik SET ostatnioZalogowany = NOW() WHERE nick = '$username'";
        $conn->query($update);
        $result = mysqli_query($conn, $sql);
        $uzytkownik = mysqli_fetch_assoc($result);
        $result1 = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result1) == 1 && password_verify($haslo, $uzytkownik['haslo']) && $uzytkownik['czy_aktywny'] == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['rola'] = $uzytkownik['rola'];
            $_SESSION['success'] = "Zalogowano!";
            header('location: index.php');
        } else if($uzytkownik['czy_aktywny'] != 1) {
            array_push($errors, "Konto nieaktywne!");
            err($errors);
        } else {
            array_push($errors, "Błądny login i/lub hasło!");
            err($errors);
        }
    } else {
        err($errors);
    }
    $conn->close();
}

if(isset($_POST['zmienHaslo'])) {
    $conn = openConn();
    $username = $_SESSION['uzytkownik'];
    $haslo1 = $_POST['pass1'];
    $haslo2 = $_POST['pass2'];


    if (empty($username)) {
        array_push($errors, "Musisz podać nazwę użytkownika! ");
    }
    if (empty($haslo1)) {
        array_push($errors, "Musisz podać hasło! ");
    }
    if ($haslo1 !== $haslo2) {
        array_push($errors, "Hasła są różne! ");
    }

    if (count($errors) == 0) {
        $password = password_hash($haslo1, PASSWORD_BCRYPT);
        $update = "UPDATE uzytkownik SET haslo = '$password' WHERE nick = '$username'";
        $conn->query($update);
        echo '<script>
        alert("Hasło zostało zmienione!");
        window.location.href="index.php";
        </script>';
    } else {
        err($errors);
    }
    $conn->close();
}

function err($errors) {
    ?>
    <div class="error">
        <?php
        foreach ($errors as $error) {
            echo $error;
        }?>
    </div>
    <a href="index.php">Wróć do strony głównej</a>
    <?php
}
?>
