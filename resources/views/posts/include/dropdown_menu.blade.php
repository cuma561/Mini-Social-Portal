
<div class="dropdown pull-right">
	<a href="" class="dropdown-toggle" data-toggle="dropdown">
		<span class="caret"></span>
	</a>
	<ul class="dropdown-menu">
		<li>
			<a href="{{ url('/posts/' . $post->id . '/edit') }}">Edytuj</a>
		</li>
		<li>
			<form method="POST" action="{{ url('/posts/' . $post->id ) }}">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<button type="submit" onClick="return confirm('Czy na pewno chcesz usunąć?')">Usuń</button>
			</form>
		</li>
	</ul>
</div>
