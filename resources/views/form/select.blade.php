<div class="form-group">
    <label>{{$label}}</label>
    <select name='{{$name}}' class="form-control">
    @foreach($options as $option)
      <option value='{{$option['id']}}'>{{$option['value']}}</option>
    @endforeach
    </select>                                
    <p class="help-block">{{$help}}</p>
</div> 