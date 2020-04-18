<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Requests;
use App\FoundItems;
use Mail;
use App\Mail\AcceptedRequest;
use App\Mail\DenyRequest;
use App\User;
use Auth;

use DB;

/**
 * Class RequestTableController
 * @package App\Http\Controllers
 */
class RequestTableController extends Controller
{
    /**
     * RequestTableController constructor.
     */
	public function __construct()
    {
        $this->middleware('auth');
		$this->middleware('admin');
    }

    /**
     * Return a view back.
     * @return mixed
     */
	public function index()
    {
		$items = Requests::all()->toArray();
		$requesteditems = null;
		$requestedusers = null;
		//For loop of all the items within the table.
		foreach($items as $item) {
			$requesteditems[$item['id']] = FoundItems::find($item['itemid'])->toArray();
			$requestedusers[$item['id']] = User::find($item['userid'])->toArray();
		}
		if($requestedusers == null) {
		    //If no requests exists then return home.
			return view('welcome'); 
		}
		else {
		    //If requests exist then show table.
			return view('requesttable')->with(compact('items', 'requestedusers', 'requesteditems'));
		}
	}

    /**
     * Update the value in the database.
     * @param Request $request
     * @return mixed
     */
	public function update(Request $request) {
		$value = $request->approved;
		$id = $request->id;
		$requestitem = Requests::find($id);
		//Find the user who made the request.
		$user = User::find($requestitem['userid'])->toArray();
		//Request is approved then send a email to the requester.
		if($value == 'on') {
			$requestitem->approved = 1;
			$requestitem->save();
			Mail::to($user['email'])->send(new AcceptedRequest($requestitem->itemid));
		}
        //Request is dis-approved then send a email to the requester.
        else {
			$requestitem->approved = -1;
			$requestitem->save();
			Mail::to($user['email'])->send(new DenyRequest($requestitem->itemid));
		}
        //Return back to the screen.
		return back();
	}
	
}
