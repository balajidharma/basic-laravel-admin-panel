<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReplyToIdColumnToCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * parent_id   = always the ROOT comment id (groups all replies together)
     * reply_to_id = the specific comment being replied to (for @mention display)
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('comment.table_names');

        Schema::table($tableNames['comments'], function (Blueprint $table) {
            $table->unsignedBigInteger('reply_to_id')->nullable()->after('parent_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableNames = config('comment.table_names');

        Schema::table($tableNames['comments'], function (Blueprint $table) {
            $table->dropIndex(['reply_to_id']);
            $table->dropColumn('reply_to_id');
        });
    }
}
