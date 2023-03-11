<?php

namespace App\Http\Controllers\Spr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SprBank;
class SprBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private  const BANK_Validator=[
        'BIK'=>'required|max:50|min:9',
        'full_name'=>'required|max:50',
        'short_name'=>'required|max:50',

    ];
    public function index()
    {
        //
        $banks=SprBank::all();

        return  view('spr.bank.index',compact('banks'));
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
       
      $request->validate([
        'BIK'=>'required|numeric',
        'full_name'=>'required',
        'short_name'=>'required',

    ]);
    
        $request->request->remove('_token');
    
        $cells = $request->all();

        $cells['user_id'] = Auth::id();
        $cells['host'] = $request->ip();

        SprBank::create($cells);



         return redirect()->route('bank_spr.index')->with('success','Счет успешно создан!');
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
        $bankUpdate = SprBank::find($id);
        return view('spr.bank.edit', compact('bankUpdate'));


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
            $request->validate(self::BANK_Validator);
                $request->request->remove('_token');

                $safes = SprBank::find($id);
                $safes->BIK = $request->BIK;
                $safes->full_name=$request->full_name;
                $safes->short_name=$request->short_name;
                $safes->comment=$request->comment;
                $safes->user_id=Auth::id();
                $safes->host=$request->ip();

                $safes->save();
        return redirect()->route('bank_spr.index')->with('success', 'Запись о счете был изменен');
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
        SprBank::find($id)->delete();
        return redirect()->route('bank_spr.index')
            ->with('success','Единица удалена!');
    }
}
