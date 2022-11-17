<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOborotsCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oborots_coins', function (Blueprint $table) {
         
            $table->id();
            $table->dateTime('date');
            $table->unsignedBiginteger('kod_oper');
            $table->char('n_doc',50);
            $table->integer('naminal')->comment('Наминал купюры');
            $table->double('summa', 25);
            $table->integer('priznak')->comment('Приход/Расход');
            $table->unsignedBiginteger('bik')->comment('ID   accounts');
            $table->char('src')->comment('Откуда/Куда');
           // $table->tinyinteger('type')->comment('1-Годные/2-Ветхые/3-Уничтоженные');
            $table->char('comment', 255);
             $table->unsignedBiginteger('user_id');
            $table->char('host', 50);
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('oborots_coins');
    }
}
