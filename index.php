<html>
<head>
</head>
<body>
<input type = "file" id="myFile" />

<script>
var file = document.querySelector('#myFile');
var result;

// 정상 로드시 result에 인코딩 값을 저장하기
var reader = new FileReader(file);
reader.onload = function() {
  result = reader.result;
  <?=$img?> = result;
}

// 실패할 경우 에러 출력하기
reader.onerror = function (error) {
   console.log('Error');
};
</script>
<?php
  $client_secret = "T1hYWWZkV2lKdmh0TUlrVWRJUWRHakpVWnhZVWRoSVo=";
  $url = "https://1464f1962ec246f78d43a81570f890f4.apigw.ntruss.com/custom/v1/2227/03d0fe469502affac6c2f54393e8beec2aa98d871cffb9bf9f696aceddf62dac/general";
  $image_file = $img;

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
  if($status_code == 200) {
    echo $response;
  } else {
    echo "ERROR: ".$response;
  }
?>
</body>
</html>

