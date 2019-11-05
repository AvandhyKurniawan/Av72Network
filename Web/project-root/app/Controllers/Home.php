<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		#return view('welcome_message');
		return "Avandhy Kurniawan";
	}

	public function avandhy($param=""){
		echo "Hallo Avandhy [".$param."]";
	}

	//--------------------------------------------------------------------

}
