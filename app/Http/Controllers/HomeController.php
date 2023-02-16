<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Models\Oborot;
use App\Models\SprAccounts;
use App\Models\FondMoney;
use App\Models\SprBank;
use App\Models\SprEds;
use App\Models\SprSafes;
use App\Models\SprShkafs;
use App\Models\sprQators;
use App\Models\SprCells;
use App\Models\oborots_coin;
use App\Models\ostatki_safe;
use App\Repositories\InterfacesSomoni;
use App\Repositories\AddRequest;
use App\Repositories\RepositoryRashod;
use Illuminate\Support\Facades\DB;
use App\Models\FondCoins;
use App\Models\FondEmisions;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $blogRepository;
    private $addRepository;
    private $ArrayTable;
    private $RepositoryRashod;
 
    public function __construct(InterfacesSomoni $blogRepository,AddRequest $addRepository,RepositoryRashod $RepositoryRashod)
    {
        $this->middleware('auth');
        $this->blogRepository = $blogRepository;
        $this->addRepository = $addRepository;
        $this->RepositoryRashod = $RepositoryRashod;
    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
           $bik= SprBank::all();
           $sprEds= SprEds::all();
          $Oborot= new  Oborot();
          $OborotTanga= new  oborots_coin();
          $shkafs = SprShkafs::all();
          $FondMoneys= new  FondMoney();
          $FondMoneysTanga= new  FondCoins();
          $sprCells= SprCells::all();
          $sprQators= SprQators::all();
          $sprAccounts= SprAccounts::all();
           $kodeOper= $Oborot::orderBy('kod_oper','DESC')->value('kod_oper');

           $kodeOpero= Oborot::orderBy('kod_oper','DESC')->value('kod_oper');
           $kodeOperObort= Oborot::orderBy('kod_oper','DESC')->value('kod_oper');
         
           $kodeOperObortTanga= oborots_coin::orderBy('kod_oper','DESC')->value('kod_oper');
           if($kodeOperObort<=0)
           {
               $kodeOperObort=1;
           }else{
           $kodeOperObort++;
       }
       if($kodeOperObortTanga<=0)
       {
           $kodeOperObortTanga=1;
       }else{
       $kodeOperObortTanga++;
   }
             $response= $Oborot::orderBy('date','DESC')->paginate(5);

             $OborTanga= $OborotTanga::orderBy('date','DESC')->get()->groupBy('kod_oper');
             //Pul 
             $FondMoney= $FondMoneys::orderBy('date','DESC')->get()->groupBy('kode_oper');
             //Fond tanga
             $FondMoneyTang= $FondMoneysTanga::orderBy('date','DESC')->get()->groupBy('kode_oper');
             $kodOperf= FondMoney::orderBy('kode_oper','DESC')->value('kode_oper');
             $kodOperTanga= FondCoins::orderBy('kode_oper','DESC')->value('kode_oper');
             if($kodOperTanga<=0)
             {
                  $kodOperTanga=1;
             }else{
               $kodOperTanga++;
             }


             if($kodOperf<=0)
             {
              $kodOperf=1;
              }else{
               $kodOperf++;
                }
                $safes = SprSafes::all();
        if($kodeOpero<=0)
          {
               $kodeOpero=1;
          }else{
            $kodeOpero++;
          }
         
          
              //  dd($request->all());
              //  exit;
                   //  SelectRashodTanga($type,$priznak)
              $korshoyamRashod= $this->RepositoryRashod->SelectRashod(1,0);
              $farsudaRashod= $this->RepositoryRashod->SelectRashod(2,0);
              $botilshudaRas= $this->RepositoryRashod->SelectRashod(3,0);
              //tanga 
         
             $korshoyamTanga= $this->RepositoryRashod->SelectRashodTanga(1,0);
             $farsudaTanga= $this->RepositoryRashod->SelectRashodTanga(2,0);
             $botilshudaTanga= $this->RepositoryRashod->SelectRashodTanga(3,0);
            $sprAccounts= SprAccounts::all();
            if($request->ajax()) {
            
              return view('oborot.pagination',compact('bik','sprAccounts','kodeOper','response','FondMoney','kodOperf','kodeOpero','safes','sprEds','kodeOperObort','kodeOperObortTanga','kodOperTanga','OborTanga','FondMoneyTang'))->render();

          }
                return view('home',compact('botilshudaTanga','farsudaTanga','korshoyamTanga','bik','sprAccounts','sprQators','sprCells','kodeOper','shkafs','response','FondMoney','kodOperf','kodeOpero','safes','sprEds','kodeOperObort','kodeOperObortTanga','kodOperTanga','OborTanga','FondMoneyTang','korshoyamRashod','farsudaRashod','botilshudaRas'));
    }
    public function fetch_data()
    {
      $bik= SprBank::all();
      $sprAccounts= SprAccounts::all();
       $response = Oborot::orderBy('date','DESC')->paginate(2);
       return view('oborot.pagination', compact('response','bik','sprAccounts'))->render();
     
    }
    public function OborotTable(Request $request)
    {
            $count=1;
                  $Oborot= new  Oborot();
                $sprAccounts= SprAccounts::all();
                $bik= SprBank::all();
                $obor= $Oborot::where('date',  date("Y-m-d H:i:s", strtotime($request->date)))->get();
                $obor->where('kod_oper', $request->id);
              // echo "ss<pre>";
              // print_r(json_decode($obor,true));
              // echo "</pre>";
              //    exit;
                   $arr=0;
                   $arr1=0;
                   $arraynaminal=array();

                   $array_ids = [];
                   foreach(json_decode($obor,true) AS $obors)
                   {
                     
                  //= $mon['summa'];  
                    
                               $array_ids[$obors['nominal']][]=$obors['summa'];
                          
                   
                   
                   }
                 
                //  echo "<pre>";
                //  print_r(  $array_ids);
                //  echo "</pre>";
                //    exit;
                 foreach(json_decode($obor,true) as $oborots)
                 {
                     if($oborots['kod_oper']==$request->id)
                     {
                      if(!in_array($oborots['nominal'],$arraynaminal))
                      {
                         
      
                        $arraynaminal[]=$oborots['nominal'];
                    $arr1+=array_sum(array_unique($array_ids[$oborots['nominal']]));
                   
                     if($oborots['nominal']!='razne'){
                        echo   '<div class="row  offset-1 mt-2">  <div class="col-md-4  mt-2">
                        <div class="input-group">
                            <span class="input-group-text">Номинал '. $count.'</span>
                            <input   disabled   type="text"  value="'.$oborots['nominal'].'" class="form-control nomcou " aria-describedby="btnGroupAddon"    >
                         </div>
                         </div>';
                           echo   '<div class="col-md-4  mt-2">
                                    <div class="input-group">
                                     <span class="input-group-text">Сумма '. $count.'</span>
                                      <input   disabled   type="text"  value="'.array_sum(array_unique($array_ids[$oborots['nominal']])).'" class="form-control nomcou " aria-describedby="btnGroupAddon"    >

                                      </div>
                                       </div>
                                       </div>';
                     }

                     if($oborots['nominal']=='razne'){
                        echo   '<div class="row  offset-1 mt-2"> ';
                           echo   '<div class="col-md-4  mt-2">
                                    <div class="input-group">
                                     <span class="input-group-text">Сумма Разные</span>
                                      <input   disabled   type="text"  value="'.$oborots['summa'].'" class="form-control nomcou " aria-describedby="btnGroupAddon"    >

                                      </div>
                                       </div>
                                       </div>';
                     } 
                 
                                  $count++;

                    } //if array unique end 

                  }

                    }
                   '   <div class="row  offset-lg-7 mt-2 ">


                                       <div class="   ">
                                           <button type="button"   class="btn btn-light active" id="adds" disabled><div id="countsum">Сумма: <b>'.$arr1.'</b></div> </button>

                                       </div>
                                   </div>';




          
        }
        public  function FondTable(Request $request)
        {
           
          $FondMoneys= new  FondMoney();
           $SprEds=  SprEds::all();
          // $bik= SprBank::all();
            $money= $FondMoneys::where('kode_oper', $request->id)->get();
            $money->where('type', $request->id_type);
            $arraynominal = array();
            // echo "<pre>";
            // print_r(json_decode($money,true));
            // echo "</pre>";
           
            $sum = 0;
            $array_ids = [];
            foreach(json_decode($money,true) AS $mon)
            {
              
           //= $mon['summa'];  
              foreach( $SprEds As $spred)
              {
               
                       if($mon['ed_id']==$spred->id)
                       {
                        $array_ids[$mon['naminal']][]=$mon['naminal']*$spred['kol']*$mon['kol'];
                       }
                    
                       
              }
              if($mon['ed_id']==1)
              {
                $array_ids[$mon['naminal']][]=$mon['summa'];
              }
            
            }
            
              foreach(json_decode($money,true) AS $moneys)
              {
               
                 
         
           
                if(!in_array($moneys['naminal'],$arraynominal))
                {
            //       echo "<pre>";
        
            //  print_r($array_ids);
            // echo "</pre>";  
                  $sum+=array_sum($array_ids[$moneys['naminal']]);
              
                  $arraynominal[]=$moneys['naminal'];
                      
                  echo   '<div class="row  offset-1 mt-2">  <div class="col-md-4  mt-2">
                  <div class="input-group">
                      <span class="input-group-text">Номинал  </span>
                      <input   disabled   type="text"  value="'.$moneys['naminal'].'" class="form-control nomcou " aria-describedby="btnGroupAddon"    >
                   </div>
                   </div>';
                     echo   '<div class="col-md-4  mt-2">
                              <div class="input-group">
                            
                                <input   disabled   type="text"  value="'.array_sum($array_ids[$moneys['naminal']]).'" class="form-control nomcou " aria-describedby="btnGroupAddon"    >
   
                                </div>
                                 </div>
                                 </div>';
                                 
                }
              
            

         }
         echo '   <div class="row  offset-lg-7 mt-2 ">


         <div class="   ">
             <button type="button"   class="btn btn-light active" id="adds" disabled><div id="countsum">Сумма: <b>'.$sum.'</b></div> </button>

         </div>
     </div>';
}
public function oborotInsert(Request $request)
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

     $arr= $this->blogRepository->OborotInserttoOborot($request);
      $inf=$this->blogRepository->Tableoborot;
    //Oborot::create($inf);
      // echo "<pre>";
      // print_r($inf);
      // echo "</pre>";
   
    return redirect()->route('home')->with('success','Счет успешно создан!');
}
public function FondInsert(Request $request)
{
  DB::beginTransaction();
  $oborots =  $this->addRepository->addRequestsOborot($request,1);
                
  $money= $this->addRepository->addRequests($request);
  // echo "<pre>";
  // print_r($money);
  // echo "</pre>";
  // echo "<pre>";
  // print_r($money);
  // echo "</pre>";
  if(is_array($oborots) AND is_array($money) AND $request->src==4)
  {
    $detailsFond = $this->addRepository->Fondostatki($money,'cell_id');
    
    $arrayResult= $this->RepositoryRashod->InsertRashod($detailsFond,0);
     
     try{
        foreach ($money as $key => $value) {
            # code...
        FondMoney::create($money[$key]);
        Oborot::create($oborots[$key]);
    }
        DB::Commit();
     
    return redirect()->route('home')->with('success','Фарсуда фонд успешно создан!');
      } catch (\Illuminate\Database\QueryException $e) {
        DB::rollback();
        return response(['message'=>'FAILURE'], 500);
        return redirect()->route('home')->with('danger','Фарсуда фонд  не успешно!');
      }
    
    //  return response(['message'=>'Not inserted Fond money table and oborots table'], 500);                    
  
  }

  if(is_array($money) AND $request->src==2)
  {
    $detailsFond = $this->addRepository->Fondostatki($money,'cell_id');
    $arrayResult= $this->RepositoryRashod->InsertRashod($detailsFond,0);
     
     try{
        foreach ($money as $key => $value) {
            # code...
        FondMoney::create($money[$key]);
        DB::Commit();
        
    }
        
     
    return redirect()->route('home')->with('success','Фарсуда фонд успешно создан!');
      } catch (\Illuminate\Database\QueryException $e) {
        DB::rollback();
        return response(['message'=>'FAILURE'], 500);
      return redirect()->route('home')->with('danger','Фарсуда фонд  не успешно!');
      }
    
       return response(['message'=>'Not inserted Fond money table and oborots table'], 500);                    
  
  }

}



   //tanga function 
   public function OborotTangaTable(Request $request)
    {
            $count=1;
                  // $Oborot= new  Oborot();
                  $Oborot= new  oborots_coin();
                  $sprAccounts= SprAccounts::all();
                  $bik= SprBank::all();
                $obor= $Oborot::where('kod_oper',$request->id)->get();
                // $obor= $Oborot::where('date',  date("Y-m-d H:i:s", strtotime($request->date)))->get();
                $obor->where('kod_oper', $request->id);
              // echo "ss<pre>";
              // print_r(json_decode($obor,true));
              // echo "</pre>";
              //    exit;
                   $arr=0;
                   $arr1=0;
                   $arraynaminal=array();

                   $array_ids=[];
                   foreach(json_decode($obor,true) AS $obors)
                   {
                     
                  //= $mon['summa'];  
                    
                               $array_ids[$obors['naminal']][]=$obors['summa'];
                               
                   
                   
                   }
                 
                //  echo "<pre>";
                //  print_r(  $array_ids);
                //  echo "</pre>";
                //    exit;
                $sumAll=0;
                foreach($array_ids AS $array_id=>$val)
                {
                // echo  "<br>".$array_id;
                    $sum=0;
                    // echo $val;
                    foreach($val AS $value)
                    {
                     $sum+=$value;
                      
                    }
                    $sumAll+=$sum;
                    if($array_id!='razne'){
                      // echo  "<br>".$sum;
                      echo   '<div class="row  offset-1 mt-2">  <div class="col-md-4  mt-2">
                      <div class="input-group">
                          <span class="input-group-text">Номинал  </span>
                          <input   disabled   type="text"  value="'.$array_id.'" class="form-control nomcou " aria-describedby="btnGroupAddon"    >
                       </div>
                       </div>';
                         echo   '<div class="col-md-4  mt-2">
                                  <div class="input-group">
                                   <span class="input-group-text">Сумма  </span>
                                    <input   disabled   type="text"  value="'.$sum.'" class="form-control nomcou " aria-describedby="btnGroupAddon"    >

                                    </div>
                                     </div>
                                     </div>';
                    }
                    if($array_id=='razne'){
                      echo   '<div class="row  offset-1 mt-2">  <div class="col-md-4  mt-2">
                      <div class="input-group">
                          <span class="input-group-text">Номинал  </span>
                          <input   disabled   type="text"  value="Разные" class="form-control nomcou " aria-describedby="btnGroupAddon"    >
                       </div>
                       </div>';
                         echo   '<div class="col-md-4  mt-2">
                                  <div class="input-group">
                                   <span class="input-group-text">Сумма  </span>
                                    <input   disabled   type="text"  value="'.$sum.'" class="form-control nomcou " aria-describedby="btnGroupAddon"    >

                                    </div>
                                     </div>
                                     </div>';
                    }
            
                }
                echo '   <div class="row  offset-lg-7 mt-2 ">


                 
                <button type="button"   class="btn btn-light active" id="adds" disabled><div id="countsum">Сумма: <b>'.$sumAll.'</b></div> </button>

           
        </div>';
               




          
        }


//Fond function ajax Tanga 
public  function FondTableTanga(Request $request)
{
   
  $FondMoneys= new  FondCoins();
   $SprEds=  SprEds::all();
  // $bik= SprBank::all();
    $money= $FondMoneys::where('kode_oper', $request->id)->get();
    $money->where('type', $request->id_type);
    $arraynominal = array();
    // echo "<pre>";
    // print_r(json_decode($money,true));
    // echo "</pre>";
   
    $sum = 0;
    $array_ids = [];
    foreach(json_decode($money,true) AS $mon)
    {
      
   //= $mon['summa'];  
      foreach( $SprEds As $spred)
      {
       
               if($mon['ed_id']==$spred->id)
               {
                $array_ids[$mon['naminal']][]=$mon['naminal']*$spred['kol']*$mon['kol'];
               }
            
               
      }
      if($mon['ed_id']==1)
      {
        $array_ids[$mon['naminal']][]=$mon['summa'];
      }
    
    }
    
      foreach(json_decode($money,true) AS $moneys)
      {
       
         
 
   
        if(!in_array($moneys['naminal'],$arraynominal))
        {
    //       echo "<pre>";

    //  print_r($array_ids);
    // echo "</pre>";  
          $sum+=array_sum($array_ids[$moneys['naminal']]);
      
          $arraynominal[]=$moneys['naminal'];
          if($moneys['naminal']!='razne'){
          echo   '<div class="row  offset-1 mt-2">  <div class="col-md-4  mt-2">
          <div class="input-group">
              <span class="input-group-text">Номинал  </span>
              <input   disabled   type="text"  value="'.$moneys['naminal'].'" class="form-control nomcou " aria-describedby="btnGroupAddon"    >
           </div>
           </div>';
             echo   '<div class="col-md-4  mt-2">
                      <div class="input-group">
                    
                        <input   disabled   type="text"  value="'.array_sum($array_ids[$moneys['naminal']]).'" class="form-control nomcou " aria-describedby="btnGroupAddon"    >

                        </div>
                         </div>
                         </div>';
          }
          if($moneys['naminal']=='razne'){
            echo   '<div class="row  offset-1 mt-2">  <div class="col-md-4  mt-2">
            <div class="input-group">
                <span class="input-group-text">Номинал  </span>
                <input   disabled   type="text"  value="Разные" class="form-control nomcou " aria-describedby="btnGroupAddon"    >
             </div>
             </div>';
               echo   '<div class="col-md-4  mt-2">
                        <div class="input-group">
                      
                          <input   disabled   type="text"  value="'.array_sum($array_ids[$moneys['naminal']]).'" class="form-control nomcou " aria-describedby="btnGroupAddon"    >
  
                          </div>
                           </div>
                           </div>';
            }              
        }
      
    

 }
 echo '   <div class="row  offset-lg-7 mt-2 ">


 <div class="   ">
     <button type="button"   class="btn btn-light active" id="adds" disabled><div id="countsum">Сумма: <b>'.$sum.'</b></div> </button>

 </div>
</div>';
}



public function oborotInsertTanga(Request $request)
{
    // dd( $request->all());

     $this->addRepository->AddInsertOborotTanga($request);
     return redirect()->route('home')->with('success','Оборот Танга  успешно создан!');
}
public function InsertTanga(Request $request)
{
                //   dd($request->all());
       DB::beginTransaction();
       $oborots = $this->addRepository->ModaladdRequestsOborottanga($request,$request->farsuda);
        $money= $this->addRepository->ModaladdRequestsTanga($request);
       // oborots_coin::create($oborots[0]);
        // echo "<pre>";
        // print_r($money);
        // echo "</pre>";
        // exit;
        // echo $request->src;
         
        if(is_array($money) AND is_array($oborots) AND $request->src==4)
          {
            $detailsFond = $this->addRepository->Fondostatki($money,'cell_id');
    
         $arrayResult= $this->RepositoryRashod->InsertRashod($detailsFond,1);
             
             try{
                foreach ($money as $key => $value) {
                    # code...
             
                FondCoins::create($money[$key]);
                oborots_coin::create($oborots[$key]);
            }
                DB::Commit();
             
             return redirect()->route('home')->with('success','Фарсуда фонд успешно создан!');
              } catch (\Illuminate\Database\QueryException $e) {
                DB::rollback();
               return response(['message'=>'FAILURE'], 500);
               return redirect()->route('home')->with('danger','Фарсуда фонд  не успешно!');
              }
            
             // return response(['message'=>'Not inserted Fond money table and oborots table'], 500);                    
          
          }
          //korshoyam 
        
          if(is_array($money) AND $request->src==2)
           {
            $detailsFond = $this->addRepository->Fondostatki($money,'cell_id');
            $arrayResult= $this->RepositoryRashod->InsertRashod($detailsFond,1);
            try{
                foreach ($money as $key => $value) {
                    FondCoins::create($money[$key]);
            }
                DB::Commit();
                  response(['message'=>'ALL farsuda_tanga'], 200);
             return redirect()->route('home')->with('success','Фарсуда Ба оборот рафт фонд успешно создан!');
              } catch (\Illuminate\Database\QueryException $e) {
                DB::rollback();
               
             return redirect()->route('home')->with('danger','Фарсуда фонд   не успешно!');
              }
            }
          }



      public function emissionAjaxR(Request $request)   
      {


        $sum_dist=1000;
        $count=$request->edin*$request->count/$sum_dist;
         $number= $request->number;
         $array=[];
     for($i=1; $i<=$count;$i++)
     {
          if($i==1)
             {
              $array[]= $num=$number;
                ///  $FondEmisions= FondEmisions::where('naminal',$request->naminal)->where('serial',  $request->serial)->where('nn',  $request->number)->where('priznak',0)->get();
             }else{
              $array[]= $num=$number+=$sum_dist;
             }
  }
  $validate=[];
      // echo max($array);
      //    exit;
      $FondEmisions= FondEmisions::where('naminal',$request->naminal)->where('serial',$request->serial)->whereIn('nn',$array)->get();
         
          $validateCell=[];
          $validateSumma=[];
          //  echo   $FondEmisions->max('nn');
          //     exit;
        foreach($FondEmisions AS   $FondEmision)
        {
             if(max($array)<=$FondEmisions->max('nn'))
             {

            
              if($FondEmision['priznak']==1)
              {
            
              // echo "<bt>".$FondEmision['nn'];
               $validate[]=$FondEmision['nn'];
     
              }
              if($FondEmision['priznak']==0)
              {
            
              // echo "<bt>".$FondEmision['nn'];
               $validateCell[]=$FondEmision['cell_id'];
               $validateSumma[]=$FondEmision['summa'];
              }
            continue;
            }  
    }
    $validateCellunique = array_unique($validateCell);
 
       $ostatkiResult= ostatki_safe::select('cell_id','id','safe_id','shkaf_id','qator_id','ed_id','naminal','summa','typeFond')->where('naminal',$request->naminal)->whereIn('cell_id',$validateCellunique)->where('priznak',0)->where('typeFond',0)->orderBy('id','desc')->limit(1)->get();
   
       if(count($validate)<1)
       {
          foreach($ostatkiResult AS $ostatkiResults)
             {
               if(array_sum($validateSumma)<=$ostatkiResults['summa'] && in_array($ostatkiResults['cell_id'],$validateCellunique))
               {
                return 1;
               }
             }
             echo '<div class="toast  offset-md-9 position-fixed bottom-20 fade show" >
             <div class="toast fade mx-auto toast-danger toast-fixed show" id="basic-danger-example" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="true" data-mdb-delay="2000" data-mdb-position="top-right" data-mdb-append-to-body="true" data-mdb-stacking="true" data-mdb-width="350px" data-mdb-color="danger" style="width: 350px; display: block; top: 10px; right: 10px; bottom: unset; left: unset; transform: unset;">
                 <div class="toast-header toast-danger bg-danger">
                 
                     <strong class="me-auto ">ХАТО</strong>
         
         
                 </div>
                 <div class="toast-body ">Турги дароред!!</div>
                 
             </div>';
             return;
          }
     
   
       
      // return;
      echo '<div class="toast offset-md-9 fade show position-fixed bottom-20" aria-live="assertive" aria-atomic="true" >
      <div class="  fade mx-auto toast-danger toast-fixed show" id="basic-danger-example" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="true" data-mdb-delay="2000" data-mdb-position="top-right" data-mdb-append-to-body="true" data-mdb-stacking="true" data-mdb-width="350px" data-mdb-color="danger" style="width: 350px; display: block; top: 10px; right: 10px; bottom: unset; left: unset; transform: unset;">
          <div class="toast-header toast-danger bg-danger">
              <strong class="me-auto ">ХАТО</strong>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div> <center><b>Ин номерхо расход шудааст!!</b><div class="toast-body" style="margin-top:-20px"><b>';
   
    foreach($validate As $validates):
      echo  '<br><label>'.$request->serial.' '.$validates.'</label>';
    endforeach;
    
          
    echo   '</b></div></center></div>';
    return;

      }


}