<?php
$ch = curl_init();
$url = 'http://apis.data.go.kr/B551182/pubReliefHospService/getpubReliefHospList'; /*URL*/
$queryParams = '?' . urlencode('ServiceKey') . 'JNAU6LstvMSJ6Hu2sQtu%2BNAVdUyJrHF3q3DjLgVvMHlmA2ga6XB0qThVdNEmHP%2F4XyvMac38cd9DlaOLfs%2BY8g%3D%3D'; /*Service Key*/
$queryParams .= '&' . urlencode('ServiceKey') . '=' . urlencode('-'); /**/
$queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
$queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('10'); /**/
$queryParams .= '&' . urlencode('spclAdmTyCd') . '=' . urlencode('A0'); /**/

curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$response = curl_exec($ch);
curl_close($ch);

var_dump($response);
?>