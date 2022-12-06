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
use App\Models\oborots_coin;
use App\Repositories\InterfacesSomoni;
use App\Repositories\AddRequest;
use Illuminate\Support\Facades\DB;
use App\Models\FondCoins;
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
    
    public function __construct(InterfacesSomoni $blogRepository,AddRequest $addRepository)
    {
        $this->middleware('auth');
        $this->blogRepository = $blogRepository;
        $this->addRepository = $addRepository;
    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

           $bik= SprBank::all();
           $sprEds= SprEds::all();
          $Oborot= new  Oborot();
          $OborotTanga= new  oborots_coin();
          $FondMoneys= new  FondMoney();
          $FondMoneysTanga= new  FondCoins();
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
             $response= $Oborot::orderBy('date','DESC')->get()->groupBy('kod_oper');
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
         
       


            $sprAccounts= SprAccounts::all();

                return view('home',compact('bik','sprAccounts','kodeOper','response','FondMoney','kodOperf','kodeOpero','safes','sprEds','kodeOperObort','kodeOperObortTanga','kodOperTanga','OborTanga','FondMoneyTang'));
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
                 echo '   <div class="row  offset-lg-7 mt-2 ">


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
  if(is_array($oborots) AND is_array($money) AND $request->src==7)
  {
    
     
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

  if(is_array($money) AND $request->src==2 || $request->src==3)
  {
    
     
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
                $obor= $Oborot::where('kod_oper',   $request->id)->get();
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
        // echo $request->src;
         
        if(is_array($money) AND is_array($oborots) AND $request->src==7)
          {
            
             
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
          if(is_array($money) AND $request->src==2 || $request->src==3 || $request->src==1)
           {
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


}