<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('imageable_id')->nullable();
            $table->string('imageable_type')->nullable();
            $table->boolean('thumbnail')->defaults(0);
            $table->timestamps();
            $table->softDeletes();

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photos');
    }

}
