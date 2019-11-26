<pre>
<?php

use \src\MD5;
use \src\SHA1;
use \src\SHA2;

foreach (glob("src/*.php") as $filename) {
  include $filename;
}
