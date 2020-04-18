<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use DB;

/**
 * Class AddController
 * @package App\Http\Controllers
 */
class AddController extends Controller
{
    /**
     * AddController constructor.
     */
	public function __construct()
    {
        //Calls the middleware to check if not admin and authorised .
        $this->middleware('auth');
		$this->middleware('notadmin');
    }

    /**
     * Return the view
     * @return mixed
     */
	public function index()
    {
        return view('add');
    }

    /**
     * Upload the images and push the values to the database.
     * @param Request $request
     * @return mixed
     */
	public function upload(Request $request){

	    //Custom error messages for the validator
		$messages = [    
			'file.max' => 'Can only upload 3 files.',
			'file.*.mimes' => 'Invalid file formats in the file upload. Must be a .jpg or .jpeg!',
		];

		//The validator for each value of the form
		$validator = Validator::make($request->all(), [
		    'color' => 'required | max:255 | regex:/^[a-zA-Z\s_.-]*$/',
            'file' => 'required | max:3',
			'file.*' => ' mimes:jpeg,jpg, | max:1000',
			'location' => 'required | max:255 | regex:/^[a-zA-Z0-9\s_.-]*$/',
			'text' => 'required | max:255 | regex:/^[a-zA-Z0-9\s_.-]*$/'
		], $messages);

		//If the validator fails return back to the screen with the correct input.
		if ($validator->fails()) {
			return redirect('add')
						->withErrors($validator)
						->withInput();
		}
		else {
		    //Create all the image locations and upload them.
            $imageurl = '';
			$images = $request->file('file');
			$time = time();
			$index = 0;
			//All the images which the user wanted.
			foreach ($images as $image) {
				if($index > 0) {
					$imageurl = $imageurl . '|';
				}
				$extension = $image->getClientOriginalExtension();
				$name = $time.'.'.$image->getClientOriginalExtension();
				$destinationPath = "/home/u-180039762/public_html/images";
				$image->move($destinationPath, $name);
				$imageurl = $imageurl.'images/'.$time.'.'.$extension;
				//Allows for unique image names.
				$time = $time + 1;
				//Index used to correctly url names.
				$index = $index + 1;
			}

			//Set all the values
			$color = $request->color;
			$type =$request->types;
			$date =$request->date;
			$location =$request->location;
			$description = $request->text;
			$userid = Auth()->user()->id;

			//Set all data as an array
			$data = array('type'=>$type, 'color'=>$color, 'location'=>$location, 'date_found'=>$date, 'description'=>$description, 'image'=>$imageurl, 'userid'=>$userid);	        
			//Insert the values into the database.
			DB::table('found_items')->insert($data);
			return redirect('view')->with('message', 'Item has successfully been added!');;
			
			
			
		}

	}
}