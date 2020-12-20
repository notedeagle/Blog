<section id="logowanie">
    <header>
        <h2>Zaloguj się</h2>
        <span class = "error">Wszystkie pola są wymagane</span>
        <br><br>
        <form method="post" action="register.php""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nick:
        <label>
            <input type="text" name="nick">
        </label>
        <br><br>
        Hasło:
        <label>
            <input type="password" name="haslo">
        </label>
        <br><br>
        <input type="submit" name="zaloguj" value="Zaloguj">
        <br><br>
    </header>
</section>