<?php
error_reporting(0);
header("content-type: application/json; charset= UTF-8");
$fields = [
	'accessKey'	=> "", // Set Your API Access Key, Get: @APIManager_Bot
	'link'		=> $_GET['link'],
	'time'		=> $_GET['time'],
	'email'		=> "", // set your email
	'password'	=> "", // set your password
];
$cURL = curl_init();
curl_setopt_array($cURL, array(
	CURLOPT_URL				=> "https://api.ineo-team.ir/cronjob.php",
	CURLOPT_POST			=> true,
	CURLOPT_POSTFIELDS		=> $fields,
	CURLOPT_RETURNTRANSFER	=> true,
));
$result = json_decode(curl_exec($cURL));
curl_close($cURL);
if($result->status_code == 200){
	echo json_encode(['status' => $result->status, 'cronjobId' => $result->result->cronjobId]);
}else{
	echo json_encode(['status' => $result->status, 'message' => $result->message]);
}
unlink("error_log");
?>
