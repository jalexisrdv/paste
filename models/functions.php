<?php

function b10tobstr($b10) {
    $base = 'ijklGHLMcsFqraPQRtuvwVWXYZmnopIJdeNOyzABfgCDESTUKxbh';
    $strlen = strlen($base);
    $bstr = '';
    while ($b10 > 0) {
      $mod = $b10 % $strlen;
      $b10 = (int)($b10 / $strlen);
          $bstr = $base[$mod].$bstr;
    }
    return $bstr;
}
  
function bstrtob10($str) {
    $base = 'ijklGHLMcsFqraPQRtuvwVWXYZmnopIJdeNOyzABfgCDESTUKxbh';
    $strlen = strlen($base);
    $i = strlen($str)-1;
    $number = 0;
    $pos = 0;
    while ($i >= 0) {
        $aux = $str[$i];
        $aux2 = strpos($base,$aux);
        if (is_numeric($aux2)){
            $number = $number + ($aux2 * pow($strlen,$pos));
        } else {
            $i = 0;
            $number = false;
        }
        $pos++;
        $i--;
    }
    return $number;
}