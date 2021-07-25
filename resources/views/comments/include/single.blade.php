
@if ( ! $loop->first)
	<hr style="margin: 10px 0;">
@endif

@if(belongs_to_auth($comment->user_id) || is_admin())
	@include('comments.include.dropdown_menu')
@endif

<div id="comment_id{{ $comment->id }}" class="{{ $comment->trashed() ? 'trashed' : ''}}">
	
	<img src="{{ url('user-avatar/'. $comment->user->id. '/35') }}" alt="" class="img-responsive pull-left">
	
	<div style="padding-left: 10px; overflow: hidden;">
		<a href="{{ url('/posts/' . $post->id . '#comment_id' . $comment->id) }}" class="text-muted pull-right"><small><span class="glyphicon glyphicon-time"></span> {{ $post->created_at }}</small></a>
		<a href="{{ url('/users/' . $comment->user->id) }}"><strong>{{ $comment->user->name }}</strong></a><br>
		{{ $comment->content }}
	</div>
	
	@include('comments.include.likes')

</div>

@section('footer')
<script>
	$(function(){

		function addHighlightClass() {
			let hash = window.location.hash.substring(1);
			let comment = document.getElementById(hash);
			let $comment = $(comment).addClass('highlight highlightYellow');
			setTimeout(function(){
				$comment.removeClass('highlightYellow');
			}, 1500);
		} addHighlightClass();

		window.addEventListener('hashchange', function(){
			addHighlightClass();
		}, false);

	});
</script>
@endsection