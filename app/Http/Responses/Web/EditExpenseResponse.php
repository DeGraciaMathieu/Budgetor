<?php

namespace App\Http\Responses\Web;

use Illuminate\Contracts\Support\Responsable;

class EditExpenseResponse implements Responsable
{
    protected $expense;

    public function __construct($expense)
    {
        $this->expense = $expense;
    }

    public function toResponse($request)
    {
        return view('expense.edit', $this->transformDatas());
    }

    protected function transformDatas() :array
    {
        return [
            'expense' => $this->expense,
            'category' => $this->expense->category,
            'budget' => $this->expense->category->budget,
        ];
    }
}