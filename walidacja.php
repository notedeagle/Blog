<?php

$tytul = $tekst = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["tytul"])) {
        echo "<span style=\"color:red;\">Tytuł komentarza jest wymagany<br></span>";
    } else {
        $tytul = input_data($_POST["tytul"]);
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

if(isset($_POST['g-recaptcha-response'])){
    $captcha=$_POST['g-recaptcha-response'];
}
if(!$captcha){
    echo '<h2>Please check the the captcha form.</h2>';
    exit;
}
$secretKey = "6Lcb3-EZAAAAACDOrPSwLbNoGXlysdImMDrNJ2TW";
$ip = $_SERVER['REMOTE_ADDR'];
$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
$response = file_get_contents($url);
$responseKeys = json_decode($response,true);
if($responseKeys["success"]) {
    session_start();

    echo ('<form method="post" action="dodajdobazy.php""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>');
    $_SESSION['tekst'] = $_POST['tekst'];
//    $_SESSION['nick'] = $_POST['nick'];
    $_SESSION['tytul'] = $_POST['tytul'];
    $nickname = $_SESSION['username'];
    $tresc = $_SESSION['tekst'];
    $tytulKomentarza = $_SESSION['tytul'];
    $znaczniki = array('[b]' ,'[/b]', '[i]','[/i]', '[u]','[/u]','[quote]','[/quote]','[s]', '[/s]');
    $noweZnaczniki = array('<strong>','</strong>','<i>', '</i>','<u>','</u>','<q>','</q>', '<s>', '</s>');

    $trescZmieniona = str_replace($znaczniki, $noweZnaczniki, $tresc) ;

    echo ('
     <p>Nick: ' . $nickname . '</p>
     <p>Tytuł komentarza: ' . $tytulKomentarza . '</p>
     <p>Treść komentarza: ' . $trescZmieniona . '</p>
     <a href="dodajdobazy.php">Dodaj komentarz</a>
     <a href="edytuj.php">Edytuj komentarz</a>
     ');
} else {
    echo '<h2>Ić stont bocie</h2>';
}

?>
