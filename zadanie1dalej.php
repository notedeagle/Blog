<?php
$ciag = $_POST['name'];

echo "Ilość białych znaków: ";
echo substr_count($ciag, ' ')."<br>";

$j = 0;
$k = 0;
$y = 0;

for($i = 0; $i < strlen($ciag); $i++) {

    if(preg_match('/[a-zA-Z]/', $ciag[$i])) {
        $j++;
    }

    if(is_numeric($ciag[$i])) {
        $k += $ciag[$i];
    }

    if(preg_match('/[aeiouyAEIOUY]/', $ciag[$i])) {
        $y++;
    }
}
echo "Ilość liter: ";
echo $j."<br>";

echo "Ilość cyfr: ";
echo $k."<br>";

echo "Ilość samogłosek: ";
echo $y."<br>";
?>
