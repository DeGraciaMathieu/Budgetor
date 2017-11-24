<template>
<div>
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
            <td><a href='#'>{{ budget.name }}</a></td>
            <td>{{ budget.amount }} €</td>
            <td>{{ budget.started_at }}</td>
            <td>{{ budget.ended_at }}</td>
            <td>
            </td>
            <td></td>
        </tr>
        </tbody>
    </table>   
</div>
</template>

<script>
export default {
	props: ['budgets'],
    data(){
        return{
        }
    },     
}
</script>
