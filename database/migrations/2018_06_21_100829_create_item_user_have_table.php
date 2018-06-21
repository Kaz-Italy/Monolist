<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemUserHaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_user_have', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('item_have_id')->unsigned()->index();
            $table->string('type')->index();
            $table->timestamps();

            // Foreign key settings
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('item_have_id')->references('id')->on('items');
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_user_have');
    }
}
