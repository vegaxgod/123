<?php

function ajax_echo(
    $title = '',
    $desc = '',
    $error = true,
    $type = 'ERROR',
    $other = null
){
    return json_encode(array(
        "error" => $error,
        "type" => $type,
        "title" => $title,
        "desc" => $desc,
        "other" => $other,
        "datetime" => array(
            'Y' => date('Y'),
            'm' => date('m'),
            'd' => date('d'),
            'H' => date('H'),
            'i' => date('i'),
            's' => date('s'),
            'full' => date('Y-m-d H:i:s')
        )));
};
function FormatNomera($phone){  // приведение номера к международному формату
   preg_match_all("/([0-9])([0-9]{3})([0-9]{2})([0-9]{2})([0-9]{3})/ui", $phone, $matches, PREG_PATTERN_ORDER);
    return "+".$matches[1][0]." (".$matches[2][0].") ".$matches[3][0]."-".$matches[4][0]."-".$matches[5][0];
}
function po4ta($email){ // обфускация почты
    preg_match_all("/(.*)@/ui", $email, $len, PREG_PATTERN_ORDER);

    if(strlen($len[1][0]) == 1)
        preg_match_all("/(.*)@/ui", $email, $matches, PREG_PATTERN_ORDER);
    if(strlen($len[1][0]) >= 2)
        preg_match_all("/.{1}(.*)@/ui", $email, $matches, PREG_PATTERN_ORDER);
    if(strlen($len[1][0]) >= 3)
        preg_match_all("/.{1}(.*).{1}@/ui", $email, $matches, PREG_PATTERN_ORDER);
    if(strlen($len[1][0]) >= 4)
        preg_match_all("/.{1}(.*).{1}@/ui", $email, $matches, PREG_PATTERN_ORDER);
    if(strlen($len[1][0]) >= 6)
        preg_match_all("/.{3}(.*).{2}@/ui", $email, $matches, PREG_PATTERN_ORDER);

    $stars = "";
    for ($i=0; $i < strlen($matches[1][0]); $i++) $stars = $stars.'*';
    return str_replace($matches[1][0], $stars, $email);
}
function ViborMaxMin($arr){ // сортировка выбором от максимального к минимальному
    $size = count($arr);
    for($i=0; $i < $size; $i++) {
        $k=$i; 
        $x=$arr[$i];
        for($j=$i+1; $j < $size; $j++)
          if ($arr[$j] > $x) {
            $k=$j; $x=$arr[$j];
          }

        $arr[$k] = $arr[$i]; $arr[$i] = $x;
    }
    return $arr;
}

function ViborMinMax($arr){ // сортировка выбором от минимального к максимальному
    $size = count($arr);
    for($i=0; $i < $size; $i++) {
        $k=$i;
        $x=$arr[$i];
        for($j=$i+1; $j < $size; $j++)
          if ($arr[$j] < $x) {
            $k=$j; $x=$arr[$j];
          }
        $arr[$k] = $arr[$i]; 
        $arr[$i] = $x;
    }
    return $arr;
}

