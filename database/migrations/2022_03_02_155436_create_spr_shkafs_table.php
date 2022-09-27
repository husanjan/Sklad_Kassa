<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSprShkafsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spr_shkafs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('safe_id')->comment('ID ���������');
            $table->unsignedBigInteger('shkaf')->comment('����� �����/�������');
            $table->char('comment', 255);
            $table->unsignedBiginteger('user_id');
            $table->char('host', 50);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('safe_id')->references('id')->on('spr_safes');
            $table->index('safe_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spr_shkafs');
    }
}
