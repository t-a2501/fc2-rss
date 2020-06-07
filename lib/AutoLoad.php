<?php

/**
 * 初回ロード郡
 */

require_once  __DIR__  .'/ClassLoader.php';

$classLoader = new \Lib\ClassLoader();
$classLoader->registerDir(__DIR__);
$classLoader->register();