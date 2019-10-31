<?php

namespace App\Modules\Api\Controllers\V3;

class CategoryController extends \App\Modules\Api\Foundation\Controller
{
    private $categoryService;

    public function __construct(\App\Services\CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $list = $this->categoryService->categoryList();
        return $this->apiReturn($list);
    }
}
