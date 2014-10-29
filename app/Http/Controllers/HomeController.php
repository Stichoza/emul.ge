<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use GitElephant\Repository as GitRepository;

class HomeController extends Controller {

	/**
	 * @Get("/")
	 */
	public function index()
	{
		$bundle = [];

		try {
			$git = new GitRepository('.');
		} catch (Exception $e) {
			Log::write('Unable to instantiate Repository object');
		}

		$bundle['git'] = [
			'last_tag_name'  => !is_null($git->getLastTag()) ? $git->getLastTag()->getName() : 'no tag',
			'current_branch' => $git->getMainBranch()->getName()
		];


		return view('hello', $bundle);
	}

}
