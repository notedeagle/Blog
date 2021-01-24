<nav id="menu">
    <ul>
        <li><a class="active" href="index.php">Strona główna</a></li>
        <?php if(isset($_SESSION['username'])) : ?>
        <li><a href="dodajPost.php">Dodaj post</a></li>
        <?php endif ?>
        <li><a href="#">Wpisy</a> </li>
        <li><a href="#">Edukacja</a></li>
        <li><a href="#">GitHub</a></li>
        <li><a href="game.php">Gra</a></li>
        <li style="float: right"><a href="index.php?contact='1'">Kontakt</a></li>
        <li style="float:right"><a href="#">O mnie</a></li>
        <?php  if(!isset($_SESSION['username'])) : ?>
            <li style="float: right"><a href="index.php?register='1'">Zarejestruj się</a> </li>
        <?php endif ?>
    </ul>
</nav>