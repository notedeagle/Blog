<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<?php
session_start();

$nick = $_SESSION['nick'];
$tytul = $_SESSION['tytul'];
$tresc = $_SESSION['tekst'];

echo ('
	<form method="post" action="walidacja.php"> 
	    <p>Nick: ' . $nick . '</p>
	    <p>Tytuł komentarza: ' . $tytul . '</p>
	    <p>Treść komentarza: ' . $tresc . '</p>
		<td>Nowa treść:</td>
		<input type="hidden" name="nick" value=' . "$nick" . '>
		<input type="hidden" name="tytul" value=' . "$tytul" . '>
        <textarea name="tekst" rows="5" cols="40"></textarea>'); ?>
        <div class="g-recaptcha" data-sitekey="6Lcb3-EZAAAAAJjrPuqtPF6VdYhZgnQ1uo5OkW_d"></div>
        <input type="submit" value="Edytuj">
    </form>

