<?php

namespace App\Http\Responses\Api;

use Illuminate\Contracts\Support\Responsable;

class AllBudgetsResponse implements Responsable
{
    protected $budgets;

    public function __construct($budgets)
    {
        $this->budgets = $budgets;
    }

    public function toResponse($request)
    {
        return response()->json($this->transformDatas());
    }

    protected function transformDatas() :array
    {
        return $this->budgets->map(function($budget){
            return [
                'amount' => $budget->categories->sum('amount')
            ] + $budget->toArray();
        })->toArray();
    }
}