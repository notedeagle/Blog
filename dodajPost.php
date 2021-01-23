<link rel="stylesheet" href="minified/themes/default.min.css" />
<script src="minified/sceditor.min.js"></script>

<h2>Formularz dodawania wpisu</h2>

<form method="post" action="dodajPostDoBazy.php">
    <br><br>
    Tytuł wpisu: <br>
    <label>
        <input type="text" name="tytul">
    </label>
    <br><br>
    Treść wpisu: <br>
    <textarea id="example" name="tekst" style="width: 80%; height: 300px; display: none"></textarea>
    <br><br>
    <input type="submit" name="potwierdz" value="Dodaj post">
    <br><br>
</form>

<script src="minified/formats/bbcode.min.js"></script>
<script>
    // Replace the textarea #example with SCEditor
    var textarea = document.getElementById('example');
    sceditor.create(textarea, {
        format: 'bbcode',
        style: 'minified/themes/content/default.min.css'
    });
</script>

