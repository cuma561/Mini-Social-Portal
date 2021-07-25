@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    
        <div class="col-md-7 col-md-offset-3">
            
            @if (Auth::check())
                <div class="panel panel-default">
                    <div class="panel-body">
                        @include('posts.create')
                    </div>
                </div>
            @endif

            @foreach($posts as $post)
                @include('posts.include.single')
            @endforeach

            <div class="text-center">
                {{ $posts }}
            </div>

        </div>

    </div>
</div>
@endsection
