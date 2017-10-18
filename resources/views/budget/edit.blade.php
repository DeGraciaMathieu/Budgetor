@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
              <li><a href="/">Home</a></li>
              <li><a href="{{route('budget.index')}}">Budgets</a></li>
              <li class="active">Modifier</li>
            </ol>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    <strong>info !</strong> {{Session::get('success')}}
                </div>                  
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Modifier un budget</div>
                <div class="panel-body">
                    <div class="row">
                        <form role="form" method="post" action='{{route('budget.update', [$budget->id])}}'>
                            {!! csrf_field() !!}
                            <div class="col-lg-6">
                                @include('form.inputs.text', [
                                    'label' => 'name', 
                                    'name' => 'name', 
                                    'value' => $budget->name,
                                    'help' => '.'
                                ])
                                @include('form.inputs.text', [
                                    'label' => 'amount', 
                                    'name' => 'amount', 
                                    'value' => $budget->amount,                                    
                                    'help' => 'Montant sans la réserve opérationnelle'
                                ])
                            </div>
                            <div class="col-lg-6 ">
                                @include('form.inputs.text', [
                                    'label' => 'started_at', 
                                    'name' => 'started_at', 
                                    'value' => $budget->started_at,                                    
                                    'help' => 'Date de debut du budget'
                                ])                                
                                @include('form.inputs.text', [
                                    'label' => 'ended_at', 
                                    'name' => 'ended_at', 
                                    'value' => $budget->ended_at,                                    
                                    'help' => 'Date de fin du budget'
                                ])     
                            </div>  
                            <div class="col-lg-6 ">
                                @include('form.buttons.submit')
  
                            </div>                                                                              
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
