<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class PagesController extends BaseController
{
   
   	public function getLogin(){
   		return view ('login');

	}

	public function postDashboard(){
		return view ('dashboard');
	}

	public function getIndex(){
		return view ('welcome');
   	
   	}
   	public function getInvoice(){
   		return view ('invoice');

	}
	public function getNewInvoice(){
   		return view ('newinvoice');

	}
}
