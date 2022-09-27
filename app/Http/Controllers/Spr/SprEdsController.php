<?php

namespace App\Http\Controllers\Spr;

use App\Http\Controllers\Controller;
use App\Models\SprEds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SprEdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eds = SprEds::all();

        return view('spr.spreds.index', compact('eds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spr.spreds.create');
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
            'money' => 'required',
            'name' => 'required',
            'kol' => 'required',
        ]);


        $ed = $request->all();
        $ed['user_id'] = Auth::id();
        $ed['host'] = $request->ip();

        SprEds::create($ed);


        return redirect()->route('spreds.index')
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
        $eds = SprEds::find($id);

        return view('spr.spreds.edit', compact('eds'));
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
            'money' => 'required',
            'name' => 'required',
            'kol' => 'required',
        ]);
        $eds = SprEds::find($id);
        $eds->money = $request->money;
        $eds->name = $request->name;
        $eds->kol = $request->kol;
        $eds->comment = $request->comment;
        $eds->save();

        return redirect()->route('spreds.index')
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
        SprEds::find($id)->delete();
        return redirect()->route('spreds.index')
            ->with('success','Единица удалена!');
    }
}
