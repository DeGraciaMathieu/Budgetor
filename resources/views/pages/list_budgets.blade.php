@extends('layouts.app')

@section('content')
<div id='app'>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">        
                <div class="panel panel-default">
                    <div class="panel-heading">Liste des budgets</div>
                    <div class="panel-body">
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

                            </tbody>
                        </table>    
                    </div>
                    <div class="panel-footer">
                        <button type="button" class="btn btn-primary btn-sd" data-toggle="modal" data-target="#store-expense">Créer un budget</button>
                    </div>                
                    <!-- <div class="panel-footer"><a href='{{route('budget.create')}}' class="btn btn-primary">Créer un budget</a></div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
new Vue({
    el: '#app',
});
</script>
@endsection
