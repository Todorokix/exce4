<?php
error_reporting(0);
echo " HAPPY LOOTING!! \n";

function http_request($url, $method = 'GET', $data = null, $headers = []) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
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

function solveCaptcha(){
	global $vvv;
a:
$sit = "6LfqFAcdAAAAAKWiUVv3EkT0le7pDL6lnsGfe5l6";
$login = "http://sctg.xyz/in.php?key=Gjd5MbFADqP0DlrurYrAmdIlQ9owqctV&method=userrecaptcha&googlekey=".$sit."&json=1&pageurl=https://ourcoincash.xyz/faucet/verify";
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
while(true):
$headers = [
    "Host: ourcoincash.xyz",
    "content-type: application/x-www-form-urlencoded",
    "User-Agent: Mozilla/5.0 (Linux; Android 11; V2043 Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/125.0.6422.83 Mobile Safari/537.36",
    "Cookie: ci_session=0a5154e4055033e4dfd9c8b075d4ef01d36084e7; csrf_cookie_name=38d1d6b61fbac95b42855f7821f1b013"
];
$url = "https://ourcoincash.xyz/faucet";
$res = http_request($url, 'GET', null, $headers);
$csf = explode('">',explode('<input type="hidden" name="csrf_token_name" id="token" value="', $res)[1])[0];
$tok = explode('">',explode('<input type="hidden" name="token" value="', $res)[1])[0];
if($csf == ""){echo "csf hilang \n";sleep(99999);}
$capp = solveCaptcha();

$url = "https://ourcoincash.xyz/faucet/verify";
$data = "csrf_token_name=".$csf."&token=".$tok."&captcha=recaptchav2&g-recaptcha-response=".$capp."";
$response = http_request($url, 'POST', $data, $headers);
$lef = explode('</h4>',explode('<h4 class="lh-1 mb-1">', $response)[4])[0];
if($lef == "1/200"){sleep(99999);}
echo " [".$lef."]  \n";
sleep(10);
endwhile;


?>
