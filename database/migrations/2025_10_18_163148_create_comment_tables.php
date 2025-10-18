<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('comment.table_names');

        Schema::create($tableNames['comments'], function (Blueprint $table) {
            $table->id('id');
            $table->morphs('commenter');
            $table->unsignedBigInteger('parent_id')->nullable()->index();
            $table->morphs('commentable');
            $table->text('content');
            $table->smallInteger('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
