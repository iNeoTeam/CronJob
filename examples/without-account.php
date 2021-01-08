<?php
// Error manage:
error_reporting(0);
// Output type manage:
header("content-type: application/json; charset=UTF-8");
// API domain:
$api = "https://api.ineo-team.ir"; // Don't change it.
// API parameters:
$parameters = http_build_query(array(
	'link' => "https://example.ir/project/b.php", // Required
	'time' => 30, // Required, Times: 1, 2, 5, 10, 15 and 30
	'name' => "myCronJob" // Optional
));
// API request url:
$requestUrl = $api."/cronjob.php?".$parameters; // Don't change it.
// Get contents:
$output = json_decode(file_get_contents($requestUrl));
// Show output data with json:
echo json_encode(['ok' => $output->ok, 'status' => $output->status, 'result' => [
	'link' => $output->result->link,
	'time' => $output->result->time,
	'name' => $output->result->name,
	'code' => $output->result->code,
	'id' => $output->result->id,
	'type' => $output->result->type,
]]);
// Delete error_log file:
unlink("error_log");
?>
