<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\FoundItems;
use DB;

/**
 * Class EditController
 * @package App\Http\Controllers
 */
class EditController extends Controller
{

    /**
     * EditController constructor.
     */
	public function __construct()
    {
        //Calls the middleware to check if admin and authorised .
        $this->middleware('auth');
		$this->middleware('admin');
    }

    /**
     * @param $id Id of the item.
     * @return mixed The view of the item.
     */
	public function index($id)
    {
        //The items, and found items.
		$founditems = FoundItems::find($id)->toArray();
        return view('edit', compact('founditems'));
    }
	
	public function update(Request $request, $id) {

        //The validator for each value of the form
        $validator = Validator::make($request->all(), [
            'color' => 'required | max:255 | regex:/^[a-zA-Z\s_.-]*$/',
            'location' => 'required | max:255 | regex:/^[a-zA-Z0-9\s_.-]*$/',
            'text' => 'required | max:255 | regex:/^[a-zA-Z0-9\s_.-]*$/'
        ]);

        //If the validator fails return back to the screen with the correct input.
        if ($validator->fails()) {
            return redirect('edit/' . $id)
                ->withErrors($validator)
                ->withInput();
        }

        //Upload all new values.
		$values = $request->all();
		$item = FoundItems::find($id);
		$item->type = $values['types'];
		$item->color = $values['color'];
		$item->location = $values['location'];
		$item->date_found = $values['date'];
		$item->description = $values['text'];
		$item->save();
		return view('welcome');
	}
	
}
