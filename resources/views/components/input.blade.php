<label for="{{$field}}" class="form-label">{{$label}}</label>
<input type="{{$type}}"
       class="form-control"
       id="{{$field}}"
       name="{{$field}}"
       value="{{old($field, $value)}}"
       placeholder="{{$placeholder}}"
       @disabled($disabled)
>
@error("$field")
<span class="text-danger">{{$message}}</span>
@enderror
