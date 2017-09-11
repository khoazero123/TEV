<?php

$type = isset($_GET['type']) ? $_GET['type'] : null;
$file = isset($_GET['file']) ? $_GET['file'] : null;

if (!$file) exit('No file selected');

if(!preg_match('/.txt$/i',$file)) exit('File type not allow!');

$file = __DIR__ .'/bin/'.$file;
if(!file_exists($file)) exit('File not exist!');

if($type=='view') {
	header("Content-Type: text/plain");

	$content = file_get_contents($file);
	echo $content;
} else { // type=download
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename='.basename($file));
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($file));
	readfile($file);
}