<?php

namespace App\Http\Responses\Api;

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
        return response()->json($this->transformDatas());
    }

    protected function transformDatas() :array
    {
        return [
            'budget' => $this->budget->only(['id', 'name', 'started_at', 'ended_at']) + [
                'amount' => $this->budget->categories->sum('amount'),
            ],
            'categories' => $this->budget->categories(),
        ];
    }
}