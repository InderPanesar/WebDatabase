<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
			$table->string('reason');
			$table->bigInteger('itemid')->unsigned();
			$table->bigInteger('userid')->unsigned();
			$table->bigInteger('approved')->default(0);
			
			$table->foreign('userid')->references('id')->on('users');
			$table->foreign('userid')->references('id')->on('found_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
