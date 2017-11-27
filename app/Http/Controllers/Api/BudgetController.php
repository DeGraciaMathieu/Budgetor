<?php

namespace App\Http\Controllers\Api;

use App\Models;
use App\Http\Requests;
use App\Http\Responses\Api;
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

        return new Api\AllBudgetsResponse($budgets);
    }   

    public function create(Requests\StoreBudgetRequest $request)
    {
        Models\Budget::create($request->only(['name', 'started_at', 'ended_at']));

        return new Api\BasicResponse('success');
    }  

    public function destroy(Requests\DestroyBudgetRequest $request, $id)
    {
        $budget = Models\Budget::findOrFail($id);

        if ($budget->started_at > Carbon::now() && $budget->ended_at < Carbon::now()) {
            return Api\BasicResponse('Impossible de supprimer un budget actif.', 500);
        }

        $budget->delete();

        return new Api\BasicResponse('success');
    }         

    public function show(Request $request, $id)
    {
        $budget = Models\Budget::findOrFail($id);

        return new Api\ShowBudgetResponse($budget);
    }
}
