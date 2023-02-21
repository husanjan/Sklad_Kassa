<?php

namespace App\Http\Controllers;

use App\Models\oborots_coin;
use Illuminate\Http\Request;
use App\Models\Oborot;
use App\Models\SprAccounts;
use App\Models\SprBank;
use App\Models\SprSafes;
use App\Models\FondMoney;
 
use Illuminate\Support\Facades\Auth;
use App\Repositories\InterfacesSomoni;
use App\Repositories\AddRequest;
class OborotsCoinController extends Controller
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

        $bik= SprBank::all();
         $Oborot= new  oborots_coin();
        $kodeOper= oborots_coin::orderBy('kod_oper','DESC')->value('kod_oper');


          $obor= $Oborot::orderBy('date','DESC')->paginate(50);
        //   $kodOper= FondMoney::orderBy('kode_oper','DESC')->value('kode_oper');
        //             if($kodOper<=0)
        //             {
        //              $kodOper=1;
        //              }else{
        //               $kodOper++;
        //                }
        if($kodeOper<=0)
            {
                $kodeOper=1;
            }else{
            $kodeOper++;
        }


         $sprAccounts= SprAccounts::all();


        // return  view('aborots_tanga.index');
        return  view('aborots_tanga.index',compact('bik','sprAccounts','kodeOper','obor','safes'));
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
            dd($request->all());
        $this->addRepository->AddInsertOborotTanga($request);
        return redirect()->route('oborot_tanga.index')->with('success','Оборот Танга  успешно создан!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\oborots_coin  $oborots_coin
     * @return \Illuminate\Http\Response
     */
    public function show(oborots_coin $oborots_coin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\oborots_coin  $oborots_coin
     * @return \Illuminate\Http\Response
     */
    public function edit(oborots_coin $oborots_coin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\oborots_coin  $oborots_coin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, oborots_coin $oborots_coin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\oborots_coin  $oborots_coin
     * @return \Illuminate\Http\Response
     */
    public function destroy(oborots_coin $oborots_coin)
    {
        //
    }
}
