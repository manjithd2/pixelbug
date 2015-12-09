<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Photo;
use App\Http\Requests;
use App\Http\Requests\CreatePhotoRequest;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    public function create(CreatePhotoRequest $request){

    	Photo::create($request->all());

    	  $request->file('photo')->move($request->album_name.'/', $request->photo_name.'.jpg');
 		
 		return redirect('pixelbug/loggedin/add');

    }

    public function delete($album_name,$photo_id){

    				Photo::where('album_name',$album_name)
    				  ->where('photo_id',$photo_id)
    				  ->delete();

    	return redirect('/pixelbug/loggedin/'.$album_name);  

    }
}
