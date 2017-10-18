<?php

namespace App\Http\Responses\Web;

use Illuminate\Contracts\Support\Responsable;

class ShowBudgetResponse implements Responsable
{
    protected $budget;

    public function __construct($budget)
    {
        $this->budget = $budget;
    }

    public function toResponse($request)
    {
        return view('budget.show', $this->transformDatas());
    }

    protected function transformDatas() :array
    {
        return ['budget' => $this->budget];
    }
}