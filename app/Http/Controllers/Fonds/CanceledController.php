<?php

namespace App\Http\Controllers\Fonds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SprSafes;
use App\Models\SprShkafs;
use App\Models\SprCells;
use App\Models\SprQators;
use App\Models\SprEds;
use App\Models\Oborot;
use App\Models\FondEmisions;
use App\Models\SprAccounts;
use App\Models\FondMoney;
use App\Models\Kode_Oper;
use App\Http\Controllers\Fonds\WornouController;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AddRequest;
use App\Repositories\RepositoryRashod;
use Illuminate\Support\Facades\DB;
class CanceledController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $addRepository;
    private $RepositoryRashod;
    public function __construct(AddRequest $addRepository,RepositoryRashod $RepositoryRashod)
    {
        $this->addRepository = $addRepository;
        $this->RepositoryRashod = $RepositoryRashod;
    }
    public function index()
    {
        //



        
        $safes = SprSafes::all();
        $sprEds = SprEds::all();
         $shkafs = SprShkafs::all();
         $sprCells= SprCells::all();
          $sprQators= SprQators::all();
          $sprAccounts= SprAccounts::all();
          // $kodeOper= FondMoney::orderBy('kode_oper','DESC')->value('kode_oper');
           $FondMoney=FondMoney::orderBy('date','DESC')->get()->groupBy('kode_oper');
           $kodeOperObort= Kode_Oper::orderBy('kode_oper','DESC')->value('kode_oper');
           if($kodeOperObort<=0)
           {
            $kodeOperObort=1;
            }else{
             $kodeOperObort++;
       
              }
              $kodeOper= $kodeOperObort;
                //     if($kodeOper<=0)
                //     {
                //      $kodeOper=1;
                //      }else{
                //       $kodeOper++;
                //        }
                //        $kodeOperObort= Oborot::orderBy('kod_oper','DESC')->value('kod_oper');
                //        if($kodeOperObort<=0)
                //        {
                //            $kodeOperObort=1;
                //        }else{
                //        $kodeOperObort++;
                //    }

                  
                      // $arrayResult=$this->RepositoryRashod->SelectRashod(3,0);
                   
                       $botilshudaRas= $this->RepositoryRashod->SelectRashod(3,0);
                       $arrayResult= $this->RepositoryRashod->SelectRashod(2,0);
          return  view('fonds.fondcancled.index',compact('FondMoney','safes','sprEds','shkafs','sprCells' ,'sprQators','sprAccounts','kodeOper','arrayResult','kodeOperObort','botilshudaRas'));
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
       // DB::beginTransaction();
         // dd($request->all());
        if(isset($request['id']))
        {
            $sumAll=0;
            foreach($request['id'] AS $input)
            {
                        if($request['Summarashod'.$input][0]>0)
                        {
                          $sumAll+=$request['Summarashod'.$input][0];
                         }
            }
            
            $arrayResult= $this->RepositoryRashod->InsertRashodBotilshudaToOstatki($request);
            // print_r($arrayResult);
            // echo $sumAll;
         
            $kode_oper= new Kode_Oper;
            $kode_oper->datetime=date("Y-m-d H:i:s");
            $kode_oper->kode_oper=$request->kode_oper;
            $kode_oper->Prikhod=$request->src;
            $kode_oper->Raskhod=3;
            $kode_oper->Summa=$sumAll;
            $kode_oper->user_id=Auth::id();
            $kode_oper->host=Auth::id();
            $kode_oper->save();    
          
                
               if($arrayResult AND !$request->botilshudar=='botilshudar')
               {
              
            

                //   exit;

           
                // $kode_oper->save();      
                foreach($request['id'] AS $input)
                {
                            if($request['Summarashod'.$input][0]>0)
                            {
                                $sumAll+=$request['Summarashod'.$input][0];
                             }
                }




           return redirect()->route('fondcanceled.index')->with('success','Фонд Ботилшуда расход успешно создан!');
               }
               if($request->botilshudar=='botilshudar')
               {
        //   return redirect()->route('home')->with('danger','Ботилшуда фонд  не успешно!');
          return redirect()->route('fondcanceled.index')->with('success','Фонд Ботилшуда расход успешно создан!');
               }
              
          exit;
        }    


             //$this->addRepository->addRequests($request);
             $money= $this->addRepository->addRequests($request);
            //  echo "<pre>";
            //            print_r($money);
            //            echo "</pre>";
            //            exit;
             if(is_array($money))
             {
 
             $detailsFond = $this->addRepository->Fondostatki($money,'cell_id');
               $arrayResult= $this->RepositoryRashod->InsertRashod($detailsFond,0);
      
                      
                          foreach ($money as $key => $value) {
                            //            # code...
                                    
                            // echo "<pre>";
                            // print_r($money[$key]);
                            // echo "</pre>";
                                 FondMoney::create($money[$key]);
                     
                               }
                            //    exit;
        return redirect()->route('fondcanceled.index')->with('success','Фонд Приход успешно создан!');
        }
                
            //     try{
            //        foreach ($money as $key => $value) {
            //            # code...
                    
            //        FondMoney::create($money[$key]);
     
            //    }
            //        DB::Commit();
                 
            //      return redirect()->route('fondcanceled.index')->with('success','Ботилшуда успешно создан!');
            //      } catch (\Illuminate\Database\QueryException $e) {
            //        DB::rollback();
            //        return response(['message'=>'FAILURE'], 500);
            //    return redirect()->route('fondcanceled.index')->with('danger','Ботилшуда не успешно!');
            //      }
               
            //   return response(['message'=>'Not inserted Fond money table and oborots table'], 500);                    
             
            //  }

      //return redirect()->route('fondcanceled.index')->with('success','Ботилшуда фонд успешно создан!');

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
    }
}
