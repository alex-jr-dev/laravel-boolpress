<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoriesFiledToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->unsignedBigInteger("category_id")->nullable();

            $table->foreign("category_id")
                ->references("id")
                ->on("categories")
                //se la categoria viene cancellata mi deve svuotare quel campo
                ->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {

            $table->dropForeign("posts_category_id_foreign");
            $table->dropColumn("category_id");
        });
    }
}
