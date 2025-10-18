<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('category.table_names');
        $columnNames = config('category.column_names');

        Schema::create($tableNames['category_types'], function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('machine_name', 64)->unique();
            $table->boolean('is_flat')->default(0);
            $table->timestamps();
        });

        Schema::create($tableNames['categories'], function (Blueprint $table) use ($tableNames) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('category_type_id');
            $table->foreign('category_type_id')
                ->references('id')
                ->on($tableNames['category_types'])
                ->onDelete('cascade');

            $table->string('name');
            $table->string('slug')->nullable();
            $table->unique(['category_type_id', 'slug']);
            $table->string('description')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('weight')->default(0);
            $table->text('icon')->nullable();
            $table->string('color', 50)->nullable();
            $table->boolean('enabled')->default(1);
            $table->timestamps();
        });

        Schema::create($tableNames['model_has_categories'], function (Blueprint $table) use ($tableNames, $columnNames) {
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on($tableNames['categories'])
                ->onDelete('cascade');

            $table->morphs('model');
            $table->integer('weight')->default(0);
            $table->boolean('is_default')->default(0);
            $table->unsignedBigInteger('category_type_id');

            $table->primary(['category_id', $columnNames['model_morph_key'], 'model_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableNames = config('category.table_names');
        Schema::dropIfExists($tableNames['category_types']);
        Schema::dropIfExists($tableNames['categories']);
        Schema::dropIfExists($tableNames['model_has_categories']);
    }
}