<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSprBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spr_banks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('BIK')->comment('BIK Bank edintition kod');
            $table->string('full_name');
            $table->string('short_name');
            $table->char('comment', 255);
            $table->unsignedBiginteger('user_id');
            $table->timestamps();
            $table->char('host', 50);
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spr_banks');
    }
}
