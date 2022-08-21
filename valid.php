<?php
error_reporting(0);
date_default_timezone_set('CET');
ini_set("default_socket_timeout", 6000);

$red = "\033[0;31m";
$green = "\033[0;32m";
$yellow = "\033[0;33m";
$cyan = "\033[0;36m";
$blue = "\033[0;34m";
$normal = "\033[0m";


$banned = "$cyan


                  ___         ___        ___
                 (   ).-.    (   )      (   )
 ___  ___  .---.  | |( __) .-.| |  .---. | |_     .--.  ___ .-.      .---.  ___ .-. .-.     .---.   .--.    .--.  ___ .-.
(   )(   )/ .-, \ | |(''')/   \ | / .-, (   __)  /    \(   )   \    / .-, \(   )   '   \   / .-, \ /    \  /    \(   )   \
 | |  | |(__) ; | | | | ||  .-. |(__) ; || |    |  .-. ;| ' .-. ;  (__) ; | |  .-.  .-. ; (__) ; |.  .-. ||  .-. ;|  .-. .
 | |  | |  .'`  | | | | || |  | |  .'`  || | ___| |  | ||  / (___)   .'`  | | |  | |  | |   .'`  || |  | || |  | || |  | |
 | |  | | / .'| | | | | || |  | | / .'| || |(   ) |  | || |         / .'| | | |  | |  | |  / .'| || |  | || |  | || |  | |
 | |  | || /  | | | | | || |  | || /  | || | | || |  | || |        | /  | | | |  | |  | | | /  | (___)-` /| |  | || |  | |
 ' '  ; '; |  ; | | | | || '  | |; |  ; || ' | || '  | || |        ; |  ; | | |  | |  | | ; |  ; |   '. \ | '  | || |  | |
  \ `' / ' `-'  | | | | |' `-'  /' `-'  |' `-' ;'  `-' /| |        ' `-'  | | |  | |  | | ' `-'  | ___ \ ''  `-' /| |  | |
   '_.'  `.__.'_.(___|___)`.__,' `.__.'_. `.__.  `.__.'(___)       `.__.'_.(___)(___)(___)`.__.'_.(   ) ; |`.__.'(___)(___)
                                                                                                   \ `-'  /
                                                                                                    ',__.'
                                                               $yellow Automatic Save Valid Email on live.txt & Invalid on Die.txt
                                                                Contact me : https://www.facebook.com/oka076 [ Oka ]
$normal\n";

echo $banned;



echo $cyan . "                                    ## Input List : ";
$getlist = trim(fgets(STDIN));
$list = preg_split(
    '/\n|\r\n?/',
    trim(file_get_contents($getlist))
);
for ($i = 0; $i < count($list); $i++) {
    # code...
    $curl_ = file_get_contents("https://nuajgakwe.online/api_amz.php?email=" . $list[$i]);
    $json_parse = json_decode($curl_);
    if ($json_parse->Result->Status == 'LIVE') {
        print_r($green . $list[$i] . " => " . $json_parse->Result->Status . "\n");
        file_put_contents('live.txt', $list[$i] . PHP_EOL, FILE_APPEND);
    } elseif ($json_parse->Result->Status == 'DIE') {
        print_r($yellow . $list[$i] . " => " . $json_parse->Result->Status . "\n");
        file_put_contents('die.txt', $list[$i] . PHP_EOL, FILE_APPEND);
    }
}
