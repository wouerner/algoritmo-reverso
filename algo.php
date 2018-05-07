<?php

function cript($cpf , $senha) 
{
    $w = null;
    $s = null; 
    $t1 = null; 
    $t2 = null;
    $k = null;
    $i = null;
    $j = null;
    $f = null;
    $v = null;

    $w = $senha;
    $t1 = strlen($cpf);
    $t2 = strlen($w);

    /* var_dump($t1, $t2); */

    /* while($w < 15) */
    /* { */
    /*     echo 'while'; */
    /*     $w = $w + $w; */
    /* } */

    $w = substr($w, 0, 15); 
    $k = ord(substr($w,0,1)) + 2;

    echo 'k: ' . $k . ' chr: ' . chr($k) . PHP_EOL;
    /* die; */


    $s = null;
    $i = 0;
    /* var_dump($w, $k, substr($w,0,1), ord(substr($w,0,1))); */
    /* var_dump($w); */
    /* die; */

    while($i < 15){
        $i++;
        $v = ($t1 + $t2) * $k/$i;
        /* var_dump($v); */
        /* break; */
        $f = ord(substr($w, 0, 1));
        $w = substr($w, 1, 15);
        $j = (($f*$k) + $t1 + ($t2 * $f)) / $i;
        $v += $j;

        $j = $v % 94;
        /* var_dump($j, $v, chr(34 + $j)); */

        /* var_dump($j, ord('&')); */
        /* break; */
        $s = $s . chr(33 + $j);
        var_dump($s);
        break;
    }
    die;

    $result = null;
    return $result;
}

/* echo cript('12307444793', '123456'); */


function revert ($string) {
    echo $string, ord($string) . PHP_EOL;
    echo  '$j: ' . (ord($string) - 33 ). PHP_EOL;
}

revert('&');
