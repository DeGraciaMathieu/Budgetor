<template>
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
            <tr v-for="budget in budgets">
                <td>{{ budget.name }}</td>
                <td></td>
                <td>{{ budget.started_at }}</td>
                <td>{{ budget.ended_at }}</td>
                <td></td>
                <td></td>
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
import axios from 'axios';
export default {
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
            .catch(e => {
            });
        },
    },
}
</script>
