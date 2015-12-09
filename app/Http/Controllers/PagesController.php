<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Photo;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function homepage(){
    	
    	$albums = Photo::distinct()->lists('album_name');
    	$photos = Photo::latest()->get();

    	return view('pages.pixelbug',compact('albums','photos'));
    }

    public function viewalbum($album_name){
    	
    	$photos = Photo::latest()->where('album_name',$album_name)->get();

    	return view('pages.album',compact('photos'))->with('album_name',$album_name);

    }

    public function viewphoto($album_name,$photo_id){

    	$photo = Photo::where('album_name',$album_name)
    				  ->where('photo_id',$photo_id)
    				  ->first();
    	
    	return view('pages.photo')->with([
    		'photo' => $photo,
    		'photo_id' => $photo_id,
    		'album_name' => $album_name
    		]);

    }

    public function logged(){

    	$albums = Photo::distinct()->lists('album_name');
    	$photos = Photo::latest()->get();

    	return view('pages.logged',compact('albums','photos'));
    
    }

    public function create(){

    	return view('pages.add');
    
    }

    public function useralbum($album_name){
    	
    	$photos = Photo::latest()->where('album_name',$album_name)->get();

    	return view('pages.useralbum',compact('photos'))->with('album_name',$album_name);

    }

    public function userphoto($album_name,$photo_id){

    	$photo = Photo::where('album_name',$album_name)
    				  ->where('photo_id',$photo_id)
    				  ->first();
    	
    	return view('pages.userphoto')->with([
    		'photo' => $photo,
    		'photo_id' => $photo_id,
    		'album_name' => $album_name
    		]);

    }

    public function add(){

    	return view('pages.add');
    
    }



}