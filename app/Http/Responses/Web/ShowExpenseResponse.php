<?php

namespace App\Http\Responses\Web;

use Illuminate\Contracts\Support\Responsable;

class ShowCategoryResponse implements Responsable
{
    protected $expense;

    public function __construct($expense)
    {
        $this->expense = $expense;
    }

    public function toResponse($request)
    {
        return view('expense.show', $this->transformDatas());
    }

    protected function transformDatas() :array
    {
        return ['expense' => $this->expense];
    }
}