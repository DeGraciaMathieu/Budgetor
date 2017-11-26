<template>
<div class="modal fade" id="store-expense" tabindex="-1" role="dialog" aria-labelledby="store-expense-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="store-expense-label">Créer un budget</h4>
            </div>
            <form v-on:submit.prevent="onSubmit" id='store_expense' role="form" method="post" action='http://budget.dev/expense/store'>
                <input type='hidden' name='category_id' value='1'>
                <div class="modal-body">
                    <div v-if="errors && errors.length">
                        <div class="alert alert-danger">
                          <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
                        </div>
                    </div>                    
                    <div id='name' class="form-group">
                        <label>name</label>
                        <input v-model="budget.name" class="form-control">
                        <span v-if="errors.name" class="text-danger">{{ errors.name }}</span>
                        <p class="help-block"></p>
                    </div>                                       
                    <div id='started_at' class="form-group">
                        <label>started_at</label>
                        <input v-model="budget.started_at" class="form-control">
                        <span v-if="errors.started_at" class="text-danger">{{ errors.started_at }}</span>
                        <p class="help-block"></p>
                    </div>  
                    <div id='ended_at' class="form-group">
                        <label>ended_at</label>
                        <input v-model="budget.ended_at" class="form-control">
                        <span v-if="errors.ended_at" class="text-danger">{{ errors.ended_at }}</span>
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
	props: ['budgets'],
    data(){
        return{
            budget: {},
            errors: {},
        }
    },     
    methods: {
        onSubmit: function()
        {    
            axios.post('/api/budget/create', this.budget)
            .then(response => {
                this.budgets.push(this.budget);
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
