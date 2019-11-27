<?php

namespace src;

abstract class HashAlgorithm {
  protected $string;

  /**
   * Creates an object.
   */
  public static function create() { return; }

  /**
   * @return string
   */
  public function getString() {
    return $this->string;
  }

  /**
   * @param string $string
   */
  public function setString($string) {
    $this->string = $string;
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