<?php
// phpinfo();
header("Content-type: text/plain");

$q = $_SERVER['QUERY_STRING'];

if ($q=="scan") scan();
else if ($q=="info") info();
else if ($q=="enableSTA") enableSTA();
else if ($q=="disableSTA") disableSTA();
else if ($_POST["action"]=="connect") connect($_POST["ssid"],$_POST["key"]);
else die("?");

function scan() {
  $networks = shell_exec("iwinfo wlan0 scan |  grep ESSID | cut -d '\"' -f2"); 
  $networks = explode("\n",$networks);
  die(json_encode($networks));
}

function info() {
  die(shell_exec("iwinfo"));
}

function enableSTA() {
  die(shell_exec("uci set wireless.sta.disabled=0 && uci commit && wifi"));
}

function disableSTA() {
  die(shell_exec("uci set wireless.sta.disabled=1 && uci commit && wifi"));
}

function connect($ssid, $key) {
  shell_exec("uci set wireless.sta.ssid='$ssid'");
  shell_exec("uci set wireless.sta.key='$key'");
  shell_exec("uci set wireless.sta.disabled=0");
  shell_exec("uci commit");
  shell_exec("wifi");
  die(json_encode("done"));
}

?>