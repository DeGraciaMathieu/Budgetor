@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
              <li><a href="/">Home</a></li>
              <li><a href="{{route('budget.index')}}">Budgets</a></li>
              <li><a href="{{route('budget.show', [$category->budget->id])}}">{{$category->budget->name}}</a></li>
              <li class="active">{{$category->name}}</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Liste des depenses</div>
                <div class="panel-body">
                    <table id='expenses' class="table table-striped">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>amount</th>
                                <th>paid_at</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($expenses as $expense)
                        <tr>
                            <td><a href='{{route('expense.edit', $expense->id)}}'>{{$expense->name}}</a></td>
                            <td>{{$expense->amount}}</td>
                            <td>{{$expense->paid_at->format('Y-m-d')}}</td>
                            <td class='align-right'>
                                <a class="btn btn-info btn-sm" href="{{route('expense.edit', [$expense->id])}}"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                                <button name='destroy' class="btn btn-danger btn-sm" data-id="{{$expense->id}}" ><i class="fa fa-trash-o fa-lg"></i></button>
                            </td>                                
                        </tr>
                        @endforeach
                        </tbody>
                    </table> 
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-primary btn-sd" data-toggle="modal" data-target="#store-expense">Créer une depense</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id='app'>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">        
                <panel-infos-budget :budget="budget"></panel-infos-budget>
            </div>
        </div>
    </div>
<modals-create-budget :budgets="budgets"></modals-create-budget>    
</div>

<script>
new Vue({
    el: '#app',
});
</script>
@endsection
