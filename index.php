<?php
error_reporting(0);
echo " HAPPY LOOTING!! \n";
function solveCaptcha(){
	global $vvv;
a:
$sit = "6LdpUzMnAAAAAEFrPfwSJ7FA1H31hZ4-2e-rAsx7";
$login = "http://api.sctg.xyz/in.php?key=Gjd5MbFADqP0DlrurYrAmdIlQ9owqctV&method=userrecaptcha&googlekey=".$sit."&json=1&pageurl=https://cryptovertz.com/rewards/reward.php";
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
$url = "https://xzz3-60aa567db750.herokuapp.com/?key=Gjd5MbFADqP0DlrurYrAmdIlQ9owqctV&id=".$id."";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$res = curl_exec($ch);

$rf = json_decode($res);
$hy = $rf->response;

if ($hy == 'CAPCHA_NOT_READY') {          
        sleep(6);
        goto c;
    }
if($hy=="ERROR_CAPTCHA_UNSOLVABLE"){sleep(80);goto a;}

$captcha = str_replace("OK|", "", $hy);
curl_close($ch);
return $captcha;
}
function http_request($url, $method = 'GET', $data = null, $headers = []) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($ch, CURLOPT_COOKIEFILE,"cookie.txt");
    curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
    if (strtoupper($method) === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        return "cURL Error: $error_msg";
    }
    curl_close($ch);
    return $response;
}

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
$vvv = "Mozilla/5.0 (Linux; Android 13; SM-A515U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Mobile Safari/537.36 X/".$mnk."";
function generateRandomIP() {
    $octet1 = rand(1, 255);
    $octet2 = rand(0, 255);
    $octet3 = rand(0, 255);
    $octet4 = rand(1, 255);
    $randomIP = "$octet1.$octet2.$octet3.$octet4";
    return $randomIP;
}
$ipx = generateRandomIP();
$ipxx = generateRandomIP();


x:
$ar= array("upDU6Z4mtV");
$user = $ar[0];

$headers = [
       "Host: cryptovertz.com",
        "origin: https://cryptovertz.com",
        "content-type: application/x-www-form-urlencoded",
        "X-Requested-With: XMLHttpRequest",
        "X-Forwarded-For: $ipx, $ipxx",      
        "user-agent: $vvv"
];
$url = "https://cryptovertz.com/rewards/start.php?partner=flukegames&user=".$user."&crypto=SHIB";
$str = http_request($url, 'GET', null, $headers);
$url = "https://cryptovertz.com/";
$data = "submit=Continue";
$response = http_request($url, 'POST', $data, $headers);

while(true):
$url = "https://cryptovertz.com/game.php?id=boxing-stars";
$str = http_request($url, 'GET', null, $headers);
$lef = explode(' / 50</button>',explode('<button class="btn btn-danger">Limit: ', $str)[1])[0];

sleep(71);
$capv = solveCaptcha();

$url = 'https://cryptovertz.com/rewards/reward.php';
$data = "rcapchta_response=".$capv."";
$response = http_request($url, 'POST', $data, $headers);

$suc = explode("<a class='btn btn-primary' href='rewards/start.php?",$response);
$ren = $suc[0];
if (strpos($response, "Invalid Claim") !== false) {goto x;}
if (strpos($response, "FAILED") !== false) {goto x;}
if (strpos($response, "limit reached") !== false) {echo "Complete!!! \n";unlink('cookie.txt');sleep(99999);}
//$user = explode('&crypto',explode('user=', $response)[1])[0];
date_default_timezone_set('Asia/Jakarta');
$timestamp = time();
$wak = date("[H:i]", $timestamp);
if (strpos($response, "been paid") !== false) {echo" ".$wak." ".$ren." : $user\n";}else{echo "Claim gagal! \n";goto x;}
$url = "https://cryptovertz.com/rewards/start.php?partner=flukegames&user=".$user."&crypto=SHIB";
$str = http_request($url, 'GET', null, $headers);
//if($lef == "49"){echo "Complete!!! \n";unlink('cookie.txt');sleep(99999);}
endwhile;
?>
