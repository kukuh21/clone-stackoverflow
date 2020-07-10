<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropLikeOnPertanyaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pertanyaan', function (Blueprint $table) {
            $table->dropColumn('like');
            $table->dropColumn('dislike');
            $table->dropColumn('vote');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->integer('like')->default('0');
            $table->integer('dislike')->default('0');
            $table->integer('vote')->default('0');
        });
    }
}
