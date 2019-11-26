<pre>
<?php

use \src\MD5;
use \src\SHA1;

foreach (glob("src/*.php") as $filename) {
  include $filename;
}

//$md5 = new MD5();
//$md5->setSalt('asdf');
//echo $md5->hash();

var_dump(sha1('bager'));

$sha1 = new SHA1();
$sha1->setSalt('bager');
var_dump($sha1->hash());
