@extends('layouts.app')

@section('content')
<div id='app'>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <ol class="breadcrumb">
                  <li><a href="/">Home</a></li>
                  <li><a href="#">Budgets</a></li>
                  <li class="active">@{{ budget.name }}</li>
                </ol>
                <panels-info-budget :budget="budget" :categories="categories" :earnings="earnings"></panels-info-budget>
                <panels-earnings :earnings="earnings"></panels-earnings>
                <panels-categories :categories="categories"></panels-categories>
                <modals-create-category :budget="budget" :categories="categories"></modals-create-category>
                <modals-create-earning :budget="budget" :earnings="earnings"></modals-create-earning>
                <modals-create-quickly-expense :budget="budget" :categories="categories"></modals-create-quickly-expense>
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
            earnings: [],
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
            axios.get('/api/budget/{{$id}}').then(response => {
                this.budget = response.data.budget;
                this.earnings = response.data.earnings;
                this.categories = response.data.categories;
            })
            .catch(e => {});
        },
    }     
});
</script>
@endsection
