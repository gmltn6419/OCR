<?php
setlocale(LC_CTYPE, 'ko_KR.eucKR');

$row = 1;
$handle = fopen("1.csv", "r");
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
$num = count($data);
echo "<p> $num fields in line $row: <br /></p>\n";
$data = iconv("euc-kr","utf-8",$data);
$row++;
for ($c=0; $c < $num; $c++) {

    echo $data[$c] . "<br />\n";
}
}
fclose($handle);
?>