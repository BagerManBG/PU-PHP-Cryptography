<?php

namespace src;

class ServiceContainer {
  /**
   * @param $service
   *
   * @return bool|HashAlgorithm
   */
  public static function get($service) {
    switch ($service) {
      case 'hash.md5':
        return new MD5();
        break;
      case 'hash.sha1':
        return new SHA1();
        break;
      case 'hash.sha2':
        return new SHA2();
        break;
      default:
        return FALSE;
    }
  }
}