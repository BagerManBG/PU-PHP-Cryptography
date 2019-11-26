<?php

use \src\MD5;

foreach (glob("src/*.php") as $filename) {
  include $filename;
}

$md5 = new MD5();
$md5->setSalt('asdf');
echo $md5->hash();
