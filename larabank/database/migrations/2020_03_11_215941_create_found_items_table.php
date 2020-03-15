<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoundItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('found_items', function (Blueprint $table) {
            $table->id();
			$table->timestamps();
			$table->string('type');
			$table->string('color');
			$table->string('location');
			$table->date('date_found');
			$table->string('description');
			$table->string('image');
			$table->bigInteger('userid')->unsigned();
			
			$table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('found_items');
    }
}
