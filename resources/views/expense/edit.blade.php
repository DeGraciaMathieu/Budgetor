@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
              <li><a href="/">Home</a></li>
              <li><a href="{{route('budget.index')}}">Budgets</a></li>
              <li><a href="{{route('budget.show', [$budget->id])}}">{{$budget->name}}</a></li>
              <li><a href="{{route('category.show', [$category->id])}}">{{$category->name}}</a></li>
              <li class="active">Edition d'une depense</li>
            </ol>
            <form role="form" method="post" action='{{route('expense.update', $expense->id)}}'>
                <input type='hidden' name='expense_id' value='{{$expense->id}}'>
                <div class="panel panel-default">
                    <div class="panel-heading">Editer une depense</div>
                    <div class="panel-body">
                        <div class="row">
                            {!! csrf_field() !!}
                            <div class="col-lg-6">
                                @include('form.inputs.text', [
                                    'label' => 'name', 
                                    'name' => 'name', 
                                    'value' => $expense->name,
                                    'help' => null
                                ])
                                @include('form.inputs.text', [
                                    'label' => 'amount', 
                                    'name' => 'amount', 
                                    'value' => $expense->amount,                                    
                                    'help' => null
                                ])
                                @include('form.inputs.text', [
                                    'label' => 'paid_at', 
                                    'name' => 'paid_at', 
                                    'value' => $expense->paid_at,                                    
                                    'help' => null
                                ])                                  
                            </div> 
                            <div class="col-lg-6">
                                @include('form.textarea', [
                                    'label' => 'comment', 
                                    'name' => 'comment', 
                                    'value' => $expense->comment,                                    
                                    'help' => null
                                ])
                            </div>                             
                        </div>
                    </div>
                    <div class="panel-footer">@include('form.buttons.submit')</div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
