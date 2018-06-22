<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://192.168.99.100/purge/");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	"Accept-Encoding: gzip, deflate",
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode == '200') {
	echo $response;
}
else if($httpcode == '404') {
	echo "<center>No such content HIT in cache:<br>" . $httpcode . "</center>";
	echo "<br>" . gzdecode($response) . " ";
}
else {
	echo "<center> Something went wrong... Error code: " . $httpcode . "</center>";
	echo "<br>";
	echo gzdecode($response);
}
// echo $httpcode;
curl_close ($ch);
?>