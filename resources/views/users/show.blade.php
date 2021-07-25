@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        @include('layouts.sidebar')
    
        <div class="col-md-7">
            
            @if (Auth::check() && $user->id === Auth::id())
                <div class="panel panel-default">
                    <div class="panel-body">
                        @include('posts.create')
                    </div>
                </div>
            @endif

            @if ($posts->count() > 0)
                @foreach($posts as $post)
                    @include('posts.include.single')
                @endforeach
            @else
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="text-center">Ten użytkownik nie ma żadnych postów</h4>
                    </div>
                </div>
            @endif


            <div class="text-center">
                {{ $posts }}
            </div>

        </div>

    </div>
</div>
@endsection
