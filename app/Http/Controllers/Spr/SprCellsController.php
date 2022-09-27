<?php

namespace App\Http\Controllers\Spr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SprSafes;
use App\Models\SprShkafs;
use App\Models\SprQators;
use App\Models\SprCells;
use Illuminate\Support\Facades\Auth;
//Ячейка БД select update delete  and view blade index,edit,delete
class SprCellsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $qators = SprQators::all();
        $shkafs = SprShkafs::all();
        $safes = SprSafes::all();
        $cell  = SprCells::all();
        //dd($qators);

        return view('spr.sprcells.index', compact('qators', 'shkafs', 'safes','cell'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $safes = SprSafes::all();
        $shkafs = SprShkafs::all();
        $qators = SprQators::all();

        return view('spr.sprcells.create', compact('safes', 'shkafs','qators'));
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


        $this->validate($request, [
            'safe_id' => 'required',
            'shkaf_id' => 'required',
            'qator_id' => 'required',
            'cell' => 'required',
        ]);


        $cells = $request->all();

        $cells['user_id'] = Auth::id();
        $cells['host'] = $request->ip();


       $spcell= SprCells::create($cells);



        return redirect()->route('sprcell.index')->with('success','Ячейка успешно создан!');



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

        $cell = SprCells::find($id);
        $safes = SprSafes::all();
        $shkaf = SprShkafs::all();
        $qator = SprQators::all();


        return view('spr.sprcells.edit', compact('shkaf','safes','qator','cell'));

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

        $this->validate($request, [
            'safe_id' => 'required|integer',
            'shkaf_id' => 'required|integer',
            'qator_id' => 'required|integer',
            'cell' => 'required|integer',
        ]);

        $qator = SprCells::find($id);

        $qator->safe_id = $request->safe_id;
        $qator->shkaf_id = $request->shkaf_id;
        $qator->qator_id = $request->qator_id;
        $qator->cell = $request->cell;
        $qator->user_id =Auth::id() ;
        $qator->host =$request->ip() ;
        $qator->comment = $request->comment;

        $qator->save();

        return redirect()->route('sprcell.index')
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
        //
        SprCells::find($id)->delete();
        return redirect()->route('sprcell.index')
            ->with('success','Ряд удалена!');
    }
    public function qatorTable(Request $request)
    {


          //return $request->safe_id ;
       return  SprQators::all()->where('shkaf_id',$request->id_shkaf)->where('safe_id',$request->safe_id);



    }
    public function cellsTable(Request $request)
    {


        //return $request->safe_id ;
        return  SprCells::all()->where('shkaf_id',$request->id_shkaf)->where('safe_id',$request->safe_id)->where('qator_id',$request->qator_id);



    }
}
