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
		$starterper = $request->starterper / 100;
		
		$flour = $request->flour + ($request->starter * $starterper);
		$water = $request->water + ($request->starter * $starterper);

		$data['hydration'] = ($water/$flour) * 100;
		$data['title']= 'Calculate Hydration';
		
		$data['flour'] = $flour;
		$data['water'] = $water;
		$data['starterper'] = $starterper;

		return view('hydration')->with($data);				
	}
}
