<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include('config.php');

$data = $_POST;
$output = ['success'=>false];
$cmd = [__DIR__ .'/bin/winApp.exe'];

// get all params from browser
foreach ($data as $key => $value) {
	if($value) $cmd[] = '"'.trim(preg_replace('/\s\s+/', ' ', $value)).'"';
}
$cmd = implode(" ",$cmd);
// Excute file winApp.exe
shell_exec($cmd);
// sleep to make sure file created success before find file
sleep(1);

// Find file newest
$files = array();
foreach (glob("bin/*.{txt}", GLOB_BRACE) as $filename) {
    $files[basename($filename)] = filemtime($filename);
}


if(count($files)) {
	arsort($files);
	reset($files);
	$filename = key($files);
	$output['filename'] = $filename;
	$output['urlview'] = SITEURL.'/action.php?type=view&file='.$filename;
	$output['urldownload'] = SITEURL.'/action.php?type=download&file='.$filename;
	$output['success'] = true;
}

echo json_encode($output,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
?>