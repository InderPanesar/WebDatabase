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

class RequestTableController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('auth');
		$this->middleware('admin');
    }
    
	public function index()
    {
		$items = Requests::all()->toArray();
		$requesteditems = null;
		$requestedusers = null;
		foreach($items as $item) {
			$requesteditems[$item['id']] = FoundItems::find($item['itemid'])->toArray();
			$requestedusers[$item['id']] = User::find($item['userid'])->toArray();
		}
		if($requestedusers == null) {
			return view('welcome'); 
		}
		else {
			return view('requesttable')->with(compact('items', 'requestedusers', 'requesteditems'));
		}
	}
	
	public function update(Request $request) {
		$value = $request->approved;
		$id = $request->id;
		$requestitem = Requests::find($id);
		$user = User::find($requestitem['userid'])->toArray();
		if($value == 'on') {
			$requestitem->approved = 1;
			$requestitem->save();
			Mail::to($user['email'])->send(new AcceptedRequest($requestitem->itemid));
		}
		else {
			$requestitem->approved = -1;
			$requestitem->save();
			Mail::to($user['email'])->send(new DenyRequest($requestitem->itemid));
		}
		return back();
	}
	
}
