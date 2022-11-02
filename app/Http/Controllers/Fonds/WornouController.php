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
use Illuminate\Support\Facades\Auth;
use App\Repositories\InterfacesSomoni;
class WornouController extends Controller
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
    $safes = SprSafes::all();
     $sprEds = SprEds::all();
      $shkafs = SprShkafs::all();
      $sprCells= SprCells::all();
       $sprQators= SprQators::all();
       $sprAccounts= SprAccounts::all();
        $kodeOper= FondMoney::orderBy('kode_oper','DESC')->value('kode_oper');
                 if($kodeOper<=0)
                 {
                  $kodeOper=1;
                  }else{
                   $kodeOper++;
                    }
            return  view('fonds.fondwornou.index',compact('safes','sprEds','shkafs','sprCells' ,'sprQators','sprAccounts','kodeOper'));
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
            //$blogs = $this->blogRepository->InsertDB();
         $inputs = $request->all();
         dd($inputs);
        
       //OneSomoni
                $Onesomoni=$this->blogRepository->allInsertDB($request->ed_id0,$request->count0,$request->safe_id0,$request->shaving0,$request->qator_id0,
                                  $request->cells0,$request->nominal3,
                                       $request->date,$request->priznak,$request->kode_oper,$request->farsuda,$request->src,
                                              $request->ndoc,$request->summacounts0,$request->comment,Auth::id(),$request->ip());
              //                     neplone
    $addOneNeplan= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomon0s,array_values($request->nominal0)[0],1,1,$request->shavingnepolniySomon0s,
    $request->qator_idnepolniySomon0s,$request->cellsnepolniySomon0s,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
            $request->ndoc,$request->kode_oper,Auth::id(),$request->summcou0,$request->comment);

              //End OneSomoni
         $threesomon= $this->blogRepository->allInsertDB($request->ed_id3,$request->count3,$request->safe_id3,$request->shaving3,$request->qator_id3,
                                     $request->cells3,$request->nominal0,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
                                             $request->src,$request->ndoc,$request->summacounts3,$request->comment,Auth::id(),$request->ip());
                                                  //                     neplone
             $addneplonoeThree= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomon3s,array_values($request->nominal3)[0],1,1,$request->shavingnepolniySomon3s,
    $request->qator_idnepolniySomon3s,$request->cellsnepolniySomon3s,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
            $request->ndoc,$request->kode_oper,Auth::id(),$request->summcou3,$request->comment);
                       
                                   //         End  Еркуу Somoni
                                     //           Five Somoni
         $Fivesomon= $this->blogRepository->allInsertDB($request->ed_id5,$request->count5,$request->safe_id5,$request->shaving5,$request->qator_id5,
                                     $request->cells5,$request->nominal5,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
                                             $request->src,$request->ndoc,$request->summacounts5,$request->comment,Auth::id(),$request->ip());
                                            
                                                  //                     neplone Five
             $addneplonoeFive= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomon5s,array_values($request->nominal5)[0],1,1,$request->shavingnepolniySomon5s,
    $request->qator_idnepolniySomon5s,$request->cellsnepolniySomon5s,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
            $request->ndoc,$request->kode_oper,Auth::id(),$request->summcou5,$request->comment);
                                   //         End Five Somoni
                                    
                                
                                //           Ten Somoni
                                $Fivesomon= $this->blogRepository->allInsertDB($request->ed_idt,$request->countt,$request->safe_idt,$request->shaving5,$request->qator_id5,
                                $request->cells5,$request->nominal5,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
                                        $request->src,$request->ndoc,$request->summacounts5,$request->comment,Auth::id(),$request->ip());
                                       
                                             //                     neplone
        $addneplonoeFive= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomon5s,array_values($request->nominal5)[0],1,1,$request->shavingnepolniySomon5s,
$request->qator_idnepolniySomon5s,$request->cellsnepolniySomon5s,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
       $request->ndoc,$request->kode_oper,Auth::id(),$request->summcou5,$request->comment);
                              //         End Three Somoni
                               
                              print_r($addneplonoeFive);




               exit;




























  if(array_values($request->ed_id0)[0]>0 && array_values($request->count0)[0] && array_values($request->safe_id0)[0] && array_values($request->shaving0)[0] && array_values($request->shaving0)[0] && array_values($request->cells0)[0])
             {
            $OneSomoni['nominal0']=array_values($request->nominal0);

            $OneSomoni['ed_id']=array_values($request->ed_id0);

            $OneSomoni['kol']=array_values($request->count0);
            $OneSomoni['safe_id']=array_values($request->safe_id0);
            $OneSomoni['shkaf_id']=array_values($request->shaving0);
            $OneSomoni['qator_id']=array_values($request->qator_id0);
            $OneSomoni['cell_id']=array_values($request->cells0);
            $OneSomoni['date']=$request->date;
            $OneSomoni['priznak']=$request->priznak;
            $OneSomoni['type']=$request->farsuda;
            $OneSomoni['src']=$request->src;
            $OneSomoni['nominal']=array_values($request->nominal0)[0];
            // echo count(array_values($OneSomoni['ed_id0']));
             if(count(array_values($OneSomoni['ed_id']))===count(array_values($OneSomoni['kol']))   AND count(array_values($OneSomoni['safe_id']))==count(array_values($OneSomoni['cell_id'])) AND count(array_values($OneSomoni['shkaf_id']))===count(array_values($OneSomoni['qator_id'])))
               {
                    echo "<pre>";
                  //  print_r($OneSomoni);

                   echo "</pre>";


                   foreach($OneSomoni['ed_id'] AS $edin=>$values)
                   {


                             $addOne['ed_id']= $OneSomoni['ed_id'][$edin];
                             $addOne['naminal']= array_values($request->nominal0)[0];
                             $addOne['safe_id']= $OneSomoni['safe_id'][$edin];
                             $addOne['kol']= $OneSomoni['kol'][$edin];
                             $addOne['shkaf_id']= $OneSomoni['shkaf_id'][$edin];
                             $addOne['qator_id']= $OneSomoni['qator_id'][$edin];
                             $addOne['cell_id']= $OneSomoni['cell_id'][$edin];
                             $addOne['date']= $request->date;
                             $addOne['priznak']= $request->priznak;
                             $addOne['type']= $request->farsuda;
                             $addOne['src']= $request->src;
                             $addOne['n_doc']= $request->ndoc;
                             $addOne['kode_oper']= $request->kode_oper;
                             $addOne['summa']= $request->summacounts0;
                             $addOne['comment']= $request->comment;
                             $addOne['user_id']= $account['user_id'] =Auth::id();
                             $addOne['host'] = $request->ip();
                           // print_r($addOne);
                             FondMoney::create($addOne);

                   }


               }
             }

        if($request->summcou0>0 &&$request->safe_idnepolniySomon0s>0   &&  $request->shavingnepolniySomon0s>0 &&  $request->qator_idnepolniySomon0s>0 &&  $request->cellsnepolniySomon0s>0)
        {
                            $addOnesp['safe_id']=$request->safe_idnepolniySomon0s;
                             $addOnesp['naminal']= array_values($request->nominal0)[0];
                             $addOnesp['ed_id']=1;
                             $addOnesp['kol']=1;
                             $addOnesp['shkaf_id']=$request->shavingnepolniySomon0s;
                             $addOnesp['qator_id']=$request->qator_idnepolniySomon0s;
                             $addOnesp['cell_id']=$request->cellsnepolniySomon0s;
                             $addOnesp['cell_id']=$request->cellsnepolniySomon0s;
                             $addOnesp['host'] = $request->ip();
                             $addOnesp['date']= $request->date;
                             $addOnesp['priznak']= $request->priznak;
                             $addOnesp['type']= $request->farsuda;
                             $addOnesp['src']= $request->src;
                             $addOnesp['n_doc']= $request->ndoc;
                             $addOnesp['kode_oper']= $request->kode_oper;
                             $addOnesp['summa']=$request->summcou0;
                             $addOnesp['comment']= $request->comment;
                             $addOnesp['user_id']= $account['user_id'] =Auth::id();
                             $addOnesp['host'] = $request->ip();
                              echo "<pre>";
                             // print_r($addOnesp);
                              echo "</pre>";
                              FondMoney::create($addOnesp);
  }

             //3 somoni






    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     }
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
