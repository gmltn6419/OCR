<?php

$row = 1;
$handle = fopen("1.csv", "r");

while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
$num = count($data);
echo "<p> $num fields in line $row: <br /></p>\n";

$row++;
for ($c=0; $c < $num; $c++) {
    setlocale(LC_CTYPE, 'ko_KR.eucKR');
    echo $data[$c] . "<br />\n";
}
}
fclose($handle);
?>