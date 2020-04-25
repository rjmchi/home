<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$notes = Note::orderBy('updated_at', 'desc')->get();
		return ($notes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $note = new Note;
		$note->title = $request->title;
		$note->note = $request->note;
        $note->save();

        return $note; 
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
		return $note;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
		$note->title = $request->title;
		$note->note = $request->note;
        $note->save();

        return $note; 
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
		$note->delete();
		return $note;
    }
}
