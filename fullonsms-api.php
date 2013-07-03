<?php
echo '<title>FullOnSms multi wap Sender | vikas</title>';
?>
<?php
$uid = $_REQUEST['uid'];
$pwd = $_REQUEST['pwd'];
$to = explode(',',$_REQUEST['to']);
$msg = rawurlencode($_REQUEST['sms']);

for($i=0; $i<count($to); $i++)

{

$post = "MobileNoLogin=$uid&LoginPassword=$pwd&RememberMe=1";
$url = "http://fullonsms.com/login.php";
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
curl_setopt($ch,CURLOPT_REFERER,"http://fullonsms.com/login.php");
$one = curl_exec( $ch );

if(stristr($one,"login.php"))
{
$tiku = "<font color='red'>Invalid Username Or Password...</font><br><center><a href='index.php'>&raquo; Back To Home</a></center>";
}

else
{

$data = "ActionScript=%2Fhome.php&CancelScript=%2Fhome.php&HtmlTemplate=%2Fdisk1%2Fhtml%2Ffullonsms%2FStaticSpamWarning.html&MessageLength=140&MobileNos=$to[$i]&Message=$msg&SelTpl=defaultId&Gender=0&FriendName=Your%20Friend%20Name&ETemplatesId=&TabValue=contacts";
$url = "http://fullonsms.com/home.php";
curl_setopt( $ch, CURLOPT_URL, $url );
curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/x-www-form-urlencoded","Accept: */*"));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );
curl_setopt($ch,CURLOPT_REFERER,"http://fullonsms.com/home.php?show=contacts");
$two = curl_exec( $ch );
$send = base64_decode('dmlrYXMgc2hhcm1h'); // DONT REMOVE THIS LINE ELSE SCRIPT WILL NOT WORK...
if(stristr($two,"MsgSent.php"))
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
