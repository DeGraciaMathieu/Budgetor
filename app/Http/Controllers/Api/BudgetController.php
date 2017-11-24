<?php

namespace App\Http\Controllers\Api;

use App\Models;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BudgetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all(Request $request)
    {
        $budgets = Models\Budget::orderBy('created_at', 'desc')->get();

        $budgets = $budgets->map(function($budget){

            return [
                'amount' => $budget->categories->sum('amount')
            ] + $budget->toArray();

        });

        // return with interface
        // $budgets = app('Services\Budget')->all();

        return response()->json(['budgets' => $budgets]);
    }   

    public function create(Request $request)
    {
        return response()->json([]);
    }           
}
