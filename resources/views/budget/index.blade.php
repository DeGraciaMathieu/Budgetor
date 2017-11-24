@extends('layouts.app')

@section('content')
<div id='app'>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">        
                <div class="panel panel-default">
                    <div class="panel-heading">Liste des budgets</div>
                    <div class="panel-body">
                        <list-budgets :budgets="budgets"></list-budgets>
                    </div>
                    <div class="panel-footer">
                        <button type="button" class="btn btn-primary btn-sd" data-toggle="modal" data-target="#store-expense">Créer un budget</button>
                    </div>                
                </div>
            </div>
        </div>
    </div>
<test :budgets="budgets"></test>    
</div>
<script>
new Vue({
    el: '#app', 
    data(){
        return{
            budgets: [],
        }
    },    
    created: function()
    {
        this.fetchData();
    },
    methods: {
        fetchData: function()
        {
            axios.get(`/api/budget/all`).then(response => {
                this.budgets = response.data.budgets;
            })
            .catch(e => {});
        },
    }         
});
</script>
@endsection
