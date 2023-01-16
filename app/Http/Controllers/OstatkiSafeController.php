<?php

namespace App\Http\Controllers;

use App\Models\Ostatki_safe;
use Illuminate\Http\Request;
use App\Models\SprSafes;
use App\Models\SprShkafs;
use App\Models\SprQators;
use App\Models\SprCells;
use App\Repositories\RepositoryRashod;
class OstatkiSafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $RepositoryRashod;
 
    public function __construct(RepositoryRashod $RepositoryRashod)
    {
        $this->middleware('auth');
 
        $this->RepositoryRashod = $RepositoryRashod;
    
    }
    public function index()
    {

        // $sprEds= SprEds::all();
        // $Oborot= new  Oborot();
        // $OborotTanga= new  oborots_coin();
        $shkafs = SprShkafs::all();
        $sprCells= SprCells::all();
        $sprQators= SprQators::all();
         //SelectRashod($type,$priznak)
        $korshoyamRashod= $this->RepositoryRashod->SelectRashod(1,0);
        $farsudaRashod= $this->RepositoryRashod->SelectRashod(2,0);
        $botilshudaRas= $this->RepositoryRashod->SelectRashod(3,0);
        //tanga 
   
       $korshoyamTanga= $this->RepositoryRashod->SelectRashodTanga(1,0);
       $farsudaTanga= $this->RepositoryRashod->SelectRashodTanga(2,0);
       $botilshudaTanga= $this->RepositoryRashod->SelectRashodTanga(3,0);
        $SprSafes= SprSafes::all();
       $AllOstatki= array_merge($korshoyamRashod,$farsudaRashod,$botilshudaRas,$korshoyamTanga,$farsudaTanga,$botilshudaTanga);
        //exit;
        return   view('ostatki.safe.index',compact('SprSafes','AllOstatki','shkafs','sprQators','sprCells'));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ostatki_safe  $ostatki_safe
     * @return \Illuminate\Http\Response
     */
    public function show(Ostatki_safe $ostatki_safe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ostatki_safe  $ostatki_safe
     * @return \Illuminate\Http\Response
     */
    public function edit(Ostatki_safe $ostatki_safe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ostatki_safe  $ostatki_safe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ostatki_safe $ostatki_safe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ostatki_safe  $ostatki_safe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ostatki_safe $ostatki_safe)
    {
        //
    }
}
