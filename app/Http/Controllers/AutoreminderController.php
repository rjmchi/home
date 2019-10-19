<?php

namespace App\Http\Controllers;

use App\Autoreminder;
use Illuminate\Http\Request;

class AutoreminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['reminders'] = Autoreminder::all();

		$data['title']= 'Scheduled Reminders';
		return view('autoreminders.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data['title']= 'New Reminder';
		return view('autoreminders.create')->with($data);
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
            'name' => 'required',
            'days' => 'required|integer',
        	'next_due' => 'required|date',			
        ]);
		
		$r = new Autoreminder;
		$r->name = $request->name;
		$r->next_due = $request->next_due;
		$r->days = $request->days;
		$r->save();
		
    	return redirect(route('autoreminders.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Autoreminder  $autoreminder
     * @return \Illuminate\Http\Response
     */
    public function show(Autoreminder $autoreminder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Autoreminder  $autoreminder
     * @return \Illuminate\Http\Response
     */
    public function edit(Autoreminder $autoreminder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Autoreminder  $autoreminder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autoreminder $autoreminder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Autoreminder  $autoreminder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autoreminder $autoreminder)
    {
		$autoreminder->delete();
    	return redirect(route('autoreminders.index'));		
    }
}
