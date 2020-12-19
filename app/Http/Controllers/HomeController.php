<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IPAddr;
use Carbon\Carbon;
use App\Reminder;
use App\Link;
use App\Client;

class HomeController extends Controller
{
    public function index($sort=false) {

		$reminders = Reminder::whereNotNull('due_date')
			->orderBy('due_date')
			->get();
		$notes = Reminder::whereNull('due_date')->get();
				
		if ($sort){
			$data['links'] = Link::orderBy('name')->get();	
		}else {
			$data['links'] = Link::orderBy('sort_order')->get();	
		}
		$data['clients'] = Client::where('client_id',null)->get();	

		$today = Carbon::today('America/Chicago');

		foreach ($reminders as $reminder) {
			$reminder->due = '';
			if ($today->equalTo($reminder->due_date))
			{
				$reminder->due = 'today';
			} else if ($today->greaterThan($reminder->due_date)) {
				$reminder->due = 'past';
			}
		}

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'http://www.rjmprogramming.com/getipaddr.php');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($curl);
		curl_close($curl);

		$strtoday = $today->format('m-d-Y');
		$ip = IPAddr::orderBy('created_at', 'DESC')->first();
		if ($result == 0){
			echo 'ip address is 0';
		} else if ($ip) {
			if ($ip->ip != $result) {
				$ip=new IPAddr;
				$ip->day = $strtoday;
				$ip->ip = $result;
				$ip->save();		
				$data['alert'] = 'IP Address Change';
				echo 'IP Address Change';
			}
		}
		
		$data['title'] = "Robert's Home";
		$data['reminders'] = $reminders;
		$data['notes'] = $notes;
		$data['today'] = $today;
		
    	return view('home', $data);
	}
	
	public function addLink(Request $request) {

		Link::create([
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
		$data['links'] = Link::orderBy('sort_order')->get();	
		
		return view('edit_links', $data);

	}
	public function updateLink(Request $request) {
		$link = Link::find($request->id);

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
		Link::destroy($request->id);
		return redirect()->back();
	}
	
	public function reorderLinks(Request $request) {
		$links = Link::orderBy('sort_order')->get();	
		$i=5;
		foreach($links as $link) {
			$link->sort_order= $i;
			$i+= 5;
			$link->save();
		}
		return redirect()->back();
	}
	
	public function addReminder(Request $request) {
		$r = new Reminder();
		if ($request->due_date) {
			$r->due_date = $request->due_date;
		}
		$r->message = $request->message;
		$r->save();

		return redirect()->back();
	}
	
	public function deleteReminder (Reminder $reminder) {

		if ($reminder->days){
			if ($reminder->days % 30){
				$reminder->due_date = $reminder->due_date->addDays($reminder->days);
			} else {
				$reminder->due_date = $reminder->due_date->addMonth($reminder->days/30);
			}
			$reminder->save();
		} else {
			$reminder->delete();
		}
		return redirect()->back();		
	}	
	
	public function listips() {
		$data['title'] = 'List IPs';
		$data['addrs'] = IPAddr::orderBy('updated_at', 'DESC')->get();
		return view('list_ips')->with($data);
	}
}

