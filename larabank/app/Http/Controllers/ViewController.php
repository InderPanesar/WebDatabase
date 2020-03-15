<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\FoundItems;
class ViewController extends Controller
{
    public function __construct()
    {
    }
    
	public function index()
    {
		$sortable = FoundItems::sortable()->paginate(5);
		$items = FoundItems::all()->toArray();
        return view('view', compact('sortable'), compact('items'));
    }
}
