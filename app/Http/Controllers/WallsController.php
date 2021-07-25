<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class WallsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$friends = Auth::user()->friends();

		$friends_ids_array = [];
		$friends_ids_array[] = Auth::id();

		foreach ($friends as $friend) {
			$friends_ids_array[] = $friend->id;
		}

		if (is_admin()) {

			$posts = Post::
				with('comments.user')
				->with('comments.likes')
				->with('likes')
				->whereIn('user_id', $friends_ids_array)
				->orderBy('created_at', 'desc')
				->withTrashed()
				->paginate(10);

		} else {

			$posts = Post::
				with('comments.user')
				->with('comments.likes')
				->with('likes')
				->whereIn('user_id', $friends_ids_array)
				->orderBy('created_at', 'desc')
				->paginate(10);

		}

		return view('walls.index', compact('posts'));
	}
}
