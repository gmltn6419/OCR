<html>
<head>
</head>
<body>
<?php
/*
// A few settings
$img_file = './test.jpg';

// Read image path, convert to base64 encoding
$imgData = base64_encode(file_get_contents($img_file));

// Format the image SRC:  data:{mime};base64,{data};
$src = 'data: '.mime_content_type($img_file).';base64,'.$imgData;
*/
$client_secret = "T1hYWWZkV2lKdmh0TUlrVWRJUWRHakpVWnhZVWRoSVo=";
$url = "https://1464f1962ec246f78d43a81570f890f4.apigw.ntruss.com/custom/v1/2227/03d0fe469502affac6c2f54393e8beec2aa98d871cffb9bf9f696aceddf62dac/general";
$image_file = "./11.jpg";

$params->version = "V2";
$params->requestId = uniqid();
$params->timestamp = time();
$image->format = "jpg";
$image->name = "demo";
$images = array($image);
$params->images = $images;
$json = json_encode($params);

$boundary = uniqid();
$is_post = true;
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, $is_post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$post_form = array("message" => $json, "file" => new CURLFILE($image_file));
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_form);
$headers = array();
$headers[] = "X-OCR-SECRET: ".$client_secret;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($ch);
$err = curl_error($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close ($ch);

echo $status_code;

echo $response;
/*
if($status_code == 200) {
  $decode = json_decode($response);
  $text = array_column($decode,'inferText');
  echo implode(', ', $text);
} else {
  echo "ERROR: ".$response;
}
*/

?>
</body>
</html>

