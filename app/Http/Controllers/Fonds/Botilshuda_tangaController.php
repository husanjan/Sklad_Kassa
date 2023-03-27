<?php

namespace App\Http\Controllers\fonds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SprSafes;
use App\Models\SprShkafs;
use App\Models\SprCells;
use App\Models\SprQators;
use App\Models\SprEds;
use App\Models\Oborot;
use App\Models\Kode_Oper;
use App\Models\SprAccounts;
use App\Models\FondCoins;
use App\Models\oborots_coin;
use App\Repositories\InterfacesSomoni;
use App\Repositories\RepositoryRashod;
use App\Repositories\AddRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class Botilshuda_tangaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $addRepository;
    private $RepositoryRashod;
    public function __construct(AddRequest $addRepository,RepositoryRashod $RepositoryRashod)
    {
        $this->addRepository = $addRepository;
        $this->RepositoryRashod = $RepositoryRashod;
    }
    public function index()
    {
        //
        $kodeOperObort= oborots_coin::orderBy('kod_oper','DESC')->value('kod_oper');
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
             $FondMoneyTang=FondCoins::orderBy('date','DESC')->get()->groupBy('kode_oper');
              $kodeOper= FondCoins::orderBy('kode_oper','DESC')->value('kode_oper');
                       if($kodeOper<=0)
                       {
                        $kodeOper=1;
                        }else{
                         $kodeOper++;
                          }
                        //  $arrayResult=$this->RepositoryRashod->SelectRashodTanga(3,0);
                          $farsudaTanga= $this->RepositoryRashod->SelectRashodTanga(2,0);         
                          $botilsudaRas= $this->RepositoryRashod->SelectRashodTanga(3,0);
                          $json=json_encode($botilsudaRas,true);
                //    print_r($arrayResult);
                //    exit;
                      $allsum=array_sum(array_column(json_decode($json,true), 'summa'));     
                  return  view('fonds.botilshuda_tanga.index',compact('allsum','FondMoneyTang','safes','sprEds','shkafs','sprCells' ,'sprQators','sprAccounts','kodeOper','kodeOperObort','botilsudaRas','farsudaTanga'));
  
        //return view('fonds.botilshuda_tanga.index');
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
        //
      //  DB::beginTransaction();
     
        //$this->addRepository->addRequests($request);
        //$money= $this->addRepository->addRequests($request);
        if(isset($request['id']))
        {
        
            $arrayResult= $this->RepositoryRashod->InsertRashodBotilshudaToOstatkiTanga($request);
            $sumAll=0;
            foreach($request['id'] AS $input)
            {
                        if($request['Summarashod'.$input][0]>0)
                        {
                          $sumAll+=$request['Summarashod'.$input][0];
                         }
            }
            $kode_oper= new Kode_Oper;
            $kode_oper->datetime=date("Y-m-d H:i:s");
            $kode_oper->kode_oper=$request->kode_oper;
            $kode_oper->Prikhod=$request->src;
            $kode_oper->Raskhod=11;
            $kode_oper->Summa=$sumAll;
            $kode_oper->user_id=Auth::id();
            $kode_oper->host=$request->ip();   
           $kode_oper->save();    
            //print_r($arrayResult);
             
            //    if($arrayResult)
            //    {
            //     return redirect()->route('botilshuda_tanga.index')->with('success','Фонд расход успешно создан!');
            //    }
      //      return redirect()->back()->with('success','Фонд расход успешно создан!');
               if($arrayResult AND !$request->acccounti=='botilshuda')
               {
                return redirect()->back()->with('success','Фонд расход успешно создан!');
               }
               if($request->acccounti=='botilshuda')
               {
                return redirect()->back()->with('danger','Фарсуда танга фонд  не успешно!');
               }
              
          exit;
        }
        //  ..
        $money= $this->addRepository->addRequestsTanga($request);
     
        if(is_array($money))
        {

        $detailsFond = $this->addRepository->Fondostatki($money,'cell_id');
      
          $arrayResult= $this->RepositoryRashod->InsertRashod($detailsFond,1);
                // print_r($detailsFond);
       //   
        // return redirect()->route('botilshuda_tanga.index')->with('success','Фонд Ботилшуда Приход успешно создан!');
        return redirect()->back()->with('success','Фонд Ботилшуда Приход успешно создан!');
              
                }
        // if(is_array($money))
        // {
          
           
        //    try{
        //       foreach ($money as $key => $value) {
        //           # code...
               
        //           FondCoins::create($money[$key]);

        //   }
        //       DB::Commit();
            
        //     return redirect()->route('fondcanceled.index')->with('success','Ботилшуда успешно создан!');
        //     } catch (\Illuminate\Database\QueryException $e) {
        //       DB::rollback();
        //       return response(['message'=>'FAILURE'], 500);
        //   return redirect()->route('fondcanceled.index')->with('danger','Ботилшуда не успешно!');
        //     }
          
        //  return response(['message'=>'Not inserted Fond money table and oborots table'], 500);                    
        
        // }
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
