<?php

namespace App\Http\Responses\Web;

use Illuminate\Contracts\Support\Responsable;

class EditCategoryResponse implements Responsable
{
    protected $category;

    public function __construct($category)
    {
        $this->category = $category;
    }

    public function toResponse($request)
    {
        return view('category.edit', $this->transformDatas());
    }

    protected function transformDatas() :array
    {
        return ['category' => $this->category];
    }
}