<?php

namespace App\Http\Controllers;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {
		if(auth()->user()->is_admin==1){
			return redirect('/welcome');
		}
		return view('home');
	}

	public function adminIndex() {
		return view('admin.index');
	}

	public function get($uri, $action = null) {
		return $this->addRoute(['GET', 'HEAD'], $uri, $action);
	}
}
