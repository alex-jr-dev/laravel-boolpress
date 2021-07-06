<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //creo colonna "user_id" fa riferimento 
            // alla tabella users 
            $table->unsignedBigInteger("user_id");

            //colonna che diventa foreign key 
            $table->foreign("user_id")
                //a quale colonna fa riferimento questo id per 
                //riuscire a fare il collegamento?
                ->references("id")
                //sulla tabella
                ->on("users");

            /*
            metodo veloce
            $table->foreignId("user_id")
                ->constrained();
            */
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
            //cancellare la relazione
            $table->dropForeign("posts_user_id_foreign");
            //cancellare la colonna 
            $table->dropColumn("user_id");
        });
    }
}
