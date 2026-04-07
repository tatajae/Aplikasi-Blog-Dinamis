<?php
session_start();

$chars = "abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ";
$captcha = substr(str_shuffle($chars),0,4);

$_SESSION['captcha'] = $captcha;

header("Content-type: image/png");

$image = imagecreate(100,40);
$bg = imagecolorallocate($image,255,255,255);
$text = imagecolorallocate($image,0,0,0);

imagestring($image,5,30,10,$captcha,$text);

imagepng($image);
imagedestroy($image);
?>