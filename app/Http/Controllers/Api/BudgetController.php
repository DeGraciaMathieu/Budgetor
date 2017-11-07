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

        // return with interface
        // $budgets = app('Services\Budget')->all();

        return response()->json(['budgets' => $tmp]);
    }       
}
