<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reminder;

class ScheduleController extends Controller
{
 public function index()
    {
		$data['reminders'] = Reminder::whereNotNull('days')->orderBy('due_date')->get();

		$data['title']= 'Scheduled Reminders';
		return view('schedule.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data['title']= 'New Reminder';
		return view('schedule.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	
		$this->validate($request, [
            'message' => 'required',
            'days' => 'required|integer',
        	'next_due' => 'required|date',			
        ]);
		
		$r = new Reminder;
		$r->message = $request->message;
		$r->due_date = $request->next_due;
		$r->days = $request->days;
		$r->save();
		
    	return redirect(route('schedule.index'));
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reinder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function edit(Reminder $reminder)
    {
		$data['title'] = 'Edit Scheduled Reminder';
		$data['reminder'] = $reminder;
		return view('schedule.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reminder $reminder)
    {
			$this->validate($request, [
            'message' => 'required',
            'days' => 'required|integer',
        	'next_due' => 'required|date',			
        ]);
		
		$reminder->message = $request->message;
		$reminder->due_date = $request->next_due;
		$reminder->days = $request->days;
		$reminder->save();
		
    	return redirect(route('schedule.index'));    
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reminder $reminder)
    {
		$reminder->delete();
    	return redirect(route('schedule.index'));		
    }
}
