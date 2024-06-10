<?php
error_reporting(0);
echo " •HAPPY LOOTING• \n";
unlink('cookie.txt');

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
function recpt(){
	global $vvv;
a:
$sit = "6Lcd0SYpAAAAAPZk7LMsCwVld1y8gAGhjbbHM5x1";
$login = "http://sctg.xyz/in.php?key=6Xb2iI4CenClVzEWLP0ScKbTJX0jJWDp&method=userrecaptcha&googlekey=".$sit."&json=1&pageurl=https://acryptominer.io/user/login";
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
$url = "https://xzzzapii-842057509f19.herokuapp.com/?key=6Xb2iI4CenClVzEWLP0ScKbTJX0jJWDp&id=".$id."";
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
function solveCaptcha(){
	global $vvv;
a:
$sit = "0x4AAAAAAAZWGl4XNAQLb9Uf";
$login = "http://api.sctg.xyz/in.php?key=6Xb2iI4CenClVzEWLP0ScKbTJX0jJWDp&method=turnstile&sitekey=".$sit."&json=1&pageurl=https://acryptominer.io/user/faucet";
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
$url = "https://xzzzapii-842057509f19.herokuapp.com/?key=6Xb2iI4CenClVzEWLP0ScKbTJX0jJWDp&id=".$id."";
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
    //curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
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

$headers = [
       "Host: acryptominer.io",
        "origin: https://acryptominer.io",
        "content-type: application/x-www-form-urlencoded",
        "Connection: keep-alive",
        "user-agent: $vvv"
];


$url = "https://acryptominer.io/user/login";
$str = http_request($url, 'GET', null, $headers);
$tok = explode('">',explode('<input type="hidden" name="_token" value="', $str)[1])[0];

$capt = recpt();

$url = "https://acryptominer.io/user/login";
$data = "_token=".$tok."&username=kamyessr&password=Nung1234&g-recaptcha-response=".$capt."&remember=on";
$response = http_request($url, 'POST', $data, $headers);


while(true):
$url = "https://acryptominer.io/user/faucet";
$str = http_request($url, 'GET', null, $headers);
//$tim = explode(';',explode('var timeUntilNextClaim = ', $str)[1])[0];
//$mod = str_replace('var timeUntilNextClaim = '.$tim.';', 'var timeUntilNextClaim = 0;', $str);
//echo " $mod \n";
$lef = explode('">',explode('<input type="hidden" name="_token" value="', $str)[1])[0];
if($lef == ""){echo "csf hilang \n";sleep(99999);}
$cap = solveCaptcha();
$url = 'https://acryptominer.io/user/faucet';
$data = "_token=".$lef."&cf-turnstile-response=".$cap."";
$response = http_request($url, 'POST', $data, $headers);
$res = explode('",',explode('message: "', $response)[1])[0];

date_default_timezone_set('Asia/Jakarta');
$timestamp = time();
$wak = date("[H:i]", $timestamp);
if (strpos($res, "successfully") !== false) {echo" ".$wak." ".$res." \n";sleep(301);}

endwhile;
?>
