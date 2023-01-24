<?php

namespace App\Http\Controllers\Fonds;

use App\Http\Controllers\Controller;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\SprSafes;
use App\Models\SprShkafs;
use App\Models\SprCells;
use App\Models\SprQators;
use App\Models\SprEds;
use App\Models\FondEmisions;
use App\Models\ostatki_safe;
use Illuminate\Support\Facades\DB;
class FondEmissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // dd($ostatkiResult);
            $safes = SprSafes::all();
        $sprEds = SprEds::all();
        $shkafs = SprShkafs::all();
        $sprCells= SprCells::all();
        $sprQators= SprQators::all();
         $FondEmisions = FondEmisions::orderBy('date','DESC')->paginate(50);
         if($request->has('download'))
         {
             $pdf=Pdf::loadView('fonds.fondsemission.index',compact('safes','sprEds','shkafs','sprCells','FondEmisions','sprQators'));
             return $pdf->download('invoice.pdf');

         }
          return  view('fonds.fondsemission.index',compact('safes','sprEds','shkafs','sprCells','FondEmisions','sprQators'));
       // return view('spr.sprqators.index', compact('qators', 'shkafs', 'safes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    //    echo $request->id;
        $safes = SprSafes::all();
        $sprEds = SprEds::all();
        $shkafs = SprShkafs::all();
        $sprCells= SprCells::all();
        $sprQators= SprQators::all();
//
    if($request->id==1):
        return view('fonds.fondsemission.createRashod',compact('shkafs','safes','sprQators','sprCells','sprEds'));
        return;
    endif;   
  return view('fonds.fondsemission.create',compact('shkafs','safes','sprQators','sprCells','sprEds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ini_set('max_execution_time',300);
        $this->validate($request, [
            'date' => 'required|date',
            'safe_id' => 'required',
            'shkaf_id' => 'required',
            'qator_id' => 'required',
            'cell_id' => 'required|integer',
            'naminal' => 'required|integer',
            'nn' => 'required|min:7|max:7',
            'ed_id' => 'required',
            'kol' => 'required',
            'serial' => 'required|min:2|max:2',

        ]);

      $sum_dist=1000;
        $number = sprintf('%g',$request->nn);
      //$number = $request->nn;
        //  $edi_id= explode('|',$request->ed_id);
         $edi_id=$request->ed_id;
        //  var_dump($request->ed_id);
        //$number+$sum_dist;
          //id and type post
          // echo   $edi_id[0];//sum
          //  $edi_id[1];//id edin
         
       //    dd($request->all());
       $summaOstatss=null;
       
       $ostatkiResult= ostatki_safe::select('summa')->where('naminal',$request->naminal)->where('cell_id',$request->cell_id)->where('priznak',0)->where('typeFond',0)->orderBy('id','desc')->limit(1)->get();
         if(empty($ostatkiResult)):
       $summaOstatss=json_decode($ostatkiResult,true)[0]['summa']; 
         endif;

    //    print_r($summaOstatss);
    //     exit;
    // echo $request->kol;
          $request->request->remove('_token');
          $count_sum= $edi_id*$request->kol;
          $edi=$count_sum/$sum_dist;
          $arrayOstat=[];
               $arrayOstat['date']=date("Y-m-d H:i:s");
               $arrayOstat['naminal']=$request->naminal;
               $arrayOstat['ed_id']=2;
               $arrayOstat['priznak']=0;
               $arrayOstat['safe_id']=$request->safe_id;
               $arrayOstat['shkaf_id']=$request->shkaf_id;
               $arrayOstat['qator_id']=$request->qator_id;
               $arrayOstat['cell_id']=$request->cell_id;
               $arrayOstat['summa']=($edi_id*$request->kol)*($request->naminal+$summaOstatss);
               $arrayOstat['comment']=$request->comment;
               $arrayOstat['typeFond']=0;
               $arrayOstat['user_id']=Auth::id();
               $arrayOstat['host']=$request->ip();
           //  $ost=ostatki_safe::create($arrayOstat);
            // echo "<pre>";
            // print_r($arrayOstat);
            // echo "</pre>";
            // exit;
            DB::beginTransaction();
            try {
                ostatki_safe::create($arrayOstat);
                for($i=1; $i<=$edi;$i++)
                {
                    if($i==1)
                    {
                    $emiss = $request->all();
                    $emiss['nn']=$number;
                    $emiss['ed_id']=2;//$edi_id[1]
                    $emiss['summa']=$sum_dist*$request->naminal;
                    $emiss['priznak']=0;//prihod
  
                    $emiss['user_id'] = Auth::id();
                    $emiss['host'] = $request->ip();
           
  //
                       FondEmisions::create($emiss);
                      continue;
                }
                    $emis = $request->all();
                    $emis['nn']=$number+=$sum_dist;
                    $emis['ed_id']=2;//$edi_id[1]
                    $emis['summa']=$sum_dist*$request->naminal;
                    $emis['priznak']=0;//prihod
                    $emis['user_id'] = Auth::id();
                    $emis['host'] = $request->ip();
                //    echo "<pre>";
                //    print_r($emis);
                //    echo "</pre>";
                 FondEmisions::create($emis);
                }
            
                DB::commit();
            
               return redirect()->route('fondemission.index')->with('success','Эмиссионный фонд успешно создан!');
            } catch (\Exception $e) {
                DB::rollback();
                echo "Error";
         return redirect()->route('fondemission.index')->with('danger','Эмиссионный фонд  не успешно!');
            }
            exit;
           
              
           
       


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
        $safes = SprSafes::all();
        $sprEds = SprEds::all();
        $shkafs = SprShkafs::all();
        $sprCells= SprCells::all();
        $sprQators= SprQators::all();
        $FondEmisions = FondEmisions::orderBy('date','DESC')->paginate(50);


            $pdf=Pdf::loadView('fonds.fondsemission.pdfFile',compact('safes','sprEds','shkafs','sprCells','FondEmisions','sprQators'))->setPaper('a4','portrait');

              return $pdf->stream();
           //return $pdf->download('invoice.pdf');

//         return  view('fonds.fondsemission.pdfFile',compact('safes','sprEds','shkafs','sprCells','FondEmisions','sprQators'));


//        $dompdf=new Dompdf();
//        $dompdf->loadHtml('Hello World');
//        $dompdf->setPaper('A4','Hello World');
//        $dompdf->render();
//        $dompdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        DB::beginTransaction();
        $this->validate($request, [
           
            'naminal' => 'required',
            'Serial' => 'required',
            'Nomer' => 'required|digits_between:7,7',
        ]);
       
        $request->request->remove('_token');
    // dd($request->all());
        $sum_dist=1000;
        //$edin=20000;
        if($request->ed_id==2)
        {
            $edin=1000;
        }
        if($request->ed_id==3)
        {
            $edin=20000;
        }
        $count= $edin*$request->count/$sum_dist;
        //    echo   "<br>".$edin;
  
        // $number= $request->number;
        $array=[];
  
       $number= $request->Nomer;
        $account=[];
       $account = $request->comment;
                   $request->count;
                  $request->Nomer;
                  for($i=1; $i<=$count;$i++)
                  {
                       if($i==1)
                          {
                           $array[]=$number;
                             ///  $FondEmisions= FondEmisions::where('naminal',$request->naminal)->where('serial',  $request->serial)->where('nn',  $request->number)->where('priznak',0)->get();
                          }else{
                           $array[]=$number+=$sum_dist;
                          }
               }
  
            // max($array);
                 $validateCell=[];
                $validateSumma=[];
                $validateNomer=[];
                $safe_id=[];
                $shkaf_id=[];
                $qator_id=[];
                $ed_id=[];
              
               $FondEmisions= FondEmisions::where('naminal',$request->naminal)->where('serial',$request->Serial)->whereIn('nn',$array)->where('priznak',0)->get();
               foreach($FondEmisions AS   $FondEmision)
               {
                
                   if(max($array)<=$FondEmisions->max('nn'))
                   {
  
                    if($FondEmision['priznak']==0)
                    {
                  
                    // echo "<bt>".$FondEmision['nn'];
                     $ed_id[]=$FondEmision['ed_id'];
                    $validateSumma[]=$FondEmision['summa'];
                     $safe_id[]=$FondEmision['safe_id'];
                     $shkaf_id[]=$FondEmision['shkaf_id'];
                     $qator_id[]=$FondEmision['qator_id'];
                     $validateCell[]=$FondEmision['cell_id'];
                    //  $validateCell[]=$FondEmision['cell_id'];
                  
                     $validateNomer[]=$FondEmision['nn'];
                    }
                  continue;
                
                   }
                }
                $validateCellunique = array_unique($validateCell);
                $safe_id = array_unique($safe_id);
                $shkaf_id = array_unique($shkaf_id);
                $qator_id = array_unique($qator_id);
                $ed_id = array_unique($ed_id);
      
    $ostatki_safe = new ostatki_safe;
    $ostatkiResult= $ostatki_safe::select('cell_id','id','safe_id','shkaf_id','qator_id','ed_id','naminal','summa','typeFond')->where('naminal',$request->naminal)->whereIn('cell_id',$validateCellunique)->where('priznak',0)->where('typeFond',0)->orderBy('id','desc')->limit(1)->get();

    try {
    foreach($ostatkiResult AS $ostatkiResults)
    {
      if(array_sum($validateSumma)<=$ostatkiResults['summa'] && in_array($ostatkiResults['cell_id'],$validateCellunique))
      {
      
         $ostatki_safe->date = date("Y-m-d H:i:s");
         $ostatki_safe->naminal=$request->naminal;
         $ostatki_safe->ed_id=array_unique($safe_id)[0];
         $ostatki_safe->priznak =0;
         $ostatki_safe->summa=$ostatkiResults['summa']-array_sum($validateSumma);;
         $ostatki_safe->safe_id=array_unique($safe_id)[0];
         $ostatki_safe->shkaf_id=array_unique($shkaf_id)[0];
         $ostatki_safe->qator_id=array_unique($shkaf_id)[0];
         $ostatki_safe->cell_id=array_unique($validateCell)[0];
         $ostatki_safe->comment=$request->comment;
         $ostatki_safe->typeFond=0;
         $ostatki_safe->user_id=Auth::id();
         $ostatki_safe->host=$request->ip();
        $ostatki_safe->save();
        FondEmisions::whereIn('nn',$validateNomer)->where('serial',$request->Serial)->update(['priznak'=>1]);
      }
    }
    DB::commit();
    // all good
      echo "hi";

   return redirect()->route('fondemission.index')->with('success','Эмиссионный фонд успешно!');
} catch (\Exception $e) {
    DB::rollback();
    echo "error";
    // something went wrong
   return redirect()->route('fondemission.index')->with('danger','Эмиссионный фонд не успешно!');
}
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requesssst
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
                              
//        $this->validate($request, [
//            'safe_id' => 'required|integer|min:1',
//            'shkaf_id' => 'required|integer|min:1',
//            'qator' => 'required|integer|min:1',
//        ]);
//
//        $qator = SprQators::find($id);
//
//        $qator->safe_id = $request->safe_id;
//        $qator->shkaf_id = $request->shkaf_id;
//        $qator->qator = $request->qator;
//        $qator->comment = $request->comment;
//        $qator->save();
//
//        return redirect()->route('sprqators.index')
//            ->with('success', 'Запись о ряде был изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FondEmisions::find($id)->delete();
        return redirect()->route('fondemission.index')
            ->with('success','Эмиссионный фонд удалена!');
//    }
//    public function shkafTable(Request $request)
//    {
//        //Post запрос ajax ответ
//
//             return SprShkafs::all()->where('safe_id',$request->id);
//
//
    }



     }
