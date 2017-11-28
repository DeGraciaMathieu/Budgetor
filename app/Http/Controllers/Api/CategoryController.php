<?php

namespace App\Http\Controllers\Api;

use App\Models;
use App\Http\Requests;
use App\Http\Responses\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Requests\StoreCategoryRequest $request)
    {
        $category = new Models\Category($request->only(['name', 'amount']));

        $budget = Models\Budget::findOrFail($request->get('budget_id'));

        $budget->categories()->save($category);

        return new Api\BasicResponse('success');
    }  
}
