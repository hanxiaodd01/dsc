<?php

/*
|--------------------------------------------------------------------------
| Load Environment Variables
|--------------------------------------------------------------------------
*/

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();

/*
|--------------------------------------------------------------------------
| Define Constants
|--------------------------------------------------------------------------
*/

define('APP_DEBUG', env('APP_DEBUG', false));

define('IN_ECTOUCH', true);
define('APPNAME', 'ECTouch');
define('VERSION', 'v2.7.3.4');
define('CHARSET', 'utf-8');
define('ROOT_PATH', str_replace('\\', '/', dirname(__DIR__)) . '/');
define('PATH_HASH', substr(md5(ROOT_PATH), -6));
define('BASE_PATH', ROOT_PATH . 'app/');
define('APP_PATH', BASE_PATH . 'Modules/');
define('COMPONENT_PATH', BASE_PATH . 'Component/');
define('PLAYGROUND_PATH', BASE_PATH . 'Custom/');
define('ADDONS_PATH', BASE_PATH . 'Plugins/');
define('CONF_PATH', ROOT_PATH . 'config/');
define('LANG_PATH', ROOT_PATH . 'resources/lang/');
define('RUNTIME_PATH', ROOT_PATH . 'storage/framework/' . PATH_HASH . '/');
define('HTML_PATH', RUNTIME_PATH . 'views/');
define('LOG_PATH', ROOT_PATH . 'storage/logs/');
define('TMPL_PATH', ROOT_PATH . 'resources/views/');
define('PHP_SELF', isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME']);
define('BUILD_DIR_SECURE', false);

/*
|--------------------------------------------------------------------------
| Load ThinkPHP Core
|--------------------------------------------------------------------------
*/

require __DIR__ . '/../ThinkPHP/ThinkPHP.php';

// @louv 2019-10-30: resolve function conflict
//require __DIR__ . '/../app/Support/helpers.php';

/*
|--------------------------------------------------------------------------
| Custom Logger
|--------------------------------------------------------------------------
*/

$esLogConfig = [
    // should be same as C('LOG_TYPE')
    'type' => ES\Logger\Accessor\ThinkPHPAccessor::class,

    // no work -- use C('LOG_LEVEL')
    'level' => '',
    // no work -- use LOG_PATH ( C('LOG_PATH') without MODULE_NAME )
    'path' => '',

    'preferDirectory' => env('ES_LOGGER_PREFER_DIR', true),
    // "[%datetime%] %level_name% %extra.cat% \"%message%\" %context.context% %context.extra%\n"
    'lineFormat' => env('ES_LOGGER_LINE_FORMAT', "[%datetime%] %level_name%: %extra.cat% %context%\n"),
    // "H:i:s v"
    'datetimeFormat' => env('ES_LOGGER_DATETIME_FORMAT', 'Y-m-d H:i:s'),
];

// TP 内置日志不建议再使用
require_once CORE_PATH . 'Log' . EXT;
Think\Log::init($esLogConfig);

ES\Logger\Accessor\CommonAccessor::setAlias('Log');
Log::setConfig(array_merge($esLogConfig, [
    'level' => env('LOG_LEVEL', Psr\Log\LogLevel::ERROR),
    'path' => LOG_PATH,
]));

/*
|--------------------------------------------------------------------------
| Use Illuminate DB
|--------------------------------------------------------------------------
*/

$databaseConf = include CONF_PATH . 'database.php';
$mysqlConf = $databaseConf['connections']['mysql'];

try {

    $capsule = new Illuminate\Database\Capsule\Manager();

    $capsule->addConnection([
        'driver' => $mysqlConf['driver'],
        'host' => $mysqlConf['host'],
        'port' => $mysqlConf['port'],
        'database' => $mysqlConf['database'],
        'username' => $mysqlConf['username'],
        'password' => $mysqlConf['password'],
        'charset' => $mysqlConf['charset'],
        'collation' => $mysqlConf['collation'],
        'prefix' => $mysqlConf['prefix'],
        'strict' => $mysqlConf['strict'],
    ]);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

} catch (Exception $e) {
    die($e->getMessage());
}

unset($databaseConf, $mysqlConf);

/*
|--------------------------------------------------------------------------
| Others
|--------------------------------------------------------------------------
*/
