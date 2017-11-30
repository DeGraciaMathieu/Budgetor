<?php

namespace App\Http\Controllers\Api;

use App\Models;
use App\Http\Requests;
use App\Http\Responses\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EarningController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Requests\StoreEarningRequest $request)
    {
        $earning = new Models\Earning($request->only(['name', 'amount', 'comment']));

        $budget = Models\Budget::findOrFail($request->get('budget_id'));

        $budget->categories()->save($earning);

        return new Api\BasicResponse('success');
    }  
}
