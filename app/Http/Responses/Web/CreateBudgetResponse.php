<?php

namespace App\Http\Responses\Web;

use Illuminate\Contracts\Support\Responsable;

class CreateBudgetResponse implements Responsable
{
    public function toResponse($request)
    {
       return view('budget.create');
    }
}