<?php

namespace App\Http\Controllers\Api;

use App\Models;
use App\Http\Requests;
use App\Http\Responses\Api;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Requests\StoreCategoryRequest $request)
    {
        $expense = new Models\Expense($request->only(['name','amount','comment','paid_at']));

        $category = Models\Category::findOrFail($request->get('category_id'));

        $category->expenses()->save($expense);

        return new Api\BasicResponse('success');
    }  
}
