@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    
        <div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
			    <div class="panel-body">

					<form method="POST" action="{{ url('/comments/' . $comment->id) }}">
					    {{ csrf_field() }}
					    {{ method_field('PATCH') }}

					    <div class="form-group{{ $errors->has('comment_content') ? ' has-error' : '' }}">
					        @if ($errors->has('comment_content'))
					            <span class="help-block">
					                <strong>{{ $errors->first('comment_content') }}</strong>
					            </span>
					        @endif
					        <input name="comment_content" class="form-control" cols="60" rows="5" placeholder="Treść komentarza" value="{{ $comment->content }}" style="margin-bottom: 10px;">
					    </div>
					    
					    <button type="submit" class="btn btn-primary pull-right">Zapisz zmiany</button>

					</form>

        		</div>
        	</div>
        </div>

    </div>
</div>
@endsection
