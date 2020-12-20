<section id="rejestrajca">
    <header>
        <h2>Zarejestruj się</h2>
        <span class = "error">Wszystkie pola są wymagane</span>
        <br><br>
        <form method="post" action="register.php""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nick:
        <label>
            <input type="text" name="nick">
        </label>
        <br><br>
        E-mail:
        <label>
            <input type="email" name="email">
        </label>
        <br><br>
        Hasło:
        <label>
            <input type="password" name="haslo1">
        </label>
        <br><br>
        Powtórz hasło:
        <label>
            <input type="password" name="haslo2">
        </label>
        <br><br>
        <input type="submit" name="zarejestruj" value="Zarejestruj się">
        <br><br>
    </header>
</section>
