<?php 

namespace App\Repositories;
use Illuminate\Support\Facades\Auth;
use App\Repositories\InterfacesSomoni;
use App\Models\ostatki_safe;
use App\Models\Oborot;
use App\Models\FondMoney;
use App\Models\FondCoins;
use App\Models\oborots_coin;
class RepositoryRashod{

    private $blogRepository;
    public  $arr=[];
    public function __construct(InterfacesSomoni $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }
    public function SelectRashod($type,$priznak)
    {
      $ostatki= ostatki_safe::distinct('cell_id')->select('cell_id','safe_id','shkaf_id','qator_id')->where('type',$type)->where('priznak',$priznak)->get();
      $arrayResult=[];
      // echo "<pre>";
      // print_r(json_decode($ostatki,true));
      // echo "</pre>";         
      // exit;  
     
      foreach($ostatki AS $ostatks)
      {
          $ostatkNominalDistinct= ostatki_safe::select('naminal')->where('cell_id', $ostatks['cell_id'])->groupBy('naminal')->get();
          // echo "<pre>";
          // print_r(json_decode($ostatkNominalDistinct,true));
          // echo "</pre>"; 
          foreach($ostatkNominalDistinct AS $distinctNaminal):
          

             $ostatkiResult= ostatki_safe::select('cell_id','id','safe_id','shkaf_id','qator_id','ed_id','naminal','summa')->where('naminal',$distinctNaminal['naminal'])->where('cell_id',$ostatks['cell_id'])->where('type',$type)->where('priznak',$priznak)->where('typeFond',0)->orderBy('id','desc')->limit(1)->get();

   
         foreach( $ostatkiResult AS  $ostatkiResults):
          $arrayResult[]=$ostatkiResults;
    
           
           endforeach;
      endforeach;
        
      }
      
      return  $arrayResult = array_map("unserialize", array_unique(array_map("serialize", $arrayResult)));
    }
 
    public function SelectRashodTanga($type,$priznak)
    {
      $ostatki= ostatki_safe::distinct('cell_id')->select('cell_id','safe_id','shkaf_id','qator_id')->where('type',$type)->where('priznak',$priznak)->get();
      $arrayResult=[];
      // echo "<pre>";
      // print_r(json_decode($ostatki,true));
      // echo "</pre>";         
      // exit;  
     
      foreach($ostatki AS $ostatks)
      {
          $ostatkNominalDistinct= ostatki_safe::select('naminal')->where('cell_id', $ostatks['cell_id'])->groupBy('naminal')->get();
          // echo "<pre>";
          // print_r(json_decode($ostatkNominalDistinct,true));
          // echo "</pre>"; 
          foreach($ostatkNominalDistinct AS $distinctNaminal):
          

             $ostatkiResult= ostatki_safe::select('cell_id','id','safe_id','shkaf_id','qator_id','ed_id','naminal','summa')->where('naminal',$distinctNaminal['naminal'])->where('cell_id',$ostatks['cell_id'])->where('type',$type)->where('priznak',$priznak)->where('typeFond',1)->orderBy('id','desc')->limit(1)->get();

   
         foreach( $ostatkiResult AS  $ostatkiResults):
          $arrayResult[]=$ostatkiResults;
    
           
           endforeach;
      endforeach;
        
      }
      
      return  $arrayResult = array_map("unserialize", array_unique(array_map("serialize", $arrayResult)));
    }
    public function InsertRashod($detailsFond,$typeFond)
    {

      foreach($detailsFond AS $detailFonds)
      {
         $detailFondsRazne=$detailFonds;
         // echo "<pre>";
         // print_r($detailFonds);
         // echo "</pre>";
         foreach($detailFonds As $keys=>$detals)
         {
             //prihod query
             if($detailFonds[$keys]['priznak']==0)
             {

                 unset($detailFonds[$keys]['kol']);
                 unset($detailFonds[$keys]['n_doc']);
                 unset($detailFonds[$keys]['kode_oper']);
                 $detailFonds[$keys]['typeFond']=$typeFond;
                 $ostatki= ostatki_safe::where('naminal', $detailFonds[$keys]['naminal'])->where('cell_id',  $detailFonds[$keys]['cell_id'])->where('priznak',  $detailFonds[$keys]['priznak'])->orderBy('id','desc')->limit(1)->get();
                  "<br>".$detailFonds[$keys]['naminal']; 
                  "<br>".$detailFonds[$keys]['summa']; 
                  foreach($ostatki as $ostatkey => $ostatks) {
                     # code...
                     $detailFonds[$keys]['summa']+=$ostatks['summa'];
                   
                  }
                  echo "<pre>";
                  print_r($detailFonds[$keys]);
                  echo "</pre>";
                ostatki_safe::create($detailFonds[$keys]);
             }
             if($detailFondsRazne[$keys]['naminal']=='razne')
             {
                 unset($detailFondsRazne[$keys]['kol']);
                 unset($detailFondsRazne[$keys]['n_doc']);
                 unset($detailFondsRazne[$keys]['kode_oper']);
                 $detailFondsRazne[$keys]['typeFond']=$typeFond;
                 $ostatkiraz= ostatki_safe::where('naminal','razne')->where('cell_id',$detailFondsRazne[$keys]['cell_id'])->where('priznak',  $detailFondsRazne[$keys]['priznak'])->orderBy('id','desc')->limit(1)->get();
                 foreach($ostatkiraz as $ostatkeyr => $ostatksr) {
                     # code...
                     $detailFondsRazne[$keys]['summa']+=$ostatksr['summa'];
                   
                  }
                ostatki_safe::create($detailFondsRazne[$keys]);
             }
         }
       // print_r($detals);
      return true;
        
  }
    } //End Insert Prihod to ostatki
    //Rashod insert ostatki
    public function InsertRashodKorshoyamToOstatki($request)
    {
      foreach($request['id'] AS $input)
      {
          // print_r($input);
          // exit;
                  if($request['Summarashod'.$input][0]>0)
                  {
                      // FondMoney::create($money[$key]);
                      // Oborot::create($oborots[$key]);
                   //fond insert
                  $FondMoney = new FondMoney;
                  $FondMoney->date=$request['date'];
                  $FondMoney->comment=$request['comment'];
                  $FondMoney->priznak=$request['priznak'];
                  $FondMoney->type=1;
                  $FondMoney->src=$request['src'];
                  $FondMoney->naminal=$request['naminal'.$input];
                  $FondMoney->ed_id=2; 
                  $FondMoney->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                  $FondMoney->summa  = $request['Summarashod'.$input][0];   
                  $FondMoney->safe_id= $request['safe'.$input];   
                  $FondMoney->shkaf_id=$request['shkaf'.$input];   
                  $FondMoney->qator_id=$request['sprQator'.$input];   
                  $FondMoney->cell_id = $request['sprCell'.$input];   
                  $FondMoney->kode_oper= $request['kode_operRashod'];   
                  $FondMoney->n_doc= $request['ndoc'];   
                  $FondMoney->host = $request->ip();   
                  $FondMoney->user_id = Auth::id();   
                  $FondMoney->save();
                  //Oborot insert
                  $Oborot = new Oborot;
               
                  $Oborot->kod_oper= $request['kode_oper_oborRashod'];   
                  $Oborot->nominal=$request['naminal'.$input];
                  $Oborot->summa  = $request['Summarashod'.$input][0];   
                  $Oborot->priznak=$request['priznak'];
                  // $Oborot->type=1;
                  $Oborot->account_id_out=1;//korshoyam id
                  $Oborot->account_id_in=$request['src'];//istochnik oborot id
                  $Oborot->user_id = Auth::id();   
                  $Oborot->date=$request['date'];
               
                  // $Oborot->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                  $Oborot->n_doc= $request['ndoc'];   
                  $Oborot->host = $request->ip();   
                 $Oborot->save();
                 //ostatki safe
                  //   /rashod
                      //ostatki safe
                      $ostatki_safe = new ostatki_safe;
                      $ostatki_safe->comment=$request['comment'];
                      $ostatki_safe->date=$request['date'];
                      $ostatki_safe->src=$request['src'];
                      $ostatki_safe->naminal=$request['naminal'.$input];
                      $ostatki_safe->priznak=1;
                      $ostatki_safe->ed_id=2; 
                      $ostatki_safe->type=1;
                      //$ostatki_safe->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                      $ostatki_safe->summa=$request['Summarashod'.$input][0];
                      $ostatki_safe->safe_id= $request['safe'.$input];   
                      $ostatki_safe->shkaf_id=$request['shkaf'.$input];   
                      $ostatki_safe->qator_id=$request['sprQator'.$input];   
                      $ostatki_safe->cell_id = $request['sprCell'.$input];   
                      $ostatki_safe->typeFond=0;   
                   //    $ostatki_safe->n_doc= $request['ndoc'];   
                      $ostatki_safe->host = $request->ip();   
                      $ostatki_safe->user_id = Auth::id();   
                      $ostatki_safe->save();
                 $ostatki_safe = new ostatki_safe;
                 $ostatki_safe->comment=$request['comment'];
                 $ostatki_safe->date=$request['date'];
                 $ostatki_safe->src=$request['src'];
                 $ostatki_safe->naminal=$request['naminal'.$input];
                 $ostatki_safe->priznak=0;
                 $ostatki_safe->ed_id=2; 
                 $ostatki_safe->type=1;
                 //$ostatki_safe->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                 $ostatki_safe->summa  = $request['ostatkiResults'.$input]-$request['Summarashod'.$input][0];
                 $ostatki_safe->safe_id= $request['safe'.$input];   
                 $ostatki_safe->shkaf_id=$request['shkaf'.$input];   
                 $ostatki_safe->qator_id=$request['sprQator'.$input];   
                 $ostatki_safe->cell_id = $request['sprCell'.$input];   
                 $ostatki_safe->typeFond=0;   
              //    $ostatki_safe->n_doc= $request['ndoc'];   
                 $ostatki_safe->host = $request->ip();   
                 $ostatki_safe->user_id = Auth::id();   
                 $ostatki_safe->save();
              
                  }
                  
             
        
          

      }    
      return true;

    }   //end rashod 
       //Rashod insert ostatki
       public function InsertRashodFarsudaToOstatki($request)
       {
         foreach($request['id'] AS $input)
         {
             // print_r($input);
             // exit;
                     if($request['Summarashod'.$input][0]>0)
                     {
       
                      //fond insert
                     $FondMoney = new FondMoney;
                     $FondMoney->date=$request['date'];
                     $FondMoney->comment=$request['comment'];
                     $FondMoney->priznak=$request['priznak'];
                     $FondMoney->type=2;
                     $FondMoney->src=3;
                     $FondMoney->naminal=$request['naminal'.$input];
                     $FondMoney->ed_id=2; 
                     $FondMoney->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                     $FondMoney->summa  = $request['Summarashod'.$input][0];   
                     $FondMoney->safe_id= $request['safe'.$input];   
                     $FondMoney->shkaf_id=$request['shkaf'.$input];   
                     $FondMoney->qator_id=$request['sprQator'.$input];   
                     $FondMoney->cell_id = $request['sprCell'.$input];   
                     $FondMoney->kode_oper= $request['kode_operRashod'];   
                     $FondMoney->n_doc=$request['ndoc'];   
                     $FondMoney->host=$request->ip();   
                     $FondMoney->user_id=Auth::id();   
                     $FondMoney->save();
                     //Oborot insert
                     
                 
                    //rashod 
                     //ostatki safe
                     $ostatki_safe = new ostatki_safe;
                     $ostatki_safe->date=$request['date'];
                     // $ostatki_safe->comment=$request['comment'];
                     $ostatki_safe->src=3;
                     $ostatki_safe->naminal=$request['naminal'.$input];
                     $ostatki_safe->priznak=1;
                     $ostatki_safe->ed_id=2; 
                     $ostatki_safe->type=2;
                     //$ostatki_safe->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                     $ostatki_safe->summa  =$request['Summarashod'.$input][0];
                     $ostatki_safe->safe_id= $request['safe'.$input];   
                     $ostatki_safe->shkaf_id=$request['shkaf'.$input];   
                     $ostatki_safe->qator_id=$request['sprQator'.$input];   
                     $ostatki_safe->cell_id = $request['sprCell'.$input];   
                     $ostatki_safe->typeFond=0;   
                  //    $ostatki_safe->n_doc= $request['ndoc'];   
                     $ostatki_safe->host =$request->ip();   
                     $ostatki_safe->user_id =Auth::id();   
                     $ostatki_safe=  $ostatki_safe->save();
                     

                        //ostatki safe
                    $ostatki_safe = new ostatki_safe;
                    $ostatki_safe->date=$request['date'];
                    // $ostatki_safe->comment=$request['comment'];
                    $ostatki_safe->src=$request['src'];
                    $ostatki_safe->naminal=$request['naminal'.$input];
                    $ostatki_safe->priznak=0;
                    $ostatki_safe->ed_id=2; 
                    $ostatki_safe->type=2;
                    //$ostatki_safe->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                    $ostatki_safe->summa  = $request['ostatkiResults'.$input]-$request['Summarashod'.$input][0];
                    $ostatki_safe->safe_id= $request['safe'.$input];   
                    $ostatki_safe->shkaf_id=$request['shkaf'.$input];   
                    $ostatki_safe->qator_id=$request['sprQator'.$input];   
                    $ostatki_safe->cell_id = $request['sprCell'.$input];   
                    $ostatki_safe->typeFond=0;   
                 //    $ostatki_safe->n_doc= $request['ndoc'];   
                    $ostatki_safe->host =$request->ip();   
                    $ostatki_safe->user_id =Auth::id();   
                    $ostatki_safe=  $ostatki_safe->save();
                  
                 
        }
      
                
           
             
   
         }    
         
         return true;
   
       }
       //botilshuda rashod 
       public function InsertRashodBotilshudaToOstatki($request)
       {
         foreach($request['id'] AS $input)
         {
             // print_r($input);
             // exit;
                     if($request['Summarashod'.$input][0]>0)
                     {
       
                      //fond insert
                     $FondMoney = new FondMoney;
                     $FondMoney->date=$request['date'];
                     $FondMoney->priznak=$request['priznak'];
                     $FondMoney->comment=$request['comment'];
                     $FondMoney->type=3;
                     $FondMoney->src=0;
                     $FondMoney->naminal=$request['naminal'.$input];
                     $FondMoney->ed_id=2; 
                     $FondMoney->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                     $FondMoney->summa  = $request['Summarashod'.$input][0];   
                     $FondMoney->safe_id= $request['safe'.$input];   
                     $FondMoney->shkaf_id=$request['shkaf'.$input];   
                     $FondMoney->qator_id=$request['sprQator'.$input];   
                     $FondMoney->cell_id = $request['sprCell'.$input];   
                     $FondMoney->kode_oper= $request['kode_operRashod'];   
                     $FondMoney->n_doc=$request['ndoc'];   
                     $FondMoney->host=$request->ip();   
                     $FondMoney->user_id=Auth::id();   
                     $FondMoney->save();
                     //Oborot insert
                     
           

                    //rashod 
                       //ostatki safe
                       $ostatki_safe = new ostatki_safe;
                       $ostatki_safe->date=$request['date'];
                       $ostatki_safe->src=0;
                       $ostatki_safe->naminal=$request['naminal'.$input];
                       $ostatki_safe->priznak=1;
                       $ostatki_safe->ed_id=2; 
                       $ostatki_safe->type=3;
                       //$ostatki_safe->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                       $ostatki_safe->summa  = $request['Summarashod'.$input][0];
                       $ostatki_safe->safe_id= $request['safe'.$input];   
                       $ostatki_safe->shkaf_id=$request['shkaf'.$input];   
                       $ostatki_safe->qator_id=$request['sprQator'.$input];   
                       $ostatki_safe->cell_id = $request['sprCell'.$input];   
                       $ostatki_safe->typeFond=0;   
                    //    $ostatki_safe->n_doc= $request['ndoc'];   
                       $ostatki_safe->host =$request->ip();   
                       $ostatki_safe->user_id =Auth::id();   
                       $ostatki_safe=  $ostatki_safe->save();
                                //ostatki safe
                    $ostatki_safe = new ostatki_safe;
                    $ostatki_safe->date=$request['date'];
                    $ostatki_safe->src=0;
                    $ostatki_safe->naminal=$request['naminal'.$input];
                    $ostatki_safe->priznak=0;
                    $ostatki_safe->ed_id=2; 
                    $ostatki_safe->type=3;
                    //$ostatki_safe->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                    $ostatki_safe->summa  = $request['ostatkiResults'.$input]-$request['Summarashod'.$input][0];
                    $ostatki_safe->safe_id= $request['safe'.$input];   
                    $ostatki_safe->shkaf_id=$request['shkaf'.$input];   
                    $ostatki_safe->qator_id=$request['sprQator'.$input];   
                    $ostatki_safe->cell_id = $request['sprCell'.$input];   
                    $ostatki_safe->typeFond=0;   
                 //    $ostatki_safe->n_doc= $request['ndoc'];   
                    $ostatki_safe->host =$request->ip();   
                    $ostatki_safe->user_id =Auth::id();   
                    $ostatki_safe=  $ostatki_safe->save();
                 
        }
      
                
           
             
   
         }    
         
         return true;
   
       }
     //Tanga 
     public function InsertRashodTanga($detailsFond,$typeFond)
     {
 
       foreach($detailsFond AS $detailFonds)
       {
          $detailFondsRazne=$detailFonds;
          // echo "<pre>";
          // print_r($detailFonds);
          // echo "</pre>";
          foreach($detailFonds As $keys=>$detals)
          {
              //prihod query
              if($detailFonds[$keys]['priznak']==0)
              {
 
                  unset($detailFonds[$keys]['kol']);
                  unset($detailFonds[$keys]['n_doc']);
                  unset($detailFonds[$keys]['kode_oper']);
                  $detailFonds[$keys]['typeFond']=$typeFond;
                  $ostatki= ostatki_safe::where('naminal', $detailFonds[$keys]['naminal'])->where('cell_id',  $detailFonds[$keys]['cell_id'])->where('priznak',  $detailFonds[$keys]['priznak'])->orderBy('id','desc')->limit(1)->get();
                   "<br>".$detailFonds[$keys]['naminal']; 
                   "<br>".$detailFonds[$keys]['summa']; 
                   foreach($ostatki as $ostatkey => $ostatks) {
                      # code...
                      $detailFonds[$keys]['summa']+=$ostatks['summa'];
                    
                   }
                   // echo "<pre>";
                   // print_r($detailFonds[$keys]);
                   // echo "</pre>";
                 ostatki_safe::create($detailFonds[$keys]);
              }
              if($detailFondsRazne[$keys]['naminal']=='razne')
              {
                  unset($detailFondsRazne[$keys]['kol']);
                  unset($detailFondsRazne[$keys]['n_doc']);
                  unset($detailFondsRazne[$keys]['kode_oper']);
                  $detailFondsRazne[$keys]['typeFond']=$typeFond;
                  $ostatkiraz= ostatki_safe::where('naminal','razne')->where('cell_id',  $detailFondsRazne[$keys]['cell_id'])->where('priznak',  $detailFondsRazne[$keys]['priznak'])->orderBy('id','desc')->limit(1)->get();
                  foreach($ostatkiraz as $ostatkeyr => $ostatksr) {
                      # code...
                      $detailFondsRazne[$keys]['summa']+=$ostatksr['summa'];
                    
                   }
                 ostatki_safe::create($detailFondsRazne[$keys]);
              }
          }
        // print_r($detals);
      
         
   }
     } //End Insert Prihod to ostatki
     public function InsertRashodKorshoyamToOstatkiTanga($request)
    {
      foreach($request['id'] AS $input)
      {
          // print_r($input);
          // exit;
                  if($request['Summarashod'.$input][0]>0)
                  {
                      // FondMoney::create($money[$key]);
                      // Oborot::create($oborots[$key]);
                   //fond insert
                  $FondMoney = new FondCoins;
                  $FondMoney->date=$request['date'];
                  $FondMoney->comment=$request['comment'];
                  $FondMoney->priznak=$request['priznak'];
                  $FondMoney->type=1;
                  $FondMoney->src=$request['src'];
                  $FondMoney->naminal=$request['naminal'.$input];
                  $FondMoney->ed_id=2; 
                  $FondMoney->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                  $FondMoney->summa  = $request['Summarashod'.$input][0];   
                  $FondMoney->safe_id= $request['safe'.$input];   
                  $FondMoney->shkaf_id=$request['shkaf'.$input];   
                  $FondMoney->qator_id=$request['sprQator'.$input];   
                  $FondMoney->cell_id = $request['sprCell'.$input];   
                  $FondMoney->kode_oper= $request['kode_operRashod'];   
                  $FondMoney->n_doc= $request['ndoc'];   
                  $FondMoney->host = $request->ip();   
                  $FondMoney->user_id = Auth::id();   
                  $FondMoney->save();
                  //Oborot insert
                  $Oborot = new oborots_coin();
               
                  $Oborot->kod_oper= $request['kode_oper_oborRashod'];   
                  $Oborot->naminal=$request['naminal'.$input];
                  $Oborot->summa  = $request['Summarashod'.$input][0];   
                  $Oborot->priznak=$request['priznak'];
                  // $Oborot->type=1;
              //    $Oborot->account_id_out=1;//korshoyam id
                  $Oborot->src=$request['src'];//istochnik oborot id
                  $Oborot->user_id = Auth::id();   
                  $Oborot->date=$request['date'];
               
                  // $Oborot->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                  $Oborot->n_doc= $request['ndoc'];   
                  $Oborot->host=$request->ip();   
                 $Oborot->save();
          
                     //ostatki safe
                     $ostatki_safe = new ostatki_safe;
                     $ostatki_safe->comment=$request['comment'];
                     $ostatki_safe->date=$request['date'];
                     $ostatki_safe->src=$request['src'];
                     $ostatki_safe->naminal=$request['naminal'.$input];
                     $ostatki_safe->priznak=1;
                     $ostatki_safe->ed_id=2; 
                     $ostatki_safe->type=1;
                     //$ostatki_safe->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                     $ostatki_safe->summa=$request['Summarashod'.$input][0];
                     $ostatki_safe->safe_id= $request['safe'.$input];   
                     $ostatki_safe->shkaf_id=$request['shkaf'.$input];   
                     $ostatki_safe->qator_id=$request['sprQator'.$input];   
                     $ostatki_safe->cell_id = $request['sprCell'.$input];   
                     $ostatki_safe->typeFond=1;   
                  //    $ostatki_safe->n_doc= $request['ndoc'];   
                     $ostatki_safe->host = $request->ip();   
                     $ostatki_safe->user_id = Auth::id();   
                     $ostatki_safe->save();
                            //ostatki safe rashod 
                 $ostatki_safe = new ostatki_safe;
                 $ostatki_safe->comment=$request['comment'];
                 $ostatki_safe->date=$request['date'];
                 $ostatki_safe->src=$request['src'];
                 $ostatki_safe->naminal=$request['naminal'.$input];
                 $ostatki_safe->priznak=0;
                 $ostatki_safe->ed_id=2; 
                 $ostatki_safe->type=1;
                 //$ostatki_safe->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                 $ostatki_safe->summa=$request['ostatkiResults'.$input]-$request['Summarashod'.$input][0];
                 $ostatki_safe->safe_id= $request['safe'.$input];   
                 $ostatki_safe->shkaf_id=$request['shkaf'.$input];   
                 $ostatki_safe->qator_id=$request['sprQator'.$input];   
                 $ostatki_safe->cell_id = $request['sprCell'.$input];   
                 $ostatki_safe->typeFond=1;   
              //    $ostatki_safe->n_doc= $request['ndoc'];   
                 $ostatki_safe->host = $request->ip();   
                 $ostatki_safe->user_id = Auth::id();   
                 $ostatki_safe->save();
             }
                  
             
        
          

      }    
      return true;

    }   //end rashod tanga korshoyam  
 //farsuda tanga rashod
   public function InsertRashodFarsudaToOstatkiTanga($request)
       {
         foreach($request['id'] AS $input)
         {
             // print_r($input);
             // exit;
                     if($request['Summarashod'.$input][0]>0)
                     {
       
                      //fond insert
                     $FondMoney = new FondCoins;
                     $FondMoney->date=$request['date'];
                     $FondMoney->comment=$request['comment'];
                     $FondMoney->priznak=$request['priznak'];
                     $FondMoney->type=2;
                     $FondMoney->src=3;
                     $FondMoney->naminal=$request['naminal'.$input];
                     $FondMoney->ed_id=2; 
                     $FondMoney->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                     $FondMoney->summa  = $request['Summarashod'.$input][0];   
                     $FondMoney->safe_id= $request['safe'.$input];   
                     $FondMoney->shkaf_id=$request['shkaf'.$input];   
                     $FondMoney->qator_id=$request['sprQator'.$input];   
                     $FondMoney->cell_id = $request['sprCell'.$input];   
                     $FondMoney->kode_oper= $request['kode_operRashod'];   
                     $FondMoney->n_doc=$request['ndoc'];   
                     $FondMoney->host=$request->ip();   
                     $FondMoney->user_id=Auth::id();   
                     $FondMoney->save();
                     //Oborot insert
                     
                    
                        //ostatki safe
                        $ostatki_safe = new ostatki_safe;
                        $ostatki_safe->date=$request['date'];
                        // $ostatki_safe->comment=$request['comment'];
                        $ostatki_safe->src=$request['src'];
                        $ostatki_safe->naminal=$request['naminal'.$input];
                        $ostatki_safe->priznak=1;
                        $ostatki_safe->ed_id=2; 
                        $ostatki_safe->type=2;
                        //$ostatki_safe->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                        $ostatki_safe->summa  = $request['Summarashod'.$input][0];
                        $ostatki_safe->safe_id= $request['safe'.$input];   
                        $ostatki_safe->shkaf_id=$request['shkaf'.$input];   
                        $ostatki_safe->qator_id=$request['sprQator'.$input];   
                        $ostatki_safe->cell_id = $request['sprCell'.$input];   
                        $ostatki_safe->typeFond=1;   
                     //    $ostatki_safe->n_doc= $request['ndoc'];   
                        $ostatki_safe->host =$request->ip();   
                        $ostatki_safe->user_id =Auth::id();   
                        $ostatki_safe=  $ostatki_safe->save();
                 //ostatki safe
                    $ostatki_safe = new ostatki_safe;
                    $ostatki_safe->date=$request['date'];
                    // $ostatki_safe->comment=$request['comment'];
                    $ostatki_safe->src=$request['src'];
                    $ostatki_safe->naminal=$request['naminal'.$input];
                    $ostatki_safe->priznak=0;
                    $ostatki_safe->ed_id=2; 
                    $ostatki_safe->type=2;
                    //$ostatki_safe->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                    $ostatki_safe->summa  = $request['ostatkiResults'.$input]-$request['Summarashod'.$input][0];
                    $ostatki_safe->safe_id= $request['safe'.$input];   
                    $ostatki_safe->shkaf_id=$request['shkaf'.$input];   
                    $ostatki_safe->qator_id=$request['sprQator'.$input];   
                    $ostatki_safe->cell_id = $request['sprCell'.$input];   
                    $ostatki_safe->typeFond=1;   
                 //    $ostatki_safe->n_doc= $request['ndoc'];   
                    $ostatki_safe->host =$request->ip();   
                    $ostatki_safe->user_id =Auth::id();   
                    $ostatki_safe=  $ostatki_safe->save();
                  
                 
        }
    }    
         
         return true;
   
       }

      //botilshuda rashod 
      public function InsertRashodBotilshudaToOstatkiTanga($request)
      {
        foreach($request['id'] AS $input)
        {
            // print_r($input);
            // exit;
                    if($request['Summarashod'.$input][0]>0)
                    {
      
                     //fond insert
                    $FondMoney = new FondCoins;
                    $FondMoney->date=$request['date'];
                    $FondMoney->priznak=$request['priznak'];
                    $FondMoney->comment=$request['comment'];
                    $FondMoney->type=3;
                    $FondMoney->src=0;
                    $FondMoney->naminal=$request['naminal'.$input];
                    $FondMoney->ed_id=2; 
                    $FondMoney->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                    $FondMoney->summa  = $request['Summarashod'.$input][0];   
                    $FondMoney->safe_id= $request['safe'.$input];   
                    $FondMoney->shkaf_id=$request['shkaf'.$input];   
                    $FondMoney->qator_id=$request['sprQator'.$input];   
                    $FondMoney->cell_id = $request['sprCell'.$input];   
                    $FondMoney->kode_oper= $request['kode_operRashod'];   
                    $FondMoney->n_doc=$request['ndoc'];   
                    $FondMoney->host=$request->ip();   
                    $FondMoney->user_id=Auth::id();   
                    $FondMoney->save();
                    //Oborot insert
                    
          

                   //rashod 
                      //ostatki safe
                      $ostatki_safe = new ostatki_safe;
                      $ostatki_safe->date=$request['date'];
                      $ostatki_safe->src=0;
                      $ostatki_safe->naminal=$request['naminal'.$input];
                      $ostatki_safe->priznak=1;
                      $ostatki_safe->ed_id=2; 
                      $ostatki_safe->type=3;
                      //$ostatki_safe->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                      $ostatki_safe->summa=$request['Summarashod'.$input][0];
                      $ostatki_safe->safe_id= $request['safe'.$input];   
                      $ostatki_safe->shkaf_id=$request['shkaf'.$input];   
                      $ostatki_safe->qator_id=$request['sprQator'.$input];   
                      $ostatki_safe->cell_id = $request['sprCell'.$input];   
                      $ostatki_safe->typeFond=1;   
                   //    $ostatki_safe->n_doc= $request['ndoc'];   
                      $ostatki_safe->host =$request->ip();   
                      $ostatki_safe->user_id =Auth::id();   
                      $ostatki_safe=  $ostatki_safe->save();
                               //ostatki safe
                   $ostatki_safe = new ostatki_safe;
                   $ostatki_safe->date=$request['date'];
                   $ostatki_safe->src=0;
                   $ostatki_safe->naminal=$request['naminal'.$input];
                   $ostatki_safe->priznak=0;
                   $ostatki_safe->ed_id=2; 
                   $ostatki_safe->type=3;
                   //$ostatki_safe->kol=$request['Summarashod'.$input][0]/1000/$request['naminal'.$input];   
                   $ostatki_safe->summa  = $request['ostatkiResults'.$input]-$request['Summarashod'.$input][0];
                   $ostatki_safe->safe_id= $request['safe'.$input];   
                   $ostatki_safe->shkaf_id=$request['shkaf'.$input];   
                   $ostatki_safe->qator_id=$request['sprQator'.$input];   
                   $ostatki_safe->cell_id = $request['sprCell'.$input];   
                   $ostatki_safe->typeFond=1;   
                //    $ostatki_safe->n_doc= $request['ndoc'];   
                   $ostatki_safe->host =$request->ip();   
                   $ostatki_safe->user_id =Auth::id();   
                   $ostatki_safe=  $ostatki_safe->save();
                
       }
     
               
          
            
  
        }    
        
        return true;
  
      }   
}