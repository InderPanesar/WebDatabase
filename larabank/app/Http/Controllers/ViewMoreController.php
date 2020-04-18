<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\FoundItems;
use App\User;

use DB;

/**
 * Class ViewMoreController
 * @package App\Http\Controllers
 */
class ViewMoreController extends Controller
{
    /**
     * ViewMoreController constructor.
     */
	public function __construct()
    {
        //The middleware needs to be authenticated.
        $this->middleware('auth');
    }

    /**
     * Return the view of the selected item.
     * @param $id
     * @return mixed
     */
	public function show($id) {
		$founditems = FoundItems::find($id)->toArray();
		$user = User::find($founditems['userid'])->toArray();
		return view('viewmore', compact('founditems'), compact('user'));
	}
    
	
	
}
