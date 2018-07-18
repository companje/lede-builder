<?php
header('Content-type: application/json');
$files = glob("/root/sketches/*.d3sketch");
usort($files, create_function('$a,$b', 'return filemtime($b) - filemtime($a);'));

$files = str_replace('/root/sketches/', '', $files);
$files = str_replace('.d3sketch', '', $files);

echo json_encode($files);
?>
