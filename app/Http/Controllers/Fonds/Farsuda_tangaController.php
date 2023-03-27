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
use App\Models\FondEmisions;
use App\Models\SprAccounts;
use App\Models\FondCoins;
use App\Models\oborots_coin;
use App\Repositories\InterfacesSomoni;
use App\Repositories\RepositoryRashod;
use App\Repositories\AddRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class Farsuda_tangaController extends Controller
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
        //
    //     $kodeOperObort= oborots_coin::orderBy('kod_oper','DESC')->value('kod_oper');
    //     if($kodeOperObort<=0)
    //     {
    //         $kodeOperObort=1;
    //     }else{
    //     $kodeOperObort++;
    // }

    $kodeOperObort=Kode_Oper::orderBy('kode_oper','DESC')->value('kode_oper');
    if($kodeOperObort<=0)
    {
     $kodeOperObort=1;
    }else{
      $kodeOperObort++;
    }



    $FondMoneyTang=FondCoins::orderBy('date','DESC')->get()->groupBy('kode_oper');
//  SelectRashodTanga($type,$priznak)
        $arrayResult= $this->RepositoryRashod->SelectRashodTanga(2,0);
        $safes = SprSafes::all();
        $sprEds = SprEds::all();
        $shkafs = SprShkafs::all();
        $sprCells= SprCells::all();
        $sprQators= SprQators::all();
        $sprAccounts= SprAccounts::all();
        // $kodeOper= FondCoins::orderBy('kode_oper','DESC')->value('kode_oper');
        // if($kodeOper<=0)
        //   {
        //   $kodeOper=1;
        //   }else{
       $kodeOper=$kodeOperObort;
        //   }
          $json =json_encode($arrayResult,true);
          //   // print_r( json_decode($json,true));
      $allsum=array_sum(array_column(json_decode($json,true), 'summa'));  
        return  view('fonds.farsuda_tanga.index',compact('allsum','safes','sprEds','shkafs','sprCells' ,'sprQators','sprAccounts','kodeOper','kodeOperObort','arrayResult','FondMoneyTang'));
      
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
       
    //    / dd($request);
        if(isset($request['id']))
        {

            $sumAll=0;
            foreach($request['id'] AS $input)
            {
                        if($request['Summarashod'.$input][0]>0)
                        {
                         $sumAll+=$request['Summarashod'.$input][0];
                         }
            }

            // e
            $arrayResult= $this->RepositoryRashod->InsertRashodFarsudaToOstatkiTanga($request);
            // print_r($arrayResult);
         
            if($arrayResult AND !$request->acccounti=='farsuda')
            {

                $kode_oper= new Kode_Oper;
                $kode_oper->datetime=date("Y-m-d H:i:s");
                $kode_oper->kode_oper=$request->kode_oper;
                $kode_oper->Prikhod=10;
                $kode_oper->Raskhod=8;
                $kode_oper->Summa=$sumAll;
                $kode_oper->user_id=Auth::id();
                $kode_oper->host=Auth::id();
                $kode_oper->save();     

             return redirect()->route('farsuda_tanga.index')->with('success','Фонд расход успешно создан!');
            }
            if($request->acccounti=='farsuda')
            {
             return redirect()->route('home')->with('danger','Фарсуда танга фонд  не успешно!');
            }
          exit;
        } 
        $oborots = $this->addRepository->addRequestsOborottanga($request,2);
        $money= $this->addRepository->addRequestsTanga($request);
        // echo "<pre>";
        // print_r($money);
        // echo "</pre>";
         // exit;
        
       
         DB::beginTransaction();
        if(is_array($money) AND is_array($oborots) AND $request->src==4)
          {
            $detailsFond = $this->addRepository->Fondostatki($money,'cell_id');
    
            $arrayResult= $this->RepositoryRashod->InsertRashod($detailsFond,1);
        
             try{


                $kode_oper= new Kode_Oper;
                $kode_oper->datetime=date("Y-m-d H:i:s");
                $kode_oper->kode_oper=$request->kode_oper;
                $kode_oper->Prikhod=10;
                $kode_oper->Raskhod=11;
                $kode_oper->Summa=$request->AllSumma;
                $kode_oper->user_id=Auth::id();
                $kode_oper->host=Auth::id();
                $kode_oper->save();



                foreach ($money as $key => $value) {
                    # code...
             
                FondCoins::create($money[$key]);
                oborots_coin::create($oborots[$key]);
            }
                DB::Commit();
             
                return redirect()->route('farsuda_tanga.index')->with('success','Фарсуда фонд успешно создан!');
              } catch (\Illuminate\Database\QueryException $e) {
                DB::rollback();
                return response(['message'=>'FAILURE'], 500);
                return redirect()->route('farsuda_tanga.index')->with('danger','Фарсуда фонд  не успешно!');
              }
            
              return response(['message'=>'Not inserted Fond money table and oborots table'], 500);                    
          
          }
          //korshoyam 
          if(is_array($money) AND $request->src==3 OR  $request->src==1)
          {
            try{
                foreach ($money as $key => $value) {
                    # code...
               
                    FondCoins::create($money[$key]);
            }
                DB::Commit();
                  response(['message'=>'ALL farsuda_tanga'], 200);
               return redirect()->route('farsuda_tanga.index')->with('success','Фарсуда Ба оборот рафт фонд успешно создан!');
              } catch (\Illuminate\Database\QueryException $e) {
                DB::rollback();
               
                return redirect()->route('farsuda_tanga.index')->with('danger','Фарсуда фонд   не успешно!');
              }
    }
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
