<?php

require_once("system/config.php");

$post_time = date("H:i", $time);
//
// Logged in checker
setcookie("username","",time() - (1000 * 1000));
setcookie("password","",time() - (1000 * 1000));
?>
