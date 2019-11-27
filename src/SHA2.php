<?php

namespace src;

class SHA2 extends HashAlgorithm {
  /**
   * {@InheritDoc}
   */
  public static function create() {
    return new SHA2();
  }

  /**
   * @return string
   */
  public function hash() {
    $h0 = '6a09e667';
    $h1 = 'bb67ae85';
    $h2 = '3c6ef372';
    $h3 = 'a54ff53a';
    $h4 = '510e527f';
    $h5 = '9b05688c';
    $h6 = '1f83d9ab';
    $h7 = '5be0cd19';

    $k = [
      '428a2f98', '71374491', 'b5c0fbcf', 'e9b5dba5', '3956c25b', '59f111f1', '923f82a4', 'ab1c5ed5',
      'd807aa98', '12835b01', '243185be', '550c7dc3', '72be5d74', '80deb1fe', '9bdc06a7', 'c19bf174',
      'e49b69c1', 'efbe4786', '0fc19dc6', '240ca1cc', '2de92c6f', '4a7484aa', '5cb0a9dc', '76f988da',
      '983e5152', 'a831c66d', 'b00327c8', 'bf597fc7', 'c6e00bf3', 'd5a79147', '06ca6351', '14292967',
      '27b70a85', '2e1b2138', '4d2c6dfc', '53380d13', '650a7354', '766a0abb', '81c2c92e', '92722c85',
      'a2bfe8a1', 'a81a664b', 'c24b8b70', 'c76c51a3', 'd192e819', 'd6990624', 'f40e3585', '106aa070',
      '19a4c116', '1e376c08', '2748774c', '34b0bcb5', '391c0cb3', '4ed8aa4a', '5b9cca4f', '682e6ff3',
      '748f82ee', '78a5636f', '84c87814', '8cc70208', '90befffa', 'a4506ceb', 'bef9a3f7', 'c67178f2',
    ];

    $w = $this->init();
    $count = count($w);

    for($i = 0; $i < $count / 16; $i++) {
      for ($j = 16 * ($i + 1); $j < 64 * ($i + 1); $j++) {
        $s0 = hexdec($this->rightRotate(bindec($w[$j - 15]), 7)) ^ hexdec($this->rightRotate(bindec($w[$j - 15]), 18)) ^ hexdec($this->rightRotate(bindec($w[$j - 15]), 3));
        $s1 = hexdec($this->rightRotate(bindec($w[$j - 2]), 17)) ^ hexdec($this->rightRotate(bindec($w[$j - 2]), 17)) ^ hexdec($this->rightRotate(bindec($w[$j - 2]), 10));
        $w[$j] = decbin(bindec($w[$j - 16]) + $s0 + bindec($w[$j - 7]) + $s1 & 0xffffffff);
        $w[$j] = str_pad($w[$j], '32', '0', STR_PAD_LEFT);
      }

      $a = hexdec($h0);
      $b = hexdec($h1);
      $c = hexdec($h2);
      $d = hexdec($h3);
      $e = hexdec($h4);
      $f = hexdec($h5);
      $g = hexdec($h6);
      $h = hexdec($h7);

      for ($j = 0 + (64 * $i); $j < 64 + (64 * $i); $j++) {
        $S1 = hexdec($this->rightRotate($e, 6)) ^ hexdec($this->rightRotate($e, 11)) ^ hexdec($this->rightRotate($e, 25));
        $ch = ($e & $f) ^ ((~ $e) & $g);
        $temp1 = $h + $S1 + $ch + hexdec($k[$j]) + bindec($w[$j]);
        $S0 = hexdec($this->rightRotate($a, 2)) ^ hexdec($this->rightRotate($a, 13)) ^ hexdec($this->rightRotate($a, 22));
        $maj = ($a & $b) ^ ($a & $c) ^ ($b & $c);
        $temp2 = $S0 + $maj;

        $h = $g & 0xffffffff;
        $g = $f & 0xffffffff;
        $f = $e & 0xffffffff;
        $e = $d + $temp1 & 0xffffffff;
        $d = $c & 0xffffffff;
        $c = $b & 0xffffffff;
        $b = $a & 0xffffffff;
        $a = $temp1 + $temp2 & 0xffffffff;
      }

      $h0 = dechex(hexdec($h0) + $a & 0xffffffff);
      $h1 = dechex(hexdec($h1) + $b & 0xffffffff);
      $h2 = dechex(hexdec($h2) + $c & 0xffffffff);
      $h3 = dechex(hexdec($h3) + $d & 0xffffffff);
      $h4 = dechex(hexdec($h4) + $e & 0xffffffff);
      $h5 = dechex(hexdec($h5) + $f & 0xffffffff);
      $h6 = dechex(hexdec($h6) + $g & 0xffffffff);
      $h7 = dechex(hexdec($h7) + $h & 0xffffffff);
    }

    $hash = '';
    foreach (array($h0, $h1, $h2, $h3, $h4, $h5, $h6, $h7) as $x) {
      $hash .= $x;
    }

    return $hash;
  }

  /**
   * @return mixed
   */
  protected function init() {
    $bin = '';
    $length = strlen($this->string) * 8;

    for ($i = 0; $i < $length / 8; $i++) {
      $bin .= str_pad(decbin(ord($this->string[$i])), 8, '0', STR_PAD_LEFT);
    }

    $len_in_bin = decbin($length);
    $len_in_bin = str_pad($len_in_bin, 64, '0', STR_PAD_LEFT);

    $bin = str_pad($bin, $length, '0', STR_PAD_LEFT);
    $bin .= '1';
    $bin = str_pad($bin, '448', '0', STR_PAD_RIGHT);
    $bin .= $len_in_bin;

    $block = str_split($bin, 32);
    return $block;
  }
}