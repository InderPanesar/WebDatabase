<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\FoundItems;
use DB;

class EditController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('auth');
		$this->middleware('admin');
    }
    
	public function index($id)
    {
		$founditems = FoundItems::find($id)->toArray();
        return view('edit', compact('founditems'));
    }
	
	public function update(Request $request, $id) {
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
