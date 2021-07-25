<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Like;
use App\Post;
use App\Comment;
use App\User;
use App\Notifications\Liked;

class LikesController extends Controller
{
	public function add(Request $request)
	{
		Like::create([
			'user_id' => Auth::id(),
			'post_id' => $request->post_id,
			'comment_id' => $request->comment_id,
		]);

		if ( ! empty($request->post_id)) {
			$post = Post::findOrFail($request->post_id);

			if (Auth::id() !== $post->user_id) {
				$content = [
					'post' => $post,
					'comment' => null,
				];

				User::findOrFail($post->user_id)->notify(new Liked($content));
			}

		}

		if ( ! empty($request->comment_id)) {
			$comment = Comment::findOrFail($request->comment_id);
			$post = Post::findOrFail($comment->post_id);

			if (Auth::id() !== $comment->user_id) {
				$content = [
					'post' => $post,
					'comment' => $comment,
				];

				User::findOrFail($comment->user_id)->notify(new Liked($content));
			}
		}

		return back();
	}

	public function destroy(Request $request)
	{
		Like::where([
			'user_id' => Auth::id(),
			'post_id' => $request->post_id,
			'comment_id' => $request->comment_id,
		])->delete();

		return back();
	}
}
