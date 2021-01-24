<section id="rejestracja">
    <?php
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "Najpierw musisz się zalogować!"; ?>
        <section id="rejestrajca">
            <header>
                <h2>Zarejestruj się</h2>
                <span class = "error">Wszystkie pola są wymagane</span>
                <br><br>
                <form method="post" action="register.php""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                Nick:
                <label>
                    <input type="text" name="nickname">
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
                <div class="g-recaptcha" data-sitekey="6Lcb3-EZAAAAAJjrPuqtPF6VdYhZgnQ1uo5OkW_d"></div>
                <br><br>
                <input type="submit" name="zarejestruj" value="Zarejestruj się">
                <br><br>
            </header>
        </section>
        <?php
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        $_SESSION['msg'] = "Najpierw musisz się zalogować!"; ?>
        <section id="rejestrajca">
            <header>
                <h2>Zarejestruj się</h2>
                <span class = "error">Wszystkie pola są wymagane</span>
                <br><br>
                <form method="post" action="register.php""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                Nick:
                <label>
                    <input type="text" name="nickname">
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
                <div class="g-recaptcha" data-sitekey="6Lcb3-EZAAAAAJjrPuqtPF6VdYhZgnQ1uo5OkW_d"></div>
                <br><br>
                <input type="submit" name="zarejestruj" value="Zarejestruj się">
                <br><br>
            </header>
        </section>
        <?php
    }?>
</section>


























