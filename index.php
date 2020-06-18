<html>
<head>
</head>
<body>
<?php
  $client_secret = "T1hYWWZkV2lKdmh0TUlrVWRJUWRHakpVWnhZVWRoSVo=";
  $url = "https://1464f1962ec246f78d43a81570f890f4.apigw.ntruss.com/custom/v1/2227/03d0fe469502affac6c2f54393e8beec2aa98d871cffb9bf9f696aceddf62dac/general";
  //$image_url = "YOUR_IMAGE_URL";
  $image_file = "./sample.png";

  $params->version = "V2";
  $params->requestId = "uuid";
  $params->timestamp = time();
  $image->format = "jpg";
  //$image->url = $image_url;
   $image->data = base64_encode(file_get_contents($image_file));
  $image->name = "demo";
  $images = array($image);
  $params->images = $images;
  $json = json_encode($params);

  $is_post = true;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, $is_post);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
  $headers = array();
  $headers[] = "X-OCR-SECRET: ".$client_secret;
  $headers[] = "Content-Type:application/json; charset=utf-8";
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $response = curl_exec($ch);
  $err = curl_error($ch);
  $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close ($ch);

  echo $status_code;

  if($status_code == 200) {
    echo $response."<br>\n";
    echo "---------------------------------";

    $arr = json_decode($response, true);
    print_r($arr);
    echo "<br>\n";
    echo "---------------------------------";

    foreach($arr as $value) {
      echo $value['[inferText]'];
    }

  } else {
    echo "ERROR: ".$response;
  }
?>
</body>
</html>

