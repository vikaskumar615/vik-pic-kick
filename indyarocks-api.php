<?php
echo '<title>indyarocks Wap Sender | vikaskumar615</title>';
?>
<?php
$uid = $_REQUEST['uid'];
$pwd = $_REQUEST['pwd'];
$to = explode(',',$_REQUEST['to']);
$msg = rawurlencode($_REQUEST['sms']);

for($i=0; $i<count($to); $i++)

{

$post = "LoginForm%5Busername%5D=$uid&LoginForm%5Bpassword%5D=$pwd&yt0=Login";
$url = "http://www.indyarocks.com/login";
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
curl_setopt($ch,CURLOPT_REFERER,"http://www.indyarocks.com/login");
$one = curl_exec( $ch );

if(stristr($one,"login.php"))
{
$tiku = "<font color='red'>Invalid Username Or Password...</font><br><center><a href='index.php'>&raquo; Back To Home</a></center>";
}

else
{

$data = "freeSmschkmemberVal=NM&FreeSms%5Bmobile%5D=$to&FreeSms%5Bpost_message%5D=$msg";
$url = "http://www.indyarocks.com/send-free-sms";
curl_setopt( $ch, CURLOPT_URL, $url );
curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/x-www-form-urlencoded","Accept: */*"));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );
curl_setopt($ch,CURLOPT_REFERER,"http://www.indyarocks.com/send-free-sms");
$two = curl_exec( $ch );
$send = base64_decode('dmlrYXMgc2hhcm1h'); // DONT REMOVE THIS LINE ELSE SCRIPT WILL NOT WORK...
if(stristr($two,"successful"))
{
$tiku = "<font color='green'>SMS Sent Successfully...</font><br>".$send."<br><center><a href='index.php'>&raquo; Back To Home</a></center><br>";
}
else
{
$tiku = "<font color='red'>SMS Sending Failed...</font><br>".$send."<br><center><a href='index.php'>&raquo; Back To Home</a></center><br>";
}

}
}


echo $tiku;
?>
