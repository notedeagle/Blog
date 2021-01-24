<section id="wpis">
    <?php
    $conn = openConn();

    $per_page_record = 1;

    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    }
    else {
        $page=1;
    }
    $query = "select idwpisu from wpis";
    $result = mysqli_query($conn, $query);
    $number_of_result = mysqli_num_rows($result);

    $number_of_page = ceil ($number_of_result / $per_page_record);

    $start_from = ($page-1) * $per_page_record;

    $query = "SELECT wpis.idwpisu, wpis.tytul, wpis.dataModyfikacji, wpis.trescWpisu, uzytkownik.nick FROM wpis
     INNER JOIN uzytkownik ON uzytkownik.IDuzytkownika = wpis.iduzytkownika LIMIT $start_from, $per_page_record";
    $rs_result = mysqli_query ($conn, $query); ?>

    <article> <?php
        while ($row = mysqli_fetch_array($rs_result)) {
            echo "<header><h2>".$row['tytul']."</h2></header>";
            echo "<p>"."Autor wpisu: ".$row['nick']."</p>";
            echo "<section><p>".$row['trescWpisu']."</p></section>";
            if(isset($_SESSION['username']) && ($row['nick'] == $_SESSION['username']) || (isset($_SESSION['rola']) && $_SESSION['rola'] == 'Administrator')) {
                echo "<a href='usunPost.php'>"."Usuń post"."</a><br><br><br>";
            } else {
                    echo "<br><br>";
            }
            $_SESSION['idWpisu'] = $row['idwpisu'];
        } ?>
    </article>

    <?php
    $total_pages = ceil($number_of_page / $per_page_record);
    $pagLink = "";

    include "komentarze.php";

    if($page>=2) {
        echo "<a href='index.php?page=".($page-1)."'> Poprzedni </a>";
    }

    for ($i=1; $i<=$total_pages; $i++) {
        if ($i == $page) {
            $pagLink .= "<a class = 'active' href='index.php?page="
                .$i."'>".$i." </a>";
        }
        else  {
            $pagLink .= "<a href='index.php?page=".$i."'>   
                                                ".$i." </a>";
        }
    };
    echo $pagLink;

    if($page<$total_pages){
        echo "<a href='index.php?page=".($page+1)."'> Następny </a>";
    }
    ?>
</section>

