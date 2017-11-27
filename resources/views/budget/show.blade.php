@extends('layouts.app')

@section('content')
<div id='app'>
    <pages-show-budget></pages-show-budget>  
</div>
<script>
new Vue({
    el: '#app',         
});
</script>
@endsection
