<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOstatkiSchetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ostatki_schets', function (Blueprint $table) {
            
            $table->id();
            $table->dateTime('date');
            $table->dateTime('priod');
            $table->char('src')->comment('Откуда/Куда источник');
            $table->char('Prikhod')->comment('AllSummaOstatka');
            $table->char('Raskhod')->comment('AllSummaOstatka');
            $table->char('Allsumma');
            $table->integer('type')->comment('1-Дневной/2-На Месяц');
            $table->unsignedBiginteger('user_id');
            $table->char('host',50);
        
            $table->softDeletes();
            $table->index('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ostatki_schets');
    }
}
