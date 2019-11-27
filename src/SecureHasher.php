<?php

namespace src;

class SecureHasher {
  /**
   * @var HashAlgorithm $hasher
   */
  protected $hasher;

  /**
   * {@InheritDoc}
   */
  public static function create() {
    return new SecureHasher();
  }

  /**
   * @return HashAlgorithm
   */
  public function getHasher() {
    return $this->hasher;
  }

  /**
   * @param string $service
   */
  public function setHasher($service) {
    $this->hasher = ServiceContainer::get($service);
  }

  /**
   * @param $string
   *
   * @return bool|string
   */
  public function hash($string) {
    if (!$this->hasher)
      return FALSE;

    $this->hasher->setString($string);
    $hashed_string = $this->hasher->hash();
    $hashed_string = strrev(strtoupper($hashed_string));
    $hashed_string = base64_encode($hashed_string);

    return $hashed_string;
  }
}