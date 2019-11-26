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
}