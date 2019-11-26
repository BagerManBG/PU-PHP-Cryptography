<?php

namespace src;

abstract class HashAlgorithm {
  protected $salt;

  /**
   * @return string
   */
  public function getSalt() {
    return $this->salt;
  }

  /**
   * @param string $salt
   */
  public function setSalt($salt) {
    $this->salt = $salt;
  }

  /**
   * @return string
   */
  public function hash() { return; }

  /**
   * @return mixed
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

  /**
   * @param $decimal
   * @param $bits
   *
   * @return string
   */
  protected function leftRotate ($decimal, $bits) {
    return dechex((($decimal << $bits) | ($decimal >> (32 - $bits))) & 0xffffffff);
  }
}