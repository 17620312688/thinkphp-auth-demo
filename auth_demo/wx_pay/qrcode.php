<?php
error_reporting(E_ERROR);
require_once 'phpqrcode.php';
$url = urldecode($_GET["data"]);
QRcode::png($url);
