<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * 首页
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}

}
