<?php

namespace App\Http\Controllers;

use App\Models;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Responses\Web;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request, $id)
    {
        $category = Models\Category::findOrFail($id);

        return new Web\ShowCategoryResponse($category);
    } 

    public function create(Request $request, $budget_id)
    {
        $budget = Models\Budget::findOrFail($budget_id);
        
        $categories = Models\Category::where('budget_id', '!=', $budget_id)->get();

        return new Web\CreateCategoryResponse($budget, $categories);        
    } 

    public function store(Requests\StoreCategoryRequest $request)
    {
        $category = Models\Category::create($request->only(['name', 'amount', 'budget_id']));

        return redirect()->route('budget.show', [$request->get('budget_id')]);
    }        

    public function edit(Request $request, $id)
    {
        $category = Models\Category::findOrFail($id);

        return new Web\EditCategoryResponse($category);    
    }         
    
    public function copy(Requests\CopyCategoryRequest $request)
    {
        $category = Models\Category::findOrFail($request->get('category_id'));

        $copyCategory = $category->replicate();

        $copyCategory->name = $request->get('name_copy');
        $copyCategory->budget_id = $request->get('budget_id');

        $copyCategory->save();

        foreach ($category->expenses as $expense) {
            $category = Models\Expense::make($expense->only(['name', 'amount', 'comment','paid_at']));
            $category->category_id = $copyCategory->id;
            $category->save();
        }

        return redirect()->route('budget.show', [$request->get('budget_id')]);
    }

    public function update(Requests\UpdateCategoryRequest $request, $id)
    {
        $category = Models\Category::findOrFail($id);

        $category->fill($request->only(['name', 'amount', 'started_at', 'ended_at']));

        $category->save();

        return redirect()->route('category.edit', ['category' => $category])->with(['success' => 'Category update']);
    }       

    public function destroy(Requests\DestroyCategoryRequest $request, $id)
    {
        $category = Models\Category::findOrFail($id);

        $category->delete();

        return redirect()->route('budget.show', [$category->budget_id]);
    }       
}
