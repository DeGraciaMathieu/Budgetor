<div class="form-group">
    <label>{{$label}}</label>
    <textarea name="{{$name}}" @if ($errors->has($name)) class="form-control form-error" @else class="form-control" @endif></textarea>
    @if ($errors->has($name))
    	<span class="text-danger">{{ $errors->first($name) }}</span>
    @endif      
    <p class="help-block">{{$help}}</p>
</div>