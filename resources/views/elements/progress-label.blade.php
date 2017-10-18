@if($value >= 100)
<span class="label label-danger">{{$value}}%</span>
@elseif($value > 80)
<span class="label label-warning">{{$value}}%</span>
@else
<span class="label label-success">{{$value}}%</span>
@endif