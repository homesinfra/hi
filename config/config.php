<?php
ob_start(); //Turns on output buffering 
session_start();
$timezone = date_default_timezone_set("Asia/Kolkata");
$con = mysqli_connect("localhost", "ankit1928", "Xu.7fU(3#+.F", "interaction1"); //Connection variable
if(mysqli_connect_errno()) 
{
	echo "Failed to connect: " . mysqli_connect_errno();
}
//using pdo
$db=new PDO("mysql:host=localhost;dbname=interaction1","ankit1928","Xu.7fU(3#+.F");

$baseUrl = "homesinfra.com/";
$logoSrc = "https://homesinfra.com/logo-hi.svg";

function lottieImg($link, $size, $classes) {
	echo "<script src='https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js'></script><lottie-player class='".$classes."' src='". $link ."'  background='transparent'  speed='1'  style='width: ".$size."; height:".$size.";'  autoplay></lottie-player>";
}
?>