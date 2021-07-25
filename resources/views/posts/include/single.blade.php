
<div class="panel panel-default{{ $post->trashed() ? ' trashed' : ''}}">
    <div class="panel-body">

    	@if (belongs_to_auth($post->user_id) || is_admin())
			@include('posts.include.dropdown_menu')
    	@endif

		<div class="clearfix">
			<img src="{{ url('user-avatar/'. $post->user->id . '/50') }}" alt="" class="img-responsive pull-left">	
			<div class="pull-left" style="margin: 3px 10px;">
				<a href="{{ url('/users/' . $post->user->id) }}"><strong>{{ $post->user->name }}</strong></a><br>
				<a href="{{ url('/posts/' . $post->id) }}" class="text-muted"><small><span class="glyphicon glyphicon-time"></span> {{ $post->created_at }}</small></a>
			</div>
		</div>

 		<div id="post_id{{ $post->id }}" style="margin-top: 10px;">
			{{ $post->content }}
		</div>

		@include('posts.include.likes')

		<hr>

		@if (Auth::check())
			@include('comments.create')
		@endif

		<div class="row">
			<div class="col-md-12">
				@foreach ($post->comments as $comment)
					@include('comments.include.single')
				@endforeach
			</div>
		</div>

    </div>
</div>
