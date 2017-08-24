<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
		$reminders = \App\Reminder::orderBy('due_date')->get();
		$data['links'] = \App\Link::orderBy('sort_order')->get();	
		$data['clients'] = \App\Client::where('client_id',null)->get();	

		date_default_timezone_set('America/Chicago');
		$now = localtime(time(), true);
		$m = $now['tm_mon']+1;
		$y = $now['tm_year']+1900;
		$d = $now['tm_mday'];
		$today = mktime(0,0,0,$m, $d, $y);	
		
		foreach ($reminders as $reminder) {
			if ($reminder->due_date)
			{
				if ($reminder->due_date == '2147483647')
				{
					$reminder->strdate = '';
				}
				else
				{
					$reminder->strdate = date( 'm-d-Y', $reminder->due_date );
				}
			}
			else
			{
				$reminder->strdate = '';
			}

			$reminder->due = '';
			if ($reminder->due_date == $today)
			{
				$reminder->due = 'today';
			}
			if ($reminder->due_date < $today)
			{
				$reminder->due = 'past';
			}			
		}
	
		$data['title'] = "Robert's Home";
		$data['reminders'] = $reminders;
		
    	return view('home', $data);
	}
	
	public function addLink(Request $request) {

		\App\Link::create([
			'name'=> $request->name,
			'url'=> $request->url,
			'image'=> $request->image,
			'image_width'=>$width = $request->width,
			'image_height'=>$height = $request->height,
			'sort_order'=> $request->sort_order,			
		]);
		
		return redirect()->back();
	}
	public function editLinks(Request $request) {
		$data['title'] = "Edit Links";
		$data['links'] = \App\Link::orderBy('sort_order')->get();	
		
		return view('edit_links', $data);

	}
	public function updateLink(Request $request) {
		$link = \App\Link::find($request->id);

		$update = false;
		if ($request->name != $link->name)
		{
			$update = true;
			$link->name = $request->name;
		}
		if ($request->url != $link->url)
		{
			$update = true;
			$link->url = $request->url;
		}		
		if ($request->image != $link->image)
		{
			$update = true;
			$link->image = $request->image;
		}		
		if ($request->image_width != $link->image_width)
		{
			$update = true;
			$link->image_width = $request->image_width;
		}	
		if ($request->image_height != $link->image_height)
		{
			$update = true;
			$link->image_height = $request->image_height;
		}
		if ($request->sort_order != $link->sort_order)
		{
			$update = true;
			$link->sort_order = $request->sort_order;
		}			
		
		if ($update){
			$link->save();		
		}
		return redirect()->back();
	}
	
	public function deleteLink(Request $request) {
		\App\Link::destroy($request->id);
		return redirect()->back();
	}
	
	public function reorderLinks(Request $request) {
		$links = \App\Link::orderBy('sort_order')->get();	
		$i=5;
		foreach($links as $link) {
			$link->sort_order= $i;
			$i+= 5;
			$link->save();
		}
		return redirect()->back();
	}
	
	public function addReminder(Request $request) {
		$duedate = 2147483647;
		date_default_timezone_set('America/Chicago');		
		
		if ($request->date)
		{
			$test_date = str_replace('-', '/', $request->date);
			if (strlen($test_date) > 7)
			{
				$test_arr  = explode('/', $test_date);

				$strdate = $test_arr[2] .'-'. $test_arr[0] .'-'. $test_arr[1];
				if (checkdate($test_arr[0], $test_arr[1], $test_arr[2])) 
				{
					$duedate = mktime(0,0,0,$test_arr[0], $test_arr[1], $test_arr[2]);	
				}
			}
		}
		
		\App\Reminder::create([
			'message'=>$request->message,
			'due_date'=>$duedate,			
		]);		
		return redirect()->back();

	}
	public function deleteReminder(Request $request) {
		\App\Reminder::destroy($request->id);
		return redirect()->back();		
	}	
}
