<?php

namespace App\Http\Responses\Web;

use Illuminate\Contracts\Support\Responsable;

class CreateCategoryResponse implements Responsable
{
    protected $budget;
    protected $categories;

    public function __construct($budget, $categories)
    {
        $this->budget = $budget;
        $this->categories = $categories;
    }

    public function toResponse($request)
    {
        return view('category.create', $this->transformDatas());
    }

    protected function transformDatas() :array
    {
        $categories = $this->categories->map(function($category){
            return ['id' => $category->id, 'value' => $category->name . ' - '. $category->budget->name];
        })->toArray();

        return ['categories' => $categories, 'budget' => $budget];
    }
}