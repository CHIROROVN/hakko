<?php namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Models\InfoModel;
use Html;
use Input;


class InfoController extends FrontendController {	

	public function index()
	{           
	   return view('frontend.info.index');
	}
	

}
