<?php

namespace App\Contracts\Services\Article;

interface CategoryServiceInterface
{
    public function category($id);

    public function detail($id);
}
