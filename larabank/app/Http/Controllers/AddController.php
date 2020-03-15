<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use DB;

class AddController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('auth');
		$this->middleware('notadmin');
    }
    
	public function index()
    {
        return view('add');
    }
	
	
	public function upload(Request $request){
		$validator = Validator::make($request->all(), [
		    'color' => 'required', 'string', 'max:255',
            'file' => 'required | mimes:jpeg,jpg,png | max:1000',
		]);
		if ($validator->fails()) {
			return redirect('add')
						->withErrors($validator)
						->withInput();
		}
		else {
			$time = time();
			$image = $request->file('file');
			$extension = $request->file->getClientOriginalExtension();

			$name = $time.'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/images');
			$image->move($destinationPath, $name);
			$imageurl = 'images/'.$time.'.'.$extension;
			$color = $request->color;
			$type =$request->types;
			$date =$request->date;
			$location =$request->location;
			$description = $request->text;
			$userid = Auth()->user()->id;
			
			$data = array('type'=>$type, 'color'=>$color, 'location'=>$location, 'date_found'=>$date, 'description'=>$description, 'image'=>$imageurl, 'userid'=>$userid);	        
			DB::table('found_items')->insert($data);
			return redirect('');
			
			
			
		}

	}
}
