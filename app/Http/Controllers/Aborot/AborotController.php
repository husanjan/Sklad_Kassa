<?php

namespace App\Http\Controllers\Aborot;

use App\Http\Controllers\Controller;
use App\Models\Oborot;
use App\Models\SprAccounts;
use App\Models\SprBank;
use App\Models\SprSafes;
use App\Models\FondMoney;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\InterfacesSomoni;
class AborotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $blogRepository;
    public function __construct(InterfacesSomoni $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }


    public function index()
    {
        //
    $safes = SprSafes::all();

           $bik= SprBank::all();
            $Oborot= new  Oborot();
        

             $obor= $Oborot::orderBy('date','DESC')->paginate(50);
             $kodOper= FondMoney::orderBy('kode_oper','DESC')->value('kode_oper');
                       if($kodOper<=0)
                       {
                        $kodOper=1;
                        }else{
                         $kodOper++;
                          }
                          $kodeOper= Oborot::orderBy('kod_oper','DESC')->value('kod_oper');

           if($kodeOper<=0)
               {
                   $kodeOper=1;
               }else{
               $kodeOper++;
           }


            $sprAccounts= SprAccounts::all();





        return  view('oborot.index',compact('bik','sprAccounts','kodeOper','obor','safes','kodOper'));
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
            'bik' => 'required',
            // 'account_id_out' => 'required',
            'account_id_in' => 'required',
            'priznak' => 'required',
            'summa' => 'required',
            'nominal' => 'required',
            'kod_oper' => 'required',
          ]);
        $request->request->remove('_token');





     // date($account['date'].' '.'H:i:s');



            
            // id /korshoyam 
                  $this->blogRepository->OborotInserttoOborot($request);
                           // if($request->account_id_in==8)
                //             {
                //                      $this->blogRepository->oborotInsertKorshoyam($request);
                //             }
                //             if($request->account_id_in==9)
                //             {
                //                      $this->blogRepository->oborotInsertKorshoyam($request);
                //             }
                
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
