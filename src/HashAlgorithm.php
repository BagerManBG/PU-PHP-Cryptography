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
  protected function init() { return; }

  /**
   * @param $decimal
   * @param $bits
   *
   * @return string
   */
  protected function leftRotate ($decimal, $bits) {
    return dechex((($decimal << $bits) | ($decimal >> (32 - $bits))) & 0xffffffff);
  }

  /**
   * @param $decimal
   * @param $bits
   *
   * @return string
   */
  protected function rightRotate ($decimal, $bits) {
    return dechex((($decimal >> $bits) | ($decimal << (32 - $bits))) & 0xffffffff);
  }
}