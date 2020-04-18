<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * Class FoundItems
 * @package App
 */
class FoundItems extends Model
{
	use Sortable;
	//Sortable items.
    public $sortable = ['id','type','color','description'];

}
