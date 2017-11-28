<template>
<div class="modal fade" id="store-category" tabindex="-1" role="dialog" aria-labelledby="store-expense-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="store-expense-label">Créer une categorie</h4>
            </div>
            <form v-on:submit.prevent="onSubmit" id='store_expense' role="form" method="post" action='http://budget.dev/expense/store'>
                <input v-model="budget.id" type="hidden" name="budget_id">
                <div class="modal-body">
                    <div v-if="errors && errors.length">
                        <div class="alert alert-danger">
                          <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
                        </div>
                    </div>                    
                    <div id='name' class="form-group">
                        <label>name</label>
                        <input v-model="category.name" class="form-control">
                        <span v-if="errors.name" class="text-danger">{{ errors.name }}</span>
                        <p class="help-block"></p>
                    </div>                                       
                    <div id='amount' class="form-group">
                        <label>amount</label>
                        <input v-model="category.amount" class="form-control">
                        <span v-if="errors.amount" class="text-danger">{{ errors.amount }}</span>
                        <p class="help-block"></p>
                    </div>                                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
</template>
<script>
export default {
	props: ['budget', 'categories'],
    data(){
        return{
            category: {},
            errors: {},
        }
    },     
    methods: {
        onSubmit: function()
        {    
            axios.post('/api/category/create', {
                'name': this.category.name, 
                'amount': this.category.amount, 
                'budget_id': this.budget.id, 
            })
            .then(response => {
                this.categories.push(this.category);
            })
            .catch(error => {
                       /* console.log(error.response.data);
                        console.log(error.response.status);
                        console.log(error.response.headers);  */              
                this.errors = error.response.data.errors;
            })

            console.log(this.errors.name);
        }
    }
}
</script>
