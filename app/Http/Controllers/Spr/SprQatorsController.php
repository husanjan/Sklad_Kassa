<?php

namespace App\Http\Controllers\Spr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SprSafes;
use App\Models\SprShkafs;
use App\Models\SprQators;
use Illuminate\Support\Facades\Auth;

//
class SprQatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qators = SprQators::all();
        $shkafs = SprShkafs::all();
        $safes = SprSafes::all();
        //dd($qators);

        return view('spr.sprqators.index', compact('qators', 'shkafs', 'safes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $safes = SprSafes::all();
        $shkafs = SprShkafs::all();

        return view('spr.sprqators.create', compact('safes', 'shkafs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'safe_id' => 'required|numeric',
            'shkaf_id' => 'required|numeric',
            'qator' => 'required|numeric',
        ]);


        $qator = $request->all();
     
        $qator['user_id'] = Auth::id();
        $qator['host'] = $request->ip();
      // dd( $qator);

       $spqator= SprQators::create($qator);
       

        return redirect()->route('sprqators.index')
            ->with('success','Ряд успешно создан!');
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
        $qators = SprQators::find($id);
        
        $shkaf = SprShkafs::all();
         $safes = SprSafes::all();

        return view('spr.sprqators.edit', compact('shkaf','safes','qators'));
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
     
        $this->validate($request, [
            'safe_id' => 'required|integer|min:1',
            'shkaf_id' => 'required|integer|min:1',
            'qator' => 'required|integer|min:1',
        ]);

        $qator = SprQators::find($id);
      
        $qator->safe_id = $request->safe_id;
        $qator->shkaf_id = $request->shkaf_id;
        $qator->qator = $request->qator;
        $qator->comment = $request->comment;
        $qator->save();

        return redirect()->route('sprqators.index')
            ->with('success', 'Запись о ряде был изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SprQators::find($id)->delete();
        return redirect()->route('sprqators.index')
            ->with('success','Ряд удалена!');
    }
    public function shkafTable(Request $request)
    {
        //Post запрос ajax ответ

             return SprShkafs::all()->where('safe_id',$request->id);

    }
}
