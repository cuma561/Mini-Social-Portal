
@if (Auth::check())

	@if ( ! Auth::user()->likes->contains('comment_id', $comment->id))

		<form method="POST" action="{{ url('/likes') }}" style="margin-top: 10px;">
			{{ csrf_field() }}
			<input type="hidden" name="comment_id" value="{{ $comment->id }}">
			<button type="submit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp; Polub <span class="label label-info">{{ $comment->likes->count() }}</span></button>
		</form>

	@else

		<form method="POST" action="{{ url('/likes') }}" style="margin-top: 10px;">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<input type="hidden" name="comment_id" value="{{ $comment->id }}">
			<button type="submit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp; Odlub <span class="label label-info">{{ $comment->likes->count() }}</span></button>
		</form>

	@endif

@endif
