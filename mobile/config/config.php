<?php

$deploy = require __DIR__ . '/deploy.php';
$envfile = __DIR__ . '/config-local.php';
$application = require __DIR__ . '/app.php';
$env = is_file($envfile) ? require $envfile : array();
$protocol = (is_ssl() ? 'https' : 'http') . '://';
$port = '';
if (isset($_SERVER['SERVER_PORT'])) {
    $port = ':' . $_SERVER['SERVER_PORT'];
    if ((':80' == $port && 'http://' == $protocol) || (':443' == $port && 'https://' == $protocol)) {
        $port = '';
    }
}
$mobile_url = $protocol . $_SERVER['HTTP_HOST'] . $port . rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/public/notify');
$pc_url = empty($deploy['pc_url']) ? dirname($mobile_url) : $deploy['pc_url'];
$static = empty($deploy['static_url']) ? $pc_url : $deploy['static_url'];
$upload_path = empty($deploy['upload_path']) ? dirname(dirname(__DIR__)) . '/' : $deploy['upload_path'];

$config = [
    'url_model' => 2,
    'url_pathinfo_depr' => '/',

    'url_router_on' => true,
    'url_route_rules' => require dirname(__DIR__) . '/routes/web.php',

    'curl_http_version' => CURL_HTTP_VERSION_1_1, // 设置curl的HTTP版本

    'LOG_RECORD' => true,  // 进行日志记录

    'session_auto_start' => false,
    'session_options' => [
        'path' => dirname(__DIR__) . '/storage/sessions'
    ],

    'default_module' => 'index',
    'action_prefix' => 'action',
    'var_pathinfo' => 'r',

    'taglib_begin' => '{',
    'taglib_end' => '}',

    'tmpl_file_depr' => '.',
    'tmpl_parse_string' => [
        '__PC__' => rtrim(str_replace('\\', '/', $pc_url), '/'),
        '__STATIC__' => rtrim(str_replace('\\', '/', $static), '/'),
        '__PUBLIC__' => rtrim(__ROOT__, '/public/notify') . '/public',
        '__TPL__' => rtrim(__ROOT__, '/public/notify') . '/public'
    ],

    'upload_path' => $upload_path,

    'assets' => require __DIR__ . '/assets.php',

    'tmpl_action_error' => dirname(__DIR__) . '/resources/views/vendor/message.html', // 默认错误跳转对应的模板文件
    'tmpl_action_success' => dirname(__DIR__) . '/resources/views/vendor/message.html', // 默认成功跳转对应的模板文件
    'tmpl_exception_file' => dirname(__DIR__) . '/resources/views/errors/exception.html',// 异常页面的模板文件

    'check_app_dir' => false,

//    'DATA_CACHE_TYPE' => 'Memcached',
//    'MEMCACHED_SERVER' => [['xxx.memcache.rds.aliyuncs.com', 11211]],
//    'MEMCACHED_LIB' => [\Memcached::OPT_COMPRESSION => false, \Memcached::OPT_BINARY_PROTOCOL => true],

];

$databaseConf = include CONF_PATH . 'database.php';
$mysqlConf = $databaseConf['connections']['mysql'];

$dbConf = [
    // .env
    'db_type' => $mysqlConf['driver'],
    'db_host' => $mysqlConf['host'],
    'db_user' => $mysqlConf['username'],
    'db_pwd' => $mysqlConf['password'],
    'db_name' => $mysqlConf['database'],
    'db_prefix' => $mysqlConf['prefix'],
    'db_port' => $mysqlConf['port'],
    'db_charset' => $mysqlConf['charset'],
    'DEFAULT_TIMEZONE' => $mysqlConf['timezone'],

    // 分布式数据库配置项
    'DB_DEPLOY_TYPE' => 0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE' => true, // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM' => 1, // 读写分离后 主服务器数量
];

return array_merge($application, $config, $dbConf, $deploy, $env);
