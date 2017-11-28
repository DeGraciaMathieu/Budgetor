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
                <panels-categories :categories="categories"></panels-categories>
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
            categories: [],
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
