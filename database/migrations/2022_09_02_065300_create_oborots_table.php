<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOborotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oborots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('kod_oper');
            $table->unsignedBiginteger('nominal');
            $table->double('summa');
            $table->integer('priznak');
            $table->unsignedBiginteger('Bik');
            $table->unsignedBiginteger('account_id_out');
            $table->unsignedBiginteger('account_id_in');
            $table->unsignedBiginteger('user_id');
            $table->dateTime('date');
            $table->char('comment', 255)->nullable();
            $table->char('host', 50);
            $table->timestamps();
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
        Schema::dropIfExists('oborots');
    }
}
