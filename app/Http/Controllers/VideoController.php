<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['title'] = "Videos";
		$data['links'] = Video::orderBy('category')->orderBy('sort_order')->get();	
		
		return view('video.index', $data);	
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$v = new Video;
		$v->name = $request->name;
		if ($url = strstr($request->url, 'http',0))
		{
			$url = strstr($url, '//',0);
			$url = trim($url, '//');
		}
		else {
			$url = $request->url;
		}
		
		$v->url = $url;
		$v->notes = $request->notes;
		$v->sort_order = $request->sort_order;
		$v->category = $request->category;
		$v->save();
		
		return redirect('/videos');    
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
		$data['title'] = "Edit Video Link";
		$data['video'] = $video;
		return view('video.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
		if ($url = strstr($request->url, 'http',0))
		{
			$url = strstr($url, '//',0);
			$url = trim($url, '//');
		}
		else {
			$url = $request->url;
		}		
		$video->category = $request->category;
		$video->name = $request->name;
		$video->url = $url;
		$video->notes = $request->notes;
		$video->sort_order = $request->sort_order;
		$video->save();
		return (redirect('/videos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
		$video->delete();
		return redirect('/videos');
    }
	
	public function reorder() {
		
		$cat = '';
		
		$links = Video::orderBy('category')->orderBy('sort_order')->get();	
		foreach($links as $link) {
			if ($cat != $link->category){
				$cat = $link->category;
				$i=10;
			}
			$link->sort_order= $i;
			$i+= 10;
			$link->save();
		}		
		return redirect('/videos');		
	
	}
}
