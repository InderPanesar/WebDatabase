<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\FoundItems;
use App\User;

use DB;

class ViewMoreController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function show($id) {
		$founditems = FoundItems::find($id)->toArray();
		$user = User::find($founditems['userid'])->toArray();
		return view('viewmore', compact('founditems'), compact('user'));
	}
    
	
	
}
