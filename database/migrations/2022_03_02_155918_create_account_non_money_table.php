<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountNonMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_non_money', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->integer('priznak')->comment('������/������');
            $table->unsignedBiginteger('account_id')->comment('91301/91303/90305/91307/91509');
            $table->char('src')->comment('������/����');
            $table->char('name')->comment('��������');
            $table->unsignedBiginteger('ed_id')->comment('ID �������');
            $table->integer('kol')->comment('����������');
            $table->integer('price')->comment('����');
            $table->integer('summa');
            $table->unsignedBiginteger('safe_id')->comment('ID ���������');
            $table->unsignedBiginteger('shkaf_id')->comment('ID ����/������');
            $table->unsignedBiginteger('qator_id')->comment('ID ���');
            $table->unsignedBiginteger('cell_id')->comment('ID ������');
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
        Schema::dropIfExists('account_non_money');
    }
}
