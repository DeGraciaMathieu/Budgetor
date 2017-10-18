<?php

namespace App\Http\Responses\Web;

use Illuminate\Contracts\Support\Responsable;

class EditBudgetResponse implements Responsable
{
    protected $budget;

    public function __construct($budget)
    {
        $this->budget = $budget;
    }

    public function toResponse($request)
    {
        return view('budget.edit', $this->transformDatas());
    }

    protected function transformDatas() :array
    {
        return ['budget' => $this->budget];
    }
}