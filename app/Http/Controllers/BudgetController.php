<?php

namespace App\Http\Controllers;

use App\Models;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Responses\Web;
use Illuminate\Http\Request;
use EnergieProduction\Chart\Criterias;

class BudgetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$budgets = Models\Budget::orderBy('created_at', 'desc')->get();

        return new Web\IndexBudgetResponse($budgets);   
    } 

    public function show(Request $request, $id)
    {
    	$budget = Models\Budget::findOrFail($id);

        return new Web\ShowBudgetResponse($budget);           
    } 

    public function create(Request $request)
    {
        return new Web\CreateBudgetResponse();           
    } 

    public function edit(Request $request, $id)
    {
        $budget = Models\Budget::findOrFail($id);

        return new Web\EditBudgetResponse($budget);          
    }   
          
    public function store(Requests\StoreBudgetRequest $request)
    {
        $budget = Models\Budget::create($request->only(['name', 'amount', 'started_at', 'ended_at']));

        return redirect()->route('budget.index');
    }        

    public function update(Requests\UpdateBudgetRequest $request, $id)
    {
        $budget = Models\Budget::findOrFail($id);

        $budget->fill($request->only(['name', 'amount', 'started_at', 'ended_at']));

        $budget->save();

        return redirect()->route('budget.edit', ['budget' => $budget])->with(['success' => 'Budget update']);
    }       

    public function destroy(Requests\DestroyBudgetRequest $request, $id)
    {
        $budget = Models\Budget::findOrFail($id);

        if ($budget->started_at > Carbon::now() && $budget->ended_at < Carbon::now()) {
            return redirect()->route('budget.index')->withErrors(['message' => 'Impossible de supprimer un budget actif.']);
        }

        $budget->delete();

        return redirect()->route('budget.index');
    }          
}
