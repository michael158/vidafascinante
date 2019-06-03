<?php namespace Modules\Admin\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class DashBoardController extends Controller {
	
	public function index()
	{
		return view('admin::index');
	}
	
}