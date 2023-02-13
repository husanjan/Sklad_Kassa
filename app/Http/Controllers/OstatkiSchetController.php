<?php

namespace App\Http\Controllers;

use App\Models\SprAccounts;
use App\Models\OstatkiSchet;
use Illuminate\Http\Request;
use App\Repositories\Repositoryschet;
use Carbon\Carbon;
class OstatkiSchetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */  
      private $Repositoryschet;
 
    public function __construct(Repositoryschet $Repositoryschet)
    {
        $this->middleware('auth');
 
        $this->Repositoryschet = $Repositoryschet;
    
    }
    public function index()
    {
        //AllSelectDay($src,$typefond,$type)
            //AllSelectDay($src,$typefond=1 Money/2 Coins	,$type=1-Дневной/2-На Месяц	)
        // month
       $SprAccounts=SprAccounts::all();
      $FondkorshoamMoneyMonth = $this->Repositoryschet->AllSelectDay(1,1,2);
      $FondFarsudaMoneyMonth = $this->Repositoryschet->AllSelectDay(2,1,2);
      $FondbotilshudaMoneyMonth = $this->Repositoryschet->AllSelectDay(3,1,2);
      $FondbOborotMoneyMonth = $this->Repositoryschet->AllSelectDay(4,1,2);
      $FondbEmissionMoneyMonth = $this->Repositoryschet->AllSelectDay(7,1,2);
      $FoindMonthMoney = array_merge(json_decode($FondkorshoamMoneyMonth,true),json_decode($FondFarsudaMoneyMonth,true),json_decode($FondbotilshudaMoneyMonth,true),json_decode($FondbOborotMoneyMonth,true),json_decode($FondbEmissionMoneyMonth,true));
     
      //coins
      $FondkorshoamCoinsMonth = $this->Repositoryschet->AllSelectDay(1,2,2);
      $FondFarsudaCoinsMonth = $this->Repositoryschet->AllSelectDay(2,2,2);
      $FondbotilshudaCoinsMonth = $this->Repositoryschet->AllSelectDay(8,2,2);
      $FondbOborotCoinsMonth = $this->Repositoryschet->AllSelectDay(4,2,2);
      $FondbOborotCoinsMonth = $this->Repositoryschet->AllSelectDay(7,2,2);
      $FoindMonthCoins=array_merge(json_decode($FondkorshoamCoinsMonth,true),json_decode($FondFarsudaCoinsMonth,true),json_decode($FondbotilshudaCoinsMonth,true),json_decode($FondbOborotCoinsMonth,true));
     
      //   //coins
    //   end  // month
    //  day/
            //         //AllSelectDay($src,$typefond=1 Money/2 Coins	,$type=1-Дневной/2-На Месяц	)
            $FondkorshoamMoneyday = $this->Repositoryschet->AllSelectDay(1,1,1);
            $FondFarsudaMoneyDay = $this->Repositoryschet->AllSelectDay(2,1,1);
            $FondbotilshudaMoneyDay = $this->Repositoryschet->AllSelectDay(3,1,1);
            $FondbOborotMoneyDay = $this->Repositoryschet->AllSelectDay(4,1,1);
            $FondbFondemssionMoneyday= $this->Repositoryschet->AllSelectDay(7,1,1);
      
            //coins
            $FondkorshoamCoinsday= $this->Repositoryschet->AllSelectDay(1,2,1);
            $FondFarsudaCoinsday= $this->Repositoryschet->AllSelectDay(2,2,1);
            $FondbotilshudaCoinsday= $this->Repositoryschet->AllSelectDay(8,2,1);
            $FondbOborotCoinsday = $this->Repositoryschet->AllSelectDay(4,2,1);
 
   $FoindDayMoney=array_merge(json_decode($FondkorshoamMoneyday,true),json_decode($FondFarsudaMoneyDay,true),json_decode($FondbotilshudaMoneyDay,true),json_decode($FondbOborotMoneyDay,true),json_decode($FondbFondemssionMoneyday,true));
   $FoindDayCoins=array_merge(json_decode($FondkorshoamCoinsday,true),json_decode($FondFarsudaCoinsday,true),json_decode($FondbotilshudaCoinsday,true),json_decode($FondbOborotCoinsday,true));
     
            //   //coins
            // echo "<pre>";
          
            // print_r($FoindDayCoins);
            // echo "</pre>";
        
       return   view('ostatki.schet.index',compact('FoindDayMoney','FoindDayCoins','FoindMonthMoney','FoindMonthCoins','SprAccounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function AllOstatkischet()
    {
        return "ff";
    }
    public function store(Request $request)
    {
        //
     
       
        //   $pr=OstatkiSchet::whereDate('priod','<',$request->startDate)->where('type',1)->orderBy('id', 'DESC')->where('src',1)->where('FondType',1)->limit(1)->get();
    //   echo "<pre>";
    //   print_r(json_decode($pr,true)[0] );
    //   echo "</pre>";
    // //  exit;
         $this->Repositoryschet->ToDateFondEmisions($request);
        //  $this->Repositoryschet->ToDateFond($request,1);
        //  $this->Repositoryschet->ToDateFond($request,2);
        //  $this->Repositoryschet->ToDateFond($request,3);
        //  $this->Repositoryschet->ToDateFondCoins($request,1);
        //  $this->Repositoryschet->ToDateFondCoins($request,2);
        //  $this->Repositoryschet->ToDateFondCoins($request,0);
        // $obor= $this->Repositoryschet->OborotMoney($request,4);
        //  $this->Repositoryschet->OborotCoins($request,4);
        //   //echo "<pre>";
          $arrAll=$this->Repositoryschet->InsertOstatkiSchet();
       
        print_r($arrAll);
        //  echo "</pre>";
        if($arrAll==404):
 
          //  return redirect()->route('ostatkischets.index');
        endif;
       // retur
   // return redirect()->route('ostatkischets.index');
        
            // OstatkiSchet::create($arrAll);   
        //  dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OstatkiSchet  $ostatkiSchet
     * @return \Illuminate\Http\Response
     */
    public function show(OstatkiSchet $ostatkiSchet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OstatkiSchet  $ostatkiSchet
     * @return \Illuminate\Http\Response
     */
    public function edit(OstatkiSchet $ostatkiSchet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OstatkiSchet  $ostatkiSchet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OstatkiSchet $ostatkiSchet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OstatkiSchet  $ostatkiSchet
     * @return \Illuminate\Http\Response
     */
    public function destroy(OstatkiSchet $ostatkiSchet)
    {
        //
    }
}
