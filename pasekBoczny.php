<section id="pasekBoczny">
    <section id="login">
        <?php

        if (!isset($_SESSION['username']) && !isset($_GET['register'])) {
            $_SESSION['msg'] = "Najpierw musisz się zalogować!";
            include "logowanie.php";
        }
        if (isset($_GET['logout']) && !isset($_GET['register'])) {
            session_destroy();
            unset($_SESSION['username']);
            include "logowanie.php";
        }

        if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <?php  if (isset($_SESSION['username'])) : ?>
            <p>Witaj <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p> <a href="index.php?logout='1'" style="color: red;">Wyloguj</a> </p>
        <?php
        endif;

        if (isset($_GET['register'])) {
            include "rejestracja.php";
        }

        ?>
    </section>


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

    <?php
    if(isset($_SESSION['username'])) {
        $nick = $_SESSION['username'];
        ?>
        <section id="dodajKomentarz">
            <header>
                <h2>Dodaj komentarz</h2>
                <span class = "error">Wszystkie pola są wymagane</span>
                <br>
                <form method="post" action="walidacja.php">
                <br><br>
                    <label>
                        <input type="hidden" name="nick" value="<?php '$nick' ?>">
                    </label>
                Tytuł komentarza: <br>
                <label>
                    <input type="text" name="tytul">
                </label>
                <br><br>
                Treść: <br>
                <label>
                    <textarea name="tekst" rows="5" cols="40"></textarea>
                </label>
                <br><br>
                <div class="g-recaptcha" data-sitekey="6Lcb3-EZAAAAAJjrPuqtPF6VdYhZgnQ1uo5OkW_d"></div>
                <input type="submit" name="potwierdz" value="Wyślij komentarz">
                <br><br>
                </form>
            </header>
        </section>
    <?php
    } else { ?>
        <section id="dodajKomentarz">
            <header>
                <h2>Dodaj komentarz</h2>
                <span class = "error">Wszystkie pola są wymagane</span>
                <br>
                <form method="post" action="walidacja.php">
                <br><br>
                    Nick: <br>
                    <label>
                        <input type="text" name="nick">
                    </label>
                    <br><br>
        Tytuł komentarza: <br>
                <label>
                    <input type="text" name="tytul">
                </label>
                <br><br>
        Treść: <br>
                <label>
                    <textarea name="tekst" rows="5" cols="40"></textarea>
                </label>
                <br><br>
                <div class="g-recaptcha" data-sitekey="6Lcb3-EZAAAAAJjrPuqtPF6VdYhZgnQ1uo5OkW_d"></div>
                <input type="submit" name="potwierdz" value="Wyślij komentarz">
                <br><br>
                </form>
            </header>
        </section> <?php
    }
    ?>
    <article>
        <?php
        if (isset($_SESSION['rola']) && $_SESSION['rola'] == 'Administrator') :
        include "uzytkownicy.php";
        endif;
        if (isset($_SESSION['username']) && $_SESSION['rola'] == 'Administrator') : ?>
            <a href="edytujUzytkownikow.php">Zarządzaj użytkownikami</a>
        <?php
        include "wiadomosci.php";
        endif;
        ?>
    </article>
</section>