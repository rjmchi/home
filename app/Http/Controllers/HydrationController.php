<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HydrationController extends Controller
{
	public function index() {
		$data['title']= 'Calculate Hydration';
		$data['hydration'] = '';
		$data['flour'] = 0;
		$data['water'] = 0;
		$data['starterper'] = 0;		
		return view('hydration')->with($data);
	}
	
	public function calculate(Request $request){
		
		$starter = $request->starter;
		$starterper = $starter / $request->flour;
		
		$flour = $request->flour + ($starter/2);
		$water = $request->water + ($starter/2);

		$data['hydration'] = ($water/$flour) * 100;
		$data['title']= 'Calculate Hydration';
		
		$data['flour'] = $flour;
		$data['water'] = $water;
		$data['starterper'] = $starterper;

		return view('hydration')->with($data);				
	}
}
