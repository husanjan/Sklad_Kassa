<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFondEmisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fond_emisions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->tinyinteger('priznak')->comment('Приход/Расход');
            $table->integer('naminal')->comment('Наминал купюры');
            $table->unsignedBiginteger('ed_id')->comment('ID Единицы');
            $table->integer('kol')->comment('Количество');
            $table->integer('summa');
            $table->char('serial', 2)->comment('Серия банкнот');
            $table->integer('nn')->comment('Номер банкнот');
            $table->unsignedBiginteger('safe_id')->comment('ID Хранилище');
            $table->unsignedBiginteger('shkaf_id')->comment('ID шкаф/стилаж');
            $table->unsignedBiginteger('qator_id')->comment('ID ряд');
            $table->unsignedBiginteger('cell_id')->comment('ID ячейки');
            $table->char('comment', 255);
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('fond_emisions');
    }
}
