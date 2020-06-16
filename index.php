<?php
$ch = curl_init();
$url = 'http://apis.data.go.kr/B551182/pubReliefHospService/getpubReliefHospList'; /*URL*/
$queryParams = '?' . urlencode('ServiceKey') . '=Ha0NDXyYVb5iNM20EW%2FtGJ1XKwmIclH7V5WqKkc27ksZSLt6Ee2PFLnJ8cJ1QnI764%2BRm%2B3elnn%2BSFoN2wrkUA%3D%3D'; /*Service Key*/
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