<?php 
namespace App\Repositories;
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
use App\Models\OstatkiSchet;
use App\Models\FondEmisions;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Repositoryschet{

   private  $FondEmisions;
   private  $Fond;
   private  $FondMoney;
   private  $FondCoins;
   private  $Oborot;
   private  $oborots_coin;
   private  $FondEmisionsArray=[];
   private  $FondKorshoyamArray=[];
   private  $FondFarsudaamArray=[];
   private  $FondBotilshudaamArray=[];
   private  $FondOborotArray=[];
   public  function __construct(FondEmisions $FondEmisions,FondMoney $FondMoney,FondCoins $FondCoins,Oborot $Oborot,oborots_coin $oborots_coin)
  {
    $this->FondEmisions=$FondEmisions;
    $this->FondMoney=$FondMoney;
    $this->FondCoins=$FondCoins;
    $this->Oborot=$Oborot;
    $this->oborots_coin=$oborots_coin;
  }
  private function AllOstatkischetFond($src,$date,$type)
  {
    $endsum=0;
    $pr=OstatkiSchet::whereDate('priod','<',)->where('type',$type)->orderBy('id', 'DESC')->where('src',$src)->limit(1)->get();
    if(isset(json_decode($pr,true)[0]['ostatok_end']))
    {
        $endsum=json_decode($pr,true)[0]['ostatok_end'];
    }
    return $endsum;
  }
 
    public function ToDateFondEmisions($request)
    {
              
        // ::select('date,src,priznak,summa')
       
        if($request->startDate &&$request->EndDate):
            $endsum= $this->AllOstatkischetFond(7,$request->startDate,2);
            $this->AllOstatkischetFond(7,$request->startDate,1);
            // echo "<pre>";
            // print_r(json_decode($pr,true)[0]['ostatok_end']);
            // echo "</pre>"; 
         
          
            $startDate=$request->startDate;
            $EndDate=$request->EndDate;
            $typeDate=2;
            $FondEmisionsRashod=$this->FondEmisions->whereBetween('date',[$request->startDate." 00:01:00",$request->EndDate." 01:01:01"])->where('priznak',1)->get()->sum('summa');
            $FondEmisionsPrihod=$this->FondEmisions->whereBetween('date',[$request->startDate." 00:01:00",$request->EndDate." 01:01:01"])->sum('summa');
        
        endif;  
        // print_r([$request->startDate,$request->EndDate]);
        if($request->dayType):
            // $pr=OstatkiSchet::whereDate('priod','<',$request->startDate)->where('type',2)->orderBy('id', 'DESC')->where('src',7)->limit(1)->get();
            $endsum= $this->AllOstatkischetFond(7,$request->startDate,1);
           
              $typeDate=1;
            $FondEmisionsRashod=$this->FondEmisions->where('date','>=',$request->dayType." 00:00:00")->where('priznak',1)->sum('summa');
            $FondEmisionsPrihod=$this->FondEmisions->where('date','>=',$request->dayType." 00:0:00")->sum('summa');
            $startDate=$request->dayType;
            $EndDate=$request->dayType;
        
        endif;  
   
         
        if($FondEmisionsRashod>0 || $endsum>0 ):
        $this->Fond[7]['date']=date('Y-m-d');
        $this->Fond[7]['src']=7;
        $this->Fond[7]['priod']=$EndDate;
        $this->Fond[7]['ostatok_start']=$endsum;
        $this->Fond[7]['Prikhod']=$FondEmisionsPrihod;
        $this->Fond[7]['Raskhod']=$FondEmisionsRashod;
        $this->Fond[7]['ostatok_end']=($endsum+$FondEmisionsPrihod)-$FondEmisionsRashod;
        $this->Fond[7]['type']=$typeDate;
        $this->Fond[7]['FondType']=1;
        $this->Fond[7]['user_id']= Auth::id();
        $this->Fond[7]['host']=$request->ip();
        endif;  
        //    $this->arraySchet['priod']=1;
         // $FondEmisions->where('priznak',0)->sum('summa');
         
         return True;
    }
    private function AllOstatkischetFonds($src,$date,$type,$FondType)
    {
      $endsum=0;
      $pr=OstatkiSchet::whereDate('priod','<',$date)->where('type',$type)->orderBy('id', 'DESC')->where('src',$src)->where('FondType',$FondType)->limit(1)->get();
     
   
     
      if(isset(json_decode($pr,true)[0]['ostatok_end']))
      {
          $endsum=json_decode($pr,true)[0]['ostatok_end'];
      }
      return $endsum;
    }
    public function ToDateFond($request,$src)
    { 
        
        // echo "<pre>";
        // print_r(json_decode($pr,true)[0]['ostatok_end']);
        // echo "</pre>"; 
        $endsum=0;
      
       
     
        if($request->startDate &&$request->EndDate):
            // AllOstatkischetFonds($src,$date,$type,$FondType)
            $endsum=$this->AllOstatkischetFonds($src,$request->startDate,2,1);
           
            $startDate=$request->startDate;
            $EndDate=$request->EndDate;
            $typeDate=2;
            $Prihod=$this->FondMoney->whereBetween('date',[$request->startDate." 00:01:00",$request->EndDate."01:01:01"])->where('type',$src)->where('priznak',0)->get()->sum('summa');
            $Rashod=$this->FondMoney->whereBetween('date',[$request->startDate." 00:01:00",$request->EndDate." 01:01:01"])->where('type',$src)->where('priznak',1)->get()->sum('summa');
        endif; 
        if($request->dayType):
            $endsum=$this->AllOstatkischetFonds($src,$request->dayType,1,1);
           $typeDate=1;
            $Rashod=$this->FondMoney->whereDate('date','>=',$request->dayType." 00:00:00")->where('type',$src)->where('priznak',1)->sum('summa');
            $Prihod=$this->FondMoney->whereDate('date','>=',$request->dayType." 00:00:00")->where('type',$src)->where('priznak',0)->sum('summa');
       
            $EndDate=$request->dayType;
        
        endif; 
       
        if($Prihod>0 || $endsum>0 AND $Rashod<=$Prihod):
         $this->Fond[$src]['date']=date('Y-m-d');
         $this->Fond[$src]['src']=$src;
         $this->Fond[$src]['priod']=$EndDate;
         $this->Fond[$src]['ostatok_start']=$endsum;
         $this->Fond[$src]['Prikhod']=$Prihod;
         $this->Fond[$src]['Raskhod']=$Rashod;
         $this->Fond[$src]['FondType']=1;
         $this->Fond[$src]['ostatok_end']=($endsum+$Prihod)-$Rashod;
         $this->Fond[$src]['type']=$typeDate;
         $this->Fond[$src]['user_id']=Auth::id();
         $this->Fond[$src]['host']=$request->ip();
        endif; 
        
    }
    public function ToDateFondCoins($request,$src)
    { 
        
   
        $endsum=0;
      
       
       
        if($request->startDate &&$request->EndDate ):
            // $pr=OstatkiSchet::whereDate('priod','<',$request->startDate)->where('type',2)->orderBy('id', 'DESC')->where('src',$src)->where('FondType',2)->limit(1)->get();
            // AllOstatkischetFonds($src,$date,$type,$FondType)
            $endsum=$this->AllOstatkischetFonds($src,$request->startDate,2,2);
            
            $startDate=$request->startDate;
            $EndDate=$request->EndDate;
            $typeDate=2;
            $Prihod=$this->FondCoins->whereBetween('date',[$request->startDate." 00:01:00",$request->EndDate." 01:01:01"])->where('type',$src)->where('priznak',0)->get()->sum('summa');
            $Rashod=$this->FondCoins->whereBetween('date',[$request->startDate." 00:01:00",$request->EndDate." 01:01:01"])->where('type',$src)->where('priznak',1)->get()->sum('summa');
        endif; 
        if($request->dayType ):
            $endsum=$this->AllOstatkischetFonds($src,$request->dayType,1,2);
            // $pr=OstatkiSchet::whereDate('priod','<',$request->dayType)->where('type',1)->orderBy('id', 'DESC')->where('src',$src)->where('FondType',2)->limit(1)->get();
            // if(isset(json_decode($pr,true)[0]['ostatok_end']))
            // {
            //     $endsum=json_decode($pr,true)[0]['ostatok_end'];
            // }
            $typeDate=1;
            $Rashod=$this->FondCoins->whereDate('date','>=',$request->dayType." 00:00:00")->where('type',$src)->where('priznak',1)->sum('summa');
            $Prihod=$this->FondCoins->whereDate('date','>=',$request->dayType." 00:00:00")->where('type',$src)->where('priznak',0)->sum('summa');
       
            $EndDate=$request->dayType;
        
        endif; 
       
        if($Prihod>0 ||  $endsum>0 AND $Rashod<=$Prihod):
            if($src==1):
                $schetId=10; 
            endif;    
            if($src==2):
                $schetId=11;
            endif; 
            if($src==3):
                $schetId=0;
            endif; 
         $this->Fond[$src.'2']['date']=date('Y-m-d');
         $this->Fond[$src.'2']['src']=$schetId;
         $this->Fond[$src.'2']['priod']=$EndDate;
         $this->Fond[$src.'2']['ostatok_start']= $endsum;
         $this->Fond[$src.'2']['Prikhod']=$Prihod;
         $this->Fond[$src.'2']['FondType']=2;
         $this->Fond[$src.'2']['Raskhod']=$Rashod;
         $this->Fond[$src.'2']['ostatok_end']=($endsum+$Prihod)-$Rashod;
         $this->Fond[$src.'2']['type']=$typeDate;
         $this->Fond[$src.'2']['user_id']=Auth::id();
         $this->Fond[$src.'2']['host']=$request->ip();
        endif; 
        
    }
    public  function OborotMoney($request,$src)
    {
           $endsum=0;
       
        if($request->startDate && $request->EndDate):
            $startDate=$request->startDate;
            $EndDate=$request->EndDate;
            $typeDate=2;
            // AllOstatkischetFonds($src,$date,$type,$FondType)
            $endsum=$this->AllOstatkischetFonds($src,$request->startDate,2,1);  
            // $pr=OstatkiSchet::whereDate('priod','<',$request->startDate)->where('type',2)->orderBy('id', 'DESC')->where('src',$src)->where('FondType',1)->limit(1)->get();
    
            // if(isset(json_decode($pr,true)[0]['ostatok_end']))
            // {
            //     $endsum=json_decode($pr,true)[0]['ostatok_end'];
            // }
            $Prihod=$this->Oborot->whereBetween('date',[$request->startDate." 00:01:00",$request->EndDate." 01:01:01"])->where('account_id_in',$src)->where('priznak',0)->get()->sum('summa');
            $Rashod=$this->Oborot->whereBetween('date',[$request->startDate." 00:01:00",$request->EndDate." 01:01:01"])->where('account_id_in',$src)->where('priznak',1)->get()->sum('summa');
        endif; 
     
        if($request->dayType):
            $endsum=$this->AllOstatkischetFonds($src,$request->dayType,1,1);  
            // $pr=OstatkiSchet::whereDate('priod','<',$request->dayType)->where('type',1)->orderBy('id', 'DESC')->where('src',$src)->where('FondType',1)->limit(1)->get();
    
            // if(isset(json_decode($pr,true)[0]['ostatok_end']))
            // {
            //     $endsum=json_decode($pr,true)[0]['ostatok_end'];
            // }
            $typeDate=1;
            $Rashod=$this->Oborot->whereDate('date','>=',$request->dayType." 00:00:00")->where('account_id_in',$src)->where('priznak',1)->sum('summa');
            $Prihod=$this->Oborot->whereDate('date','>=',$request->dayType." 00:00:00")->where('account_id_in',$src)->where('priznak',0)->sum('summa');
       
             $EndDate=$request->dayType;
        
        endif; 
        // AND  у$Rashod<=$Prihod
        
        if($Prihod>0 ||  $endsum>0):
         $this->Fond[$src]['date']=date('Y-m-d');
         $this->Fond[$src]['src']=$src;
         $this->Fond[$src]['priod']=$EndDate;
         $this->Fond[$src]['ostatok_start']=$endsum;
         $this->Fond[$src]['Prikhod']=$Prihod;
         $this->Fond[$src]['Raskhod']=$Rashod;
         $this->Fond[$src]['FondType']=1;
         $this->Fond[$src]['ostatok_end']=($endsum+$Prihod)-$Rashod;
         $this->Fond[$src]['type']=$typeDate;
         $this->Fond[$src]['user_id']= Auth::id();
         $this->Fond[$src]['host']=$request->ip();
        endif;
          
    }
    public  function OborotCoins($request,$src)
    {
       
        $endsum=0;
      
        if($request->startDate &&$request->EndDate):
            $endsum=$this->AllOstatkischetFonds($src,$request->startDate,2,2);  
        //      $pr=OstatkiSchet::whereDate('priod','<',$request->startDate)->where('type',2)->orderBy('id', 'DESC')->where('src',$src)->where('FondType',2)->limit(1)->get();
        // if(isset(json_decode($pr,true)[0]['ostatok_end']))
        // {
        //     $endsum=json_decode($pr,true)[0]['ostatok_end'];
        // }
            $startDate=$request->startDate;
            $EndDate=$request->EndDate;
            $typeDate=2;
            $Prihod=$this->oborots_coin->whereBetween('date',[$request->startDate." 00:01:00",$request->EndDate." 01:01:01"])->where('src',$src)->where('priznak',0)->get()->sum('summa');
            $Rashod=$this->oborots_coin->whereBetween('date',[$request->startDate." 00:01:00",$request->EndDate." 01:01:01"])->where('src',$src)->where('priznak',1)->get()->sum('summa');
        endif; 
        if($request->dayType):
            $endsum=$this->AllOstatkischetFonds($src,$request->dayType,1,2);  
            $pr=OstatkiSchet::whereDate('priod','<',$request->dayType)->where('type',1)->orderBy('id', 'DESC')->where('src',$src)->where('FondType',2)->limit(1)->get();
    
            // if(isset(json_decode($pr,true)[0]['ostatok_end']))
            // {
            //     $endsum=json_decode($pr,true)[0]['ostatok_end'];
            // }
            $typeDate=1;
     
            $Prihod=$this->oborots_coin->whereDate('date','>=',$request->dayType." 00:00:00")->where('src',$src)->where('priznak',0)->sum('summa');
            $Rashod=$this->oborots_coin->whereDate('date','>=',$request->dayType." 00:00:00")->where('src',$src)->where('priznak',1)->sum('summa');
       
            $EndDate=$request->dayType;
        
        endif; 
      echo  $Rashod;
        if($Prihod>0 ||  $endsum>0 AND $Rashod<=$Prihod):
         $this->Fond[$src.'4']['date']=date('Y-m-d');
         $this->Fond[$src.'4']['src']=8;
         $this->Fond[$src.'4']['priod']=$EndDate;
         $this->Fond[$src.'4']['ostatok_start']= $endsum;
         $this->Fond[$src.'4']['Prikhod']=$Prihod;
         $this->Fond[$src.'4']['Raskhod']=$Rashod;
         $this->Fond[$src.'4']['FondType']=2;
         $this->Fond[$src.'4']['ostatok_end']=($endsum+$Prihod)-$Rashod;
         $this->Fond[$src.'4']['type']=$typeDate;
         $this->Fond[$src.'4']['user_id']=Auth::id();
         $this->Fond[$src.'4']['host']=$request->ip();
        endif; 
        
        
    }




    public function InsertOstatkiSchet()
    {
              echo "<pre>";
              print_r($this->Fond);
              echo "</pre>";
        if(is_array($this->Fond)):
                foreach($this->Fond AS $fond):
              OstatkiSchet::create($fond);   
            endforeach;
        endif;
        if(!is_array($this->Fond)):
           return  404;
        endif;
             
         

      

        
    }
    public function AllSelectDay($src,$typefond,$type)
    {
        return  OstatkiSchet::where('src',$src)->orderBy('id', 'DESC')->where('FondType',$typefond)->where('type',$type)->limit(1)->get();
    }

}