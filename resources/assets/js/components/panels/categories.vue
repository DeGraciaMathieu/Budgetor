<template>
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
</template>

<script>
export default {
    props: ['categories'],
    data(){
        return{
        }
    },
}
</script>
