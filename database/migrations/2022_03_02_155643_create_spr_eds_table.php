<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSprEdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spr_eds', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('money')->comment('������/������');
            $table->char('name')->comment('��������');
            $table->unsignedBigInteger('kol')->comment('���������� � ��������');
            $table->char('comment', 255);
            $table->unsignedBiginteger('user_id');
            $table->char('host', 50);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->index('money');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spr_eds');
    }
}
