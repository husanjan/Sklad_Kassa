<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateFondCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     
* @return void
     */
    public function up()
    {
       
 Schema::create('fond_coins', function (Blueprint $table) {
        
    $table->id();
      $table->dateTime('date');
            
$table->integer('priznak')->comment('Приход/Расход');
          
  $table->tinyinteger('type')->comment('1-Годные/2-Ветхые/3-Уничтоженные');
         
   $table->char('src')->comment('Откуда/Куда');
           
 $table->integer('naminal')->comment('Наминал купюры');
         
   $table->unsignedBiginteger('kode_oper') ;
           
 $table->integer('kol')->comment('Количество');
           
 $table->integer('summa');
           
 $table->unsignedBiginteger('safe_id')->comment('ID Хранилище');
    
       $table->unsignedBiginteger('shkaf_id')->comment('ID шкаф/стилаж');
         
   $table->unsignedBiginteger('qator_id')->comment('ID ряд');
          
  $table->unsignedBiginteger('cell_id')->comment('ID ячейки');
     
       $table->char('comment', 255);
         
   $table->unsignedBiginteger('user_id');
         
   $table->char('host', 50);
            $table->unsignedBiginteger('kod_oper');
           
 $table->char('n_doc',50);
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
        Schema::dropIfExists('fond_coins');
    }
}
