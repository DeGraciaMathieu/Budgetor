@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
              <li><a href="/">Home</a></li>
              <li><a href="{{route('budget.index')}}">Budgets</a></li>
              <li><a href="{{route('budget.show', [$category->budget->id])}}">{{$category->budget->name}}</a></li>
              <li class="active">{{$category->name}}</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Liste des depenses</div>
                <div class="panel-body">
                    <table id='expenses' class="table table-striped">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>amount</th>
                                <th>paid_at</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($expenses as $expense)
                        <tr>
                            <td><a href='{{route('expense.edit', $expense->id)}}'>{{$expense->name}}</a></td>
                            <td>{{$expense->amount}}</td>
                            <td>{{$expense->paid_at->format('Y-m-d')}}</td>
                            <td class='align-right'>
                                <a class="btn btn-info btn-sm" href="{{route('expense.edit', [$expense->id])}}"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                                <button name='destroy' class="btn btn-danger btn-sm" data-id="{{$expense->id}}" ><i class="fa fa-trash-o fa-lg"></i></button>
                            </td>                                
                        </tr>
                        @endforeach
                        </tbody>
                    </table> 
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-primary btn-sd" data-toggle="modal" data-target="#store-expense">Créer une depense</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="store-expense" tabindex="-1" role="dialog" aria-labelledby="store-expense-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="store-expense-label">Créer une depense</h4>
            </div>
            <form id='store_expense' role="form" method="post" action='{{route('expense.store')}}'>
                <input type='hidden' name='category_id' value='{{$category->id}}'>
                <div class="modal-body">
                    @include('form.inputs.text', [
                    'label' => 'name', 
                    'name' => 'name', 
                    'value' => old('name'),
                    'help' => null
                    ])
                    @include('form.inputs.text', [
                    'label' => 'amount', 
                    'name' => 'amount', 
                    'value' => old('amount'),                                    
                    'help' => null
                    ])
                    @include('form.inputs.text', [
                    'label' => 'paid_at', 
                    'name' => 'paid_at', 
                    'value' => old('paid_at'),                                    
                    'help' => null
                    ])  
                    @include('form.textarea', [
                    'label' => 'comment', 
                    'name' => 'comment', 
                    'value' => old('comment'),                                    
                    'help' => null
                    ])
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

const Row = ({id, name, amount, paid_at, link_edit}) => `<tr>
    <td><a href='${link_edit}'>${name}</a></td>
    <td>${amount}</td>
    <td>${paid_at}</td>
    <td class='align-right'>
        <a class="btn btn-info btn-sm" href="${link_edit}"><i class="fa fa-pencil-square-o fa-lg"></i></a>
        <button name='destroy' class="btn btn-danger btn-sm" data-id="${id}"><i class="fa fa-trash-o fa-lg"></i></button>
    </td>       
</tr>`;

$('#store_expense').on('submit',function(e){
    e.preventDefault();
    $.each(["name", "amount", "paid_at", "comment"], function (id, value) {
        $('#' + value + ' input').removeClass("form-error");
        $('#' + value + ' span').html(null);
        $('#' + value + ' span').hide();
    });     
    $.ajax({
        type     : "POST",
        cache    : false,
        url      : $(this).attr('action'),
        data     : $(this).serialize(),
        success  : function(response) {

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
});

$("button[name='destroy']").on('click', function(){

    var id = $(this).attr('data-id');

    $.ajax({
        type     : "POST",
        cache    : false,
        url      : '/expense/' + id,
        success  : function(response) {
            $("button[data-id='" + id +"']").parent().parent().fadeOut();
        }
    });    

});
</script>
@endsection
