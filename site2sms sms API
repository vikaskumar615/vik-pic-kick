<?php
echo '<title>site2sms Wap Sender | site2sms</title>';
?>
<?php

$uid=$_REQUEST['uid'];
$pwd=$_REQUEST['pwd'];
$to = $_REQUEST['to'];
$msg = rawurlencode($_REQUEST['sms']);


$post = "userid=$uid&password=$pwd&Submit=Sign+in";
$url = "http://site2sms.com/auth.asp";
$cookie = tempnam ("/tmp", "CURLCOOKIE");
$ch = curl_init();
curl_setopt( $ch, CURLOPT_USERAGENT,"User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0" );
curl_setopt( $ch, CURLOPT_URL, $url );
curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/x-www-form-urlencoded","Accept: */*"));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );
curl_setopt($ch,CURLOPT_REFERER,"http://site2sms.com/login.asp");
$one = curl_exec( $ch );

if(stristr($one,"login.asp"))
{
$tiku = "<font color='red'>Invalid Username Or Password...</font><br><center><a href='index.php'>&raquo; Back To Home</a></center>";
}

else
{

$data = "txtMessage=$msg&txtMobileNo=$to&txtGroup=0";
$url = "http://site2sms.com/user/send_sms_next.asp";
curl_setopt( $ch, CURLOPT_URL, $url );
curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/x-www-form-urlencoded","Accept: */*"));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );
curl_setopt($ch,CURLOPT_REFERER,"http://site2sms.com/user/send_sms_confirm.asp");
$two = curl_exec( $ch );
$send = base64_decode('dmlrYXMgc2hhcm1h'); // DONT REMOVE THIS LINE ELSE SCRIPT WILL NOT WORK...
if(stristr($two,"successful"))
{
$tiku = "<font color='green'>SMS Sent Successfully...</font><br>".$send."<br><center><a href='index.php'>&raquo; Back To Home</a></center>";
}
else
{
$tiku = "<font color='red'>SMS Sending Failed...</font><br>".$send."<br><center><a href='index.php'>&raquo; Back To Home</a></center>";
}

}

echo $tiku;

?>
