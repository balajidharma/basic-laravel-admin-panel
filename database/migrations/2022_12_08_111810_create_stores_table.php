<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('category_id')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->dateTime('deactivated_at')->nullable();

            $table->timestamps();
        });


        Schema::create('store_user', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('stores_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('stores_id')->references('id')->on('store')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store');
        Schema::dropIfExists('store');
    }
};
