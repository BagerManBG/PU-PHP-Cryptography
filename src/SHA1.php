<?php

namespace src;

class SHA1 extends HashAlgorithm {
  /**
   * {@InheritDoc}
   */
  public static function create() {
    return new SHA1();
  }

  /**
   * @return string
   */
  public function hash() {
    $h0 = '67452301';
    $h1 = 'EFCDAB89';
    $h2 = '98BADCFE';
    $h3 = '10325476';
    $h4 = 'C3D2E1F0';

    $w = $this->init();
    $count = count($w);

    for($i = 0; $i < $count / 16; $i++) {
      for ($j = 16 * ($i + 1); $j < 80 * ($i + 1); $j++) {
        $xor_result = bindec($w[$j - 3]) ^ bindec($w[$j - 8]) ^ bindec($w[$j - 14]) ^ bindec($w[$j - 16]);
        $rotated = decbin(hexdec($this->leftRotate($xor_result, 1)));
        $padded = str_pad($rotated, 32, '0', STR_PAD_LEFT);
        $w[$j] = $padded;
      }

      $a = hexdec($h0);
      $b = hexdec($h1);
      $c = hexdec($h2);
      $d = hexdec($h3);
      $e = hexdec($h4);

      $f = NULL;
      $k = NULL;

      for ($j = 0 + (80 * $i); $j < 80 + (80 * $i); $j++) {
        if ($j >= 0 + (80 * $i) && $j <= 19 + (80 * $i)) {
          $f = ($b & $c) | ((~ $b) & $d) & 0xffffffff;
          $k = '5A827999';
        }
        elseif ($j >= 20 + (80 * $i) && $j <= 39 + (80 * $i)) {
          $f = $b ^ $c ^ $d & 0xffffffff;
          $k = '6ED9EBA1';
        }
        elseif ($j >= 40 + (80 * $i) && $j <= 59 + (80 * $i)) {
          $f = ($b & $c) | ($b & $d) | ($c & $d) & 0xffffffff;
          $k = '8F1BBCDC';
        }
        elseif ($j >= 50 + (80 * $i) && $j <= 79 + (80 * $i)) {
          $f = $b ^ $c ^ $d & 0xffffffff;
          $k = 'CA62C1D6';
        }

        $temp = hexdec($this->leftRotate($a, 5)) + $f + $e + hexdec($k) + bindec($w[$j]);
        $e = $d & 0xffffffff;
        $d = $c & 0xffffffff;
        $c = hexdec($this->leftRotate(hexdec($b), 30)) & 0xffffffff;
        $b = $a & 0xffffffff;
        $a = $temp & 0xffffffff;
      }

      $h0 = dechex(hexdec($h0) + $a & 0xffffffff);
      $h1 = dechex(hexdec($h1) + $b & 0xffffffff);
      $h2 = dechex(hexdec($h2) + $c & 0xffffffff);
      $h3 = dechex(hexdec($h3) + $d & 0xffffffff);
      $h4 = dechex(hexdec($h4) + $e & 0xffffffff);
    }

    $hash = '';
    foreach (array($h0, $h1, $h2, $h3, $h4) as $x) {
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