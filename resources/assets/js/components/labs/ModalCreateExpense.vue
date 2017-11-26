<template>
<div class="modal fade" id="store-expense" tabindex="-1" role="dialog" aria-labelledby="store-expense-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="store-expense-label">Créer un budget</h4>
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
    props: ['category_id'],
    methods: {
        addExpense: function(event)
        {
            $.ajax({
                type     : "POST",
                cache    : false,
                url      : '/expense/store',
                data     : {
                    'category_id': this.category_id,
                    'name': event.target.elements.name.value,
                    'amount': event.target.elements.amount.value,
                    'paid_at': event.target.elements.paid_at.value,
                    'comment': event.target.elements.comment.value,
                },
                success  : function(response) {

                    const Row = ({id, name, amount, paid_at, link_edit}) => `<tr>
                        <td><a href='${link_edit}'>${name}</a></td>
                        <td>${amount}</td>
                        <td>${paid_at}</td>
                        <td class='align-right'>
                            <a class="btn btn-info btn-sm" href="${link_edit}"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                            <button name='destroy' class="btn btn-danger btn-sm" data-id="${id}"><i class="fa fa-trash-o fa-lg"></i></button>
                        </td>       
                    </tr>`;

                    $('#expenses tr:last').after([{ 
                        id: response.id, 
                        name: response.name, 
                        amount: response.amount, 
                        paid_at: response.paid_at,
                        link_edit: response.link_edit,
                    }].map(Row).join(''));

                    $('#store-expense').modal('toggle');
                },
                statusCode: {
                    422: function(response) {
                        var response = $.parseJSON(response.responseText)
                        $.each(response.errors, function (id, message) {
                            $('#' + id + ' input').addClass("form-error");
                            $('#' + id + ' span').html(message[0]);
                            $('#' + id + ' span').show();
                        });              
                    }
                }        
            });
        }
    },
    mounted() {

    }  
}

// export default {
//     data(){
//         return{

//         }
//     },
//     methods: {
//         addExpense: function()
//         {
//             const Row = ({id, name, amount, paid_at, link_edit}) => `<tr>
//                 <td><a href='${link_edit}'>${name}</a></td>
//                 <td>${amount}</td>
//                 <td>${paid_at}</td>
//                 <td class='align-right'>
//                     <a class="btn btn-info btn-sm" href="${link_edit}"><i class="fa fa-pencil-square-o fa-lg"></i></a>
//                     <button name='destroy' class="btn btn-danger btn-sm" data-id="${id}"><i class="fa fa-trash-o fa-lg"></i></button>
//                 </td>       
//             </tr>`;

//             $.each(["name", "amount", "paid_at", "comment"], function (id, value) {
//                 $('#' + value + ' input').removeClass("form-error");
//                 $('#' + value + ' span').html(null);
//                 $('#' + value + ' span').hide();
//             });     
//             $.ajax({
//                 type     : "POST",
//                 cache    : false,
//                 url      : $(this).attr('action'),
//                 data     : $(this).serialize(),
//                 success  : function(response) {

//                     $('#expenses tr:last').after([{ 
//                         id: response.id, 
//                         name: response.name, 
//                         amount: response.amount, 
//                         paid_at: response.paid_at,
//                         link_edit: response.link_edit,
//                     }].map(Row).join(''));

//                     $('#store-expense').modal('toggle');
//                 },
//                 statusCode: {
//                     422: function(response) {
//                         var response = $.parseJSON(response.responseText)
//                         $.each(response.errors, function (id, message) {
//                             $('#' + id + ' input').addClass("form-error");
//                             $('#' + id + ' span').html(message[0]);
//                             $('#' + id + ' span').show();
//                         });              
//                     }
//                 }        
//             });
//         }
//     },    
//     mounted() {


//         $("button[name='destroy']").on('click', function(){

//             var id = $(this).attr('data-id');

//             $.ajax({
//                 type     : "POST",
//                 cache    : false,
//                 url      : '/expense/' + id,
//                 success  : function(response) {
//                     $("button[data-id='" + id +"']").parent().parent().fadeOut();
//                 }
//             });    

//         });
//     }
// }
</script>
