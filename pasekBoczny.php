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
    <section id="komentarze">
        <header>
            <h2>Dodaj komentarz</h2>
            <span class = "error">Wszystkie pola są wymagane</span>
            <br><br>
            <form method="post" action="komentarz.php""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Nick:
            <label>
                <input type="text" name="nick">
            </label>
            <br><br>
            Treść:
            <label>
                <textarea name="tekst" rows="5" cols="40"></textarea>
            </label>
            <br><br>
            <div class="g-recaptcha" data-sitekey="6Lcb3-EZAAAAAJjrPuqtPF6VdYhZgnQ1uo5OkW_d"></div>
            <input type="submit" name="potwierdz" value="Wyślij komentarz">
            <br><br>
        </header>
    </section>
</section>