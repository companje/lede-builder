<?php
// header("Content-type: text/plain");
date_default_timezone_set('Europe/Amsterdam');

if (isset($_FILES["sketch"])) {
  $name = $_POST["name"];
  $folder = "/root/sketches";
  $filename = date('Y-m-d-H-i-s') . "-" . preg_replace( '/[^a-zA-Z0-9]+/', '-', $name);
  move_uploaded_file($_FILES["sketch"]["tmp_name"], "$folder/$filename.d3sketch");
  move_uploaded_file($_FILES["thumb"]["tmp_name"], "$folder/$filename.png");
}
?>