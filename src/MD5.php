<?php

namespace src;

class MD5 extends HashAlgorithm {
  /**
   * @return string
   */
  public function hash() {
    $a = '67452301';
    $b = 'EFCDAB89';
    $c = '98BADCFE';
    $d = '10325476';

    $M = $this->init();

    for($i = 0; $i <= count($M) / 16 - 1; $i++){
      $A = $a;
      $B = $b;
      $C = $c;
      $D = $d;

      /* 0 - 15 */
      $this->process($A, $B, $C, $D, $M[0 + ($i * 16)], 7, 'd76aa478', 1);
      $this->process($D, $A, $B, $C, $M[1 + ($i * 16)], 12, 'e8c7b756', 1);
      $this->process($C, $D, $A, $B, $M[2 + ($i * 16)], 17, '242070db', 1);
      $this->process($B, $C, $D, $A, $M[3 + ($i * 16)], 22, 'c1bdceee', 1);
      $this->process($A, $B, $C, $D, $M[4 + ($i * 16)], 7, 'f57c0faf', 1);
      $this->process($D, $A, $B, $C, $M[5 + ($i * 16)], 12, '4787c62a', 1);
      $this->process($C, $D, $A, $B, $M[6 + ($i * 16)], 17, 'a8304613', 1);
      $this->process($B, $C, $D, $A, $M[7 + ($i * 16)], 22, 'fd469501', 1);
      $this->process($A, $B, $C, $D, $M[8 + ($i * 16)], 7, '698098d8', 1);
      $this->process($D, $A, $B, $C, $M[9 + ($i * 16)], 12, '8b44f7af', 1);
      $this->process($C, $D, $A, $B, $M[10 + ($i * 16)], 17, 'ffff5bb1', 1);
      $this->process($B, $C, $D, $A, $M[11 + ($i * 16)], 22, '895cd7be', 1);
      $this->process($A, $B, $C, $D, $M[12 + ($i * 16)], 7, '6b901122', 1);
      $this->process($D, $A, $B, $C, $M[13 + ($i * 16)], 12, 'fd987193', 1);
      $this->process($C, $D, $A, $B, $M[14 + ($i * 16)], 17, 'a679438e', 1);
      $this->process($B, $C, $D, $A, $M[15 + ($i * 16)], 22, '49b40821', 1);

      /* 16 - 31 */
      $this->process($A, $B, $C, $D, $M[1 + ($i * 16)], 5, 'f61e2562', 2);
      $this->process($D, $A, $B, $C, $M[6 + ($i * 16)], 9, 'c040b340', 2);
      $this->process($C, $D, $A, $B, $M[11 + ($i * 16)], 14, '265e5a51', 2);
      $this->process($B, $C, $D, $A, $M[0 + ($i * 16)], 20, 'e9b6c7aa', 2);
      $this->process($A, $B, $C, $D, $M[5 + ($i * 16)], 5, 'd62f105d', 2);
      $this->process($D, $A, $B, $C, $M[10 + ($i * 16)], 9, '02441453', 2);
      $this->process($C, $D, $A, $B, $M[15 + ($i * 16)], 14, 'd8a1e681', 2);
      $this->process($B, $C, $D, $A, $M[4 + ($i * 16)], 20, 'e7d3fbc8', 2);
      $this->process($A, $B, $C, $D, $M[9 + ($i * 16)], 5, '21e1cde6', 2);
      $this->process($D, $A, $B, $C, $M[14 + ($i * 16)], 9, 'c33707d6', 2);
      $this->process($C, $D, $A, $B, $M[3 + ($i * 16)], 14, 'f4d50d87', 2);
      $this->process($B, $C, $D, $A, $M[8 + ($i * 16)], 20, '455a14ed', 2);
      $this->process($A, $B, $C, $D, $M[13 + ($i * 16)], 5, 'a9e3e905', 2);
      $this->process($D, $A, $B, $C, $M[2 + ($i * 16)], 9, 'fcefa3f8', 2);
      $this->process($C, $D, $A, $B, $M[7 + ($i * 16)], 14, '676f02d9', 2);
      $this->process($B, $C, $D, $A, $M[12 + ($i * 16)], 20, '8d2a4c8a', 2);

      /* 32 - 47 */
      $this->process($A, $B, $C, $D, $M[5 + ($i * 16)], 4, 'fffa3942', 3);
      $this->process($D, $A, $B, $C, $M[8 + ($i * 16)], 11, '8771f681', 3);
      $this->process($C, $D, $A, $B, $M[11 + ($i * 16)], 16, '6d9d6122', 3);
      $this->process($B, $C, $D, $A, $M[14 + ($i * 16)], 23, 'fde5380c', 3);
      $this->process($A, $B, $C, $D, $M[1 + ($i * 16)], 4, 'a4beea44', 3);
      $this->process($D, $A, $B, $C, $M[4 + ($i * 16)], 11, '4bdecfa9', 3);
      $this->process($C, $D, $A, $B, $M[7 + ($i * 16)], 16, 'f6bb4b60', 3);
      $this->process($B, $C, $D, $A, $M[10 + ($i * 16)], 23, 'bebfbc70', 3);
      $this->process($A, $B, $C, $D, $M[13 + ($i * 16)], 4, '289b7ec6', 3);
      $this->process($D, $A, $B, $C, $M[0 + ($i * 16)], 11, 'eaa127fa', 3);
      $this->process($C, $D, $A, $B, $M[3 + ($i * 16)], 16, 'd4ef3085', 3);
      $this->process($B, $C, $D, $A, $M[6 + ($i * 16)], 23, '04881d05', 3);
      $this->process($A, $B, $C, $D, $M[9 + ($i * 16)], 4, 'd9d4d039', 3);
      $this->process($D, $A, $B, $C, $M[12 + ($i * 16)], 11, 'e6db99e5', 3);
      $this->process($C, $D, $A, $B, $M[15 + ($i * 16)], 16, '1fa27cf8', 3);
      $this->process($B, $C, $D, $A, $M[2 + ($i * 16)], 23, 'c4ac5665', 3);

      /* 48 - 63 */
      $this->process($A, $B, $C, $D, $M[0 + ($i * 16)], 6, 'f4292244', 4);
      $this->process($D, $A, $B, $C, $M[7 + ($i * 16)], 10, '432aff97', 4);
      $this->process($C, $D, $A, $B, $M[14 + ($i * 16)], 15, 'ab9423a7', 4);
      $this->process($B, $C, $D, $A, $M[5 + ($i * 16)], 21, 'fc93a039', 4);
      $this->process($A, $B, $C, $D, $M[12 + ($i * 16)], 6, '655b59c3', 4);
      $this->process($D, $A, $B, $C, $M[3 + ($i * 16)], 10, '8f0ccc92', 4);
      $this->process($C, $D, $A, $B, $M[10 + ($i * 16)], 15, 'ffeff47d', 4);
      $this->process($B, $C, $D, $A, $M[1 + ($i * 16)], 21, '85845dd1', 4);
      $this->process($A, $B, $C, $D, $M[8 + ($i * 16)], 6, '6fa87e4f', 4);
      $this->process($D, $A, $B, $C, $M[15 + ($i * 16)], 10, 'fe2ce6e0', 4);
      $this->process($C, $D, $A, $B, $M[6 + ($i * 16)], 15, 'a3014314', 4);
      $this->process($B, $C, $D, $A, $M[13 + ($i * 16)], 21, '4e0811a1', 4);
      $this->process($A, $B, $C, $D, $M[4 + ($i * 16)], 6, 'f7537e82', 4);
      $this->process($D, $A, $B, $C, $M[11 + ($i * 16)], 10, 'bd3af235', 4);
      $this->process($C, $D, $A, $B, $M[2 + ($i * 16)], 15, '2ad7d2bb', 4);
      $this->process($B, $C, $D, $A, $M[9 + ($i * 16)], 21, 'eb86d391', 4);

      $this->addVars($a, $b, $c, $d, $A, $B, $C, $D);
    }

    $MD5 = '';
    foreach (array($a, $b, $c, $d) as $x) {
      $MD5 .= implode('', array_reverse(str_split(str_pad($x, 8, '0', STR_PAD_LEFT), 2)));
    }

    return $MD5;
  }

  /**
   * @param $a
   * @param $b
   * @param $c
   * @param $d
   * @param $A
   * @param $B
   * @param $C
   * @param $D
   */
  protected function addVars(&$a, &$b, &$c, &$d, $A, $B, $C, $D) {
    $A = hexdec($A);
    $B = hexdec($B);
    $C = hexdec($C);
    $D = hexdec($D);
    $aa = hexdec($a);
    $bb = hexdec($b);
    $cc = hexdec($c);
    $dd = hexdec($d);

    $aa = ($aa + $A) & 0xffffffff;
    $bb = ($bb + $B) & 0xffffffff;
    $cc = ($cc + $C) & 0xffffffff;
    $dd = ($dd + $D) & 0xffffffff;

    $a = dechex($aa);
    $b = dechex($bb);
    $c = dechex($cc);
    $d = dechex($dd);
  }

  /**
   * @param $A
   * @param $B
   * @param $C
   * @param $D
   * @param $M
   * @param $s
   * @param $t
   * @param $type
   */
  protected function process(&$A, $B, $C, $D, $M, $s, $t, $type) {
    $A = hexdec($A);
    $t = hexdec($t);
    $M = bindec($M);

    switch ($type) {
      case 1:
        $X = hexdec($B);
        $Y = hexdec($C);
        $Z = hexdec($D);
        $calc = (($X & $Y) | ((~ $X) & $Z));
        break;
      case 2:
        $X = hexdec($B);
        $Y = hexdec($C);
        $Z = hexdec($D);
        $calc = (($X & $Z) | ($Y & (~ $Z)));
        break;
      case 3:
        $X = hexdec($B);
        $Y = hexdec($C);
        $Z = hexdec($D);
        $calc = ($X ^ $Y ^ $Z);
        break;
      case 4:
        $X = hexdec($B);
        $Y = hexdec($C);
        $Z = hexdec($D);
        $calc = ($Y ^ ($X | (~ $Z)));
        break;
    }

    $A = ($A + $calc + $M + $t) & 0xffffffff;
    $A = $this->rotate($A, $s);
    $A = dechex((hexdec($B) + hexdec($A)) & 0xffffffff);
  }

  /**
   * @param $decimal
   * @param $bits
   *
   * @return string
   */
  protected function rotate ($decimal, $bits) {
    return dechex((($decimal << $bits) | ($decimal >> (32 - $bits))) & 0xffffffff);
  }

  /**
   * {@inheritDoc}
   */
  protected function init() {
    $bin = '';
    $length = strlen($this->salt) * 8;

    for ($i = 0; $i < $length / 8; $i++) {
      $bin .= str_pad(decbin(ord($this->salt[$i])), 8, '0', STR_PAD_LEFT);
    }

    $bin = str_pad($bin, $length, '0', STR_PAD_LEFT);
    $bin .= '1';
    $bin = str_pad($bin, '448', '0', STR_PAD_RIGHT);

    $len_in_bin = decbin($length);
    $target_len_in_bin = ceil(strlen($len_in_bin) / 4) * 4;

    $bin .= str_pad($len_in_bin, $target_len_in_bin, '0', STR_PAD_LEFT);
    $bin = str_pad($bin, 512, '0', STR_PAD_RIGHT);

    $block = str_split($bin, 32);
    foreach ($block as &$b) {
      $b = implode('', array_reverse(str_split($b, 8)));
    }

    return $block;
  }
}