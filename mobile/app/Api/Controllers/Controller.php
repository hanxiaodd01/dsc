<?php

namespace App\Api\Controllers;

use Dingo\Api\Routing\Helpers as DingoHelperTrait;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use DingoHelperTrait;

    protected function apiReturn($data, $code = 0): array
    {
        return compact('code', 'data');
    }
}
