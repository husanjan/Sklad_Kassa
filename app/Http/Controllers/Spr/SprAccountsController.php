<?php

namespace App\Http\Controllers\Spr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logs;
use App\Models\SprAccounts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class SprAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = SprAccounts::all();

        return view('spr.spraccounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spr.spraccounts.create');
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
            'account' => 'required',
            'name' => 'required',
        ]);

        $account = $request->all();
        $account['user_id'] = Auth::id();
        $account['host'] = $request->ip();

        SprAccounts::create($account);

        return redirect()->route('spraccounts.index')
            ->with('success','Счет успешно создан!');
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
           return view('layouts.app1');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accounts = SprAccounts::find($id);

        return view('spr.spraccounts.edit', compact('accounts'));
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
            'account' => 'required',
            'name' => 'required',
        ]);
        $accounts = SprAccounts::find($id);
        $accounts->account = $request->account;
        $accounts->name = $request->name;
        $accounts->comment = $request->comment;
        $accounts->save();

        return redirect()->route('spraccounts.index')
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
        SprAccounts::find($id)->delete();
        return redirect()->route('spraccounts.index')
            ->with('success','Счет удален!');
    }
}
