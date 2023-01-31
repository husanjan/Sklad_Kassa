<?php

namespace App\Http\Controllers;

use App\Models\OstatkiSchet;
use Illuminate\Http\Request;
use App\Repositories\Repositoryschet;
class OstatkiSchetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */  
      private $Repositoryschet;
 
    public function __construct(Repositoryschet $Repositoryschet)
    {
        $this->middleware('auth');
 
        $this->Repositoryschet = $Repositoryschet;
    
    }
    public function index()
    {
        //
        return   view('ostatki.schet.index');
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
       
       
     
         $this->Repositoryschet->ToDateFondEmisions($request);
         $this->Repositoryschet->ToDateFond($request,1);
         $this->Repositoryschet->ToDateFond($request,2);
         $this->Repositoryschet->ToDateFond($request,3);
         echo "<pre>";
         print_r($this->Repositoryschet->InsertOstatkiSchet());
       echo "</pre>";
   
         dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OstatkiSchet  $ostatkiSchet
     * @return \Illuminate\Http\Response
     */
    public function show(OstatkiSchet $ostatkiSchet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OstatkiSchet  $ostatkiSchet
     * @return \Illuminate\Http\Response
     */
    public function edit(OstatkiSchet $ostatkiSchet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OstatkiSchet  $ostatkiSchet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OstatkiSchet $ostatkiSchet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OstatkiSchet  $ostatkiSchet
     * @return \Illuminate\Http\Response
     */
    public function destroy(OstatkiSchet $ostatkiSchet)
    {
        //
    }
}
