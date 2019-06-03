<?php namespace Modules\Admin\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class LoginController extends Controller {
	
	public function index()
	{
		return view('admin::layouts.login');
	}
	
}