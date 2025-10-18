<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('menu.table_names');

        Schema::create($tableNames['menus'], function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('machine_name', 64)->unique();
            $table->timestamps();
        });

        Schema::create($tableNames['menu_items'], function (Blueprint $table) use($tableNames) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('menu_id');
            $table->foreign('menu_id')
                ->references('id')
                ->on($tableNames['menus'])
                ->onDelete('cascade');

            $table->string('name');
            $table->string('uri')->nullable();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('weight')->default(0);
            $table->boolean('enabled')->default(1);
            $table->text('icon')->nullable();
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
        $tableNames = config('menu.table_names');
        Schema::dropIfExists($tableNames['menu_items']);
        Schema::dropIfExists($tableNames['menus']);
    }
}