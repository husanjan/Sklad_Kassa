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
use App\Models\FondEmisions;
use App\Models\SprAccounts;
use App\Models\FondCoins;
use App\Models\oborots_coin;
use App\Repositories\InterfacesSomoni;
use App\Repositories\RepositoryRashod;
use App\Repositories\AddRequest;
use Illuminate\Support\Facades\DB;

class korshoyam_tangaController extends Controller
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
        $kodeOperObort= oborots_coin::orderBy('kod_oper','DESC')->value('kod_oper');
        if($kodeOperObort<=0)
        {
            $kodeOperObort=1;
        }else{
        $kodeOperObort++;
    }
                    //  SelectRashodTanga($type,$priznak)
        $FondMoneyTang=FondCoins::orderBy('date','DESC')->get()->groupBy('kode_oper');
         $arrayResult= $this->RepositoryRashod->SelectRashodTanga(1,0);
 
           $safes = SprSafes::all();
           $sprEds = SprEds::all();
            $shkafs = SprShkafs::all();
            $sprCells= SprCells::all();
             $sprQators= SprQators::all();
             $sprAccounts= SprAccounts::all();
              $kodeOper= FondCoins::orderBy('kode_oper','DESC')->value('kode_oper');
                       if($kodeOper<=0)
                       {
                        $kodeOper=1;
                        }else{
                         $kodeOper++;
                          }
                          $json =json_encode($arrayResult,true);
                          //   // print_r( json_decode($json,true));
                      $allsum=array_sum(array_column(json_decode($json,true), 'summa'));                  
                  return  view('fonds.korshoyam_tanga.index',compact('allsum','safes','sprEds','shkafs','sprCells' ,'sprQators','sprAccounts','kodeOper','kodeOperObort','arrayResult','FondMoneyTang'));
      
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
        //use App\Repositories\InterfacesSomoni;
        if(isset($request['id']))
        {
            //priznak prihod 0 rashod 1
            $arrayResult= $this->RepositoryRashod->InsertRashodKorshoyamToOstatkiTanga($request,0);
    
             
               if($arrayResult AND !$request->acccounti=='korshoyam')
               {
                return redirect()->route('korshoyam_tanga.index')->with('success','Фонд расход успешно создан!');
               }
               if($request->acccounti=='korshoyam')
               {
                return redirect()->route('home')->with('danger','Коршоям танга фонд  не успешно!');
               }
              
       exit;
        
        }
        DB::beginTransaction();
        $oborots = $this->addRepository->addRequestsOborottanga($request,1);
        $money= $this->addRepository->addRequestsTanga($request);
   
        if(is_array($oborots) AND is_array($money) AND $request->src==4)
        {
          
                     //prihod korshoyam ostatki
         $detailsFond = $this->addRepository->Fondostatki($money,'cell_id');
    
         $arrayResult= $this->RepositoryRashod->InsertRashod($detailsFond,1);
        //  print_r($arrayResult);
           try{
              foreach ($money as $key => $value) {
                  # code...
                //   echo "<pre>";
                 
                //   print_r($money[$key]);
                //   echo "<//pre>";
             FondCoins::create($money[$key]);
              oborots_coin::create($oborots[$key]);
          }
              DB::Commit();
           
      return redirect()->route('korshoyam_tanga.index')->with('success','Коршоям фонд успешно создан!');
            } catch (\Illuminate\Database\QueryException $e) {
              DB::rollback();
              return response(['message'=>'FAILURE'], 500);
         return redirect()->route('korshoyam_tanga.index')->with('danger','Коршоям фонд  не успешно!');
            }
          

            


           
            
          //  return response(['message'=>'Not inserted Fond money table and oborots table'], 500);                    
        
        }
     
        if(is_array($money) AND $request->src==2)
        {
          
           
           try{
          
              foreach ($money as $key => $value) {
                  # code...
            FondCoins::create($money[$key]);
            DB::Commit();
              
          }
              
           
          return redirect()->route('korshoyam_tanga.index')->with('success','Фарсуда фонд успешно создан!');
            } catch (\Illuminate\Database\QueryException $e) {
              DB::rollback();
              return response(['message'=>'FAILURE'], 500);
            return redirect()->route('korshoyam_tanga.index')->with('danger','Фарсуда фонд  не успешно!');
            }
          
             return response(['message'=>'Not inserted Fond money table and oborots table'], 500);                    
        
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
