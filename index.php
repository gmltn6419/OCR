<?php
setlocale(LC_CTYPE, 'ko_KR.utf8');

$row = 1;
$handle = fopen("1.csv", "r");

while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
$num = count($data);
echo "<p> $num fields in line $row: <br /></p>\n";

$row++;
for ($c=0; $c < $num; $c++) {
    echo $data[$c] . "<br />\n";
}
}
fclose($handle);
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

</body>
</html>