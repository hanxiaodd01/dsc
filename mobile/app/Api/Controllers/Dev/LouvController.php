<?php
/**
 * Created by PhpStorm.
 * User: Louv
 * Date: 2019/11/5
 * Time: 16:48
 */

namespace App\Api\Controllers\Dev;

use App\Api\Controllers\Controller;

use App;
use Arr;

use RedisF;

use DateTime;

class LouvController extends Controller
{
    public function index()
    {
        return 'Hello, Louv';
    }

    public function test()
    {
        dump(App::environment(LOCAL));
        return PHP_EOL . 'Louv test @' . (new DateTime())->format('c');
    }

    public function redis()
    {
        /* if you need redis:
         * composer require illuminate/redis
         * composer require predis/predis
         * Lumen use facade Illuminate\Support\Facades\Redis::class
         * Lumen register Illuminate\Redis\RedisServiceProvider::class
         * add config.app.aliases 'RedisF' => Illuminate\Support\Facades\Redis::class
         * add config.ide-helper.extra 'RedisF' => [App\Support\IdeHelper\PredisHinter::class],
         * */

        $k = 'testKey1';
        RedisF::del(Arr::wrap($k));
        $a = RedisF::get($k);
        dump('$a', $a);
        $b = RedisF::set($k, 'tester');
        dump('$b', $b);
        $c = RedisF::get($k);
        dump('$c', $c);
    }
}
