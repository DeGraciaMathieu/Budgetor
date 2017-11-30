<template>
<div class="panel panel-default">
    <div class="panel-heading">Liste des revenus</div>
    <div class="panel-body">
        <div v-if="earnings.length == 0">
            <div class="alert alert-info">
              <strong>Info!</strong> Aucun revenu.
            </div>
        </div> 
        <div v-else>
            <table id='earnings' class="table table-striped">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>amount</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="earning in earnings">
                        <td>{{ earning.name }}</td>
                        <td>{{ earning.amount }}</td>
                    </tr>
                </tbody>
            </table> 
        </div>    
    </div>
    <div class="panel-footer">
        <button type="button" class="btn btn-primary btn-sd" data-toggle="modal" data-target="#store-earning">Créer un revenu</button>
    </div>
</div>
</template>

<script>
export default {
    props: ['earnings'],
    data(){
        return{
        }
    },
    computed: {

    }      
}
</script>
