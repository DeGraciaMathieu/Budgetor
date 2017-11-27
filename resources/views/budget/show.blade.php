@extends('layouts.app')

@section('content')
<div id='app'>
    <pages-list-budgets></pages-list-budgets>
</div>
<script>
new Vue({
    el: '#app',         
});
</script>
@endsection
