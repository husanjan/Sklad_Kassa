<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFondMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fond_money', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->integer('priznak')->comment('Приход/Расход	');
            $table->integer('type')->comment('1-коршоям/2-фарсуда/3-ботилшуда	');
            $table->char('src')->comment('Откуда/Куда источник	');
            $table->integer('naminal')->comment('������� ������');
            $table->unsignedBiginteger('ed_id')->comment('ID �������');
            $table->integer('kol')->comment('����������');
            $table->integer('summa');
            $table->unsignedBiginteger('safe_id')->comment('ID ���������');
            $table->unsignedBiginteger('shkaf_id')->comment('ID ����/������');
            $table->unsignedBiginteger('qator_id')->comment('ID ���');
            $table->unsignedBiginteger('cell_id')->comment('ID ������');
            $table->char('comment', 255);
            $table->char('n_doc', 255)->comment('nomer document')->nullable()->change();
            $table->integer('kode_oper');
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
        Schema::dropIfExists('fond_money');
    }
}
