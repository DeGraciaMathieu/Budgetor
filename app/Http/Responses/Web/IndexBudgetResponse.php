<?php

namespace App\Http\Responses\Web;

use Illuminate\Contracts\Support\Responsable;

class IndexBudgetResponse implements Responsable
{
    protected $budgets;

    public function __construct($budgets)
    {
        $this->budgets = $budgets;
    }

    public function toResponse($request)
    {
        return view('budget.index', $this->transformDatas());
    }

    protected function transformDatas() :array
    {
        return ['budgets' => $this->budgets];
    }
}