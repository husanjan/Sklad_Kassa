<?php

namespace App\Http\Controllers\Spr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SprSafes;
use Illuminate\Support\Facades\Auth;

class SprSafesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $safes = SprSafes::all();

        return view('spr.sprsafes.index', compact('safes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spr.sprsafes.create');
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
            'safe' => 'required',
        ]);


        $safe = $request->all();
        $safe['user_id'] = Auth::id();
        $safe['host'] = $request->ip();

        SprSafes::create($safe);

        return redirect()->route('sprsafes.index')
            ->with('success','Единица успешно введена!');
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
        $safes = SprSafes::find($id);

        return view('spr.sprsafes.edit', compact('safes'));
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
            'safe' => 'required',
        ]);

        $safes = SprSafes::find($id);
        $safes->safe = $request->safe;
        $safes->comment = $request->comment;
        $safes->save();

        return redirect()->route('sprsafes.index')
            ->with('success', 'Запись о счете был изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SprSafes::find($id)->delete();
        return redirect()->route('sprsafes.index')
            ->with('success','Единица удалена!');
    }
}
