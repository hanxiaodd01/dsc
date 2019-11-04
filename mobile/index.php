<?php

define('APP_DEBUG', true);

// @louv 2019-10-30: resolve function conflict
require_once __DIR__ . '/app/Support/helpers.php';
require_once __DIR__ . '/ThinkPHP/Common/functions.prepend.php';

require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/bootstrap/think.php';

Thinker::start();