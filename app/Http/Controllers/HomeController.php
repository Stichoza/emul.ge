<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class HomeController extends Controller {

	/**
	 * @Get("/")
	 */
	public function index()
	{
		return view('hello');
	}

}
