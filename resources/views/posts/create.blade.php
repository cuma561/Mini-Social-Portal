
<form method="POST" action="{{ url('/posts') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('post_content') ? ' has-error' : '' }}">
        @if ($errors->has('post_content'))
            <span class="help-block">
                <strong>{{ $errors->first('post_content') }}</strong>
            </span>
        @endif
        <textarea name="post_content" class="form-control" cols="60" rows="5" placeholder="Co słychać?" style="margin-bottom: 10px;">{{ old('post_content') }}</textarea>
        
    </div>
    <button type="submit" class="btn btn-default pull-right">Dodaj post</button>

</form>
