<template>
<div class="panel panel-default">
    <div class="panel-heading">Liste des budgets </div>
    <div class="panel-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>name</th>
                <th>amount</th>
                <th>started_at</th>
                <th>ended_at</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <tr v-for="budget in budgets">
            <td><a :href="'/budget/' + budget.id">{{ budget.name }}</a></td>
            <td>{{ budget.amount }} €</td>
            <td>{{ budget.started_at }}</td>
            <td>{{ budget.ended_at }}</td>
            <td>
                <a class="btn btn-info btn-sm" :href="'/budget/' + budget.id + '/edit'"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                <a v-if="active(budget)" class="btn btn-danger btn-sm" href="#"><i class="fa fa-trash-o fa-lg"></i></a>
            </td>
        </tr>
        </tbody>
    </table>        
    </div>
    <div class="panel-footer">
        <button type="button" class="btn btn-primary btn-sd" data-toggle="modal" data-target="#store-expense">Créer un budget</button>
    </div>                
</div>
</template>

<script>
export default {
	props: ['budgets'],
    data(){
        return{
        }
    },
    "methods":{
        active: function(budget) {
            return Date.parse(budget.created_at) > Date.now() && Date.parse(budget.ended_at) < Date.now();
        }
    }
}
</script>
