<template>
<div class="modal fade" id="store-expense" tabindex="-1" role="dialog" aria-labelledby="store-expense-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="store-expense-label">Créer une depense</h4>
            </div>
            <form v-on:submit.prevent="addExpense" id='store_expense' role="form" method="post" action='http://budget.dev/expense/store'>
                <input type='hidden' name='category_id' value='1'>
                <div class="modal-body">
                    <div id='name' class="form-group">
                        <label>name</label>
                        <input name="name" value="" class="form-control">
                        <span class="text-danger"></span>
                        <p class="help-block"></p>
                    </div>                    
                    <div id='amount' class="form-group">
                        <label>amount</label>
                        <input name="amount" value="" class="form-control">
                        <span class="text-danger"></span>
                        <p class="help-block"></p>
                    </div>                    
                    <div id='paid_at' class="form-group">
                        <label>paid_at</label>
                        <input name="paid_at" value="" class="form-control">
                        <span class="text-danger"></span>
                        <p class="help-block"></p>
                    </div>                 
                    <div class="form-group">
                        <label>comment</label>
                        <textarea name="comment"  class="form-control" ></textarea>
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
    mounted() {

    }  
}

</script>
