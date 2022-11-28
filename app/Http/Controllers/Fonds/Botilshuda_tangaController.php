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
use App\Repositories\AddRequest;
use Illuminate\Support\Facades\DB;

class Botilshuda_tangaController extends Controller
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
              $kodeOper= FondCoins::orderBy('kode_oper','DESC')->value('kode_oper');
                       if($kodeOper<=0)
                       {
                        $kodeOper=1;
                        }else{
                         $kodeOper++;
                          }
                  return  view('fonds.botilshuda_tanga.index',compact('safes','sprEds','shkafs','sprCells' ,'sprQators','sprAccounts','kodeOper','kodeOperObort'));
  
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
        DB::beginTransaction();
         
        //$this->addRepository->addRequests($request);
        //$money= $this->addRepository->addRequests($request);
        $money= $this->addRepository->addRequestsTanga($request);
        if(is_array($money))
        {
          
           
           try{
              foreach ($money as $key => $value) {
                  # code...
               
                  FondCoins::create($money[$key]);

          }
              DB::Commit();
            
            return redirect()->route('fondcanceled.index')->with('success','Ботилшуда успешно создан!');
            } catch (\Illuminate\Database\QueryException $e) {
              DB::rollback();
              return response(['message'=>'FAILURE'], 500);
          return redirect()->route('fondcanceled.index')->with('danger','Ботилшуда не успешно!');
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
