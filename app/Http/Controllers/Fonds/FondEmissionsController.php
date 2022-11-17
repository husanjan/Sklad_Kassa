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

//
class FondEmissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


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
    public function create()
    {
        $safes = SprSafes::all();
        $sprEds = SprEds::all();
        $shkafs = SprShkafs::all();
        $sprCells= SprCells::all();
        $sprQators= SprQators::all();
//
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

      $sum_dist=100;
        $number = sprintf('%g',$request->nn);
      //$number = $request->nn;
         $edi_id= explode('|',$request->ed_id);
        //  var_dump($request->ed_id);
        //$number+$sum_dist;
          //id and type post
          // echo   $edi_id[0];//sum
          //  $edi_id[1];//id edin
          $request->request->remove('_token');
          $count_sum= $edi_id[0]*$request->kol;
          $edi= $count_sum/$sum_dist;
            for($i=1; $i<=$edi;$i++)
              {
                  if($i==1)
                  {
                  $emiss = $request->all();
                  $emiss['nn']=$number;
                  $emiss['ed_id']=3;//$edi_id[1]
                  $emiss['summa']=$sum_dist*$request->naminal;
                  $emiss['priznak']=1;

                  $emiss['user_id'] = Auth::id();
                  $emiss['host'] = $request->ip();
//                  print_r($emiss);
//
                     FondEmisions::create($emiss);
                    continue;
              }
                  $emis = $request->all();
                  $emis['nn']=$number+=$sum_dist;
                  $emis['ed_id']=3;//$edi_id[1]
                  $emis['summa']=$sum_dist*$request->naminal;
                  $emis['priznak']=1;
                  $emis['user_id'] = Auth::id();
                  $emis['host'] = $request->ip();
//                  echo "<pre>";
//                  print_r($emis);
//                  echo "</pre>";
                   FondEmisions::create($emis);
              }

        return redirect()->route('fondemission.index')->with('success','Эмиссионный фонд успешно создан!');


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
    public function edit($id)
    {
//        $qators = SprQators::find($id);
//
//        $shkaf = SprShkafs::all();
//         $safes = SprSafes::all();
//
//        return view('spr.sprqators.edit', compact('shkaf','safes','qators'));
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
