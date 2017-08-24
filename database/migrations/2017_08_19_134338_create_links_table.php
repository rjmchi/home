<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('url');
			$table->string('image')->nullable();
			$table->string('image_width')->default('150');
			$table->string('image_height')->nullable();
			$table->integer('sort_order')->default(0);
			
            $table->timestamps();
        });   
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
