@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
              <li><a href="/">Home</a></li>
              <li><a href="{{route('budget.index')}}">Budgets</a></li>
              <li><a href="{{route('budget.show', [$budget->name])}}">{{$budget->name}}</a></li>
              <li class="active">Création d'une categorie</li>
            </ol>
            <form role="form" method="post" action='{{route('category.store')}}'>
                <input type='hidden' name='budget_id' value='{{$budget->id}}'>
                <div class="panel panel-default">
                    <div class="panel-heading">Créer une categorie</div>
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
                                <div class="col-lg-6">
                                    @include('form.inputs.text', [
                                        'label' => 'amount', 
                                        'name' => 'amount', 
                                        'value' => old('amount'),                                    
                                        'help' => null
                                    ])
                                </div>                             
                        </div>
                    </div>
                    <div class="panel-footer">@include('form.buttons.submit')</div>
                </div>
            </form>
            <form role="form" method="post" action='{{route('category.copy')}}'>
                <input type='hidden' name='budget_id' value='{{$budget->id}}'>
                <div class="panel panel-default">
                    <div class="panel-heading">Copier une categorie</div>
                    <div class="panel-body">
                        <div class="row">
                                {!! csrf_field() !!}
                                <div class="col-lg-6">
                                    @include('form.inputs.text', [
                                        'label' => 'name', 
                                        'name' => 'name_copy', 
                                        'value' => old('name_copy'),
                                        'help' => null
                                    ])
                                </div> 
                                <div class="col-lg-6">
                                    @include('form.select', [
                                        'label' => 'categories', 
                                        'name' => 'category_id', 
                                        'options' => $categories,                                    
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
