<?php

namespace App\Http\Controllers;

use App\Models;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Responses\Web;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request, $category_id)
    {
        $category = Models\Category::findOrFail($category_id);

        return new Web\CreateExpenseResponse($category);                
    } 

    public function store(Requests\StoreExpenseRequest $request)
    {
        $category = Models\Category::findOrFail($request->get('category_id'));        

        $expense = Models\Expense::create($request->only(['name','amount','category_id','comment','paid_at']));

        return response()->json(
            $expense->only(['id','name','amount']) + 
            [
                'paid_at' => $expense->paid_at->format('Y-m-d'),
                'link_edit' => route('expense.edit', [$expense->id])
            ]
        );
    }        

    public function edit(Request $request, $id)
    {
        $expense = Models\Expense::findOrFail($id);

        return new Web\EditExpenseResponse($expense);            
    }         

    public function update(Requests\UpdateExpenseRequest $request, $id)
    {
        $category = Models\Expense::findOrFail($id);

        $category->fill($request->only(['name', 'amount', 'started_at', 'ended_at']));

        $category->save();

        return redirect()->route('expense.edit', ['category' => $category])->with(['success' => 'Category update']);
    }       

    public function destroy(Requests\DestroyExpenseRequest $request, $id)
    {
        $expense = Models\Expense::findOrFail($id);

        $expense->delete();

        return redirect()->route('category.show', [$expense->category_id]);
    }       
}
