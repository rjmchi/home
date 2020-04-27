<?php

namespace App\Http\Controllers;

use App\HowardPhoto;
use Illuminate\Http\Request;

class HowardPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//		$data['title'] = 'Howards Photos';		
//		$data['photos'] = HowardPhoto::get();
//		return view('HowardPhotos.index')->with($data);
		return HowardPhoto::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data['title'] = 'Howards Photos';		
		
		return view('HowardPhotos.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//		$this->validate($request, [
//            'url' => 'required',
//        ]);
		
		$r = new HowardPhoto;
		if ($request->title){
			$r->title = $request->title;
		}
		$r->url = $request->url;

		$r->save();
		
		return($r);
		
//    	return redirect(route('howard.index'));    
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\HowardPhoto  $howardPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(HowardPhoto $howard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HowardPhoto  $howardPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(HowardPhoto $howard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HowardPhoto  $howardPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HowardPhoto $howard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HowardPhoto  $howardPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(HowardPhoto $howard)
    {
		$howard->delete();
		return $howard;
    }
}
