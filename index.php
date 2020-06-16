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
?>
<!DOCTYPE html>
<html>
<head>
    <title> 무더위 쉼터 </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=6ae877255e92416f6f5b8b16227ee8c5"></script>
</head>
<body>
<form>
<div id="map" style="width:100%;height:350px;"></div>
<script>
var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
    mapOption = { 
        center: new kakao.maps.LatLng(35.15718693101715, 129.05943993160383), // 지도의 중심좌표
        level: 2 // 지도의 확대 레벨
    };

var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

var positions1 = new Array("<?=implode("\",\"" , $Lng);?>");
var positions2 = new Array("<?=implode("\",\"" , $Lat);?>");

var imageSrc = "https://t1.daumcdn.net/localimg/localimages/07/mapapidoc/markerStar.png"; 

for (var i = 0; i < positions1.length; i ++) {     
    // 마커 이미지의 이미지 크기 입니다
    var imageSize = new kakao.maps.Size(24, 35);  
    
    // 마커 이미지를 생성합니다    
    var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize); 
    
    // 마커를 생성합니다
    var marker = new kakao.maps.Marker({
        map: map, // 마커를 표시할 지도
        position: new kakao.maps.LatLng(positions1[i], positions2[i]),// 마커를 표시할 위치
        image : markerImage // 마커 이미지 
    });

    /*
    // 마커에 표시할 인포윈도우를 생성합니다 
    var infowindow = new kakao.maps.InfoWindow({
        content: '<div> 제목 : '+title[i]+'<br> 가격 : '+price[i]+'</div>',
        removable : true
    });

    kakao.maps.event.addListener(marker, 'click', click(map,marker,infowindow));
    */
}

function click(map, marker, infowindow) {
      // 마커 위에 인포윈도우를 표시합니다
      return function(){
        infowindow.open(map, marker);
    }
        
}
</script>
</form>
</body>
</html>