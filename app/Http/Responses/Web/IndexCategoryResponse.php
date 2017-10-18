<?php

namespace App\Http\Responses\Web;

use Illuminate\Contracts\Support\Responsable;

class IndexCategoryResponse implements Responsable
{
    protected $categories;

    public function __construct($budget, $categories)
    {
        $this->categories = $categories;
    }

    public function toResponse($request)
    {
        return view('category.index', ['categories' => $categories]);
    }

    protected function transformDatas() :array
    {
        return ['categories' => $categories];
    }
}