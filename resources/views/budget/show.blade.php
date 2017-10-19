@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
              <li><a href="/">Home</a></li>
              <li><a href="{{route('budget.index')}}">Budgets</a></li>
              <li class="active">{{$budget->name}}</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">Informations budget</div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>name</th>
                                <td>{{$budget->name}}</td>
                            </tr>
                            <tr>
                                <th>amount</th>
                                <td>{{$budget->amount}}</td>
                            </tr>
                            <tr>
                                <th>started_at</th>
                                <td>{{$budget->started_at}}</td>
                            </tr>
                            <tr>
                                <th>ended_at</th>
                                <td>{{$budget->ended_at}}</td>
                            </tr>                                                        
                        </tbody>
                    </table>
                </div>
            </div>            
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
                        @foreach($budget->categories as $category)
                        <tr>
                            <td><a href='{{route('category.show', $category->id)}}'>{{$category->name}}</a></td>
                            <td>{{$category->amount}} €</td>
                            <td @if($category->expenses->sum('amount') > $category->amount) style="color: #bf5329;" @endif>
                                {{$category->expenses->sum('amount')}} €
                            </td>
                            <td>
                                @include('elements.progress-label', ['value' => number_format($category->expenses->sum('amount') * 100 / $category->amount, 0, '.', ' ')])
                            </td>
                            <td class='align-right'>
                                <a class="btn btn-info btn-sm" href="{{route('category.edit', [$category->id])}}"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                                <button name='destroy' class="btn btn-danger btn-sm" data-id="{{$category->id}}"><i class="fa fa-trash-o fa-lg"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table> 
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-primary btn-sd" data-toggle="modal" data-target="#store-category">Créer une categorie</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="store-category" tabindex="-1" role="dialog" aria-labelledby="store-category-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="store-category-label">Créer une categorie</h4>
            </div>
            <form id='store_expense' role="form" method="post" action='{{route('category.store')}}'>
                <input type='hidden' name='budget_id' value='{{$budget->id}}'>
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

const Row = ({id, name, amount, link_edit}) => `<tr>
    <td><a href='${link_edit}'>${name}</a></td>
    <td>${amount}</td>
    <td>0</td>
    <td><span class="label label-success">0%</span></td>
    <td class='align-right'>
        <a class="btn btn-info btn-sm" href="${link_edit}"><i class="fa fa-pencil-square-o fa-lg"></i></a>
        <button name='destroy' class="btn btn-danger btn-sm" data-id="${id}"><i class="fa fa-trash-o fa-lg"></i></button>
    </td>       
</tr>`;

function deleteRow(row)
{
    var id = row.attr('data-id');

    $.ajax({
        type     : "POST",
        cache    : false,
        url      : '/category/' + id,
        success  : function(response) {
            $("button[data-id='" + id +"']").parent().parent().fadeOut();
        }
    });    
}

$('#store_expense').on('submit',function(e){
    e.preventDefault();
    $.each(["name", "amount"], function (id, value) {
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

            $('#categories tr:last').after([{ 
                id: response.id, 
                name: response.name, 
                amount: response.amount, 
                link_edit: response.link_edit,
            }].map(Row).join(''));

            $('#store-category').modal('toggle');

            $("button[name='destroy']").on('click', function(){
                deleteRow($(this));
            });
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
    deleteRow($(this));
});
</script>
@endsection
