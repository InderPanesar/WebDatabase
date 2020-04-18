<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\FoundItems;

/**
 * Class ViewController
 * @package App\Http\Controllers
 */
class ViewController extends Controller
{
    /**
     * ViewController constructor.
     */
    public function __construct()
    {
    }

    /**
     * Return the View
     * @return mixed
     */
	public function index()
    {
        //Set the table to have a max of 20000 items which are sortable.
		$sortable = FoundItems::sortable()->paginate(20000);
		$items = FoundItems::all()->toArray();
        return view('view', compact('sortable'), compact('items'));
    }
}
