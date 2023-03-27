<?php
 
namespace App\Http\Controllers\Fonds;
use Illuminate\Http\Request;
use App\Models\FondCoins;
use App\Models\SprSafes;
use App\Models\SprEds;
use App\Models\SprShkafs;
use App\Models\SprCells;
use App\Models\SprQators;
use App\Models\oborots_coin;
use App\Models\Kode_Oper;
use App\Models\ostatki_safe;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repositories\RepositoryRashod;
class FondEmisionsTanga extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $RepositoryRashod;
    public function __construct(RepositoryRashod $RepositoryRashod)
    {
     
        $this->RepositoryRashod = $RepositoryRashod;
    }
    public function index()
    {
        //
        $arrayResult= $this->RepositoryRashod->AllSelectRashodTanga(0);
        $safes = SprSafes::all();
        $sprEds = SprEds::all();
        $shkafs = SprShkafs::all();
        $sprCells= SprCells::all();
        $sprQators= SprQators::all();
        $kodeOper= FondCoins::orderBy('kode_oper','DESC')->value('kode_oper');
        $kodeOper++;
        // $kodeOperObort= oborots_coin::orderBy('kod_oper','DESC')->value('kod_oper');

        //     if($kodeOperObort<=0)
        //     {
        //     $kodeOperObort=1;
        //     }else{
        //     $kodeOperObort++;
        //     }
        
            $kodeOperObort= Kode_Oper::orderBy('kode_oper','DESC')->value('kode_oper');
            if($kodeOperObort<=0)
            {
                $kodeOperObort=1;
            }else{
                $kodeOperObort++;
            }
            $kodeOper=$kodeOperObort;


            $json=json_encode($arrayResult,true);
            //   // print_r( json_decode($json,true));
        $allsum=array_sum(array_column(json_decode($json,true), 'summa'));
          return  view('fonds.fondemissionTanga.index',compact('allsum','arrayResult','safes','sprEds','shkafs','sprCells','sprQators','kodeOper','kodeOperObort'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $safes = SprSafes::all();
        $sprEds = SprEds::all();
        $shkafs = SprShkafs::all();
        $sprCells= SprCells::all();
        $sprQators= SprQators::all();
//         



                                $kodeOper= FondCoins::orderBy('kode_oper','DESC')->value('kode_oper');
                                $kodeOper++;
  
        return view('fonds.fondemissionTanga.create',compact('shkafs','safes','sprQators','sprCells','sprEds','kodeOper',));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'date' => 'required',
            'safe_id' => 'required',
            'shkaf_id' => 'required',
            'qator_id' => 'required',
            'cell_id' => 'required|integer',
            'naminal' => 'required',
            'ed_id' => 'required',
            'kol' => 'required',
      

        ]);
  
           $sum_dist=1000;
          $edinCoutnt=1000;
          $summaOstatss=null;
           $All=($request->ed_id*$request->kol)/$edinCoutnt;
           $edi_id=$request->ed_id;
           $request->request->remove('_token');
           $ostatkiResult= ostatki_safe::select('summa')->where('naminal',$request->naminal)->where('cell_id',$request->cell_id)->where('priznak',0)->orderBy('id','desc')->limit(1)->get();
           if(isset(json_decode($ostatkiResult,true)[0]['summa'])):
          $summaOstatss=json_decode($ostatkiResult,true)[0]['summa']; 
           endif;
               $summaOstatss;
          $accounts=8;
          $arrayOstat=[];
          $arrayOstat['date']=date("Y-m-d H:i:s");
          $arrayOstat['naminal']=$request->naminal;
          $arrayOstat['ed_id']=5;
          $arrayOstat['type']=0;
          
          $arrayOstat['priznak']=0;
          $arrayOstat['safe_id']=$request->safe_id;
          $arrayOstat['shkaf_id']=$request->shkaf_id;
          $arrayOstat['qator_id']=$request->qator_id;
          $arrayOstat['cell_id']=$request->cell_id;
          $arrayOstat['summa']=($edi_id*$request->kol*$request->naminal)+$summaOstatss;
          $arrayOstat['comment']=$request->comment;
          $arrayOstat['typeFond']=1;
          $arrayOstat['user_id']=Auth::id();
          $arrayOstat['host']=$request->ip();

//           echo "<pre>";
                      
//           print_r($arrayOstat);
// echo "</pre>";
          DB::beginTransaction();
          try {
       ostatki_safe::create($arrayOstat);
        //   $count=$request->kode_oper_oborRashod;
           for($i=1;$i<=$All;$i++):
            
                if($i==1)
                {
                    $emiss = $request->all();
                  
                    $emiss['ed_id']=5;//$edi_id[1]
                    $emiss['date']=$request->date.date(' H:i:s');//$edi_id[1]
                    $emiss['summa']=$sum_dist*$request->naminal;
                    $emiss['priznak']=0;//prihod
                    $emiss['type']=0; 
                    $emiss['src']=$accounts; 
                    $emiss['kode_oper']=$request->kode_oper_oborRashod; 
                    $emiss['user_id'] = Auth::id();
                    $emiss['host'] = $request->ip();
           
  //
                 FondCoins::create($emiss);
                    //   echo "<pre>";
                      
                    //   print_r($emiss);
                    //   echo "</pre>";
                      continue;
                }
                $emis = $request->all();
             
                $emis['ed_id']=5;//$edi_id[1]
                $emis['date']=$request->date.date(' H:i:s');
                $emis['type']=0; 
                $emis['src']=$accounts; 
                $emis['kode_oper']=$request->kode_oper_oborRashod; 
                $emis['summa']=$sum_dist*$request->naminal;
                $emis['priznak']=0;//prihod
                $emis['user_id'] = Auth::id();
                $emis['host'] = $request->ip();        
          
  
     FondCoins::create($emis);
        //   echo "<pre>";
                      
        //               print_r($emis);
        //    echo "</pre>";
      
        endfor;
        DB::commit();
            
     return redirect()->route('fondEmissionsTanga.index')->with('success','Эмиссионный фонд успешно создан!');
     } catch (\Exception $e) {
         DB::rollback();
         echo "Error";
 // return redirect()->route('fondEmissionsTanga.create')->with('danger','Эмиссионный фонд  не успешно!');
     }  
       // 
 

   
      






    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        


        $request['kode_operRashod'];


        
        DB::beginTransaction();
        try {
        // dd($request->all());
        foreach($request['id'] AS $input)
        {
              $request['Summarashod'.$input][0];
            // print_r($input);
             // exit;
                    if($request['Summarashod'.$input][0]>0)
                    {
               //   $request['Summarashod'.$input][0];
                $FondMoney = new FondCoins;
                $FondMoney->date=$request['date'];
                $FondMoney->comment=$request['comment'];
                $FondMoney->priznak=$request['priznak'];
                $FondMoney->type=0;
                $FondMoney->src=9;
                $FondMoney->naminal=$request['naminal'.$input];
                $FondMoney->ed_id=5; 
                $FondMoney->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                $FondMoney->summa=$request['Summarashod'.$input][0];   
                $FondMoney->safe_id= $request['safe'.$input];   
                $FondMoney->shkaf_id=$request['shkaf'.$input];   
                $FondMoney->qator_id=$request['sprQator'.$input];   
                $FondMoney->cell_id=$request['sprCell'.$input];   
                $FondMoney->kode_oper= $request['kode_operRashod'];   
                $FondMoney->n_doc= $request['ndoc'];   
                $FondMoney->host = $request->ip();   
                $FondMoney->user_id = Auth::id();   
                $FondMoney->save();
               //Oborot insert
               $Oborot = new oborots_coin();
               
               $Oborot->kod_oper= $request['kode_oper_oborRashod'];   
               $Oborot->naminal=$request['naminal'.$input];
               $Oborot->summa=$request['Summarashod'.$input][0];   
               $Oborot->priznak=0;
               // $Oborot->type=1;
           //    $Oborot->account_id_out=1;//korshoyam id
               $Oborot->src=8;//istochnik oborot id
               $Oborot->user_id = Auth::id();   
               $Oborot->date=$request['date'];
            
               // $Oborot->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
               $Oborot->n_doc= $request['ndoc'];   
               $Oborot->host=$request->ip();   
              $Oborot->save();
                    //ostatki safe
                $ostatki_safe = new ostatki_safe;
                $ostatki_safe->comment=$request['comment'];
                $ostatki_safe->date=$request['date'];
                $ostatki_safe->src=9;
                $ostatki_safe->naminal=$request['naminal'.$input];
                $ostatki_safe->priznak=1;
                $ostatki_safe->ed_id=5; 
                $ostatki_safe->type=1;
                    //$ostatki_safe->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                $ostatki_safe->summa=$request['Summarashod'.$input][0];
                $ostatki_safe->safe_id= $request['safe'.$input];   
                $ostatki_safe->shkaf_id=$request['shkaf'.$input];   
                $ostatki_safe->qator_id=$request['sprQator'.$input];   
                $ostatki_safe->cell_id = $request['sprCell'.$input];   
                $ostatki_safe->typeFond=1;   
                 //    $ostatki_safe->n_doc= $request['ndoc'];   
                $ostatki_safe->host = $request->ip();   
                $ostatki_safe->user_id = Auth::id();   
                $ostatki_safe->save();
                           //ostatki safe rashod 
                $ostatki_safe = new ostatki_safe;
                $ostatki_safe->comment=$request['comment'];
                $ostatki_safe->date=$request['date'];
                $ostatki_safe->src=9;
                $ostatki_safe->naminal=$request['naminal'.$input];
                $ostatki_safe->priznak=0;
                $ostatki_safe->ed_id=5; 
                $ostatki_safe->type=0;
                //$ostatki_safe->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                $ostatki_safe->summa=$request['ostatkiResults'.$input]-$request['Summarashod'.$input][0];
                $ostatki_safe->safe_id= $request['safe'.$input];   
                $ostatki_safe->shkaf_id=$request['shkaf'.$input];   
                $ostatki_safe->qator_id=$request['sprQator'.$input];   
                $ostatki_safe->cell_id = $request['sprCell'.$input];   
                $ostatki_safe->typeFond=1;   
             //    $ostatki_safe->n_doc= $request['ndoc'];   
                $ostatki_safe->host = $request->ip();   
                $ostatki_safe->user_id = Auth::id();   
                
               $ostatki_safe->save();
               

               $kode_oper= new Kode_Oper;
               $kode_oper->datetime=date("Y-m-d H:i:s");
               $kode_oper->kode_oper= $request['kode_operRashod'];
               $kode_oper->Prikhod=8;
               $kode_oper->Raskhod=9;
               $kode_oper->Summa= $request['Summarashod'.$input][0];
               $kode_oper->user_id=Auth::id();
               $kode_oper->host=Auth::id();
               $kode_oper->save();
                    }
        }
        DB::commit();
            
        return redirect()->route('fondEmissionsTanga.index')->with('success','Эмиссионный фонд  Расход успешно создан!');
       } catch (\Exception $e) {
           DB::rollback();
          
    return redirect()->route('fondEmissionsTanga.index')->with('danger','Эмиссионный фонд Расход  не успешно!');
       }  
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
