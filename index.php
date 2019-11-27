<html>
    <head>
        <title>PHP Cryptography</title>
    </head>
</html>
<body>
<?php

use \src\SecureHasher;

foreach (glob("src/*.php") as $filename) {
  include $filename;
}

$sec_hasher = SecureHasher::create();

if ($string = $_GET['string']) {
  $sec_hasher->setHasher('hash.md5');
  $result_md5 = $sec_hasher->hash($string);

  $sec_hasher->setHasher('hash.sha1');
  $result_sha1 = $sec_hasher->hash($string);

  $sec_hasher->setHasher('hash.sha2');
  $result_sha2 = $sec_hasher->hash($string);
}

?>
<form action="/" method="get">
    <input type="text" name="string" size="80">
    <p>Result md5: <span id="result-md5"><?php if (isset($result_md5)) echo $result_md5; ?></span></p>
    <p>Result sha1: <span id="result-sha1"><?php if (isset($result_sha1)) echo $result_sha1; ?></span></p>
    <p>Result sha2: <span id="result-sha2"><?php if (isset($result_sha2)) echo $result_sha2; ?></span></p>
    <input type="submit" value="Hash">
</form>
</body>
