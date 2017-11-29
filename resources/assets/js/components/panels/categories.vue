<template>
<div class="panel panel-default">
    <div class="panel-heading">Liste des categories</div>
    <div class="panel-body">
        <div v-if="categories.length == 0">
            <div class="alert alert-info">
              <strong>Info!</strong> Aucune categorie.
            </div>
        </div> 
        <div v-else>
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
                    <tr v-for="category in categories">
                        <td>{{ category.name }}</td>
                        <td>{{ category.amount }}</td>
                        <td>0</td>
                        <td><elements-progress-bar :value="completion"></elements-progress-bar></td>
                        <td></td>
                    </tr>
                </tbody>
            </table> 
        </div>    
    </div>
    <div class="panel-footer">
        <button type="button" class="btn btn-primary btn-sd" data-toggle="modal" data-target="#store-category">Créer une categorie</button>        
        <button type="button" class="btn btn-primary btn-sd" data-toggle="modal" data-target="#store-category">Créer une dépense</button>
    </div>
</div>
</template>

<script>
export default {
    props: ['categories'],
    data(){
        return{
        }
    },
    computed: {
        completion: function () {
            return 10;
        }
    }      
}
</script>
