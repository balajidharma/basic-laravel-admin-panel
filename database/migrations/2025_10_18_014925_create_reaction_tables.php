<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReactionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('reaction.table_names');

        Schema::create($tableNames['reactions'], function (Blueprint $table) {
            $table->id('id');
            $table->morphs('reactor');
            $table->string('reaction_type');
            $table->string('reaction_name');
            $table->integer('rate');
            $table->morphs('reactable');
            $table->string('comment')->nullable();
            $table->timestamps();
            $table->index(['reaction_type', 'reaction_name', 'reactable_id', 'reactable_type'], 'reaction_type_name_index');
        });
    }
};
