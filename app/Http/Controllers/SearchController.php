<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;

class SearchController extends Controller
{
	public function users()
	{
		$search_phrase = Input::get('q');
		$search_results = User::where('name', 'like', '%' . $search_phrase . '%')->paginate(6);

		return view('search.users', compact('search_results', 'search_phrase'));
	}
}
