<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\FoundItems;
use App\User;
use App\Requests;
use Auth;
use DB;
use Redirect;

/**
 * Class RequestController
 * @package App\Http\Controllers
 */
class RequestController extends Controller
{
    /**
     * RequestController constructor.
     */
	public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Return the item id.
     * @param $id
     * @return mixed
     */
	public function show($id) {
		$founditems = FoundItems::find($id)->toArray();
		$user = User::find($founditems['userid'])->toArray();
		return view('request', compact('founditems'), compact('user'));
	}

    /**
     * Create a request for an item.
     * @param Request $request
     * @param $itemid
     * @return mixed Either return back if invalid or make the request if valid.
     */
	public function create(Request $request, $itemid) {
	    //Validator to ensure that value is valid.
		$validator = Validator::make($request->all(), [
		    'reason' => 'required | max:255 | regex:/^[a-zA-Z0-9\s_.-]*$/'
		]);
		//Return back if is invalid.
		if ($validator->fails()) {
			return Redirect::back()
						->withErrors($validator)
						->withInput();
		}
		
		$userid = Auth()->user()->id;
		$itemid = $itemid;
		
		//Check if user hasn't already made a request for this item.
		$requestTableParameter = ['itemid' => $itemid, 'userid' => $userid];
		$userMadeRequests = DB::table('requests')->where($requestTableParameter)->get();
		if($userMadeRequests != null) {
			foreach ($userMadeRequests as $userRequest) {
				if($userRequest->approved == 0) {
					return Redirect::back()
						->withErrors('You already have a pending request for this item!')
						->withInput();
				}
			}
		}

		//Store value as a array and insert into the database.
		$reason = $request->reason;
		$data = array('reason'=>$reason, 'itemid'=>$itemid, 'userid'=>$userid);	        
		DB::table('requests')->insert($data);
		return redirect('view')->with('message', 'Item has successfully been requested!');
		
	}
    
	
	
}