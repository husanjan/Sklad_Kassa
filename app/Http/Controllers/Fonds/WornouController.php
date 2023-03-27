<?php

namespace App\Http\Controllers\Fonds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SprSafes;
use App\Models\SprShkafs;
use App\Models\SprCells;
use App\Models\SprQators;
use App\Models\SprEds;
use App\Models\FondEmisions;
use App\Models\SprAccounts;
use App\Models\FondMoney;
use App\Models\Oborot;
use App\Models\Kode_Oper;
use Illuminate\Support\Facades\Auth;
use App\Repositories\InterfacesSomoni;
use App\Repositories\AddRequest;
use App\Repositories\RepositoryRashod;
use Illuminate\Support\Facades\DB;

class WornouController extends Controller
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
    //     $kodeOperObort= Oborot::orderBy('kod_oper','DESC')->value('kod_oper');
    //     if($kodeOperObort<=0)
    //     {
    //         $kodeOperObort=1;
    //     }else{
    //     $kodeOperObort++;
    // }
    $kodeOperObort= Kode_Oper::orderBy('kode_oper','DESC')->value('kode_oper');
    if($kodeOperObort<=0)
    {
     $kodeOperObort=1;
     }else{
      $kodeOperObort++;

       }
    $safes = SprSafes::all();
     $sprEds = SprEds::all();
      $shkafs = SprShkafs::all();
      $sprCells= SprCells::all();
       $sprQators= SprQators::all();
       $sprAccounts= SprAccounts::all();
       $kodeOper=$kodeOperObort;
        // $kodeOper= FondMoney::orderBy('kode_oper','DESC')->value('kode_oper');
        //          if($kodeOper<=0)
        //          {
        //           $kodeOper=1;
        //           }else{
        //            $kodeOper++;
        //             }
                    $arrayResult= $this->RepositoryRashod->SelectRashod(2,0);
                    $json =json_encode($arrayResult,true);
                    //   // print_r( json_decode($json,true));
                $allsum=array_sum(array_column(json_decode($json,true), 'summa'));
                    $FondMoneys= new  FondMoney();
        $FondMoney= $FondMoneys::orderBy('date','DESC')->get()->groupBy('kode_oper');
            return  view('fonds.fondwornou.index',compact('allsum','safes','sprEds','shkafs','sprCells' ,'sprQators','sprAccounts','kodeOper','kodeOperObort','arrayResult','FondMoney'));
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
       
        $inputs = $request->all();
          
         
           
        if(isset($request['id']))
        {
          $arrayResult= $this->RepositoryRashod->InsertRashodFarsudaToOstatki($request);
            // print_r($arrayResult);
        
            $sumAll=0;
            foreach($request['id'] AS $input)
            {
                        if($request['Summarashod'.$input][0]>0)
                        {
                         $sumAll+=$request['Summarashod'.$input][0];
                         }
            }
            // echo   $sumAll;

           


      
             if($arrayResult AND !$request->farsudai=='farsudai')
               {
                $kode_oper= new Kode_Oper;
                $kode_oper->datetime=date("Y-m-d H:i:s");
                $kode_oper->kode_oper=$request->kode_oper;
                $kode_oper->Prikhod=4;
                $kode_oper->Raskhod=1;
                $kode_oper->Summa=$sumAll;
                $kode_oper->user_id=Auth::id();
                $kode_oper->host=Auth::id();
                $kode_oper->save();      
              
                foreach($request['id'] AS $input)
                {
                            if($request['Summarashod'.$input][0]>0)
                            {
                                $sumAll+=$request['Summarashod'.$input][0];
                             }
                }
                // $kode_oper= new Kode_Oper;
                // $kode_oper->datetime=date("Y-m-d H:i:s");
                // $kode_oper->kode_oper=$request->kode_oper;
                // $kode_oper->Prikhod=4;
                // $kode_oper->Raskhod=1;
                // $kode_oper->Summa=$sumAll;
                // $kode_oper->user_id=Auth::id();
                // $kode_oper->host=Auth::id();
                // $kode_oper->save();        


                // return redirect()->route('fondwornou.index')->with('success','Фонд расход успешно создан!');
               return    redirect()->back()->with('success','Фонд расход успешно создан!');
               }
               if($request->farsudai=='farsudai')
               {
                // return redirect()->route('home')->with('danger','Фарсуда фонд  не успешно!');
                return redirect()->back()->with('danger','Фарсуда фонд  не успешно!');
               }
          

          exit;
        }  

           $blogs =  $this->addRepository->addRequestsOborot($request,2);
           
     
         // 
                  
          $money= $this->addRepository->addRequests($request);
      
       
        //   echo "<pre>";
        //   print_r($detailsFond);
        //   echo "</pre>";
        //    exit;
            DB::beginTransaction();
        if(is_array($money) AND is_array($blogs) AND $request->src==4)
          {
              //prihod korshoyam ostatki
         $detailsFond = $this->addRepository->Fondostatki($money,'cell_id');
        //  ($detailsFond,$typeFond)
         $arrayResult= $this->RepositoryRashod->InsertRashod($detailsFond,0);
              //prihod korshoyam ostatki  
             
             try{
                $kode_oper= new Kode_Oper;
                $kode_oper->datetime=date("Y-m-d H:i:s");
                $kode_oper->kode_oper=$request->kode_oper;
                $kode_oper->Prikhod=2;
                $kode_oper->Raskhod=4;
                $kode_oper->Summa=$request->AllSumma;
                $kode_oper->user_id=Auth::id();
                $kode_oper->host=Auth::id();
                $kode_oper->save();
                foreach ($money as $key => $value) {
                    # code...
                FondMoney::create($money[$key]);
                Oborot::create($blogs[$key]);
            }
                DB::Commit();
             
                return redirect()->route('fondwornou.index')->with('success','Фарсуда фонд успешно создан!');
              } catch (\Illuminate\Database\QueryException $e) {
                DB::rollback();
                return response(['message'=>'FAILURE'], 500);
                return redirect()->route('fondwornou.index')->with('danger','Фарсуда фонд  не успешно!');
              }
            
              return response(['message'=>'Not inserted Fond money table and oborots table'], 500);                    
          
          }
          
          //korshoyam 

      

        //   if(is_array($money) AND $request->src==3 AND )
        //   {
            
        //     try{
         
        //         foreach ($money as $key => $value) {
        //             # code...
               
        //             FondMoney::create($money[$key]);
        //     }
        //         DB::Commit();
        //           response(['message'=>'ALL GOOD'], 200);
        //        return redirect()->route('fondwornou.index')->with('success','Фарсуда Ба оборот рафт фонд успешно создан!');
        //       } catch (\Illuminate\Database\QueryException $e) {
        //         DB::rollback();
               
        //         return redirect()->route('fondwornou.index')->with('danger','Фарсуда фонд   не успешно!');
        //       }
        //   }
       // Start transaction!
 
         
       
// try {
//     // Validate, then create if valid
//     $newAcct = FondMoney::create($arr[0]);
//     $newAccts= Oborot::create($blogs[0]);
// } catch(ValidationException $e)
// {
//     // Rollback and then redirect
//     // back to form with errors
//     DB::rollback();
//     return Redirect::to('/form')
//         ->withErrors( $e->getErrors() )
//         ->withInput();
// } catch(\Exception $e)
//     {
//         DB::rollback();
//         throw $e;
// }
       
 
    
    //return redirect()->route('fondwornou.index')->with('success','Фарсуда фонд успешно создан!');














 



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     }
    public function show($request)
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
