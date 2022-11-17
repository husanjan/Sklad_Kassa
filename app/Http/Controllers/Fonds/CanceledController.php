<?php

namespace App\Http\Controllers\Fonds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SprSafes;
use App\Models\SprShkafs;
use App\Models\SprCells;
use App\Models\SprQators;
use App\Models\SprEds;
use App\Models\FondEmisions;
use App\Models\SprAccounts;
use App\Models\FondMoney;
use App\Http\Controllers\Fonds\WornouController;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AddRequest;
use Illuminate\Support\Facades\DB;
class CanceledController extends Controller
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
          return  view('fonds.fondcancled.index',compact('safes','sprEds','shkafs','sprCells' ,'sprQators','sprAccounts','kodeOper'));
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
             $money= $this->addRepository->addRequests($request);
             echo "<pre>";
                       print_r($money);
                       echo "</pre>";
             if(is_array($money))
             {
               
                
                try{
                   foreach ($money as $key => $value) {
                       # code...
                    
                   FondMoney::create($money[$key]);
     
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

      //return redirect()->route('fondcanceled.index')->with('success','Ботилшуда фонд успешно создан!');

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
