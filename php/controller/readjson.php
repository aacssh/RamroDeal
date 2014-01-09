<?php
header('Content-Type: application/json');
$file = 'json.txt';

if($handle = fopen($file, r)){
	$content = fread($handle, filesize($file));
	fclose($handle);
}
echo $content;
?>