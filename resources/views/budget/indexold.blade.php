@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if($errors->any())
                @foreach($errors->getBags() as $error)
                    @foreach($errors->getMessages() as $message)
                    <div class="alert alert-danger">
                        <strong>error !</strong> {{$message[0]}}
                    </div>                            
                    @endforeach                    
                @endforeach
            @endif            
            <div class="panel panel-default">
                <div class="panel-heading">Liste des budgets</div>
                <div class="panel-body">
                @if($budgets->isEmpty())
                <div class="alert alert-info">
                  <strong>info !</strong> Aucun budget disponible 
                </div>
                @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>amount</th>
                                <th>started_at</th>
                                <th>ended_at</th>
                                <th>statut</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($budgets as $budget)
                        <tr>
                            <td><a href='{{route('budget.show', $budget->id)}}'>{{$budget->name}}</a></td>
                            <td>{{$budget->categories()->sum('amount')}}</td>
                            <td>{{$budget->started_at}}</td>
                            <td>{{$budget->ended_at}}</td>
                            <td>
                                @if ($budget->started_at < Carbon\Carbon::now() && $budget->ended_at > Carbon\Carbon::now())
                                    <span class="label label-primary">actif</span>                                
                                @else
                                    <span class="label label-default">inactif</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{route('budget.show', [$budget->id])}}"><i class="fa fa-eye fa-lg"></i></a>
                                <a class="btn btn-info btn-sm" href="{{route('budget.edit', [$budget->id])}}"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                                @if ($budget->started_at > Carbon\Carbon::now() || $budget->ended_at < Carbon\Carbon::now())
                                    <a class="btn btn-danger btn-sm" href="{{route('budget.destroy', [$budget->id])}}"><i class="fa fa-trash-o fa-lg"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>    
                @endif                
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-primary btn-sd" data-toggle="modal" data-target="#store-expense">Créer un budget</button>
                </div>                
                <!-- <div class="panel-footer"><a href='{{route('budget.create')}}' class="btn btn-primary">Créer un budget</a></div> -->
            </div>
        </div>
    </div>
</div>


<div id='app'>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">    
                <list-budgets></list-budgets>
            </div>
        </div>
    </div>    
    <modal-create-budget></modal-create-budget>
</div>

<script>
new Vue({
    el: '#app',
});
</script>

@endsection
