<html>
<body>
<form action="dodajKontakt.php" method="post" id="kontakt">
    <h2>Formularz kontaktowy</h2>
    <p>
        <label>Imię:</label>
        <input name="name" type="text""/>
    </p>
    <p>
        <label>Adres email:</label>
        <input style="cursor: pointer;" name="email" type="text"/>
    </p>
    <p>
        <label>Wiadomość:</label>
        <textarea name="tresc"></textarea>
    </p>

    <p>
        <input type="submit" value="Wyślij"/>
    </p>
</body>
</html>
