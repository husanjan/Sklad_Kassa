<?php

namespace App\Http\Controllers\Spr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SprSafes;
use App\Models\SprShkafs;
use Illuminate\Support\Facades\Auth;

class SprShkafsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shkafs = SprShkafs::all();
        $safes = SprSafes::all();

        return view('spr.sprshkafs.index', compact('shkafs', 'safes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $safes = SprSafes::all();

        return view('spr.sprshkafs.create', compact('safes'));
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
            'safe_id' => 'required',
            'shkaf' => 'required',
        ]);


        $shkaf = $request->all();
        $shkaf['user_id'] = Auth::id();
        $shkaf['host'] = $request->ip();

        SprShkafs::create($shkaf);

        return redirect()->route('sprshkafs.index')
            ->with('success','Шкаф/Стилаж успешно создан!');
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
        $shkaf = SprShkafs::find($id);
        $safes = SprSafes::all();

        return view('spr.sprshkafs.edit', compact( 'shkaf', 'safes'));
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
            'safe_id' => 'required',
            'shkaf' => 'required',
        ]);

        $shkaf = SprShkafs::find($id);
        $shkaf->safe_id = $request->safe_id;
        $shkaf->shkaf = $request->shkaf;
        $shkaf->comment = $request->comment;
        $shkaf->save();

        return redirect()->route('sprshkafs.index')
            ->with('success', 'Запись о шкафе/стилаже был изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SprShkafs::find($id)->delete();
        return redirect()->route('sprshkafs.index')
            ->with('success','Ряд/Стилаж удален!');
    }
}
