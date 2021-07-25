<?php

use App\Friend;

function friendship($friend_id)
{
	$friend_query = Friend::where([
		'user_id' => Auth::id(),
		'friend_id' => $friend_id,
	])->orWhere([
		'user_id' => $friend_id,
		'friend_id' => Auth::id(),
	])->first();

	$friendship = new stdClass();

	if ( ! is_null($friend_query)) {
		$friendship->exists = true;
		$friendship->accepted = $friend_query->accepted;
	} else {
		$friendship->exists = false;
		$friendship->accepted = false;
	}

	return $friendship;
}

function has_friend_invitation($friend_id)
{
	return Friend::where([
		'user_id' => $friend_id,
		'friend_id' => Auth::id(),
		'accepted' => 0,
	])->exists();
}

function belongs_to_auth($user_id)
{
	return (Auth::check() && $user_id === Auth::id());
}

function is_admin()
{
	return (Auth::check() && Auth::user()->role->type === 'admin');
}
