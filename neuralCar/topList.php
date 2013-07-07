<?php
	require("config.php");
	$res = $database->query("SELECT * FROM cars ORDER BY score desc");
	if (!$res) {
		exit('{"error": "' . $database->error . '"}');
	}
	$output = '{"success": [';
	while ($result = $res->fetch_assoc()) {
		$output .= '{"network": ' . $result['network'] . ', "score": ' . $result['score'] . ', "verified": ' . $result['verified'] . '},';
	}
	$output = substr($output, 0, -1);
	$output .= "]}";
	exit($output);
?>
