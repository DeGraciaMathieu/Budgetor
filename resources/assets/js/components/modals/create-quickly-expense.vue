<template>
<div class="modal fade" id="store-quickly-expense" tabindex="-1" role="dialog" aria-labelledby="store-quickly-expense">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="store-expense-label">Créer une depense rapide</h4>
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
                        <input v-model="expense.name" class="form-control">
                        <span v-if="errors.name" class="text-danger">{{ errors.name }}</span>
                        <p class="help-block"></p>
                    </div>       
                    <div id='name' class="form-group">
                        <label>category</label>
                        <select v-model="expense.category_id" class="form-control">
                            <option v-for="(category, index) in categories" :value="category.id">{{ category.name }}</option>
                        </select>
                        <span v-if="errors.name" class="text-danger">{{ errors.id }}</span>
                        <p class="help-block"></p>
                    </div>                                                        
                    <div id='amount' class="form-group">
                        <label>amount</label>
                        <input v-model="expense.amount" class="form-control">
                        <span v-if="errors.amount" class="text-danger">{{ errors.amount }}</span>
                        <p class="help-block"></p>
                    </div>      
                    <div id='amount' class="form-group">
                        <label>paid_at</label>
                        <input v-model="expense.paid_at" class="form-control">
                        <span v-if="errors.paid_at" class="text-danger">{{ errors.paid_at }}</span>
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
            expense: {},
            errors: {},
        }
    },     
    methods: {
        onSubmit: function()
        {    
            axios.post('/api/expense/create', this.expense)
            .then(response => {
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
