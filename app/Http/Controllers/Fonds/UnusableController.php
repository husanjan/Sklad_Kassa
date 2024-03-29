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
                  return  view('fonds.fondunusable.index',compact('safes','sprEds','shkafs','sprCells' ,'sprQators','sprAccounts','kodeOper','kodeOperObort'));
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
        DB::beginTransaction();
        $inputs = $request->all();

                           
                      
                     
                   
       
        $oborots =  $this->addRepository->addRequestsOborot($request,1);
                
        $money= $this->addRepository->addRequests($request);
        // echo "<pre>";
        // print_r($oborots);
        // echo "</pre>";
        // echo "<pre>";
        // print_r($money);
        // echo "</pre>";


        //  exit;
         if(is_array($oborots) AND is_array($money) AND $request->src==7)
         {
           
            
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
               return response(['message'=>'FAILURE'], 500);
               return redirect()->route('fondunusable.index')->with('danger','Фарсуда фонд  не успешно!');
             }
           
           //  return response(['message'=>'Not inserted Fond money table and oborots table'], 500);                    
         
         }
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
               return response(['message'=>'FAILURE'], 500);
             return redirect()->route('fondunusable.index')->with('danger','Фарсуда фонд  не успешно!');
             }
           
              return response(['message'=>'Not inserted Fond money table and oborots table'], 500);                    
         
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
