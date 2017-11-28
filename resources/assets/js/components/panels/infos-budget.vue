<template>
<div class="panel panel-default">
    <div class="panel-heading">Informations budget</div>
    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>name</th>
                    <td>{{ budget.name }}</td>
                </tr>
                <tr>
                    <th>amount</th>
                    <td>{{ allAmount }}</td>
                </tr>
                <tr>
                    <th>started_at</th>
                    <td>{{ budget.started_at }}</td>
                </tr>
                <tr>
                    <th>ended_at</th>
                    <td>{{ budget.ended_at }}</td>
                </tr>                                                        
            </tbody>
        </table>
    </div>
</div>
</template>

<script>
export default {
	props: ['budget', 'categories'],
    data(){
        return{
        }
    },
    computed: {
        allAmount: function () {
            var amount = 0;
            for (var i = this.categories.length - 1; i >= 0; i--) {
                amount = amount + parseInt(this.categories[i].amount);
            }
            return amount;
        }
    }     
}
</script>
