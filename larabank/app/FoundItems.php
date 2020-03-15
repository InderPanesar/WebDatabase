<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class FoundItems extends Model
{
	use Sortable;
    public $sortable = ['id','type','color','description'];

}
