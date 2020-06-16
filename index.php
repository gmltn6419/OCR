<?php
$row = 1;
$handle = fopen("2.csv", "r");
$Lng = [];
$Lat = [];

while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
$num = count($data);
$row++;

for ($c=0; $c < $num; $c++) {
    if($c % 2 == 0){
        $Lat[] = $data[$c];
    }
    else{
        $Lng[] = $data[$c];
    }
}
}
fclose($handle);

echo $Lng[0]."<br>\n">;
echo $Lng[1]."<br>\n">;
echo $Lat[0]."<br>\n">;
echo $Lat[1];

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

</body>
</html>