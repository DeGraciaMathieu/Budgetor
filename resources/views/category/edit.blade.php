@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
              <li><a href="/">Home</a></li>
              <li><a href="{{route('budget.index')}}">Budgets</a></li>
              <li><a href="{{route('budget.show', [$category->budget->id])}}">{{$category->budget->name}}</a></li>
              <li class="active">Création d'une categorie</li>
            </ol>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    <strong>info !</strong> {{Session::get('success')}}
                </div>                  
            @endif            
            <form role="form" method="post" action='{{route('category.update', [$category->id])}}'>
                <div class="panel panel-default">
                    <div class="panel-heading">Modifier une categorie</div>
                    <div class="panel-body">
                        <div class="row">
                                {!! csrf_field() !!}
                                <div class="col-lg-6">
                                    @include('form.inputs.text', [
                                        'label' => 'name', 
                                        'name' => 'name', 
                                        'value' => $category->name,
                                        'help' => null
                                    ])
                                </div> 
                                <div class="col-lg-6">
                                    @include('form.inputs.text', [
                                        'label' => 'amount', 
                                        'name' => 'amount', 
                                        'value' => $category->amount,
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
