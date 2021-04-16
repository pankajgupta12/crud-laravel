<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userdata_id')->intiger('userdata_id')->change();
            $table->integer('userid');
            $table->string('user_name');
            $table->timestamps();
        });
        
        Schema::table('post', function (Blueprint $table) {
            $table->dropColumn('votes');
        });

        Schema::table('post', function (Blueprint $table) {
            $table->dropColumn('userid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
