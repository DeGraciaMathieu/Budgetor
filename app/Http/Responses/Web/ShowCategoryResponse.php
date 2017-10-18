<?php

namespace App\Http\Responses\Web;

use Illuminate\Contracts\Support\Responsable;

class ShowCategoryResponse implements Responsable
{
    protected $category;

    public function __construct($category)
    {
        $this->category = $category;
    }

    public function toResponse($request)
    {
        return view('category.show', $this->transformDatas());
    }

    protected function transformDatas() :array
    {
        $expenses = $this->category->expenses();

        $expenses = ($expenses) ? $expenses->orderBy('paid_at', 'DESC')->get() : [] ;

        return [
            'category' => $this->category,
            'expenses' => $expenses
        ];
    }
}