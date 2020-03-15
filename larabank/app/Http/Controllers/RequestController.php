<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\FoundItems;
use App\User;
use App\Requests;
use Auth;
use DB;

class RequestController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function show($id) {
		$founditems = FoundItems::find($id)->toArray();
		$user = User::find($founditems['userid'])->toArray();
		return view('request', compact('founditems'), compact('user'));
	}
	
	public function create(Request $request, $itemid) {
		$validator = Validator::make($request->all(), [
		    'reason' => 'required', 'string',
		]);
		$userid = Auth()->user()->id;
		$itemid = $itemid;
		$reason = $request->reason;
		
		$data = array('reason'=>$reason, 'itemid'=>$itemid, 'userid'=>$userid);	        
		
		DB::table('requests')->insert($data);
		return redirect('');
		
	}
    
	
	
}
