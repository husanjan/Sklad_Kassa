<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOstatkiSavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ostatki_saves', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->char('src')->comment('Откуда/Куда источник');
            $table->integer('naminal')->comment('������� ������');
            $table->varchar('summa');
            $table->integer('priznak')->comment('Приход/Расход	');
            $table->integer('type')->comment('1-коршоям/2-фарсуда/3-ботилшуда	');
            $table->unsignedBiginteger('ed_id')->comment('ID �������');
            $table->unsignedBiginteger('safe_id')->comment('ID ���������');
            $table->unsignedBiginteger('shkaf_id')->comment('ID ����/������');
            $table->unsignedBiginteger('qator_id')->comment('ID ���');
            $table->unsignedBiginteger('cell_id')->comment('ID ������');
            $table->float('typeFond',8)->comment('1-коршоям/2-фарсуда/3-ботилшуда');
            $table->char('comment', 255);
            $table->unsignedBiginteger('user_id');
            $table->char('host', 50);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('ed_id')->references('id')->on('spr_eds');
            $table->foreign('safe_id')->references('id')->on('spr_safes');
            $table->foreign('shkaf_id')->references('id')->on('spr_shkafs');
            $table->foreign('qator_id')->references('id')->on('spr_qators');
            $table->foreign('cell_id')->references('id')->on('spr_cells');
            $table->index('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ostatki_saves');
    }
}
