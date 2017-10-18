@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
              <li><a href="/">Home</a></li>
              <li><a href="{{route('budget.index')}}">Budgets</a></li>
              <li class="active">{{$budget->name}}</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Informations budget</div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>name</th>
                                <td>{{$budget->name}}</td>
                            </tr>
                            <tr>
                                <th>amount</th>
                                <td>{{$budget->amount}}</td>
                            </tr>
                            <tr>
                                <th>started_at</th>
                                <td>{{$budget->started_at}}</td>
                            </tr>
                            <tr>
                                <th>ended_at</th>
                                <td>{{$budget->ended_at}}</td>
                            </tr>                                                        
                        </tbody>
                    </table>
                </div>
            </div>            
            <div class="panel panel-default">
                <div class="panel-heading">Liste des categories</div>
                <div class="panel-body">
                @if($budget->categories->isEmpty())
                <div class="alert alert-info">
                  <strong>info !</strong> Aucune categorie disponible pour ce budget
                </div>
                @else                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>amount</th>
                                <th>spent</th>
                                <th>completion</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($budget->categories as $category)
                        <tr>
                            <td><a href='{{route('category.show', $category->id)}}'>{{$category->name}}</a></td>
                            <td>{{$category->amount}} €</td>
                            <td @if($category->expenses->sum('amount') > $category->amount) style="color: #bf5329;" @endif>
                                {{$category->expenses->sum('amount')}} €
                            </td>
                            <td>
                                @include('elements.progress-label', ['value' => number_format($category->expenses->sum('amount') * 100 / $category->amount, 0, '.', ' ')])
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{route('category.show', [$category->id])}}"><i class="fa fa-eye fa-lg"></i></a>
                                <a class="btn btn-info btn-sm" href="{{route('category.edit', [$category->id])}}"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                                <a class="btn btn-danger btn-sm" href="{{route('category.destroy', [$category->id])}}"><i class="fa fa-trash-o fa-lg"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table> 
                @endif
                </div>
                <div class="panel-footer"><a href='{{route('category.create', [$budget->id])}}' class="btn btn-primary">Créer une categorie</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
