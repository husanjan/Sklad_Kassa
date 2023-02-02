<?php
 
namespace App\Http\Controllers\Fonds;
use Illuminate\Http\Request;
use App\Models\FondCoins;
use App\Models\SprSafes;
use App\Models\SprEds;
use App\Models\SprShkafs;
use App\Models\SprCells;
use App\Models\SprQators;
use App\Models\oborots_coin;
use App\Models\ostatki_safe;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repositories\RepositoryRashod;
class FondEmisionsTanga extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $RepositoryRashod;
    public function __construct(RepositoryRashod $RepositoryRashod)
    {
     
        $this->RepositoryRashod = $RepositoryRashod;
    }
    public function index()
    {
        //
        $arrayResult= $this->RepositoryRashod->AllSelectRashodTanga(0);
        $safes = SprSafes::all();
        $sprEds = SprEds::all();
        $shkafs = SprShkafs::all();
        $sprCells= SprCells::all();
        $sprQators= SprQators::all();
        $kodeOper= FondCoins::orderBy('kode_oper','DESC')->value('kode_oper');
        $kodeOper++;
        $kodeOperObort= oborots_coin::orderBy('kod_oper','DESC')->value('kod_oper');
            if($kodeOperObort<=0)
            {
            $kodeOperObort=1;
            }else{
            $kodeOperObort++;
            }
          return  view('fonds.fondemissionTanga.index',compact('arrayResult','safes','sprEds','shkafs','sprCells','sprQators','kodeOper','kodeOperObort'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $safes = SprSafes::all();
        $sprEds = SprEds::all();
        $shkafs = SprShkafs::all();
        $sprCells= SprCells::all();
        $sprQators= SprQators::all();
//         



                                $kodeOper= FondCoins::orderBy('kode_oper','DESC')->value('kode_oper');
                                $kodeOper++;
  
        return view('fonds.fondemissionTanga.create',compact('shkafs','safes','sprQators','sprCells','sprEds','kodeOper',));
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
        $this->validate($request, [
            'date' => 'required|date',
            'safe_id' => 'required',
            'shkaf_id' => 'required',
            'qator_id' => 'required',
            'cell_id' => 'required|integer',
            'naminal' => 'required|integer',
            'ed_id' => 'required',
            'kol' => 'required',
      

        ]);
        
           $sum_dist=1000;
          $edinCoutnt=1000;
          $summaOstatss=null;
           $All=($request->ed_id*$request->kol)/$edinCoutnt;
           $edi_id=$request->ed_id;
           $request->request->remove('_token');
           $ostatkiResult= ostatki_safe::select('summa')->where('naminal',$request->naminal)->where('cell_id',$request->cell_id)->where('priznak',0)->where('typeFond',1)->orderBy('id','desc')->limit(1)->get();
           if(empty($ostatkiResult)):
         $summaOstatss=json_decode($ostatkiResult,true)[0]['summa']; 
           endif;
     
          $accounts=8;
          $arrayOstat=[];
          $arrayOstat['date']=date("Y-m-d H:i:s");
          $arrayOstat['naminal']=$request->naminal;
          $arrayOstat['ed_id']=5;
          
          $arrayOstat['priznak']=0;
          $arrayOstat['safe_id']=$request->safe_id;
          $arrayOstat['shkaf_id']=$request->shkaf_id;
          $arrayOstat['qator_id']=$request->qator_id;
          $arrayOstat['cell_id']=$request->cell_id;
          $arrayOstat['summa']=($edi_id*$request->kol)*($request->naminal+$summaOstatss);
          $arrayOstat['comment']=$request->comment;
          $arrayOstat['typeFond']=1;
          $arrayOstat['user_id']=Auth::id();
          $arrayOstat['host']=$request->ip();

         
        
          DB::beginTransaction();
          try {
          ostatki_safe::create($arrayOstat);
           for($i=1;$i<=$All;$i++):
            
                if($i==1)
                {
                    $emiss = $request->all();
                  
                    $emiss['ed_id']=5;//$edi_id[1]
                    $emiss['summa']=$sum_dist*$request->naminal;
                    $emiss['priznak']=0;//prihod
                    $emiss['type']=$accounts; 
                    $emiss['src']=$accounts; 
                    $emiss['kode_oper']=1; 
                    $emiss['user_id'] = Auth::id();
                    $emiss['host'] = $request->ip();
           
  //
                 FondCoins::create($emiss);
                      echo "<pre>";
                      
                      print_r($emiss);
                      echo "</pre>";
                      continue;
                }
                $emis = $request->all();
             
                $emis['ed_id']=5;//$edi_id[1]
                $emis['type']=$accounts; 
                $emis['src']=$accounts; 
                $emis['kode_oper']=1; 
                $emis['summa']=$sum_dist*$request->naminal;
                $emis['priznak']=0;//prihod
                $emis['user_id'] = Auth::id();
                $emis['host'] = $request->ip();        
          
  
             FondCoins::create($emis);
        //   echo "<pre>";
                      
        //               print_r($emis);
        //    echo "</pre>";
      
        endfor;
        DB::commit();
            
      return redirect()->route('fondEmissionsTanga.index')->with('success','Эмиссионный фонд успешно создан!');
     } catch (\Exception $e) {
         DB::rollback();
         echo "Error";
  return redirect()->route('fondEmissionsTanga.index')->with('danger','Эмиссионный фонд  не успешно!');
     }  
       // 
 

   
      






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
