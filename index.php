<?php
error_reporting(0);
echo " HAPPY LOOTING!! \n";

$ar= array("1282");



$n=4;

function getName($n) {
    $characters = '0123456789';
    $randomString = '';
 
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
 

    return $randomString;
}

$mnk = getName($n);
$rd = rand(0,999);
$vvv = "Mozilla/5.0 (Linux; Android 2.3.6) AppleWebKit/533.1 (KHTML, like Gecko) edge X/".$mnk."";
$xc = rand(1,100);
$ipp = "122.2.203.".$xc."";



function ofer($url, $method, $data = null) {
	global $ipp, $vvv;
    $header = array(
        "Host: excentiv.com",
        "content-type: application/x-www-form-urlencoded",
        "X-Forwarded-For: ".$ipp."",
        "user-agent: ".$vvv.""
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIE, "");
    curl_setopt($ch, CURLOPT_COOKIEFILE,"cookie.txt");
    curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function batt($url, $method, $data = null) {
	global $ipp, $vvv;
    $header = array(
        "Host: coins-battle.com",
        "upgrade-insecure-requests: 1",
        "content-type: application/x-www-form-urlencoded",
        "X-Requested-With: XMLHttpRequest",
        "X-Forwarded-For: ".$ipp."",
        "user-agent: ".$vvv.""
    );
    //$proxy = 'http://jmdzpqpq:imrbe2ogb5md@2.56.119.93:5074';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIE, "");
    curl_setopt($ch, CURLOPT_COOKIEFILE,"cookie.txt");
    curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}


function solveCaptcha(){
	global $vvv;
a:
$sit = "6LdQN2wkAAAAAJcsc6u8xgog6ObX0icCRAowGiW8";
$login = "http://sctg.xyz/in.php?key=Gjd5MbFADqP0DlrurYrAmdIlQ9owqctV|onlyxevil&method=userrecaptcha&googlekey=".$sit."&json=1&pageurl=https://coins-battle.com/game/claimreward";
$ua[] = "User-Agent: ".$vvv."";
$ua[] = "Content-Type: application/json";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $login);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$result = curl_exec($ch);

$re = json_decode($result);
$id = $re->request;
if($id==''){goto a;}
c:
$url = "http://sctg.xyz/res.php?key=Gjd5MbFADqP0DlrurYrAmdIlQ9owqctV|onlyxevil&action=get&id=".$id."";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$proxy = 'socks5://lgekvzsx:cn78dlxqoz27@38.154.227.167:5868';
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
curl_setopt($ch, CURLOPT_PROXY, $proxy);       
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
$res = curl_exec($ch);

if ($res == 'CAPCHA_NOT_READY') {          
        sleep(6);
        goto c;
    }
if($res=="ERROR_CAPTCHA_UNSOLVABLE"){sleep(80);goto a;}
$captcha = str_replace("OK|", "", $res);
curl_close($ch);
return $captcha;
}
function token(){
	global $use;

$url = "https://excentiv.com/offerwall/?userid=".$use."&key=fXxIRKDC2bEyjPnzG8Jd";
//$url = "https://excentiv.com/offerwall?userid=4b4b6bf41acc&key=5eaQHDSVYcwbdACp6ZB7";
$of = ofer($url, 'GET');

sleep(5);
//if (strpos($of, "Games") === false) {echo" Game Hilang \n";sleep(99999);}
$tokk = explode('"',explode('<button value="https://coins-battle.com?token=', $of)[1])[0];
if($tokk==""){echo" Game Hilang \n";sleep(999995);}
return $tokk;
}

$bb = 0;

xx:
unlink('cookie.txt');

//$ar= array("4b4b6bf41acc","2957ded8262f","e5cfd39424ff","27b2485eed06","c98283105579");

$use = $ar[$bb];
echo "userid = ".$use." \n";
if($use == ""){echo "Complete!!! \n";unlink('cookie.txt');sleep(99999);}

$rot = token();

$url = "https://coins-battle.com/?token=".$rot."";
$bat = batt($url, 'GET');

$ui = rand(1,12);

zz:

while(true):
$url = "https://coins-battle.com/game/play/".$ui."";
$btc = batt($url, 'GET');
$con = explode(' </b>&nbsp;',explode('<b class="gradient-text">Website: ', $btc)[1])[0];
if($con == ""){$bb=$bb;goto xx;}
if(isset($con)) {
    $dx="ON";
}
//$sit = explode('"',explode('<div class="g-recaptcha" data-sitekey="', $btc)[1])[0];
$idd = explode('">',explode('<input type="hidden" name="game_id" value="', $btc)[1])[0];
$csf = explode('">',explode('<input type="hidden" name="csrf_token" value="', $btc)[1])[0];
$tim = explode("';",explode("let ctimer = '", $btc)[1])[0];
$lef = explode(' today',explode('<p><b>You have already play ', $btc)[1])[0];
if($lef=="70/70"){$bb=$bb+1;goto xx;}

$capv = solveCaptcha();

$url = 'https://coins-battle.com/game/claimreward';
$data = "game_id=".$idd."&csrf_token=".$csf."&captcha=recaptchav2&g-recaptcha-response=".$capv."";
$las = batt($url, 'POST', $data);

$suc = explode(', to continue earning',explode('<div class="alert text-center alert-success"><i class="fa fa-check-circle"></i> ', $las)[1])[0];
date_default_timezone_set('Asia/Jakarta');
$timestamp = time();
$wak = date("[H:i]", $timestamp);
if (strpos($suc, "obtained") !== false) {echo"[".$dx."] ".$wak."  [".$lef."] $suc \n";}

sleep($tim);
if($lef=="69/70"){$bb=$bb+1;goto xx;}


endwhile;




?>