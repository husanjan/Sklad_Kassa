<?php

namespace App\Http\Controllers\Aborot;

use App\Http\Controllers\Controller;
use App\Models\Oborot;
use App\Models\SprAccounts;
use App\Models\SprBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AborotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //

           $bik= SprBank::all();
            $Oborot= new  Oborot();
           $kodeOper= Oborot::orderBy('kod_oper','DESC')->value('kod_oper');


             $obor= $Oborot::orderBy('date','DESC')->paginate(50);

           if($kodeOper<=0)
               {
                   $kodeOper=1;
               }else{
               $kodeOper++;
           }

            $sprAccounts= SprAccounts::all();





        return  view('oborot.index',compact('bik','sprAccounts','kodeOper','obor'));
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
     //  echo    date('h:i:s');
        $this->validate($request, [
            'date' => 'required',
            'Bik' => 'required',
            'account_id_out' => 'required',
            'account_id_in' => 'required',
            'priznak' => 'required',
            'summa' => 'required',
            'nominal' => 'required',
            'kod_oper' => 'required',
          ]);
        $request->request->remove('_token');

                $account = $request->all();

               $inc=$account['kod_oper'];

     // date($account['date'].' '.'H:i:s');
          $date=date($account['date'].' '.'H:i:s.u ');

           foreach ($request->nominal AS $nominal=>$value)
           {
             $account['nominal']=$value;
              $account['date']=  $date;
             $account['kod_oper']=$inc++;
             $account['summa']=$request->summa[$nominal];
             $account['user_id'] = Auth::id();
             $account['comment'] = $request->comment;
             $account['host'] = $request->ip();
             $bb= Oborot::create($account);
//               echo "<pre>";
//               print_r($bb);
//               echo "</pre>";
           }

        return redirect()->route('oborot_spr.index')
            ->with('success','Счет успешно создан!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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

        Oborot::find($id)->delete();
        return redirect()->route('oborot_spr.index')
            ->with('success','Оборот фонд удалена!');
    }
}
