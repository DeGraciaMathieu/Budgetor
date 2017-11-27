@extends('layouts.app')

@section('content')
<div id='app'>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <ol class="breadcrumb">
                  <li><a href="/">Home</a></li>
                  <li><a href="#">Budgets</a></li>
                  <li class="active">...</li>
                </ol>
                <panels-info-budget :budget="budget"></panels-info-budget>           
                <div class="panel panel-default">
                    <div class="panel-heading">Liste des categories</div>
                    <div class="panel-body">
                        <table id='categories' class="table table-striped">
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

                            </tbody>
                        </table> 
                    </div>
                    <div class="panel-footer">
                        <button type="button" class="btn btn-primary btn-sd" data-toggle="modal" data-target="#store-category">Créer une categorie</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
new Vue({
    el: '#app', 
    data(){
        return{
            budget: [],
        }
    },    
    created: function()
    {
        this.fetchData();
    },
    methods: {
        fetchData: function()
        {
            axios.get(`/api/budget/12`).then(response => {
                this.budget = response.data;
            })
            .catch(e => {});
        },
    }         
});
</script>
@endsection
