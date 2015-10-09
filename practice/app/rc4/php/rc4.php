<?php

/*
 * rc4加密算法
 * $pwd 密钥
 * $data 要加密的数据
 */

function rc4 ($pwd, $data)
{
    $key[] ="";
    $box[] ="";
    $cipher = ""; 

    $pwd_length = strlen($pwd);
    $data_length = strlen($data);

    for ($i = 0; $i < 256; $i++)
    {
        $key[$i] = ord($pwd[$i % $pwd_length]);
        $box[$i] = $i;
    }
    
    for ($j = $i = 0; $i < 256; $i++)
    {
        $j = ($j + $box[$i] + $key[$i]) % 256;
        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }

   // echo implode($box, ' '), "\n";

    for ($a = $j = $i = 0; $i < $data_length; $i++)
    {
        $a = ($a + 1) % 256;
        $j = ($j + $box[$a]) % 256;

        $tmp = $box[$a];
        $box[$a] = $box[$j];
        $box[$j] = $tmp;

        $k = $box[(($box[$a] + $box[$j]) % 256)];
        $cipher .= chr(ord($data[$i]) ^ $k);
    }    
    return $cipher;
}

if (count($argv) > 3) {
    if ($argv[1] == "enb") {
        echo $data = base64_encode(rc4($argv[2], $argv[3])) . "\n";
    } else if ($argv[1] == "deb") {
        echo $data = rc4($argv[2], base64_decode($argv[3])) . "\n";
    }
}else{    
    $key = "12345678";
    $data = "梯子网@91waijiao";
    echo "key : " . $key . "\n";
    echo "raw : " . $data . "\n";
    echo "encrypt  :" . ($encrypt_data = rc4($key, $data)) . "\n";
    echo "encrypt64:" . base64_encode($encrypt_data) . "\n";
    echo "decrypt  :" . rc4($key, $encrypt_data) . "\n";
}
