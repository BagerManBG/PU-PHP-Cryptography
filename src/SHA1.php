<?php

namespace src;

class SHA1 extends HashAlgorithm {
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
    $len = count($w);

    for($i = 0; $i < $len / 16; $i++) {
      for ($j = 16 * ($i + 1); $j < 80 * ($i + 1); $j++) {
        $w[$j] = str_pad(decbin(hexdec($this->leftRotate(bindec($w[$j - 3] ^ $w[$j - 8] ^ $w[$j - 14] ^ $w[$j - 16]), 1))), 32, '0', STR_PAD_LEFT);
      }

      $a = $h0;
      $b = $h1;
      $c = $h2;
      $d = $h3;
      $e = $h4;

      $f = NULL;
      $k = NULL;

      for ($j = 0 + (80 * $i); $j < 80 + (80 * $i); $j++) {
        if ($j >= 0 + (80 * $i) && $j <= 19 + (80 * $i)) {
          $f = ($b & $c) | ((~ $b) & $d);
          $k = '5A827999';
        }
        elseif ($j >= 20 + (80 * $i) && $j <= 39 + (80 * $i)) {
          $f = $b ^ $c ^ $d;
          $k = '6ED9EBA1';
        }
        elseif ($j >= 40 + (80 * $i) && $j <= 59 + (80 * $i)) {
          $f = ($b & $c) | ($b & $d) | ($c & $d);
          $k = '8F1BBCDC';
        }
        elseif ($j >= 50 + (80 * $i) && $j <= 79 + (80 * $i)) {
          $f = $b ^ $c ^ $d;
          $k = 'CA62C1D6';
        }

        $temp = hexdec($this->leftRotate(hexdec($a), 5)) + hexdec($f) + hexdec($e) + hexdec($k) + bindec($w[$j]);
        $e = $d;
        $d = $c;
        $c = $this->leftRotate(hexdec($b), 30);
        $b = $a;
        $a = dechex($temp);
      }

      $this->addVars($h0, $h1, $h2, $h3, $h4, $a, $b, $c, $d, $e);
    }

    $hash = '';
    foreach (array($h0, $h1, $h2, $h3, $h4) as $x) {
      $hash .= $x;
    }

    return $hash;
  }

  /**
   * @param $a
   * @param $b
   * @param $c
   * @param $d
   * @param $e
   * @param $A
   * @param $B
   * @param $C
   * @param $D
   * @param $E
   */
  protected function addVars(&$a, &$b, &$c, &$d, &$e, $A, $B, $C, $D, $E) {
    $A = hexdec($A);
    $B = hexdec($B);
    $C = hexdec($C);
    $D = hexdec($D);
    $E = hexdec($E);

    $aa = hexdec($a);
    $bb = hexdec($b);
    $cc = hexdec($c);
    $dd = hexdec($d);
    $ee = hexdec($e);

    $aa = ($aa + $A) & 0xffffffff;
    $bb = ($bb + $B) & 0xffffffff;
    $cc = ($cc + $C) & 0xffffffff;
    $dd = ($dd + $D) & 0xffffffff;
    $ee = ($ee + $E) & 0xffffffff;

    $a = dechex($aa);
    $b = dechex($bb);
    $c = dechex($cc);
    $d = dechex($dd);
    $e = dechex($ee);
  }

}