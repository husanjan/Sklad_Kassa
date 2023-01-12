<?php

namespace App\Http\Controllers\Fonds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
use App\Models\SprSafes;
use App\Models\SprShkafs;
use App\Models\SprCells;
use App\Models\SprQators;
use App\Models\SprEds;
use App\Models\Oborot;
use App\Models\FondEmisions;
use App\Models\SprAccounts;
use App\Models\FondMoney;
use App\Models\ostatki_safe;
use App\Http\Controllers\Fonds\WornouController;
use Illuminate\Support\Facades\Auth;
use App\Repositories\InterfacesSomoni;
use App\Repositories\AddRequest;
use Illuminate\Support\Facades\DB;
 
class UnusableController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $addRepository;
    public function __construct(AddRequest $addRepository)
    {
        $this->addRepository = $addRepository;
    }
    public function index()
    {
        //
        $kodeOperObort= Oborot::orderBy('kod_oper','DESC')->value('kod_oper');
        if($kodeOperObort<=0)
        {
            $kodeOperObort=1;
        }else{
        $kodeOperObort++;
    }

 
           $safes = SprSafes::all();
           $sprEds = SprEds::all();
            $shkafs = SprShkafs::all();
            $sprCells= SprCells::all();
             $sprQators= SprQators::all();
             $sprAccounts= SprAccounts::all();
              $kodeOper= FondMoney::orderBy('kode_oper','DESC')->value('kode_oper');
                       if($kodeOper<=0)
                       {
                        $kodeOper=1;
                        }else{
                         $kodeOper++;
                          }
                          $ostatki= ostatki_safe::distinct('cell_id')->select('cell_id','safe_id','shkaf_id','qator_id')->where('type',1)->where('priznak',0)->get();
                          $arrayResult=[];
                          // echo "<pre>";
                          // print_r(json_decode($ostatki,true));
                          // echo "</pre>";         
                          // exit;  
                         
                          foreach($ostatki AS $ostatks)
                          {
                              $ostatkNominalDistinct= ostatki_safe::select('naminal')->where('cell_id', $ostatks['cell_id'])->groupBy('naminal')->get();
                              // echo "<pre>";
                              // print_r(json_decode($ostatkNominalDistinct,true));
                              // echo "</pre>"; 
                              foreach($ostatkNominalDistinct AS $distinctNaminal):
                              
                   
                                 $ostatkiResult= ostatki_safe::select('cell_id','id','safe_id','shkaf_id','qator_id','ed_id','naminal','summa')->where('naminal',$distinctNaminal['naminal'])->where('cell_id',$ostatks['cell_id'])->where('type',1)->where('priznak',0)->orderBy('id','desc')->limit(1)->get();
                    
                       
                             foreach( $ostatkiResult AS  $ostatkiResults):
                              $arrayResult[]=$ostatkiResults;
                        
                               
                               endforeach;
                          endforeach;
                            
                          }
                     $arrayResult = array_map("unserialize", array_unique(array_map("serialize", $arrayResult)));
                        //   echo "<pre>";
                        //   print_r(json_encode($ostatkiResults,true));
                        //   echo "</pre>";
                        //   exit;
                  return  view('fonds.fondunusable.index',compact('safes','sprEds','shkafs','sprCells' ,'sprQators','sprAccounts','kodeOper','kodeOperObort','arrayResult'));
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
    public function store(Request $request)
    {

        $inputs=$request->all();
//        dd($inputs);
//         echo "<pre>";
//    print_r($inputs);
//   echo "</pre>";   
   
 
         $arrayRashod=[];
        //  print_r($inputs);
        //  exit;
        if(isset($request['id']))
        {

       
        foreach($request['id'] AS $input)
        {
            // print_r($input);
            // exit;
                    if($request['Summarashod'.$input][0]>0)
                    {
                        // FondMoney::create($money[$key]);
                        // Oborot::create($oborots[$key]);
                     //fond insert
                    $FondMoney = new FondMoney;
                    $FondMoney->date=$request['date'];
                    $FondMoney->priznak=$request['priznak'];
                    $FondMoney->type=1;
                    $FondMoney->src=$request['src'];
                    $FondMoney->naminal=$request['naminal'.$input];
                    $FondMoney->ed_id=2; 
                    $FondMoney->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                    $FondMoney->summa  = $request['Summarashod'.$input][0];   
                    $FondMoney->safe_id= $request['safe'.$input];   
                    $FondMoney->shkaf_id=$request['shkaf'.$input];   
                    $FondMoney->qator_id=$request['sprQator'.$input];   
                    $FondMoney->cell_id = $request['sprCell'.$input];   
                    $FondMoney->kode_oper= $request['kode_operRashod'];   
                    $FondMoney->n_doc= $request['ndoc'];   
                     $FondMoney->host = $request->ip();   
                    $FondMoney->user_id = Auth::id();   
                    $FondMoney->save();
                    //Oborot insert
                    $Oborot = new Oborot;
                 
                    $Oborot->kod_oper= $request['kode_oper_oborRashod'];   
                    $Oborot->nominal=$request['naminal'.$input];
                    $Oborot->summa  = $request['Summarashod'.$input][0];   
                    $Oborot->priznak=$request['priznak'];
                    // $Oborot->type=1;
                    $Oborot->account_id_out=1;//korshoyam id
                    $Oborot->account_id_in=$request['src'];//istochnik oborot id
                    $Oborot->user_id = Auth::id();   
                    $Oborot->date=$request['date'];
                 
                    // $Oborot->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                    $Oborot->n_doc= $request['ndoc'];   
                    $Oborot->host = $request->ip();   
                   $Oborot->save();
                   //ostatki safe
                   $ostatki_safe = new ostatki_safe;
                   $ostatki_safe->date=$request['date'];
                   $ostatki_safe->src=$request['src'];
                   $ostatki_safe->naminal=$request['naminal'.$input];
                   $ostatki_safe->priznak=0;
                   $ostatki_safe->ed_id=2; 
                   $ostatki_safe->type=1;
                   //$ostatki_safe->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                   $ostatki_safe->summa  = $request['ostatkiResults'.$input]-$request['Summarashod'.$input][0];
                   $ostatki_safe->safe_id= $request['safe'.$input];   
                   $ostatki_safe->shkaf_id=$request['shkaf'.$input];   
                   $ostatki_safe->qator_id=$request['sprQator'.$input];   
                   $ostatki_safe->cell_id = $request['sprCell'.$input];   
                   $ostatki_safe->typeFond=0;   
                //    $ostatki_safe->n_doc= $request['ndoc'];   
                   $ostatki_safe->host = $request->ip();   
                   $ostatki_safe->user_id = Auth::id();   
                   $ostatki_safe->save();
                    }
                    return redirect()->route('fondunusable.index')->with('success','Фонд расход успешно создан!');
               
          
            

        }     
    }
    
     
       DB::beginTransaction();
        $inputs = $request->all();
 
       
        $oborots =  $this->addRepository->addRequestsOborot($request,1);
                
        $money= $this->addRepository->addRequests($request);

      
         $detailsFond = $this->addRepository->Fondostatki($money,'cell_id');
        //     dd($request->all());
        //  echo "<pre>";
        //  print_r($detailsFond);
        //  echo "</pre>";

    
         foreach($detailsFond AS $detailFonds)
         {
            $detailFondsRazne=$detailFonds;
            // echo "<pre>";
            // print_r($detailFonds);
            // echo "</pre>";
            foreach($detailFonds As $keys=>$detals)
            {
                //prihod query
                if($detailFonds[$keys]['priznak']==0)
                {

                    unset($detailFonds[$keys]['kol']);
                    unset($detailFonds[$keys]['n_doc']);
                    unset($detailFonds[$keys]['kode_oper']);
                    $detailFonds[$keys]['typeFond']=0;
                    $ostatki= ostatki_safe::where('naminal', $detailFonds[$keys]['naminal'])->where('cell_id',  $detailFonds[$keys]['cell_id'])->where('priznak',  $detailFonds[$keys]['priznak'])->orderBy('id','desc')->limit(1)->get();
                     "<br>".$detailFonds[$keys]['naminal']; 
                     "<br>".$detailFonds[$keys]['summa']; 
                     foreach($ostatki as $ostatkey => $ostatks) {
                        # code...
                        $detailFonds[$keys]['summa']+=$ostatks['summa'];
                      
                     }
                   ostatki_safe::create($detailFonds[$keys]);
                }
                if($detailFondsRazne[$keys]['naminal']=='razne')
                {
                    unset($detailFondsRazne[$keys]['kol']);
                    unset($detailFondsRazne[$keys]['n_doc']);
                    unset($detailFondsRazne[$keys]['kode_oper']);
                    $detailFondsRazne[$keys]['typeFond']=0;
                    $ostatkiraz= ostatki_safe::where('naminal','razne')->where('cell_id',  $detailFondsRazne[$keys]['cell_id'])->where('priznak',  $detailFondsRazne[$keys]['priznak'])->orderBy('id','desc')->limit(1)->get();
                    foreach($ostatkiraz as $ostatkeyr => $ostatksr) {
                        # code...
                        $detailFondsRazne[$keys]['summa']+=$ostatksr['summa'];
                      
                     }
                   ostatki_safe::create($detailFondsRazne[$keys]);
                }
            }
        //   // print_r($detals);
            // echo "<pre>";
            // print_r($detailFonds);
            // echo "</pre>";
           
         }
         
   
        /// dd( $ostatki);
        $arrostat=$money;
        
 
      


    //     $key_array = array(); 
    //     $summa=null;
    //     $temp_array= array(); 
    //     $i = 0; 
    //     foreach($arrostat AS $key=>$fondDetal)
    //     {
            
    //         unset($arrostat[$key]['kol']);
    //         unset($arrostat[$key]['n_doc']);
    //         unset($arrostat[$key]['kode_oper']);
    //         //   foreach( $ostatki AS $ostat)
    //         //   {
    //         //     $ostat['nominal']
    //         //   }
           
    //         $ostatki= ostatki_safe::where('naminal', $arrostat[$key]['naminal'])->where('cell_id',  $arrostat[$key]['cell_id'])->where('priznak',  $arrostat[$key]['priznak'])->orderBy('id','desc')->limit(1)->get();
    //                 // $arrostat[$key]['type'] = 0;
    //                      $arrostat[$key]['cell_id'];
    //                      $arrostat[$key]['naminal'];
    //         // echo "<pre>";
    //         //  //print_r( $arrostat);
         

    //         // echo "</pre>";
    //         if(!in_array($arrostat[$key], $key_array)) { 
    //             $summa=null;
    //             $key_array[$key] = $arrostat[$key]; 
    //               foreach($ostatki AS $ostat)
    //             {
    //               $summa+=$ostat['summa'];
    //             //   $temp_array[$i] = $val; 
    //             //   print_r( $ostat);
    //             }
              
    //         }
    //         $i++; 
    //         $summa+=$arrostat[$key]['summa'];
           
    //          $arrostat[$key]['summa']=$summa;
    //          echo $summa;
    //    ostatki_safe::create($arrostat[$key]);
    //     }
       
        //  echo "<pre>";
        // print_r($arrostat);
        //  echo "</pre>";
    
        //  exit;
 
         if(is_array($oborots) AND is_array($money) AND $request->src==4)
         {
            // echo "<pre>";
            // print_r($money);
            //  echo "</pre>";
        
            try{
               foreach ($money as $key => $value) {
                   # code...
                
              
              FondMoney::create($money[$key]);
               Oborot::create($oborots[$key]);
       
            
           }
               DB::Commit();
            
         return redirect()->route('fondunusable.index')->with('success','Фарсуда фонд успешно создан!');
             } catch (\Illuminate\Database\QueryException $e) {
               DB::rollback();
               
          return redirect()->route('fondunusable.index')->with('danger','Фарсуда фонд  не успешно!');
             }
           
         return response(['message'=>'Not inserted Fond money table and oborots table'], 500);                    
         
         }

         exit;
         if(is_array($money) AND $request->src==2)
         {
           
            
            try{
               foreach ($money as $key => $value) {
            # code...
               FondMoney::create($money[$key]);
               DB::Commit();
               
           }
               
            
           return redirect()->route('fondunusable.index')->with('success','Фарсуда фонд успешно создан!');
             } catch (\Illuminate\Database\QueryException $e) {
               DB::rollback();
             //  return response(['message'=>'FAILURE'], 500);
             return redirect()->route('fondunusable.index')->with('danger','Фарсуда фонд  не успешно!');
             }
           
            //  return response(['message'=>'Not inserted Fond money table and oborots table'], 500);                    
         
         }
         
        //
        // $ShowFuncs= $this->ShowFunc->store($request);
        // echo $ShowFuncs;
                   
               //OneSomoni
               
          
            //  $this->addRepository->addRequests($request);
             
            //     if( $request->src=='7')
            //     {
            //         $oborot= $this->addRepository->addRequestsOborot($request,8);
                   
            //     }
            //     if($request->src=='9')
            //     {
            //         $this->addRepository->addRequests($request);
            //     }
               
          
            
        // return redirect()->route('fondunusable.index')->with('success','Корношоям фонд успешно создан!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
