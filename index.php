<?php
/*
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
*/
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
<script type="text/javascript">
// javascript
$(function() {
	$.ajax({
		url:"./1.csv",
		dataType:'text',
		success: function(data) {
			var allRow = data;
			//.split(/\r?\n|\r/)
			var textLine = "";
			for(var singleRow = 0; singleRow < allRow.length; singleRow++) {
				var collapse = allRow[singleRow].split(",");
				
				for(var count = 0; count < collapse.length; count++) {
					textLine += collapse[count];
				}
			}
			
			$('#textArea').append(textLine);
			$('#textArea').append("<br>");
		}
	});}
	
});
</script>
</body>
</html>