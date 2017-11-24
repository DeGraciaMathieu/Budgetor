@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
              <li><a href="/">Home</a></li>
              <li><a href="{{route('budget.index')}}">Budgets</a></li>
              <li class="active">Create</li>
            </ol>
            <form role="form" method="post" action='{{route('budget.store')}}'>
                <div class="panel panel-default">
                    <div class="panel-heading">Créer un budget</div>
                    <div class="panel-body">
                        <div class="row">
                            {!! csrf_field() !!}
                            <div class="col-lg-6">
                                @include('form.inputs.text', [
                                    'label' => 'name', 
                                    'name' => 'name', 
                                    'value' => old('name'),
                                    'help' => null
                                ])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                @include('form.inputs.text', [
                                    'label' => 'started_at', 
                                    'name' => 'started_at', 
                                    'value' => old('started_at'),                                    
                                    'help' => null
                                ])                                
                            </div>  
                            <div class="col-lg-6">
                                @include('form.inputs.text', [
                                    'label' => 'ended_at', 
                                    'name' => 'ended_at', 
                                    'value' => old('ended_at'),                                    
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
