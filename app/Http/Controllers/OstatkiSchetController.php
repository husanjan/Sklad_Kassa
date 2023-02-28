<?php

namespace App\Http\Controllers;

use App\Models\SprAccounts;
use App\Models\OstatkiSchet;
use Illuminate\Http\Request;
use App\Repositories\Repositoryschet;
use App\Models\FondMoney;
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
      $FondEmssionCoinsMonth = $this->Repositoryschet->AllSelectDay(9,2,2);
      $FondbotilshudaCoinsMonth = $this->Repositoryschet->AllSelectDay(8,2,2);
      $FondbOborotCoinsMonth = $this->Repositoryschet->AllSelectDay(4,2,2);

      $FondbOborotCoinsMonth = $this->Repositoryschet->AllSelectDay(7,2,2);
      $FoindMonthCoins=array_merge(json_decode($FondkorshoamCoinsMonth,true),json_decode($FondFarsudaCoinsMonth,true),json_decode($FondbotilshudaCoinsMonth,true),json_decode($FondbOborotCoinsMonth,true),json_decode($FondEmssionCoinsMonth,true));
     
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
            $FondEmssionCoinsDay = $this->Repositoryschet->AllSelectDay(9,2,1);
            $FondbotilshudaCoinsday= $this->Repositoryschet->AllSelectDay(8,2,1);
            $FondbOborotCoinsday = $this->Repositoryschet->AllSelectDay(4,2,1);
 
   $FoindDayMoney=array_merge(json_decode($FondkorshoamMoneyday,true),json_decode($FondFarsudaMoneyDay,true),json_decode($FondbotilshudaMoneyDay,true),json_decode($FondbOborotMoneyDay,true),json_decode($FondbFondemssionMoneyday,true));
   $FoindDayCoins=array_merge(json_decode($FondkorshoamCoinsday,true),json_decode($FondFarsudaCoinsday,true),json_decode($FondbotilshudaCoinsday,true),json_decode($FondbOborotCoinsday,true),json_decode($FondEmssionCoinsDay,true));
  
  $this->Repositoryschet->DateFilter(2);
            //   //coins
    
  
        $DateFilterDay =array_unique( array_column(json_decode($this->Repositoryschet->DateFilter(1),true), 'date'));
        $DateFilterMonth = array_unique( array_column(json_decode($this->Repositoryschet->DateFilter(2),true), 'date'));
              
        $kodeOper= OstatkiSchet::orderBy('kode_oper','DESC')->value('kode_oper');
        if($kodeOper<1)
        {
            $kodeOper=1;
        }else{
        $kodeOper++;
    }
 
        return   view('ostatki.schet.index',compact('FoindDayMoney','FoindDayCoins','FoindMonthMoney','FoindMonthCoins','SprAccounts','DateFilterDay','DateFilterMonth','kodeOper'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    { 
     $id=$request->id;
        $DateFilter =array_unique( array_column(json_decode($this->Repositoryschet->DateFilter($id),true), 'date','kode_oper'));
    //    echo "<pre>";
    //        print_r($DateFilter);
    //    echo "</pre>";
  
  
     
   
        return   view('ostatki.schet.indexDate',compact('DateFilter','id'));
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
        $startDate = Carbon::createFromFormat('Y-m-d', $request->dayType)->startOfDay();
          //  $startDate = Carbon::createFromFormat('Y-m-d', $request->dayType)->endOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $request->dayType)->endOfDay();
            
      $typeDate=2;
 
    
  
      $rashod=json_decode(FondMoney::where('priznak',1)->whereBetween('date',[$startDate, $endDate])->where('type',1)->sum('summa'),true);
      $prihod=json_decode(FondMoney::where('priznak',0)->whereBetween('date',[$startDate, $endDate])->where('type',1)->sum('summa'),true);
  // echo    "<br>". $rashod;
  // echo    "<br>". $prihod;
  //   echo "<pre>";
    
    // print_r($rashod);
    // print_r($prihod);
    // echo "</pre>";
  
        // $this->Repositoryschet->ToDateFondEmisions($request);
        //  $this->Repositoryschet->ToDateFond($request,1);
        //    $this->Repositoryschet->ToDateFond($request,2);
        //   $this->Repositoryschet->ToDateFond($request,3);
        //  $this->Repositoryschet->ToDateFondCoins($request,1);
        //  $this->Repositoryschet->ToDateFondCoins($request,2);
      
        //    $this->Repositoryschet->ToDateFondCoins($request,0);
           $obor= $this->Repositoryschet->OborotMoney($request,4);
        $this->Repositoryschet->OborotCoins($request,4);
           //echo "<pre>";
         $arrAll=$this->Repositoryschet->InsertOstatkiSchet();
       
      // print_r($arrAll);
        // //  echo "</pre>";
        // if($arrAll==404):
 
       // return redirect()->route('ostatkischets.index');
        // endif;
   return redirect()->route('ostatkischets.index');
        
            // OstatkiSchet::create($arrAll);   
        //  dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OstatkiSchet  $ostatkiSchet
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
      

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OstatkiSchet  $ostatkiSchet
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
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
    public function update(Request $request)
    {
        //SchetDetal        //AllSelectDay($src,$typefond=1 Money/2 Coins	,$type=1-Дневной/2-На Месяц	)
        $SprAccounts=SprAccounts::all();
        echo '<table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th width="30">Счет</th>
            <th  >Дата</th>
            <th>Остаток  на начало</th>
            <th>Приход</th>
            <th>Расход</th>
           <th>Остаток на конец</th>
        
          </tr>
        </thead>
        <tbody>';
        $detal= $this->Repositoryschet->SchetDetal($request->kode_oper);
        
        echo '
        <tr>
          <td><b>Бумага</b></td>
         </tr>';
         foreach($detal AS  $detals):
      
            // $detals['period'];
            // $detals['src'];
            // $detals['Prikhod'];
            // $detals['Raskhod'];
            // $detals['FondType'];
            // $detals['type'];
            // $detals['ostatok_end'];
         if( $detals['FondType']==1):
     
          echo   '<tr>  
         <td> <b># </b>  </td>';
            
         foreach(   $SprAccounts AS $SprAccount):
            if($SprAccount['id']==$detals['src']):
              echo'<td>'.$SprAccount['account'].'</td>';
            endif;
          
         endforeach;
       echo '<td>'.$detals['date'].'</td>
   
         <td>'.$detals['ostatok_start'].'</td>
         <td>'.$detals['Prikhod'].'</td>
         <td>'.$detals['Raskhod'].'</td>
         <td>'.$detals['ostatok_end'].'</td></tr>';
        endif;
    
      
             
         endforeach;  
         echo '
         <tr>
           <td><b>Монета</b></td>
          </tr>';
          foreach( $detal AS  $detals):
      
             // $detals['period'];
             // $detals['src'];
             // $detals['Prikhod'];
             // $detals['Raskhod'];
             // $detals['FondType'];
             // $detals['type'];
             // $detals['ostatok_end'];
          if( $detals['FondType']==2):
      
            echo   '<tr>  
            <td> <b># </b>  </td>';
               
            foreach(   $SprAccounts AS $SprAccount):
               if($SprAccount['id']==  $detals['src']):
                 echo'<td>'.$SprAccount['account'].'</td>';
               endif;
             
            endforeach;
          echo '<td>'.$detals['date'].'</td>
      
            <td>'.$detals['date'].'</td>
            <td>'.$detals['Prikhod'].'</td>
            <td>'.$detals['Raskhod'].'</td>
            <td>'.$detals['ostatok_end'].'</td></tr>';
           endif;
       
         
                
            endforeach;  
         echo   '  </tbody>
         </table>  ';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OstatkiSchet  $ostatkiSchet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        OstatkiSchet::where('kode_oper',$id)->delete();
        return redirect()->route('ostatkischets.index')
            ->with('success','Эмиссионный фонд удалена!');
    }
}
